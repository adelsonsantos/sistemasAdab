<?php

namespace app\controllers;

use app\models\DadosUnicoFuncionario;
use app\models\SegurancaUsuarioTipoUsuario;
use Yii;
use app\models\DadosUnicoSegurancaUsuario;
use app\models\DadosUnicoSegurancaUsuarioSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        $model = $this->findModel($id);
        $modelsUsuarioSegurancaUsuarioId = SegurancaUsuarioTipoUsuario::find()->where(['pessoa_id' => $id])->asArray()->all();
        $oldUsuarioSegurancaUsuarioIds = ArrayHelper::getColumn($modelsUsuarioSegurancaUsuarioId, 'pessoa_id');
        $modelUsuarioSegurancaUsuario = SegurancaUsuarioTipoUsuario::findAll(['pessoa_id' => $oldUsuarioSegurancaUsuarioIds]);
        $sistema = \app\models\SegurancaSistema::find()->where(['sistema_st' => 0])->all();

        $modelFuncionario = DadosUnicoFuncionario::find()->where(['pessoa_id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pessoa_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelFuncionario' => $modelFuncionario,
            'modelUsuarioSegurancaUsuario' => (empty($modelUsuarioSegurancaUsuario)) ? [new SegurancaUsuarioTipoUsuario] : $modelUsuarioSegurancaUsuario,
            'sistema' => $sistema
        ]);
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
    protected function findModel($id)
    {
        if (($model = DadosUnicoSegurancaUsuario::find()->where(['pessoa_id' => $id])->with('usuarioTipoUsuario')->one()) !== null) {
            return $model;
        }
        /* if (($model = DadosUnicoSegurancaUsuario::findOne($id)) !== null) {
            return $model;
        }*/

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
