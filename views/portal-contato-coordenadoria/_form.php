<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $modelCoordenadoria app\models\DiariaCoordenadoria */
/* @var $model app\models\PortalContatoCoordenadoria */
/* @var $modelContato app\models\PortalContato */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="portal-contato-coordenadoria-form" style="text-align: left;">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
           <?=$form->field($model, 'id_coordenadoria')->dropDownList(
                ArrayHelper::map($modelCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'id_coordenadoria', 'nome'), ['prompt'=>'Selecione a Coordenadoria'])->label('Coordenadoria');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <?= $form->field($modelContato, 'con_ddd')->widget(MaskedInput::className(), [
                'mask' => '99',
            ]) ?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($modelContato, 'con_telefone')->widget(MaskedInput::className(), [
                'mask' => '9999 9999',
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'font-size: 13px']) ?>
        <?= Html::a('<span class="glyphicon"></span> Cancelar', ['/portal-contato-coordenadoria/index']);?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
