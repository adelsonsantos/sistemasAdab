<?php

namespace app\controllers;

use app\models\Model;
use app\models\TermoVigilanciaFiscalizacaoAcao;
use app\models\TermoVigilanciaFiscalizacaoAcoes;
use app\models\TermoVigilanciaFiscalizacaoAtividade;
use app\models\TermoVigilanciaFiscalizacaoEquipeFiscal;
use app\models\TermoVigilanciaFiscalizacaoVeiculo;
use Yii;
use app\models\TermoVigilanciaFiscalizacao;
use app\models\TermoVigilanciaFiscalizacaoSearch;
use yii\bootstrap\ActiveForm;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * TermoVigilanciaFiscalizacaoController implements the CRUD actions for TermoVigilanciaFiscalizacao model.
 */
class TermoVigilanciaFiscalizacaoController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all TermoVigilanciaFiscalizacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TermoVigilanciaFiscalizacaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TermoVigilanciaFiscalizacao model.
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
     * @param $id
     * @param $input
     * @return string
     */
    public function actionComplementar($id, $input){

        $result = TermoVigilanciaFiscalizacaoAcao::find()->where(['vigilancia_fiscalizacao_acao_id' => $id])->andWhere(['vigilancia_fiscalizacao_acao_cmp_complentar' => 1])->all();
        $campoComplementar = empty($result) ? false : true;

        switch ($input) {
            case "termovigilanciafiscalizacaoacoes-0-vigilancia_fiscalizacao_acao_id":
                $oneInput = "campo-complementar0";
                $twoInput = "campo-0--complementar0";

                break;
            case "termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_id":
                $oneInput = "campo-1--complementar0";
                $twoInput = "";
                break;
            case "termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_id":
                $oneInput = "campo-2--complementar0";
                $twoInput = "";
                break;
            default:
                $oneInput = "";
                $twoInput = "";
                break;
        }

        $result = [
            'campo_complementar' => $campoComplementar,
            'input_one' => $oneInput,
            'input_two' => $twoInput
        ];

        return  \GuzzleHttp\json_encode($result);
    }

    public function actionAcao($id, $id2 = 0){
        $result = TermoVigilanciaFiscalizacaoAcao::find()->where(['not in','vigilancia_fiscalizacao_acao_id',[$id, $id2]])->orderBy('vigilancia_fiscalizacao_acao_nome')->all();

        echo "<option>Selecione a Ação</option>";

        if(count($result)>0){
            foreach($result as $row){
                echo "<option value='$row->vigilancia_fiscalizacao_acao_id'>$row->vigilancia_fiscalizacao_acao_nome</option>";
            }
        }
        else{
            echo "<option>Nenhuma Ação cadastrada</option>";
        }

    }


    /**
     * Creates a new TermoVigilanciaFiscalizacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TermoVigilanciaFiscalizacao;
        $modelsVeiculo = [new TermoVigilanciaFiscalizacaoVeiculo];
        $modelsEquipe = [new TermoVigilanciaFiscalizacaoEquipeFiscal];
        $modelsAtividade = [new TermoVigilanciaFiscalizacaoAtividade];
        $modelsAcao = [new TermoVigilanciaFiscalizacaoAcoes];
        if ($model->load(Yii::$app->request->post())) {

            $modelsVeiculo = Model::createMultiple(TermoVigilanciaFiscalizacaoVeiculo::classname());
            $modelsEquipe = Model::createMultiple(TermoVigilanciaFiscalizacaoEquipeFiscal::classname());
            $modelsAtividade = Model::createMultiple(TermoVigilanciaFiscalizacaoAtividade::classname());
            $modelsAcao = Model::createMultiple(TermoVigilanciaFiscalizacaoAcao::classname());
            Model::loadMultiple($modelsVeiculo, Yii::$app->request->post());
            Model::loadMultiple($modelsEquipe, Yii::$app->request->post());
            Model::loadMultiple($modelsAtividade, Yii::$app->request->post());
            Model::loadMultiple($modelsAcao, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsVeiculo),
                    ActiveForm::validateMultiple($modelsEquipe),
                    ActiveForm::validateMultiple($modelsAtividade),
                    ActiveForm::validateMultiple($modelsAcao),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsVeiculo) && $valid;
            $valid = Model::validateMultiple($modelsEquipe) && $valid;
            $valid = Model::validateMultiple($modelsAtividade) && $valid;
            $valid = Model::validateMultiple($modelsAcao) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsVeiculo as $veiculo) {
                            $veiculo->vigilancia_fiscalizacao_veiculo_id = $model->vigilancia_fiscalizacao_veiculo_id;
                            if (! ($flag = $veiculo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($modelsEquipe as $equipe) {
                            $equipe->vigilancia_fiscalizacao_id = $model->vigilancia_fiscalizacao_id;
                            if (! ($flag = $equipe->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->vigilancia_fiscalizacao_veiculo_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsVeiculo' => (empty($modelsVeiculo)) ? [new TermoVigilanciaFiscalizacaoVeiculo] : $modelsVeiculo,
            'modelsEquipe' => (empty($modelsEquipe)) ? [new TermoVigilanciaFiscalizacaoEquipeFiscal] : $modelsEquipe,
            'modelsAtividade' => (empty($modelsAtividade)) ? [new TermoVigilanciaFiscalizacaoAtividade] : $modelsAtividade,
            'modelsAcao' => (empty($modelsAcao)) ? [new TermoVigilanciaFiscalizacaoAcoes] : $modelsAcao
        ]);



        /*
        $model = new TermoVigilanciaFiscalizacao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vigilancia_fiscalizacao_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/
    }

    /**
     * Updates an existing TermoVigilanciaFiscalizacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vigilancia_fiscalizacao_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TermoVigilanciaFiscalizacao model.
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
     * Finds the TermoVigilanciaFiscalizacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TermoVigilanciaFiscalizacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TermoVigilanciaFiscalizacao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
