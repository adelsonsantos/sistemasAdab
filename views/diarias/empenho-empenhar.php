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
use app\models\DadosUnicoPessoa;
use app\models\Motivo;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;

?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>

<div class="panel panel-default">
    <div class="panel-heading" style="height: 80px">
        <h3 style="text-align: center">Confirma empenho da solicitação abaixo?</h3>
    </div>
</div>

<div class="diarias-pre-autorizar-devolver" style="margin-left: 209px; margin-top: -6px">
    <table class="diaria">
        <tr class="bordaMenu">
            <th class="borda">Número SD</th>
            <th class="borda">Beneficiário</th>
            <th class="borda">Partida Prevista</th>
            <th class="borda">Chegada Prevista</th>
        </tr>
        <tr>
            <td class="borda"><?= $model->diaria_numero; ?></td>
            <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where("pessoa_id = {$model->diaria_beneficiario}")->all(), 'pessoa_nm', 'pessoa_nm')) ?></td>
            <td class="borda"><?= $model->diaria_dt_saida . ' ' . $model->diaria_hr_saida; ?></td>
            <td class="borda"><?= $model->diaria_dt_chegada . ' ' . $model->diaria_hr_chegada; ?></td>
        </tr>
    </table>
</div>

<?php $form = ActiveForm::begin(); ?>



<div class="panel panel-default" style="margin-left: 209px; margin-top: 12px">
    <div class="panel-heading">
        <div class="panel-body">
            <div class="col">
                <div class="col-sm-2">
                    <?= $form->field($model, 'diaria_empenho')->textInput()->label('N° do Empenho'); ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, "diaria_dt_empenho")->widget(
                        DatePicker::className(), [
                        'inline' => false,
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd/mm/yyyy'
                        ]
                    ])->label('Data do Empenho'); ?>
                </div>
            </div>
        </div>
    </div>

    <table class="diaria" style=" width: 100%">
        <tr class="bordaMenu">
            <th class="borda" style="text-align: center; width: 50%">
                <?= Html::a('<span class="glyphicon glyphicon-ok-sign" style="color: white; font-size: 1.2em;"> Salvar </span>', ['empenho-empenhar', 'id' => $model->diaria_id], ['class' => 'btn btn-success', 'data' => ['method' => 'post']]); ?>
            </th>
            <th class="borda" style="text-align: center; width: 50%">
                <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </th>
        </tr>
    </table>

    <?php ActiveForm::end(); ?>
