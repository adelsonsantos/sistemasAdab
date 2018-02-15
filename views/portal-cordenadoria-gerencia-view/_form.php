<style>
    .font-topo {
        font-size: 20px;
        font-weight: bold;
    }

    .grid {
        margin-left: 209px;
    }

    #w0-filters {
        background-color: rgba(220, 222, 221, 0);
    }

    .table thead tr {
        background-color: #dcdedd;
    }

    .tambem {
        text-align: right;
    }

</style>

<?php

use app\models\DiariaCoordenadoria;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerencia */
/* @var $form yii\widgets\ActiveForm */
?>
<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Alterar contato da Coordenadoria: <?=implode(ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->where(['id_coordenadoria' => $model->id_coordenadoria])->all(), 'nome', 'nome')) ?></h1>
        <p class="font-topo" style="text-align: center">

        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong></strong></p>
    </div>
</div>
<div class="grid">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model,'id_coordenadoria')->label(false)->dropDownList(
                ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'id_coordenadoria', 'nome')); ?>
        </div>
    </div>

    <?= $form->field($model, 'id_coordenadoria')->textInput() ?>

    <?= $form->field($model, 'ger_id')->textInput() ?>

    <?= $form->field($model, 'con_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
