<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Portal ADAB';
?>
<style>
     #imageDiaria {
        content:url(<?php echo Yii::$app->request->baseUrl . '../../image/iconDiarias.png'; ?>);
         margin-left: 30px;
        margin-bottom: auto;
        margin-top: 5px;
        transition: .5s ease;
        float: left;
    }
     #imageDiaria:hover {
         content:url(<?php echo Yii::$app->request->baseUrl . '../../image/iconDiariasComHover.png'; ?>);
         margin-left: 30px;
         margin-bottom: auto;
         margin-top: 5px;
         float: left;
         opacity: 1;
     }
    #imageCoordenadoria {
        content:url(<?php echo Yii::$app->request->baseUrl . '../../image/iconCoordenadoria.png'; ?>);
        margin-left: 30px;
        margin-bottom: auto;
        margin-top: 5px;
        transition: .5s ease;
        float: left;
    }
    #imageCoordenadoria:hover {
         content:url(<?php echo Yii::$app->request->baseUrl . '../../image/iconCoordenadoriaComHover.png'; ?>);
         margin-left: 30px;
         margin-bottom: auto;
         margin-top: 5px;
         float: left;
         opacity: 1;
    }
</style>

    <div class="jumbotron">
        <table>
            <tr>
                <th id="imageCoordenadoria" onclick="window.location.href = 'http://localhost/php/sistemasAdab/web/index.php/diaria-coordenadoria/index';">
                    <?php echo $link = Html::a('Coordenadoria', ['/diarias/index'], ['class'=>'btn btn-primary']) ?>
                </th>

                <th id="imageDiaria" onclick="window.location.href = 'http://localhost/php/sistemasAdab/web/index.php/diarias/index';">
                    <?php echo $link = Html::a('Diária', ['/diarias/index'], ['class'=>'btn btn-primary']) ?>
                </th>
            </tr>
        </table>
    </div>