<?php
/* @var $this yii\web\View */
$this->title = 'Portal ADAB';
?>
<style>
     #image {
        content:url(<?php echo Yii::$app->request->baseUrl . '../../image/iconeFuncionario.png'; ?>);
        width: 150px;
        margin-left:auto;
        margin-bottom: auto;
        margin-top: 5px;
        transition: .5s ease;
    }​,
    #image:hover {
             content:url(<?php echo Yii::$app->request->baseUrl . '../../image/iconFuncionarioComHover.png'; ?>);
             width: 150px;
             margin-left:auto;
             margin-bottom: auto;
             margin-top: 5px;
             opacity: 1;
     }​
</style>
<div class="site-index">
    <div class="jumbotron">
        <table>
            <tr>
                <th><td id="image"></td></th>
            </tr>
        </table>
    </div>
</div>