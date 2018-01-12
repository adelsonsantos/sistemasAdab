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

/* @var $this yii\web\View */
use app\models\RedaProcessoSeletivo;
use kartik\form\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/* @var $searchModel app\models\RedaFichaInscricaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<table class="menu" style="width: 100%; margin-top: -110px">
    <tr class="bordaMenu">
        <th> <img src="<?php echo Yii::$app->request->baseUrl . '../../image/bahia.png'; ?>" style="width: 150px; margin-left:10%; margin-bottom: 10px; margin-top: 10px"></th>
        <th style="text-align: center"><h5 style="margin-right: 30px; font-size: 200%;"><strong><i> <?php echo "PROCESSO SELETIVO SIMPLIFICADO - REDA"; ?> </i></strong></h5></th>
        <th> <img src="<?php echo Yii::$app->request->baseUrl . '../../image/adab.png'; ?>" style="width: 90px; margin-left:10%; margin-bottom: 10px; margin-top: 10px"></th>
    </tr>
</table>

<table class="diaria">
    <tr>
        <td class="borda" style="text-align: center"><h5 style="margin-right: 30px; font-size: 100%;"><strong><i> <?php echo "ORIENTAÇÃO PARA INSCRIÇÃO"; ?> </i></strong></h5></td>
    </tr>
</table>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-body">
            <div class="row" >
                <p style="text-align: center">Atenção quanto ao preenchimento dos dados cadastrais antes de CONFIRMAR a inscrição.</p>
                <p style="text-align: center">  Somente será permitida uma inscrição para cada candidato(a).</p>
            </div>
            <hr>
            <div class="row">
                <strong><p>INSCRIÇÕES VIA INTERNET</p></strong>
                <p>1 - Preencher os dados eletrônicos do CADASTRO PARA INSCRIÇÃO.</p>
                <p>2 - Enviar a FICHA DE INSCRIÇÃO OBRIGATÓRIA devidamente PREENCHIDA.</p>
                <p>3 - A inscrição somente será confirmada se o(a) candidato(a) preencher de forma completa e correta e assinalar todos os campos.</p>
            </div>
            <br>
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <?= $form->field($model, 'IDE_PROCESSO_SELETIVO')->dropDownList(
                    ArrayHelper::map(RedaProcessoSeletivo::find()->asArray()->where(['STS_LIBERADO' => 1])->all(), 'IDE_PROCESSO_SELETIVO', 'DES_PROCESSO_SELETIVO'))->label('Selecione o Processo Seletivo desejado: ')
                ?>
            </div>
            <br>
            <div class="row" style="text-align: center">
                <?= Html::submitButton('PROSSEGUIR COM A INSCRIÇÃO', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>