<?php

namespace app\controllers;

use app\models\DadosUnicoFuncionario;
use app\models\DiariaAprovacao;
use app\models\DiariaAutorizacao;
use app\models\DiariaDadosRoteiroMultiplo;
use app\models\DiariaDevolucao;
use app\models\DiariaMotivo;
use app\models\DiariaRoteiro;
use app\models\DiariaPreAutorizacao;
use Behat\Gherkin\Exception\Exception;
use Yii;
use app\models\Diarias;
use app\models\DiariasSearch;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * DiariasController implements the CRUD actions for Diarias model.
 */
class DiariasController extends Controller
{
    public $destino;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [/*
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    /*[
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['adelson.santos'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],*/
        ];
    }

    public function verificaPerfil($id)
    {
        switch ($id) {
            case 11:
                return 'administrador';
                break;
            case 6:
                return 'aprovador';
                break;
            case 5:
                return 'autorizador';
                break;
            case 4:
                return 'comprovador';
                break;
            case 34:
                return 'consulta-diarias';
                break;
            case 9:
                return 'empenha-executa';
                break;
            case 35:
                return 'gestor-orcamento';
                break;
            case 33:
                return 'gestor-despesas';
                break;
            case 7:
                return 'gestor-diarias';
                break;
            case 18:
                return 'gestor-financeiro';
                break;
            case 31:
                return 'pre-autorizador';
                break;
            case 8:
                return 'pre-liquidante';
                break;
            case 36:
                return 'recursos-humanos';
                break;
            case 30:
                return 'solicitante';
                break;
            default:
                return 11;
                break;

        }
    }

    /**
     * Lists all Diarias models.
     * @return mixed
     */
    public function actionIndex()
    {
            $searchModel = new DiariasSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }



    /**
     * Lists all Diarias models.
     * @return mixed
     */
    public function actionPreAutorizar()
    {
        $searchModel = new DiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['diaria_st'=>100]);
        return $this->render('pre-autorizar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionPreAutorizarAceitar($id)
    {
        $modelPreAutorizacao = new DiariaPreAutorizacao();
        $model = $this->findModel($id);
            if ($modelPreAutorizacao->load(Yii::$app->request->post())){
                $modelPreAutorizacao->diaria_id = $model->diaria_id;
                $modelPreAutorizacao->diaria_pre_autorizacao_func = implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id'));
                $modelPreAutorizacao->diaria_pre_autorizacao_func_exec = 1;
                $modelPreAutorizacao->diaria_pre_autorizacao_dt = date('Y-m-d');
                $modelPreAutorizacao->diaria_pre_autorizacao_hr = date('H:i:s');
                $model->diaria_st = 0; //Autorização
                $modelPreAutorizacao->save();
                $model->save();
                return $this->redirect(['pre-autorizar']);
            }

        return $this->render('pre-autorizar-aceitar', [
            'model'               => $model,
            'modelPreAutorizacao' => $modelPreAutorizacao
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionPreAutorizarDevolver($id)
    {
        $modelPreAutorizacaoDevolver = new DiariaDevolucao();
        $model = $this->findModel($id);
        if ($modelPreAutorizacaoDevolver->load(Yii::$app->request->post())){
            /** @var integer $codFuncionario */

            $modelPreAutorizacaoDevolver->diaria_id = $model->diaria_id;
            $modelPreAutorizacaoDevolver->diaria_devolucao_dt = date('Y-m-d');
            $modelPreAutorizacaoDevolver->diaria_devolucao_hr = date('H:i:s');
            $modelPreAutorizacaoDevolver->diaria_devolucao_func = intval(implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id')));
            $modelPreAutorizacaoDevolver->diaria_st = 100;
            $modelPreAutorizacaoDevolver->save();
            return $this->redirect(['pre-autorizar']);
        }

        return $this->render('pre-autorizar-devolver', [
            'model'                       => $model,
            'modelPreAutorizacaoDevolver' => $modelPreAutorizacaoDevolver
        ]);
    }

    /**
     * Lists all Diarias models.
     * @return mixed
     */
    public function actionAutorizar()
    {
        $searchModel = new DiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['diaria_st'=>0]);
        return $this->render('autorizar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionAutorizarAceitar($id)
    {
        $modelAutorizacao = new DiariaAutorizacao();
        $model = $this->findModel($id);
        if ($modelAutorizacao->load(Yii::$app->request->post())){

            $modelAutorizacao->diaria_id = $model->diaria_id;
            $modelAutorizacao->diaria_autorizacao_func = implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id'));
            $modelAutorizacao->diaria_autorizacao_func_exec = 1;
            $modelAutorizacao->diaria_autorizacao_dt = date('Y-m-d');
            $modelAutorizacao->diaria_autorizacao_hr = date('H:i:s');
            $model->diaria_st = 1;
            $modelAutorizacao->save();
            $model->save();
            return $this->redirect(['autorizar']);
        }

        return $this->render('autorizar-aceitar', [
            'model'               => $model,
            'modelAutorizacao'    => $modelAutorizacao
        ]);
    }

    public function actionAutorizarDevolver($id)
    {
        $modelAutorizacaoDevolver = new DiariaDevolucao();
        $model = $this->findModel($id);
        if ($modelAutorizacaoDevolver->load(Yii::$app->request->post())){
            /** @var integer $codFuncionario */
            $modelAutorizacaoDevolver->diaria_id = $model->diaria_id;
            $modelAutorizacaoDevolver->diaria_devolucao_dt = date('Y-m-d');
            $modelAutorizacaoDevolver->diaria_devolucao_hr = date('H:i:s');
            $modelAutorizacaoDevolver->diaria_devolucao_func = intval(implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id')));;
            $modelAutorizacaoDevolver->diaria_st = 100;
            $model->diaria_st = 100;
            $model->save();
            $modelAutorizacaoDevolver->save();
            return $this->redirect(['autorizar']);
        }

        return $this->render('autorizar-devolver', [
            'model'                    => $model,
            'modelAutorizacaoDevolver' => $modelAutorizacaoDevolver
        ]);
    }

    /**
     * Lists all Diarias models.
     * @return mixed
     */
    public function actionAprovar()
    {
        $searchModel = new DiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['diaria_st'=>1]);
        return $this->render('aprovar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAprovarDevolver($id)
    {
        $modelAprovacaoDevolver = new DiariaDevolucao();
        $model = $this->findModel($id);
        if ($modelAprovacaoDevolver->load(Yii::$app->request->post())){
            /** @var integer $codFuncionario */
            $modelAprovacaoDevolver->diaria_id = $model->diaria_id;
            $modelAprovacaoDevolver->diaria_devolucao_dt = date('Y-m-d');
            $modelAprovacaoDevolver->diaria_devolucao_hr = date('H:i:s');
            $modelAprovacaoDevolver->diaria_devolucao_func = intval(implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id')));;
            $modelAprovacaoDevolver->diaria_st = 0; // Autorização
            $model->diaria_st = 0;
            $model->save();
            $modelAprovacaoDevolver->save();
            return $this->redirect(['aprovar']);
        }

        return $this->render('aprovar-devolver', [
            'model'                    => $model,
            'modelAprovacaoDevolver'   => $modelAprovacaoDevolver
        ]);
    }


    public function actionAprovarAceitar($id)
    {
        $modelAprovacao = new DiariaAprovacao();
        $model = $this->findModel($id);
        if ($modelAprovacao->load(Yii::$app->request->post())){

            $modelAprovacao->diaria_id = $model->diaria_id;
            $modelAprovacao->diaria_aprovacao_func = implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id'));
            $modelAprovacao->diaria_aprovacao_func_exec = 1;
            $modelAprovacao->diaria_aprovacao_dt = date('Y-m-d');
            $modelAprovacao->diaria_aprovacao_hr = date('H:i:s');
            $modelAprovacao->diaria_imprimir_processo = 1;
            $model->diaria_st = 2;
            $modelAprovacao->save();
            $model->save();
            return $this->redirect(['aprovar']);
        }

        return $this->render('aprovar-aceitar', [
            'model'               => $model,
            'modelAprovacao'      => $modelAprovacao
        ]);
    }

    public function actionMontarProcesso()
    {
        $searchModel = new DiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['diaria_st'=>2]);
        return $this->render('montar-processo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diarias model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return mixed
     */
    public function getRotaDestino()
    {
        return $this->destino;
    }

    public function setRotaDestino($destino)
    {
        $this->destino = $destino;
        return $this->destino;
    }

    public function actionGetRota($destino)
    {
      return $this->setRotaDestino($destino);
    }

    /**
     * Creates a new Diarias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diarias;
        $modelsRoteiroMultiplo = [new DiariaDadosRoteiroMultiplo];
        $modelsRoteiro = [[new DiariaRoteiro]];
        $modelMotivo = new DiariaMotivo();

        $model->diaria_desconto = 'N';
        $model->diaria_numero = '87724';
        $model->diaria_dt_saida = '30/05/2017';
        $model->diaria_hr_saida = '07:00';
        $model->diaria_dt_chegada = '06/07/2017';
        $model->diaria_hr_chegada = '02:00';
        $model->diaria_valor_ref = '83,00';
        $model->diaria_qtde = '4';
        $model->diaria_valor = '332';
        $model->diaria_valor = '332';
        $model->diaria_dt_criacao = '2017-05-19';
        $model->diaria_hr_criacao = '16:49:07';
        $modelMotivo->motivo_id = 50;
        $modelMotivo->sub_motivo_id = 18;



        if ($model->load(Yii::$app->request->post())) {

            $modelsRoteiroMultiplo = Model::createMultiple(DiariaDadosRoteiroMultiplo::classname());
            Model::loadMultiple($modelsRoteiroMultiplo, Yii::$app->request->post());

            // validate person and houses models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsRoteiroMultiplo) && $valid;

            if (isset($_POST['DiariaRoteiro'][0][0])) {
                foreach ($_POST['DiariaRoteiro'] as $indexRoteiro => $modelRoteiro) {

                    foreach ($modelRoteiro as $indexRota => $modelRota) {
                        $data['DiariaRoteiro'] = $modelRota;
                        $modelRotta = new DiariaRoteiro();
                        $modelRotta->load($data);
                        d($modelRotta);
                        $modelRotta->diaria_id = $model->diaria_id;
                        $modelsRoom[$indexRoteiro][$indexRota] = $modelRotta;
                        $valid = $modelRotta->validate();

                    }
                }
            }
            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsRoteiroMultiplo as $indexRoteiro => $modelRoteiro) {

                            if ($flag === false) {
                                break;
                            }

                            $modelRoteiro->diaria_id = $model->diaria_id;

                            if (!($flag = $modelRoteiro->save(false))) {
                                break;
                            }

                            if (isset($modelsRoom[$indexRoteiro]) && is_array($modelsRoom[$indexRoteiro])) {
                                foreach ($modelsRoom[$indexRoteiro] as $indexRota => $modelRoom) {
                                    $modelRoom->diaria_id = $modelRoteiro->diaria_id;
                                    if (!($flag = $modelRoom->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->diaria_id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }


        /* if ($model->load(Yii::$app->request->post())) {

             $modelsRoteiroMultiplo = Model::createMultiple(DiariaDadosRoteiroMultiplo::classname());
             Model::loadMultiple($modelsRoteiroMultiplo, Yii::$app->request->post());

             // validate person and houses models
             $valid = $model->validate();
             $valid = Model::validateMultiple($modelsRoteiroMultiplo) && $valid;

             if (isset($_POST['DiariaRoteiro'][0])) {
                 foreach ($_POST['DiariaRoteiro'] as $indexRoteiro => $modelRoteiro) {
                     foreach ($modelRoteiro as $indexRota => $modelRota) {
                         $data['DiariaRoteiro'] = $modelRota;
                         $modelRoom = new DiariaRoteiro;
                         $modelRoom->load($data);
                         $modelsRoteiro[$indexRoteiro][$indexRota] = $modelRoom;
                         $valid = $modelRoom->validate();
                     }
                 }
             }

             if ($valid) {
                 $transaction = Yii::$app->db->beginTransaction();
                 try {
                     if ($flag = $model->save(false)) {
                         foreach ($modelsRoteiroMultiplo as $indexRoteiro => $modelRoteiro) {

                             if ($flag === false) {
                                 break;
                             }

                             $modelRoteiro->person_id = $model->id;

                             if (!($flag = $modelRoteiro->save(false))) {
                                 break;
                             }

                             if (isset($modelsRoteiro[$indexRoteiro]) && is_array($modelsRoteiro[$indexRoteiro])) {
                                 foreach ($modelsRoteiro[$indexRoteiro] as $indexRota => $modelRoom) {
                                     $modelRoom->house_id = $modelRoteiro->id;
                                     if (!($flag = $modelRoom->save(false))) {
                                         break;
                                     }
                                 }
                             }
                         }
                     }

                     if ($flag) {
                         $transaction->commit();
                         return $this->redirect(['view', 'diaria_id' => $model->diaria_id]);
                     } else {
                         $transaction->rollBack();
                     }
                 } catch (Exception $e) {
                     $transaction->rollBack();
                 }
             }
         }*/


     /*   if ($model->load(Yii::$app->request->post())) {
            $modelsRoteiroMultiplo = Model::createMultiple(DiariaDadosRoteiroMultiplo::classname());
            Model::loadMultiple($modelsRoteiroMultiplo, Yii::$app->request->post());

            $modelsRota = Model::createMultiple(DiariaRoteiro::classname());
            Model::loadMultiple($modelsRota, Yii::$app->request->post());

            $valid = $model->validate();

            if($valid){
                $model->save();
                $model->diaria_id;
                    $modelMotivo->diaria_id = $model->diaria_id;
                    //$modelMotivo->save();
            }

            d($modelsRoteiroMultiplo);
            foreach ($modelsRoteiroMultiplo as $indexM => $multi){
                $multi->diaria_id = $model->diaria_id;
               // $multi->save();

                foreach ($modelsRota as $indexR => $rota){
                    $rota->diaria_id = $model->diaria_id;
                    //$rota->save();
                }
            }









            return $this->redirect(['view', 'id' => $model->diaria_id]);*/
            /*if($valid){
                $model->save();
                $model->diaria_id;
            }

            $valid = Model::validateMultiple($modelsRoteiroMultiplo) && $valid;
            d($modelsRoteiroMultiplo);
/*            if (isset($_POST['DiariaRoteiro'][0][0])) {
                foreach ($_POST['DiariaRoteiro'] as $indexMulti => $roteiros) {
                    foreach ($roteiros as $indexRoteiros => $roteiro) {
                        $data['DiariaRoteiro'] = $roteiro;
                        $modelRoteiro = new DiariaRoteiro;
                        $modelRoteiro->load($data);
                        $modelsRoteiro[$indexMulti][$indexRoteiros] = $modelRoteiro;
                        $valid = $modelRoteiro->validate();
                    }
                }
            }*/

           /* if ($valid) {
                d($valid);
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsRoteiroMultiplo as $indexMulti => $modelRoteiroMultiplo) {

                            if ($flag === false) {
                                break;
                            }

                            $modelRoteiroMultiplo->diaria_id = $model->diaria_id;

                            if (!($flag = $modelRoteiroMultiplo->save(false))) {
                                break;
                            }
                            if (isset($modelsRoteiro[$indexMulti]) && is_array($modelsRoteiro[$indexMulti])) {
                                foreach ($modelsRoteiro[$indexMulti] as $indexRoteiros => $modelRoteiro) {
                                    $modelRoteiro->diaria_id = $modelRoteiroMultiplo->diaria_id;
                                    if (!($flag = $modelRoteiro->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        if ($modelMotivo->load(Yii::$app->request->post()) && $modelMotivo->save()) {
                            $modelMotivo->diaria_id = $model->diaria_id;
                        }
                        return $this->redirect(['view', 'id' => $model->diaria_id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }*/

        return $this->render('create', [
            'model'                 => $model,
            'modelsRoteiroMultiplo' => (empty($modelsRoteiroMultiplo)) ? [new DiariaDadosRoteiroMultiplo] : $modelsRoteiroMultiplo,
            'modelsRoteiro'         => (empty($modelsRoteiro)) ? [[new DiariaRoteiro]] : $modelsRoteiro,
            'modelMotivo'           => $modelMotivo
        ]);
    }

    /**
     * Updates an existing Diarias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldmultiploRoteiroIds = DiariaDadosRoteiroMultiplo::find()->select('diaria_id')->where(['diaria_id' => $id])->andWhere(['dados_roteiro_status' => 0])->asArray()->all();
        $oldmultiploRoteiroIds = ArrayHelper::getColumn($oldmultiploRoteiroIds, 'diaria_id');
        $modelsRoteiroMultiplo = DiariaDadosRoteiroMultiplo::findAll(['diaria_id' => $oldmultiploRoteiroIds, 'dados_roteiro_status' => 0]);
        $modelsRoteiroMultiplo = (empty($modelsRoteiroMultiplo)) ? [new DiariaDadosRoteiroMultiplo] : $modelsRoteiroMultiplo;
        $modelMotivo = DiariaMotivo::findOne($model->diaria_id);

        $oldRoteirosIds = [];
        foreach ($modelsRoteiroMultiplo as $i => $modelGrupo) {
            $oldRoteiro = DiariaRoteiro::findAll(['diaria_id' => $modelGrupo->diaria_id, 'controle_roteiro' => $modelGrupo->controle_roteiro]);
            $modelsRoteiro[$i] = $oldRoteiro;
            $oldRoteirosIds = array_merge($oldRoteirosIds, ArrayHelper::getColumn($oldRoteiro, 'diaria_id'));
            $modelsRoteiro[$i] = (empty($modelsRoteiro[$i])) ? [new DiariaRoteiro] : $modelsRoteiro[$i];
        }
        if ($model->load(Yii::$app->request->post())) {

            $modelsRoteiroMultiplo = Model::createMultiple(DiariaDadosRoteiroMultiplo::classname(), $modelsRoteiroMultiplo);
            Model::loadMultiple($modelsRoteiroMultiplo, Yii::$app->request->post());
            $newGrupoIds = ArrayHelper::getColumn($modelsRoteiroMultiplo, 'diaria_id');

            $newSlotIds = [];
            $loadsData['_csrf'] =  Yii::$app->request->post()['_csrf'];
            $i = 0;
            foreach ($modelsRoteiroMultiplo as $id => $value) {
                $loadsData['DiariasRoteiro'] =  Yii::$app->request->post()['DiariasRoteiro'][$i];
                if (!isset($modelsRoteiro[$id])) {
                    $modelsRoteiro[$id] = [new DiariaRoteiro];
                }
                $modelsRoteiro[$id] = Model::createMultiple(DiariaRoteiro::classname(), $modelsRoteiro[$id], $loadsData);
                Model::loadMultiple($modelsRoteiro[$id], $loadsData);
                $newSlotIds = array_merge($newSlotIds, ArrayHelper::getColumn($loadsData['DiariasRoteiro'], 'diaria_id'));
                $i++;
            }

            $delSlotIds = array_diff($oldRoteirosIds, $newSlotIds);
            if (! empty($delSlotIds)) DiariaRoteiro::deleteAll(['diaria_id' => $delSlotIds]);
            $delGrupoIds = array_diff($oldmultiploRoteiroIds, $newGrupoIds);
            if (! empty($delGrupoIds)) DiariaDadosRoteiroMultiplo::deleteAll(['diaria_id' => $delGrupoIds]);

            $valid = $model->validate();
            $valid = $this->validaMissao($modelsRoteiroMultiplo, $modelsRoteiro) && $valid;

            if ($valid) {
                if ($modelMotivo->load(Yii::$app->request->post()) && $modelMotivo->save()) {
                    $modelMotivo->diaria_id = $model->diaria_id;
                }
                if ($this->saveMissao($model, $modelsRoteiroMultiplo, $modelsRoteiro)) {
                    return $this->redirect(['view', 'diaria_id' => $model->diaria_id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsRoteiroMultiplo' => array_reverse($modelsRoteiroMultiplo),
            'modelsRoteiro' => array_reverse($modelsRoteiro),
            'modelMotivo'           => $modelMotivo
        ]);
    }

    /**
     * Deletes an existing Diarias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Diarias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diarias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diarias::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
