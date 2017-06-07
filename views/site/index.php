<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Portal ADAB';
?>
<style>
     #image {
        content:url(<?php echo Yii::$app->request->baseUrl . '../../image/iconDiarias.png'; ?>);
        width: 150px;
        margin-left:auto;
        margin-bottom: auto;
        margin-top: 5px;
        transition: .5s ease;
    }​,
    #image:hover {
             content:url(<?php echo Yii::$app->request->baseUrl . '../../image/iconDiariasComHover.png'; ?>);
             width: 150px;
             margin-left:auto;
             margin-bottom: auto;
             margin-top: 5px;
             opacity: 1;
     },​
</style>

    <div class="jumbotron">
        <table>
            <tr>
                <th><td id="image" onclick="window.location.href = 'http://localhost/php/sistemasAdab/web/index.php?r=diarias/index';">
                    <?php echo $link = Html::a('label', ['/diarias/index'], ['class'=>'btn btn-primary']) ?>
                </td>
            </tr>
        </table>
    </div>