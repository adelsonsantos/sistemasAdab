<?php
/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
/* @var $form yii\widgets\ActiveForm */
use app\models\DadosUnicoPessoa;
use app\models\DiariaCoordenadoria;
use dosamigos\datepicker\DatePicker;
use kartik\time\TimePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

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

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-transfer"></i> Roteiro</h4></div>
        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsRoteiroMultiplo[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'diaria_id',
                    'diaria_dt_saida',
                    'diaria_qtde',
                    'diaria_desconto',
                    'diaria_valor',
                    'diaria_roteiro_complemento',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsRoteiroMultiplo as $indexMulti => $modelRoteiroMultiplo): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Roteiro </h3>
                            <div class="pull-right">
                                <button type="button" class="add-item btn  btn-xs"><i class="glyphicon glyphicon"></i>Adicionar
                                    Roteiro
                                </button>
                                <button type="button" class="remove-item btn btn-xs"><i class="glyphicon glyphicon"></i>Remover
                                    Roteiro
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            if (!$modelRoteiroMultiplo->isNewRecord) {
                                echo Html::activeHiddenInput($modelRoteiroMultiplo, "[{$indexMulti}]diaria_id");
                            }
                            ?>
                            <div class="row">
                                <?= $this->render('form-roteiro', [
                                    'form' => $form,
                                    'indexMulti' => $indexMulti,
                                    'modelsRoteiro' => $modelsRoteiro[$indexMulti],
                                ]) ?>
                            </div>

                            <div class="col">
                                <?= $form->field($modelRoteiroMultiplo, "[{$indexMulti}]diaria_roteiro_complemento")->textInput(['maxlength' => true]) ?>
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
                                                <?= $form->field($modelRoteiroMultiplo, "[{$indexMulti}]diaria_dt_saida")->widget(
                                                    DatePicker::className(), [
                                                    'inline' => false,
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                                ]); ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php echo $form->field($modelRoteiroMultiplo, "[{$indexMulti}]diaria_hr_saida")->widget(
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
                                                <?php $diaSaida = $modelsRoteiroMultiplo[$indexMulti]['diaria_dt_saida']; ?>
                                                <?= $form->field($model, 'diaria_id')->textInput(['value' => $model->getDiaDaSemana($diaSaida)]) ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <?= $form->field($modelRoteiroMultiplo, "[{$indexMulti}]diaria_dt_chegada")->widget(
                                                    DatePicker::className(), [
                                                    'inline' => false,
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                                ]); ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php echo $form->field($modelRoteiroMultiplo, "[{$indexMulti}]diaria_hr_chegada")->widget(
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
                                                <?php $diaChegada = $modelsRoteiroMultiplo[$indexMulti]['diaria_dt_chegada']; ?>
                                                <?= $form->field($model, 'diaria_id')->textInput(['value' => $model->getDiaDaSemana($diaChegada)]) ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <?= $form->field($modelRoteiroMultiplo, "[{$indexMulti}]diaria_desconto")->checkboxList(['S' => 'Sim']); ?>
                                </div>
                                <div class="col-sm-2">
                                    <?= $form->field($modelRoteiroMultiplo, "[{$indexMulti}]diaria_qtde")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-2">
                                    <?= $form->field($modelRoteiroMultiplo, "[{$indexMulti}]diaria_valor")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>


