<?php
/* @var $this yii\web\View */
use yii\bootstrap\Button;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Portal ADAB';
?>
<head>
<style>
    .diarias {
        background:url('<?=Yii::$app->request->baseUrl . "../../image/diarias.png"?>');
        background-size: 160px 190px;
        height:190px;
        width:160px;
        cursor:pointer;
        border-radius: 12px;
        margin-left:10%; margin-bottom: 10px; margin-top: 10px
    }
     .diarias:hover {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/diariasHover.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     }

     .coordenadoria {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/coordenadorias.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     }
     .coordenadoria:hover {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/coordenadoriasHover.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     }
</style>
</head>
    <table width="30%">
        <tr>
            <th>
                <?php echo Html::a('<div class="coordenadoria"></div>', ['/portal-cordenadoria-gerencia-view/index']) ?>
            </th>
            <th>
                <?php echo Html::a('<div class="diarias"></div>', ['/diarias/index']) ?>
            </th>
        </tr>
    </table>
