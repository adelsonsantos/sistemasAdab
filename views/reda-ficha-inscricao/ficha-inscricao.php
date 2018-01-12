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

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RedaFichaInscricao */
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
        <td class="borda" style="text-align: center"><h5 style="margin-right: 30px; font-size: 100%;"><strong><i> <?php echo "CADASTRO PARA INSCRIÇÃO"; ?> </i></strong></h5></td>
    </tr>
</table>
<div class="reda-ficha-inscricao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
