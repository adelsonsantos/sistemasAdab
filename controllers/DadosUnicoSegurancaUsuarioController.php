<?php

namespace app\controllers;

use app\models\DadosUnicoFuncionario;
use app\models\Model;
use app\models\SegurancaUsuarioTipoUsuario;
use MongoDB\Driver\Exception\Exception;
use Yii;
use app\models\DadosUnicoSegurancaUsuario;
use app\models\DadosUnicoSegurancaUsuarioSearch;
use yii\bootstrap\ActiveForm;
use yii\db\StaleObjectException;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * DadosUnicoSegurancaUsuarioController implements the CRUD actions for DadosUnicoSegurancaUsuario model.
 */
class DadosUnicoSegurancaUsuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DadosUnicoSegurancaUsuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DadosUnicoSegurancaUsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTeste($model){
        return $this->render('send-mail', [
            'model' => $model
        ]);
    }



    public function sendMail($model){
        try {
            $message = Yii::$app->controller->renderPartial('send-mail', [
                'model' => $model,
            ]);
        } catch (\yii\web\NotFoundHttpException $e) {
        }
        $to = "adelson.santos@adab.ba.gov.br";
        $subject = "Senha para acesso ao Sistema Corporativo de Diárias";
        $headers = "From: Sistema Corporativo < sistemas.adab@adab.ba.gov.br >\r\n";
        $headers .= "Reply-To: adelson.santos@adab.ba.gov.br\r\n";
        $headers .= "Return-Path: adelson.santos@adab.ba.gov.br\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers.= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        if ( mail($to,$subject,$message,$headers) ) {
            echo "The email has been sent!";
        } else {
            echo "The email has failed!";
        }

    }

    /**
     * Displays a single DadosUnicoSegurancaUsuario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DadosUnicoSegurancaUsuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DadosUnicoSegurancaUsuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pessoa_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DadosUnicoSegurancaUsuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $arrayTipo = [];
        /** @var DadosUnicoSegurancaUsuario $model */
        $model = $this->findModel($id);
        $modelFuncionario = $this->findModelFuncionario($model->pessoa_id);

        $modelsUsuarioSegurancaUsuarioId = SegurancaUsuarioTipoUsuario::find()->where(['pessoa_id' => $id])->all();

        if(!empty($modelsUsuarioSegurancaUsuarioId)){
            foreach ($modelsUsuarioSegurancaUsuarioId as $value){
                array_push($arrayTipo, $value->tipo_usuario_id);
            }
            $oldUsuarioSegurancaUsuarioIds = ArrayHelper::getColumn($modelsUsuarioSegurancaUsuarioId, 'pessoa_id');
            $modelUsuarioSegurancaUsuario = SegurancaUsuarioTipoUsuario::findAll(['pessoa_id' => $oldUsuarioSegurancaUsuarioIds]);
        }

        $sistema = \app\models\SegurancaSistema::find()->where(['sistema_st' => 0])->all();
        $dados = \app\models\SegurancaTipoUsuario::find()->where(['tipo_usuario_id' => array_values($arrayTipo)])->with('sistema')->orderBy('sistema_id')->all();
        $modelFuncionario = DadosUnicoFuncionario::find()->where(['pessoa_id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $modelFuncionario->load(Yii::$app->request->post())) {
            $model->mail = Yii::$app->request->post()['DadosUnicoSegurancaUsuario']['mail'];
            $modelUsuarioSegurancaUsuario = Model::createMultiple(SegurancaUsuarioTipoUsuario::classname());
            Model::loadMultiple($modelUsuarioSegurancaUsuario, Yii::$app->request->post());

            $modelsOlds = SegurancaUsuarioTipoUsuario::find()->where(['pessoa_id' => $id])->all();
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                /** @var DadosUnicoSegurancaUsuario $model */
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelUsuarioSegurancaUsuario),
                    ActiveForm::validate($model)
                );
            }
            foreach ($modelsOlds as $value) {

                try {
                    //d($this->findModelUsuarioTipoUsuario($value->pessoa_id));
                    $this->findModelUsuarioTipoUsuario($value->pessoa_id)->delete();
                } catch (StaleObjectException $e) {
                } catch (NotFoundHttpException $e) {
                } catch (\Throwable $e) {
                }
            }

            foreach ($modelUsuarioSegurancaUsuario as $modelUsuarioTipoUsuario) {
                $modelUsuarioTipoUsuario->pessoa_id = intval($model->pessoa_id);
                if(!empty($modelUsuarioTipoUsuario->tipo_usuario_id)){
                    $modelUsuarioTipoUsuario->save();
                }
            }

            if($model->mail == 1){
                $model->usuario_senha = $model->generatePassword();
                $this->sendMail($model);
                $model->usuario_primeiro_logon = 0;
                $model->usuario_senha = sha1($model->usuario_senha);
            }

            $model->save();
            $modelFuncionario->save();
            return $this->redirect(['view', 'id' => $model->pessoa_id]);
        }
        return $this->render('update', [
            'model' => $model,
            'modelFuncionario' => $modelFuncionario,
            'modelUsuarioSegurancaUsuario' => (empty($modelUsuarioSegurancaUsuario)) ? [new SegurancaUsuarioTipoUsuario] : $modelUsuarioSegurancaUsuario,
            'sistema' => $sistema,
            'dados' => $dados
        ]);
    }

    protected function findModelUsuarioTipoUsuario($id)
    {
        if (($model = SegurancaUsuarioTipoUsuario::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Deletes an existing DadosUnicoSegurancaUsuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the DadosUnicoSegurancaUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return array|\yii\db\ActiveRecord[]
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
         if (($model = DadosUnicoSegurancaUsuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the DadosUnicoSegurancaUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return array|\yii\db\ActiveRecord[]
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelFuncionario($id)
    {
         $model = DadosUnicoFuncionario::find()->where(['pessoa_id' => $id])->one();
        if (($model = DadosUnicoSegurancaUsuario::findOne($model->funcionario_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
