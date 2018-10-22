<?php
require 'style.php';
use app\models\DiariaCoordenadoria;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;


/* @var $this yii\web\View */
/* @var $model app\models\DiariaCoordenadoria */
/* @var $form yii\widgets\ActiveForm */
?>
<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?=$model->isNewRecord ? 'Cadastrar' : 'Alterar'?> Coordenadoria <?= implode(ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->where(['id_coordenadoria' => $model->id_coordenadoria])->all(), 'nome', 'nome')) ?></h1>
    </div>
</div>
<div class="grid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="diarias-view" style="margin-left: 209px;  ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon glyphicon-th-large"></div>
                    Coordenadoria
                </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-3">
                        <?= $form->field($model, 'nome')->textInput();?>

                    </div>
                </div>
                <table class="diaria" style="width: 100%; margin-top: 30px;">
                    <tr class="bordaMenu" style="background-color: #d0d0d0">
                        <th class="borda" style="text-align: center; width: 50%">
                            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
                        </th>
                        <th class="borda" style="text-align: center; width: 50%">
                            <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
                        </th>
                    </tr>
                </table>

                <?php ActiveForm::end(); ?>
            </td>
        </table>
    </div>



