<?php
/**
 * Created by PhpStorm.
 * User: adelson.santos
 * Date: 19/10/2017
 * Time: 15:49
 */
?>
<head>
    <style>
        table.diaria {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th.borda {
            border: 0.5px solid #b5b5b5;
            text-align: left;
            padding: 8px;
        }

        tr.bordaMenu {
            background-color: #cecece;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }

        .font-topo {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<?php
use app\models\DadosUnicoDadosBancarios;
use app\models\DadosUnicoFuncionario;
use app\models\DadosUnicoPessoa;
use app\models\DadosUnicoPessoaFisica;
use app\models\DiariaStatus;
use kartik\time\TimePicker;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;

/* @var $model app\models\Diarias */
/* @var $financeiro app\models\DiariaFinanceiro */

?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>

<div class="panel panel-default">
    <div class="panel-heading" style="height: 80px">
        <h3 style="text-align: center">Confirma execução da solicitação abaixo?</h3>
    </div>
</div>

<div class="diarias-pre-autorizar-devolver" style="margin-left: 209px; margin-top: -6px">
    <table class="diaria">
        <tr class="bordaMenu">
            <th class="borda" style="width: 16%">Número SD</th>
            <th class="borda" style="width: 16%">Solicitada em</th>
            <th class="borda" style="width: 16%">N° Empenho</th>
            <th class="borda" style="width: 16%">Data Empenho</th>
            <th class="borda" style="width: 16%">Processo</th>
            <th class="borda" style="width: 16%">Status</th>
        </tr>
        <tr>
            <?php
            $dataSolicitacao = date_create($model->diaria_dt_criacao);
            $dataSolicitacaoDiaria = date_format($dataSolicitacao, "d/m/Y");?>
            <td class="borda"><?= $model->diaria_numero; ?></td>
            <td class="borda"><?= $dataSolicitacaoDiaria.' às '.$model->diaria_hr_criacao; ?></td>
            <td class="borda"><?= $model->diaria_empenho; ?></td>
            <td class="borda"><?php $date = date_create($model->diaria_dt_empenho); echo date_format($date, "d/m/Y"); ?></td>
            <td class="borda"><?= $model->diaria_processo; ?></td>
            <td class="borda"><?= implode(ArrayHelper::map(DiariaStatus::find()->asArray()->where(['status_id' => $model->diaria_st])->all(), 'status_ds', 'status_ds')) ?></td>
        </tr>
    </table>
    <br>
    <table class="diaria">
        <tr class="bordaMenu">
            <th class="borda" style="width: 50%">Beneficiário</th>
            <th class="borda" style="width: 25%">Matrícula</th>
            <th class="borda" style="width: 25%">CPF</th>
        </tr>
        <tr>
            <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where("pessoa_id = {$model->diaria_beneficiario}")->all(), 'pessoa_nm', 'pessoa_nm')) ?></td>
            <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'funcionario_matricula', 'funcionario_matricula')); ?></td>
            <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoPessoaFisica::find()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'pessoa_fisica_cpf', 'pessoa_fisica_cpf')); ?></td>
        </tr>
    </table>
    <table class="diaria">
        <tr class="bordaMenu">
            <th class="borda" style="width: 50%">Banco</th>
            <th class="borda" style="width: 25%">Agência</th>
            <th class="borda" style="width: 25%">Conta</th>
        </tr>
        <tr>
            <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoDadosBancarios::find()->innerJoinWith('banco')->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'banco.banco_ds', 'banco.banco_ds')); ?></td>
            <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoDadosBancarios::find()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'dados_bancarios_agencia', 'dados_bancarios_agencia')); ?></td>
            <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoDadosBancarios::find()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'dados_bancarios_conta', 'dados_bancarios_conta')); ?></td>
        </tr>
    </table>
    <br>
    <table class="diaria">
        <tr class="bordaMenu">
            <th class="borda" style="width: 16%">Valor Referência</th>
            <th class="borda" style="width: 16%">Redução 50%</th>
            <th class="borda" style="width: 16%">Qtde Dárais</th>
            <th class="borda" style="width: 16%">Valor</th>
        </tr>
        <tr>
            <td class="borda"><?= 'R$ ' . number_format($model->diaria_valor_ref, 2, ',', '.');; ?></td>
            <td class="borda"><?= $model->diaria_desconto == 'N' ? 'Não' : 'Sim'; ?></td>
            <td class="borda"><?= $model->diaria_qtde; ?></td>
            <td class="borda"><?= 'R$ ' . number_format($model->diaria_valor, 2, ',', '.'); ?></td>
        </tr>
    </table>
</div>

<?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default" style="margin-left: 209px; margin-top: 20px">
                <table class="diaria">
                    <tr class="bordaMenu" style="width:100%;">
                        <th class="borda">Pré-Liquidação</th>
                        <th class="borda">Liquidação</th>
                        <th class="borda">Execução</th>
                    </tr>
                    <tr>
                        <td class="borda">
                            <div class="col-sm-10">
                                <?= $form->field($financeiro, 'diaria_preliquidacao_dt')->widget(
                                    DatePicker::className(), [
                                    'inline' => false,
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd/mm/yyyy'
                                    ]
                                ])->label('Data'); ?>
                            </div>
                        </td>
                        <td class="borda">
                            <div class="col-sm-5">
                                <?= $form->field($financeiro, "diaria_liquidacao_dt")->widget(
                                    DatePicker::className(), [
                                    'inline' => false,
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd/mm/yyyy'
                                    ]
                                ])->label('Data'); ?>
                            </div>
                            <div class="col-sm-5">
                                <?= $form->field($financeiro, "diaria_liquidacao_hr")->widget(
                                    TimePicker::classname(), [
                                    'readonly' => true,
                                    'pluginOptions' => [
                                        'minuteStep' => 5,
                                        'showMeridian' => false,
                                        'defaultTime' => date('H:i'),
                                    ]
                                ])->label('Hora'); ?>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-5">
                                <?= $form->field($financeiro, "diaria_execucao_dt")->widget(
                                    DatePicker::className(), [
                                    'inline' => false,
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd/mm/yyyy'
                                    ]
                                ])->label('Data'); ?>
                            </div>
                            <div class="col-sm-5">
                                <?= $form->field($financeiro, "diaria_execucao_hr")->widget(
                                    TimePicker::classname(), [
                                    'readonly' => true,
                                    'pluginOptions' => [
                                        'minuteStep' => 5,
                                        'showMeridian' => false,
                                        'defaultTime' => date('H:i'),
                                    ]
                                ])->label('Hora'); ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="col-sm-1"></div>

<?php $obj = DadosUnicoFuncionario::find()->asArray()->where(['pessoa_id' => Yii::$app->getUser()->id])->all(); ?>

        <?= $form->field($financeiro, 'diaria_financeiro_preliquidante')->textInput(['value'=> $obj[0]['funcionario_id']]); ?>

        <?= $form->field($financeiro, 'diaria_financeiro_dt_obrigacao')->textInput(['value'=> Yii::$app->formatter->asDate('now', 'yyyy-MM-dd')]); ?>

        <?= $form->field($financeiro, 'diaria_financeiro_hr_obrigacao')->textInput(['value'=> date('H:i')]); ?>

        <?= $form->field($financeiro, 'diaria_preliquidacao_hr')->textInput(['value'=> date('H:i')]); ?>

        <?= $form->field($financeiro, 'diaria_financeiro_liquidante')->textInput(['value'=> $obj[0]['funcionario_id']]); ?>

        <?= $form->field($financeiro, 'diaria_financeiro_dt_execucao')->textInput(['value'=> Yii::$app->formatter->asDate('now', 'yyyy-MM-dd')]); ?>

        <?= $form->field($financeiro, 'diaria_financeiro_executante')->textInput(['value'=> $obj[0]['funcionario_id']]); ?>

    <table class="diaria" style=" width: 100%">
        <tr class="bordaMenu">
            <th class="borda" style="text-align: center; width: 50%">
                <?= Html::a('<span class="glyphicon glyphicon-ok-sign" style="color: white; font-size: 1.2em;"> Salvar </span>', ['financeiro-executar-diaria', 'id' => $model->diaria_id], ['class' => 'btn btn-success', 'data' => ['method' => 'post']]); ?>
            </th>
            <th class="borda" style="text-align: center; width: 50%">
                <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </th>
            <th class="borda" style="text-align: center; width: 50%">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
            </th>
        </tr>
    </table>

    <?php ActiveForm::end(); ?>


    <?php
/*
 * diaria_id integer NOT NULL,
  diaria_financeiro_preliquidante integer NOT NULL,
  diaria_financeiro_dt_obrigacao date NOT NULL,
  diaria_financeiro_hr_obrigacao character varying(10) NOT NULL,
  diaria_preliquidacao_dt date NOT NULL,
  diaria_preliquidacao_hr character varying(10) NOT NULL,
  diaria_financeiro_liquidante integer,
  diaria_liquidacao_dt date,
  diaria_liquidacao_hr character varying(10),
  diaria_financeiro_dt_execucao date,
  diaria_financeiro_executante integer,
  diaria_execucao_dt date,
  diaria_execucao_hr character varying(10),
*/
