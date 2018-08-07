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
    .manutencao {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/manutencao.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     }
     .manutencao:hover {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/manutencaoHover.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     }
    .equipamentos {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/equipamentos.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     }
     .equipamentos:hover {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/equipamentosHover.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     } .vigilancia {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/vigilancia.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     }
     .vigilancia:hover {
         background:url('<?=Yii::$app->request->baseUrl . "../../image/vigilanciaHover.png"?>');
         background-size: 160px 190px;
         height:190px;
         width:160px;
         cursor:pointer;
         border-radius: 12px;
         margin-left:10%; margin-bottom: 10px; margin-top: 10px
     }
    .cadastrounico {
        background:url('<?=Yii::$app->request->baseUrl . "../../image/cadastro_unico.png"?>');
        background-size: 160px 190px;
        height:190px;
        width:160px;
        cursor:pointer;
        border-radius: 12px;
        margin-left:10%; margin-bottom: 10px; margin-top: 10px
    }
    .cadastrounico:hover {
        background:url('<?=Yii::$app->request->baseUrl . "../../image/cadastro_unico_Hover.png"?>');
        background-size: 160px 190px;
        height:190px;
        width:160px;
        cursor:pointer;
        border-radius: 12px;
        margin-left:10%; margin-bottom: 10px; margin-top: 10px
    }

</style>
</head>
    <table width="100%">
        <tr>
            <th>
                <?php echo Html::a('<div class="cadastrounico"></div>', ['/dados-unico-funcionario/index']) ?>
            </th>
            <th>
                <?php echo Html::a('<div class="coordenadoria"></div>', ['/portal-cordenadoria-gerencia-view/index']) ?>
            </th>
            <th>
                <?php echo Html::a('<div class="diarias"></div>', ['/diarias/index']) ?>
            </th>
            <th>
                <?php echo Html::a('<div class="equipamentos"></div>', ['/portal-equipamento/index']) ?>
            </th>
            <th>
                <?php echo Html::a('<div class="manutencao"></div>', ['/portal-manutencao/index']) ?>
            </th>
            <th>
                <?php echo Html::a('<div class="vigilancia"></div>', ['/termo-vigilancia-fiscalizacao/index']) ?>
            </th>
        </tr>
    </table>
