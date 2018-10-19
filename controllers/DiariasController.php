<?php

namespace app\controllers;


use app\models\DadosUnicoEstado;
use app\models\DadosUnicoFuncionario;
use app\models\DadosUnicoMunicipio;
use app\models\DiariaAprovacao;
use app\models\DiariaAutorizacao;
use app\models\DiariaDadosRoteiroMultiplo;
use app\models\DiariaDevolucao;
use app\models\DiariaFinanceiro;
use app\models\DiariaMotivo;
use app\models\DiariaRoteiro;
use app\models\DiariaPreAutorizacao;
use Behat\Gherkin\Exception\Exception;
use Mpdf\Mpdf;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Yii;
use app\models\Model;
use app\models\Diarias;
use app\models\DiariasSearch;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
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
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
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
            ],
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

    public function actionGetInputRota($valor, $input)
    {
        switch ($input) {
            case "diariaroteiro-0-0-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-0-roteiro_origem";
                break;
            case "diariaroteiro-0-1-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-1-roteiro_origem";
                break;
            default:
                $inputMunicipio = "";
                break;
        }
        $result = [
            'input_municipio' => $inputMunicipio,
            'valor' => $valor
        ];

        return  \GuzzleHttp\json_encode($result);
    }

    public function actionValidaMunicipioIgual($id, $uf)
    {
        $dadosNovo = DadosUnicoMunicipio::find()
            ->where(['estado_uf' => $uf])
            ->andWhere(['not in','municipio_cd',[$id]])
            ->all();

        $dadosNovo = [
          ['municipio_cd' => 1, 'municipio_ds'=> 'um' ],
          ['municipio_cd' => 2, 'municipio_ds'=> 'dois' ],
          ['municipio_cd' => 3, 'municipio_ds'=> 'tres' ]
        ];

        if (!empty($dadosNovo)) {
            foreach($dadosNovo as $post) {
                echo "<option value='".$post->municipio_cd."'>".$post->municipio_ds."</option>";
            }
        } else {
            echo "<option>-</option>";
        }

    }


    public function actionValida($valueUf, $inputMunicipio, $valueMunicipio)
    {
        switch ($inputMunicipio) {
            case "diariaroteiro-0-0-roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-0-roteiro_destino";
                $inputEstado = "diariaroteiro-0-0-uf_roteiro_destino";
                break;
            default:
                $inputMunicipio = "";
                $inputEstado = "";
                break;
        }
        $dataEstado = DadosUnicoEstado::find()->limit(50)->all();

        $dataCapital = DadosUnicoMunicipio::find()
            ->where(['estado_uf' => $valueUf])
            ->andwhere(['not in', 'municipio_cd', [$valueMunicipio]])
            ->orderBy('municipio_ds')
            ->limit(600)
            ->all();

        $tagOptions = [
            'options' =>
                [$valueUf => [
                    'selected' => true
                ]]
        ];

        $result = [
            'input_municipio' => $inputMunicipio,
            'html_municipio' => Html::renderSelectOptions([], ArrayHelper::map($dataCapital, 'municipio_cd', 'municipio_ds')),
            'input_estado' => $inputEstado,
            'html_estado' => Html::renderSelectOptions([], ArrayHelper::map($dataEstado, 'estado_uf', 'estado_uf'),$tagOptions)
        ];
        return  \GuzzleHttp\json_encode($result);
    }

    public function actionLastDestino($valueUf, $idUltimo, $valueMunicipio)
    {
        switch ($idUltimo) {
            case "diariaroteiro-0-1-roteiro_destino":
                $inputEstado = "diariaroteiro-0-1-uf_roteiro_destino";
                break;
            case "diariaroteiro-0-2-roteiro_destino":
                $inputEstado = "diariaroteiro-0-2-uf_roteiro_destino";
                break;
            case "diariaroteiro-0-3-roteiro_destino":
                $inputEstado = "diariaroteiro-0-3-uf_roteiro_destino";
                break;
            case "diariaroteiro-0-4-roteiro_destino":
                $inputEstado = "diariaroteiro-0-4-uf_roteiro_destino";
                break;
            case "diariaroteiro-0-5-roteiro_destino":
                $inputEstado = "diariaroteiro-0-5-uf_roteiro_destino";
                break;
            case "diariaroteiro-0-6-roteiro_destino":
                $inputEstado = "diariaroteiro-0-6-uf_roteiro_destino";
                break;
            case "diariaroteiro-1-0-roteiro_destino":
                $inputEstado = "diariaroteiro-1-0-uf_roteiro_destino";
                break;
            case "diariaroteiro-1-1-roteiro_destino":
                $inputEstado = "diariaroteiro-1-1-uf_roteiro_destino";
                break;
            case "diariaroteiro-1-2-roteiro_destino":
                $inputEstado = "diariaroteiro-1-2-uf_roteiro_destino";
                break;
            case "diariaroteiro-1-3-roteiro_destino":
                $inputEstado = "diariaroteiro-1-3-uf_roteiro_destino";
                break;
            case "diariaroteiro-1-4-roteiro_destino":
                $inputEstado = "diariaroteiro-1-4-uf_roteiro_destino";
                break;
            case "diariaroteiro-1-5-roteiro_destino":
                $inputEstado = "diariaroteiro-1-5-uf_roteiro_destino";
                break;
            case "diariaroteiro-1-6-roteiro_destino":
                $inputEstado = "diariaroteiro-1-6-uf_roteiro_destino";
                break;
            default:
                $inputEstado = "diariaroteiro-0-1-uf_roteiro_destino";
                break;
        }
        $dataEstado = DadosUnicoEstado::find()->limit(100)->all();

        $dataCapital = DadosUnicoMunicipio::find()
            ->where(['estado_uf' => $valueUf])
            ->orderBy('municipio_ds')
            ->limit(600)
            ->all();

        $tagOptions = [
            'options' =>
                [$valueMunicipio => [
                    'selected' => true
                ]]
        ];

        $tagOptionsEstado = [
            'options' =>
                [$valueUf => [
                    'selected' => true
                ]]
        ];

        $result = [
            'input_municipio' => $idUltimo,
            'html_municipio' => Html::renderSelectOptions([], ArrayHelper::map($dataCapital, 'municipio_cd', 'municipio_ds'),$tagOptions),
            'input_estado' => $inputEstado,
            'html_estado' => Html::renderSelectOptions([], ArrayHelper::map($dataEstado, 'estado_uf', 'estado_uf'), $tagOptionsEstado)
        ];

        return  \GuzzleHttp\json_encode($result);
    }


    public function actionMunicipio($valueUf, $inputMunicipio, $valueMunicipio)
    {
        switch ($inputMunicipio) {
            case "diariaroteiro-0-0-roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-1-roteiro_origem";
                $inputEstado = "diariaroteiro-0-1-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-1-roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-2-roteiro_origem";
                $inputEstado = "diariaroteiro-0-2-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-2-roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-3-roteiro_origem";
                $inputEstado = "diariaroteiro-0-3-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-3-roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-4-roteiro_origem";
                $inputEstado = "diariaroteiro-0-4-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-4-roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-5-roteiro_origem";
                $inputEstado = "diariaroteiro-0-5-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-5-roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-6-roteiro_origem";
                $inputEstado = "diariaroteiro-0-6-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-6-roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-7-roteiro_origem";
                $inputEstado = "diariaroteiro-0-7-uf_roteiro_origem";
                break;
            case "diariaroteiro-1-0-roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-0-roteiro_origem";
                $inputEstado = "diariaroteiro-1-0-uf_roteiro_origem";
                break;
            case "diariaroteiro-1-1-roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-1-roteiro_origem";
                $inputEstado = "diariaroteiro-1-1-uf_roteiro_origem";
                break;
            case "diariaroteiro-1-2-roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-2-roteiro_origem";
                $inputEstado = "diariaroteiro-1-2-uf_roteiro_origem";
                break;
            case "diariaroteiro-1-3-roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-3-roteiro_origem";
                $inputEstado = "diariaroteiro-1-3-uf_roteiro_origem";
                break;
            case "diariaroteiro-1-4-roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-4-roteiro_origem";
                $inputEstado = "diariaroteiro-1-4-uf_roteiro_origem";
                break;
            case "diariaroteiro-1-5-roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-5-roteiro_origem";
                $inputEstado = "diariaroteiro-1-5-uf_roteiro_origem";
                break;
            case "diariaroteiro-1-6-roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-6-roteiro_origem";
                $inputEstado = "diariaroteiro-1-6-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-0-roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-1-roteiro_origem";
                $inputEstado = "diariaroteiro-0-1-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-1-roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-2-roteiro_origem";
                $inputEstado = "diariaroteiro-0-2-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-2-roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-3-roteiro_origem";
                $inputEstado = "diariaroteiro-0-3-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-3-roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-4-roteiro_origem";
                $inputEstado = "diariaroteiro-0-4-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-4-roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-5-roteiro_origem";
                $inputEstado = "diariaroteiro-0-5-uf_roteiro_origem";
                break;
            case "diariaroteiro-0-5-roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-6-roteiro_origem";
                $inputEstado = "diariaroteiro-0-6-uf_roteiro_origem";
                break;
            default:
                $inputMunicipio = "";
                $inputEstado = "";
                break;
        }
        $dataEstado = DadosUnicoEstado::find()->where(['estado_uf' => $valueUf])->limit(1)->all();

        $dataCapital = DadosUnicoMunicipio::find()
            ->where(['estado_uf' => $valueUf])
            ->andwhere(['municipio_cd' => $valueMunicipio])
            ->orderBy('municipio_ds')
            ->limit(1)
            ->all();

        $result = [
            'input_municipio' => $inputMunicipio,
            'html_municipio' => Html::renderSelectOptions([], ArrayHelper::map($dataCapital, 'municipio_cd', 'municipio_ds')),
            'input_estado' => $inputEstado,
            'html_estado' => Html::renderSelectOptions([], ArrayHelper::map($dataEstado, 'estado_uf', 'estado_uf'))
        ];

        return  \GuzzleHttp\json_encode($result);
    }

    public function actionSetMunicipioComCapital($value, $input)
    {
        switch ($input) {
            case "diariaroteiro-0-0-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-0-roteiro_origem";
                break;
            case "diariaroteiro-0-1-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-1-roteiro_origem";
                break;
            case "diariaroteiro-0-2-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-2-roteiro_origem";
                break;
            case "diariaroteiro-0-3-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-3-roteiro_origem";
                break;
            case "diariaroteiro-0-4-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-4-roteiro_origem";
                break;
            case "diariaroteiro-0-5-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-5-roteiro_origem";
                break;
            case "diariaroteiro-0-6-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-6-roteiro_origem";
                break;
            case "diariaroteiro-1-0-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-0-roteiro_origem";
                break;
            case "diariaroteiro-1-1-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-1-roteiro_origem";
                break;
            case "diariaroteiro-1-2-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-2-roteiro_origem";
                break;
            case "diariaroteiro-1-3-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-3-roteiro_origem";
                break;
            case "diariaroteiro-1-4-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-4-roteiro_origem";
                break;
            case "diariaroteiro-1-5-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-5-roteiro_origem";
                break;
            case "diariaroteiro-1-6-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-1-6-roteiro_origem";
                break;


            case "diariaroteiro-0-0-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-0-roteiro_destino";
                break;
            case "diariaroteiro-0-1-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-1-roteiro_destino";
                break;
            case "diariaroteiro-0-2-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-2-roteiro_destino";
                break;
            case "diariaroteiro-0-3-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-3-roteiro_destino";
                break;
            case "diariaroteiro-0-4-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-4-roteiro_destino";
                break;
            case "diariaroteiro-0-5-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-5-roteiro_destino";
                break;
            case "diariaroteiro-0-6-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-6-roteiro_destino";
                break;
            case "diariaroteiro-1-0-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-1-0-roteiro_destino";
                break;
            case "diariaroteiro-1-1-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-1-1-roteiro_destino";
                break;
            case "diariaroteiro-1-2-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-1-2-roteiro_destino";
                break;
            case "diariaroteiro-1-3-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-1-3-roteiro_destino";
                break;
            case "diariaroteiro-1-4-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-1-4-roteiro_destino";
                break;
            case "diariaroteiro-1-5-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-1-5-roteiro_destino";
                break;
            case "diariaroteiro-1-6-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-1-6-roteiro_destino";
                break;
            default:
                $inputMunicipio = "";
                break;
        }
                $data = DadosUnicoMunicipio::find()
                    ->where(['estado_uf' => $value])
                    ->orderBy('municipio_ds')
                    ->limit(600)
                    ->all();

                $dataCapital = DadosUnicoMunicipio::find()
                    ->where(['estado_uf' => $value])
                    ->andwhere(['municipio_capital' => 1])
                    ->orderBy('municipio_ds')
                    ->limit(1)
                    ->all();

        $tagOptions = [
            'prompt' => "=== Select ===",
            'options' =>
                [$dataCapital[0]['municipio_cd'] => [
                    'selected' => true
                ]]
        ];

        $result = [
            'input_municipio' => $inputMunicipio,
            'html' => Html::renderSelectOptions([], ArrayHelper::map($data, 'municipio_cd', 'municipio_ds'), $tagOptions)
        ];

        return  \GuzzleHttp\json_encode($result);
    }

    public function actionValidaProximaRota($value, $input)
    {
        switch ($input) {
            case "diariaroteiro-0-0-roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-0-roteiro_origem";
                break;
            case "diariaroteiro-0-1-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-1-roteiro_origem";
                break;
            case "diariaroteiro-0-2-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-2-roteiro_origem";
                break;
            case "diariaroteiro-0-3-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-3-roteiro_origem";
                break;
            case "diariaroteiro-0-4-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-4-roteiro_origem";
                break;
            case "diariaroteiro-0-5-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-5-roteiro_origem";
                break;
            case "diariaroteiro-0-6-uf_roteiro_origem":
                $inputMunicipio = "diariaroteiro-0-6-roteiro_origem";
                break;
            case "diariaroteiro-0-0-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-0-roteiro_destino";
                break;
            case "diariaroteiro-0-1-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-1-roteiro_destino";
                break;
            case "diariaroteiro-0-2-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-2-roteiro_destino";
                break;
            case "diariaroteiro-0-3-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-3-roteiro_destino";
                break;
            case "diariaroteiro-0-4-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-4-roteiro_destino";
                break;
            case "diariaroteiro-0-5-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-5-roteiro_destino";
                break;
            case "diariaroteiro-0-6-uf_roteiro_destino":
                $inputMunicipio = "diariaroteiro-0-6-roteiro_destino";
                break;
            default:
                $inputMunicipio = "";
                break;
        }
                $data = DadosUnicoMunicipio::find()
                    ->where(['estado_uf' => $value])
                    ->orderBy('municipio_ds')
                    ->limit(600)
                    ->all();

                $dataCapital = DadosUnicoMunicipio::find()
                    ->where(['estado_uf' => $value])
                    ->andwhere(['municipio_capital' => 1])
                    ->orderBy('municipio_ds')
                    ->limit(1)
                    ->all();

        $tagOptions = [
            'prompt' => "=== Select ===",
            'options' =>
                [$dataCapital[0]['municipio_cd'] => [
                    'selected' => true
                ]]
        ];

        $result = [
            'input_municipio' => $inputMunicipio,
            'html' => Html::renderSelectOptions([], ArrayHelper::map($data, 'municipio_cd', 'municipio_ds'), $tagOptions)
        ];

        return  \GuzzleHttp\json_encode($result);
    }



    public function actionMunicipioCapital($uf)
    {
        $postCapital = DadosUnicoMunicipio::find()
            ->where(['estado_uf' => $uf])
            ->andWhere(['municipio_capital' => 1])
            ->orderBy('municipio_ds')
            ->all();
        if (!empty($postCapital)) {
            foreach($postCapital as $post) {
                echo $post->municipio_cd;
            }
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
        $dataProvider->query->andWhere(['diaria_st'=>Diarias::PRE_AUTORIZAR]);
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
                $model->diaria_st = Diarias::AUTORIZACAO; //Autorização
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
            $modelPreAutorizacaoDevolver->diaria_st = Diarias::PRE_AUTORIZAR;
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
        $dataProvider->query->andWhere(['diaria_st'=>Diarias::AUTORIZACAO]);
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
            $model->diaria_st = Diarias::APROVACAO;
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
            $modelAutorizacaoDevolver->diaria_st = Diarias::PRE_AUTORIZAR;
            $model->diaria_st = Diarias::PRE_AUTORIZAR;
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
        $dataProvider->query->andWhere(['diaria_st'=>Diarias::APROVACAO]);
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
            $modelAprovacaoDevolver->diaria_st = Diarias::AUTORIZACAO;
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
            $model->diaria_st = Diarias::EMPENHO;
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
        $dataProvider->query->andWhere(['diaria_st'=>Diarias::EMPENHO]);
        return $this->render('montar-processo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSolicitacaoImprimir($id) {
        $model = $this->findModel($id);
        $mpdf = new mPDF();
        $mpdf->showImageErrors = true;
        $content = $this->renderPartial('solicitacao-imprimir', ['model' => $model]);
        $mpdf->writeHTML($content);
        $mpdf->SetFooter('{PAGENO}');

       // $mpdf->Output('MyPDF.pdf', 'I');
        $mpdf->Output("MyPDF.pdf",'I');
    }

    public function actionCapaProcesso($id){
        $model = $this->findModel($id);
        $mpdf = new mPDF();
        $mpdf->showImageErrors = true;
        $content = $this->renderPartial('capa-processo', ['model' => $model]);
        $mpdf->writeHTML($content);
        $mpdf->SetFooter('{PAGENO}');

        // $mpdf->Output('MyPDF.pdf', 'I');
        $mpdf->Output("MyPDF.pdf",'I');
    }


    public function actionEmpenho()
    {
        $searchModel = new DiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['diaria_st'=> Diarias::EMPENHO])->orderBy(['diaria_empenho' => SORT_ASC]);
        return $this->render('empenho', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEmpenhoEmpenhar($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['empenho']);
        }

        return $this->render('empenho-empenhar', [
            'model' => $model,
        ]);
    }

    public function actionEmpenhoLiberar($id)
    {
        $model = $this->findModel($id);
        if($model->validate() && !is_null($model->diaria_empenho)){
            $model->diaria_st = 3;
            $model->save();
            return $this->redirect(['empenho']);
        }

        return $this->render('empenho', [
            'model' => $model,
        ]);
    }

    public function actionEmpenhoLiberarMultiplo()
    {
        $selection=(array)Yii::$app->request->post('selection');//typecasting
        foreach($selection as $id){
            $model = Diarias::findOne((int)$id);//make a typecasting
            if($model->validate() && !is_null($model->diaria_empenho)){
                $model->diaria_st = Diarias::EXECUCAO;
                $model->save();
            }
        }
        return $this->redirect(['empenho']);

    }


    public function actionEmpenhoDevolver($id)
    {
        $modelEmpenhoDevolver = new DiariaDevolucao();
        $model = $this->findModel($id);
        if ($modelEmpenhoDevolver->load(Yii::$app->request->post())){
            /** @var integer $codFuncionario */
            $modelEmpenhoDevolver->diaria_id = $model->diaria_id;
            $modelEmpenhoDevolver->diaria_devolucao_dt = date('Y-m-d');
            $modelEmpenhoDevolver->diaria_devolucao_hr = date('H:i:s');
            $modelEmpenhoDevolver->diaria_devolucao_func = intval(implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id')));;
            $modelEmpenhoDevolver->diaria_st = Diarias::AUTORIZACAO; // Autorização
            $model->diaria_st = Diarias::AUTORIZACAO;
            $model->save();
            $modelEmpenhoDevolver->save();
            return $this->redirect(['empenho']);
        }

        return $this->render('empenho-devolver', [
            'model'                    => $model,
            'modelEmpenhoDevolver'     => $modelEmpenhoDevolver
        ]);
    }

    public function actionFinanceiroExecutarOrdem()
    {
        $searchModel = new DiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['diaria_st'=> Diarias::EXECUCAO])->orderBy(['diaria_empenho' => SORT_ASC]);
        return $this->render('financeiro-executar-ordem', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFinanceiroExecutarDiaria($id)
    {
        $model = $this->findModel($id);
        $financeiro = new DiariaFinanceiro();

        if (Yii::$app->request->post()){
            d($financeiro);
            exit;
            $model->save();
            return $this->redirect(['financeiro-executar-ordem']);
        }

        return $this->render('financeiro-executar-diaria', [
            'model' => $model,
            'financeiro' => $financeiro
        ]);
    }

    public function actionFinanceiroExecutarOrdemDevolver($id)
    {
        $modelFinanceiroExecutarOrdemDevolver = new DiariaDevolucao();
        $model = $this->findModel($id);
        if ($modelFinanceiroExecutarOrdemDevolver->load(Yii::$app->request->post())){
            $modelFinanceiroExecutarOrdemDevolver->diaria_id = $model->diaria_id;
            $modelFinanceiroExecutarOrdemDevolver->diaria_devolucao_dt = date('Y-m-d');
            $modelFinanceiroExecutarOrdemDevolver->diaria_devolucao_hr = date('H:i:s');
            $modelFinanceiroExecutarOrdemDevolver->diaria_devolucao_func = intval(implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id')));;
            $modelFinanceiroExecutarOrdemDevolver->diaria_st = Diarias::EMPENHO;
            $model->diaria_st = Diarias::EMPENHO;
            $model->save();
            $modelFinanceiroExecutarOrdemDevolver->save();
            return $this->redirect(['financeiro-executar-ordem']);
        }

        return $this->render('financeiro-executar-ordem-devolver', [
            'model'                                 => $model,
            'modelFinanceiroExecutarOrdemDevolver'  => $modelFinanceiroExecutarOrdemDevolver
        ]);
    }

    public function actionComprovacaoAprovacao()
    {
        $searchModel = new DiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['diaria_st'=> Diarias::APROVACAO_DE_COMPROVACAO])->orderBy(['diaria_empenho' => SORT_ASC]);
        return $this->render('comprovacao-aprovacao', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionComprovacaoAprovacaoAprovar($id)
    {
        $model = $this->findModel($id);
        if($model->validate() && ($model->diaria_comprovada == 1)){
            $model->diaria_st = Diarias::AGUARDANDO_ARQUIVAMENTO;
            $model->save();
            return $this->redirect(['comprovacao-aprovacao']);
        }

        return $this->render('comprovacao-aprovacao', [
            'model' => $model,
        ]);
    }

    public function actionComprovacaoAprovacaoDevolver($id)
    {
        $modelComprovacaoAprovacaoDevolver = new DiariaDevolucao();
        $model = $this->findModel($id);
        if ($modelComprovacaoAprovacaoDevolver->load(Yii::$app->request->post())){
            $modelComprovacaoAprovacaoDevolver->diaria_id = $model->diaria_id;
            $modelComprovacaoAprovacaoDevolver->diaria_devolucao_dt = date('Y-m-d');
            $modelComprovacaoAprovacaoDevolver->diaria_devolucao_hr = date('H:i:s');
            $modelComprovacaoAprovacaoDevolver->diaria_devolucao_func = intval(implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'funcionario_id', 'funcionario_id')));;
            $modelComprovacaoAprovacaoDevolver->diaria_st = Diarias::APROVACAO_DE_COMPROVACAO;
            $model->diaria_st = Diarias::COMPROVACAO;
            $model->save();
            $modelComprovacaoAprovacaoDevolver->save();
            return $this->redirect(['comprovacao-aprovacao']);
        }

        return $this->render('comprovacao-aprovacao-devolver', [
            'model'                              => $model,
            'modelComprovacaoAprovacaoDevolver'  => $modelComprovacaoAprovacaoDevolver
        ]);
    }

    public function actionArquivar()
    {
        $searchModel = new DiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['diaria_st'=> Diarias::AGUARDANDO_ARQUIVAMENTO])->orderBy(['diaria_empenho' => SORT_ASC]);
        return $this->render('arquivar', [
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
     * @param $id
     * @param $element
     */
    public function actionGetter($id, $element){
        $idElement = null;
        switch ($element){
            case 'diariaroteiro-0-0-uf_roteiro_destino':
            $idElement =  "#".'diariaroteiro-0-0-roteiro_destino';
                break;
            case 'diariaroteiro-0-1-uf_roteiro_destino':
                $idElement =  "#".'diariaroteiro-0-1-roteiro_destino';
                break;
        }
       // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $rows = DadosUnicoMunicipio::find()->where(['estado_uf' => $id])->all();
        $arraay = [$idElement];
        echo "<option>Selecione o Municipio</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->municipio_cd'>$row->municipio_ds</option>";
            }
        }
       /* else{
            echo "<option>Nenhum Municipio cadastrado</option>";
        }*/



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
