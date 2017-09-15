<?php
/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
use app\models\DadosUnicoPessoa;
use app\models\DiariaCoordenadoria;
use app\models\DiariaDadosRoteiroMultiplo;
use app\models\DiariaRoteiro;
use dosamigos\datepicker\DatePicker;
use kartik\time\TimePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<head>
    <style>
        table.diaria {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 102%;
            margin-left: -1%;
        }

        td, th.borda {
            border: 0.5px solid #b5b5b5;
            text-align: left;
            padding: 8px;
        }

        tr.bordaMenu {
            background-color: #dcdedd;
            height: 35px

        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>
<div class="customer-form">
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'id_coordenadoria')->dropDownList(
                ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'id_coordenadoria', 'nome'), ['options' => ['0' => ['selected' => true]]])->label('Local da Solicitação:');
            ?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($model, 'diaria_solicitante')->dropDownList(
                ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_st' => 0])->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'pessoa_id', 'pessoa_nm'), ['options' => [Yii::$app->user->getId() => ['selected' => true]]])
            ?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($model, 'diaria_beneficiario')->dropDownList(
                ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_st' => 0])->orderBy(['pessoa_nm' => SORT_ASC])->all(), 'pessoa_id', 'pessoa_nm'))
            ?>
        </div>
    </div>

    <?php
    if (!is_null($model->qtde_roteiros) && $model->qtde_roteiros == 0) { ?>
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-transfer"></i> Roteiro</h4></div>
            <div class="panel-body">
                <div class="container-items"><!-- widgetContainer -->
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Roteiro </h3>
                            <div class="pull-right">

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php $rotas = DiariaRoteiro::findAll(['diaria_id' => $model->diaria_id]); ?>
                                <?php echo $this->render('form-rota', [
                                    'form' => $form,
                                    'modelsRoteiro' => $rotas,
                                ]) ?>
                            </div>

                            <div class="col">
                                <?= $form->field($model, "diaria_roteiro_complemento")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div id="w0-container" class="row" style="background-color: #dcdedd">
                                <p style="margin-left: 1%; margin-top: 4px"><strong>Dados da Solicitação</strong></p>
                            </div>

                            <table class='diaria' style="margin-top: 2px">
                                <tr class='bordaMenu'>
                                    <th><p style="margin-left: 2%">Data Partida</p></th>
                                    <th><p style="margin-left: 1%">Data Chegada</p></th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <?= $form->field($model, "diaria_dt_saida")->widget(
                                                    DatePicker::className(), [
                                                    'inline' => false,
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                                ]); ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php echo $form->field($model, "diaria_hr_saida")->widget(
                                                    TimePicker::classname(), [
                                                    'readonly' => true,
                                                    'pluginOptions' => [
                                                        'minuteStep' => 5,
                                                        'showMeridian' => false,
                                                        'defaultTime' => date('H:i'),
                                                    ]
                                                ]); ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php $diaSaida = $model['diaria_dt_saida']; ?>
                                                <?= $form->field($model, 'diaria_id')->textInput(['value' => $model->getDiaDaSemana($model->converterStringToData($diaSaida)), 'disabled' => true]) ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <?= $form->field($model, "diaria_dt_chegada")->widget(
                                                    DatePicker::className(), [
                                                    'inline' => false,
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                                ]); ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php echo $form->field($model, "diaria_hr_chegada")->widget(
                                                    TimePicker::classname(), [
                                                    'readonly' => true,
                                                    'pluginOptions' => [
                                                        'minuteStep' => 5,
                                                        'showMeridian' => false,
                                                        'defaultTime' => date('H:i'),
                                                    ]
                                                ]); ?>
                                            </div>

                                            <div class="col-sm-3">
                                                <?php $diaChegada = $model['diaria_dt_chegada']; ?>
                                                <?= $form->field($model, 'diaria_id')->textInput(['value' => $model->getDiaDaSemana($model->converterStringToData($diaChegada)), 'disabled' => true]) ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <?= $form->field($model, "diaria_desconto")->checkboxList(['S' => 'Sim']); ?>
                                </div>
                                <div class="col-sm-2">
                                    <?= $form->field($model, "diaria_qtde")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-2">
                                    <?= $form->field($model, "diaria_valor")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        echo $this->render('form-roteiro', [
            'form' => $form,
            'model' => $model,
            'modelsRoteiro' => (empty($modelsRoteiro)) ? [[new DiariaRoteiro]] : $modelsRoteiro,
        ]);

    } else {
        echo $this->render('form-roteiro-multiplo', [
            'model' => $model,
            'modelsRoteiro' => (empty($modelsRoteiro)) ? [[new DiariaRoteiro]] : $modelsRoteiro,
            'modelsRoteiroMultiplo' => (empty($modelsRoteiroMultiplo)) ? [new DiariaDadosRoteiroMultiplo] : $modelsRoteiroMultiplo,
            'form' => $form,
        ]);
    }
    ?>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-body">
            <div class="row">
                <?= $form->field($model, 'diaria_justificativa_fds')->textarea(['rows' => 2, 'cols' => 60]); ?>
            </div>

            <div class="row">
                <?= $form->field($model, 'diaria_justificativa_feriado')->textarea(['rows' => 2, 'cols' => 60]); ?>
            </div>
        </div>
    </div>
</div>



