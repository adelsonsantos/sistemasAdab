<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoGerencia */
/* @var $modelGerencia app\models\PortalGerencia */
/* @var $modelContato app\models\PortalContato */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="jumbotron">
    <div class="portal-contato-gerencia-form" style="text-align: left;">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-sm-6">
                <?=$form->field($model, 'ger_id')->dropDownList(
                    ArrayHelper::map($modelGerencia::find()->asArray()->orderBy('ger_nome')->all(), 'ger_id', 'ger_nome'), ['prompt'=>'Selecione a Gerência'])->label('Gerência');
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
            <?= Html::a('<span class="glyphicon"></span> Cancelar', ['/portal-contato-gerencia/index']);?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
