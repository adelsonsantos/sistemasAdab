<?php

namespace app\controllers;

use app\models\Model;
use app\models\TermoVigilanciaFiscalizacaoAcao;
use app\models\TermoVigilanciaFiscalizacaoAcoes;
use app\models\TermoVigilanciaFiscalizacaoAnimalCampos;
use app\models\TermoVigilanciaFiscalizacaoAtividade;
use app\models\TermoVigilanciaFiscalizacaoEquipeFiscal;
use app\models\TermoVigilanciaFiscalizacaoFaixaEtaria;
use app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimal;
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

    public function actionAnimalCampos($id, $input){

        $result = TermoVigilanciaFiscalizacaoAnimalCampos::find()->where(['vigilancia_fiscalizacao_animal_campos_id' => $id])->andWhere(['vigilancia_fiscalizacao_animal_campos_st' => 1])->all();
        $pupulacaoAnimalId = $result[0]->vigilancia_fiscalizacao_animal_id;
        $pupulacaoAnimalMachosNascidos = $result[0]->vigilancia_fiscalizacao_animal_campos_machos_nascidos;
        $pupulacaoAnimalMachosMortos = $result[0]->vigilancia_fiscalizacao_animal_campos_machos_mortos;
        $pupulacaoAnimalMachosExistentes = $result[0]->vigilancia_fiscalizacao_animal_campos_machos_existentes;
        $pupulacaoAnimalMachosVacinados = $result[0]->vigilancia_fiscalizacao_animal_campos_machos_vacinados;
        $pupulacaoAnimalFemeasNascidas = $result[0]->vigilancia_fiscalizacao_animal_campos_femeas_nascidas;
        $pupulacaoAnimalFemeasMortas = $result[0]->vigilancia_fiscalizacao_animal_campos_femeas_mortas;
        $pupulacaoAnimalFemeasExistentes = $result[0]->vigilancia_fiscalizacao_animal_campos_femeas_existentes;
        $pupulacaoAnimalFemeasVacinadas = $result[0]->vigilancia_fiscalizacao_animal_campos_femeas_vacinadas;
        $pupulacaoAnimalQuantidade = $result[0]->vigilancia_fiscalizacao_animal_campos_quantidade;
        $pupulacaoAnimalStatus = $result[0]->vigilancia_fiscalizacao_animal_campos_st;

        $divMachosNascidos_1 = "";
        $divFemeasNascidos_1 = "";
        $divMachosMortos_1 = "";
        $divFemeasMortas_1 = "";
        $divMachosExistentes_1 = "";
        $divFemeasExistentes_1 = "";
        $divMachosVacinados_1 = "";
        $divFemeasVacinadas_1 = "";
        $divQuantidade_1 = "";

        switch ($input) {
            case "termovigilanciafiscalizacaopopulacaoanimal-0-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-nascidos0";
                $divFemeasNascidos = "femeas-nascidas0";
                $divMachosMortos = "machos-mortos0";
                $divFemeasMortas = "femeas-mortas0";
                $divMachosExistentes ="machos-existentes0";
                $divFemeasExistentes = "femeas-existentes0";
                $divMachosVacinados = "machos-vacinados0";
                $divFemeasVacinadas = "femeas-vacinadas0";
                $divQuantidade = "quantidade0";
                $divMachosNascidos_1 = "machos-0--nascidos0";
                $divFemeasNascidos_1 = "femeas-0--nascidas0";
                $divMachosMortos_1 = "machos-0--mortos0";
                $divFemeasMortas_1 = "femeas-0--mortas0";
                $divMachosExistentes_1 = "machos-0--existentes0";
                $divFemeasExistentes_1 = "femeas-0--existentes0";
                $divMachosVacinados_1 = "machos-0--vacinados0";
                $divFemeasVacinadas_1 = "femeas-0--vacinadas0";
                $divQuantidade_1 = "quantidade00";

                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-1-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-1--nascidos0";
                $divFemeasNascidos = "femeas-1--nascidas0";
                $divMachosMortos = "machos-1--mortos0";
                $divFemeasMortas = "femeas-1--mortas0";
                $divMachosExistentes ="machos-1--existentes0";
                $divFemeasExistentes = "femeas-1--existentes0";
                $divMachosVacinados = "machos-1--vacinados0";
                $divFemeasVacinadas = "femeas-1--vacinadas0";
                $divQuantidade = "quantidade01";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-2-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-2--nascidos0";
                $divFemeasNascidos = "femeas-2--nascidas0";
                $divMachosMortos = "machos-2--mortos0";
                $divFemeasMortas = "femeas-2--mortas0";
                $divMachosExistentes ="machos-2--existentes0";
                $divFemeasExistentes = "femeas-2--existentes0";
                $divMachosVacinados = "machos-2--vacinados0";
                $divFemeasVacinadas = "femeas-2--vacinadas0";
                $divQuantidade = "quantidade02";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-3-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-3--nascidos0";
                $divFemeasNascidos = "femeas-3--nascidas0";
                $divMachosMortos = "machos-3--mortos0";
                $divFemeasMortas = "femeas-3--mortas0";
                $divMachosExistentes ="machos-3--existentes0";
                $divFemeasExistentes = "femeas-3--existentes0";
                $divMachosVacinados = "machos-3--vacinados0";
                $divFemeasVacinadas = "femeas-3--vacinadas0";
                $divQuantidade = "quantidade03";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-4-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-4--nascidos0";
                $divFemeasNascidos = "femeas-4--nascidas0";
                $divMachosMortos = "machos-4--mortos0";
                $divFemeasMortas = "femeas-4--mortas0";
                $divMachosExistentes ="machos-4--existentes0";
                $divFemeasExistentes = "femeas-4--existentes0";
                $divMachosVacinados = "machos-4--vacinados0";
                $divFemeasVacinadas = "femeas-4--vacinadas0";
                $divQuantidade = "quantidade04";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-5-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-5--nascidos0";
                $divFemeasNascidos = "femeas-5--nascidas0";
                $divMachosMortos = "machos-5--mortos0";
                $divFemeasMortas = "femeas-5--mortas0";
                $divMachosExistentes ="machos-5--existentes0";
                $divFemeasExistentes = "femeas-5--existentes0";
                $divMachosVacinados = "machos-5--vacinados0";
                $divFemeasVacinadas = "femeas-5--vacinadas0";
                $divQuantidade = "quantidade05";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-6-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-6--nascidos0";
                $divFemeasNascidos = "femeas-6--nascidas0";
                $divMachosMortos = "machos-6--mortos0";
                $divFemeasMortas = "femeas-6--mortas0";
                $divMachosExistentes ="machos-6--existentes0";
                $divFemeasExistentes = "femeas-6--existentes0";
                $divMachosVacinados = "machos-6--vacinados0";
                $divFemeasVacinadas = "femeas-6--vacinadas0";
                $divQuantidade = "quantidade06";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-7-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-7--nascidos0";
                $divFemeasNascidos = "femeas-7--nascidas0";
                $divMachosMortos = "machos-7--mortos0";
                $divFemeasMortas = "femeas-7--mortas0";
                $divMachosExistentes ="machos-7--existentes0";
                $divFemeasExistentes = "femeas-7--existentes0";
                $divMachosVacinados = "machos-7--vacinados0";
                $divFemeasVacinadas = "femeas-7--vacinadas0";
                $divQuantidade = "quantidade07";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-8-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-8--nascidos0";
                $divFemeasNascidos = "femeas-8--nascidas0";
                $divMachosMortos = "machos-8--mortos0";
                $divFemeasMortas = "femeas-8--mortas0";
                $divMachosExistentes ="machos-8--existentes0";
                $divFemeasExistentes = "femeas-8--existentes0";
                $divMachosVacinados = "machos-8--vacinados0";
                $divFemeasVacinadas = "femeas-8--vacinadas0";
                $divQuantidade = "quantidade08";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-9-vigilancia_fiscalizacao_animal_id":
                $divMachosNascidos = "machos-9--nascidos0";
                $divFemeasNascidos = "femeas-9--nascidas0";
                $divMachosMortos = "machos-9--mortos0";
                $divFemeasMortas = "femeas-9--mortas0";
                $divMachosExistentes ="machos-9--existentes0";
                $divFemeasExistentes = "femeas-9--existentes0";
                $divMachosVacinados = "machos-9--vacinados0";
                $divFemeasVacinadas = "femeas-9--vacinadas0";
                $divQuantidade = "quantidade09";
                break;
            default:
                $divMachosNascidos = "";
                $divFemeasNascidos = "";
                $divMachosMortos = "";
                $divFemeasMortas = "";
                $divMachosExistentes ="";
                $divFemeasExistentes = "";
                $divMachosVacinados = "";
                $divFemeasVacinadas = "";
                $divQuantidade = "";
                break;
        }

        $response = [
            'id' => $id,
            'pupulacao_animal_id' => $pupulacaoAnimalId,
            'pupulacao_animal_machos_nascidos' => $pupulacaoAnimalMachosNascidos,
            'div_machos_nascidos' => $divMachosNascidos,
            'div_machos_nascidos_1' => $divMachosNascidos_1,

            'pupulacao_animal_femeas_nascidas' => $pupulacaoAnimalFemeasNascidas,
            'div_femeas_nascidas' => $divFemeasNascidos,
            'div_femeas_nascidas_1' => $divFemeasNascidos_1,

            'pupulacao_animal_machos_mortos' => $pupulacaoAnimalMachosMortos,
            'div_machos_mortos' => $divMachosMortos,
            'div_machos_mortos_1' => $divMachosMortos_1,

            'pupulacao_animal_femeas_mortas' => $pupulacaoAnimalFemeasMortas,
            'div_femeas_mortas' => $divFemeasMortas,
            'div_femeas_mortas_1' => $divFemeasMortas_1,

            'pupulacao_animal_machos_existentes' => $pupulacaoAnimalMachosExistentes,
            'div_machos_existentes' => $divMachosExistentes,
            'div_machos_existentes_1' => $divMachosExistentes_1,

            'pupulacao_animal_femeas_existentes' => $pupulacaoAnimalFemeasExistentes,
            'div_femeas_existentes' => $divFemeasExistentes,
            'div_femeas_existentes_1' => $divFemeasExistentes_1,

            'pupulacao_animal_machos_vacinados' => $pupulacaoAnimalMachosVacinados,
            'div_machos_vacinados' => $divMachosVacinados,
            'div_machos_vacinados_1' => $divMachosVacinados_1,

            'pupulacao_animal_femeas_vacinadas' => $pupulacaoAnimalFemeasVacinadas,
            'div_femeas_vacinadas' => $divFemeasVacinadas,
            'div_femeas_vacinadas_1' => $divFemeasVacinadas_1,

            'pupulacao_animal_quantidade' => $pupulacaoAnimalQuantidade,
            'div_quantidade' => $divQuantidade,
            'div_quantidade_1' => $divQuantidade_1,
            'input' => $input
        ];

        return  \GuzzleHttp\json_encode($response);
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
                $complementarId = "termovigilanciafiscalizacaoacoes-0-vigilancia_fiscalizacao_acao_cmp_complentar_qtd";

                break;
            case "termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_id":
                $oneInput = "campo-1--complementar0";
                $twoInput = "";
                $complementarId = "termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_cmp_complentar_qtd";
                break;
            case "termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_id":
                $oneInput = "campo-2--complementar0";
                $twoInput = "";
                $complementarId = "termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_cmp_complentar_qtd";
                break;
            default:
                $oneInput = "";
                $twoInput = "";
                $complementarId = "";
                break;
        }

        $result = [
            'campo_complementar' => $campoComplementar,
            'input_one' => $oneInput,
            'input_two' => $twoInput,
            'complementar_id' => $complementarId
        ];

        return  \GuzzleHttp\json_encode($result);
    }


    /**
     * @param $id
     * @param $input
     * @return string
     */
    public function actionGetInputFaixaEtaria($id, $input){

        switch ($input) {
            case "termovigilanciafiscalizacaopopulacaoanimal-0-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-0-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-1-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-1-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-2-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-2-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-3-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-3-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-4-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-4-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-5-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-5-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-6-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-6-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-7-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-7-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-8-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-8-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            case "termovigilanciafiscalizacaopopulacaoanimal-9-vigilancia_fiscalizacao_animal_id":
                $inputFaixa = "termovigilanciafiscalizacaopopulacaoanimal-9-vigilancia_fiscalizacao_faixa_etaria_id";
                break;
            default:
                $inputFaixa = "";
                break;
        }
        $result = [
            'input_faixa' => $inputFaixa,
            'id' => $id
        ];

        return  \GuzzleHttp\json_encode($result);
    }

    public function actionFaixaEtaria($id){
        $result = TermoVigilanciaFiscalizacaoFaixaEtaria::find()->where(['vigilancia_fiscalizacao_animal_id' => $id])->orderBy('vigilancia_fiscalizacao_animal_faixa_etaria_id')->all();

        if(count($result)>0){
            foreach($result as $row){
                echo "<option value='$row->vigilancia_fiscalizacao_animal_faixa_etaria_id'>$row->vigilancia_fiscalizacao_animal_faixa_etaria_periodo</option>";
            }
        }
        else{
            echo "<option value='0'>Nenhuma Faixa Etária cadastrada</option>";
        }

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

    public function actionAtividade($id, $id2 = 0){
        $result = TermoVigilanciaFiscalizacaoAtividade::find()->where(['not in','vigilancia_fiscalizacao_atividade_id',[$id, $id2]])->orderBy('vigilancia_fiscalizacao_atividade_nome')->all();

        echo "<option>Selecione a Atividade</option>";

        if(count($result)>0){
            foreach($result as $row){
                echo "<option value='$row->vigilancia_fiscalizacao_atividade_id'>$row->vigilancia_fiscalizacao_atividade_nome</option>";
            }
        }
        else{
            echo "<option>Nenhuma Atividade cadastrada</option>";
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
        $modelsPopulacaoAnimal = [new TermoVigilanciaFiscalizacaoPopulacaoAnimal];

        if ($model->load(Yii::$app->request->post())) {

            $modelsVeiculo = Model::createMultiple(TermoVigilanciaFiscalizacaoVeiculo::classname());
            $modelsEquipe = Model::createMultiple(TermoVigilanciaFiscalizacaoEquipeFiscal::classname());
            $modelsAtividade = Model::createMultiple(TermoVigilanciaFiscalizacaoAtividade::classname());
            $modelsAcao = Model::createMultiple(TermoVigilanciaFiscalizacaoAcao::classname());
            $modelsPopulacaoAnimal = Model::createMultiple(TermoVigilanciaFiscalizacaoPopulacaoAnimal::classname());
            Model::loadMultiple($modelsVeiculo, Yii::$app->request->post());
            Model::loadMultiple($modelsEquipe, Yii::$app->request->post());
            Model::loadMultiple($modelsAtividade, Yii::$app->request->post());
            Model::loadMultiple($modelsAcao, Yii::$app->request->post());
            Model::loadMultiple($modelsPopulacaoAnimal, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsVeiculo),
                    ActiveForm::validateMultiple($modelsEquipe),
                    ActiveForm::validateMultiple($modelsAtividade),
                    ActiveForm::validateMultiple($modelsAcao),
                    ActiveForm::validateMultiple($modelsPopulacaoAnimal),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsVeiculo) && $valid;
            $valid = Model::validateMultiple($modelsEquipe) && $valid;
            $valid = Model::validateMultiple($modelsAtividade) && $valid;
            $valid = Model::validateMultiple($modelsAcao) && $valid;
            $valid = Model::validateMultiple($modelsPopulacaoAnimal) && $valid;

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
            'modelsAcao' => (empty($modelsAcao)) ? [new TermoVigilanciaFiscalizacaoAcoes] : $modelsAcao,
            'modelsPopulacaoAnimal' => (empty($modelsPopulacaoAnimal)) ? [new TermoVigilanciaFiscalizacaoPopulacaoAnimal] : $modelsPopulacaoAnimal
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
