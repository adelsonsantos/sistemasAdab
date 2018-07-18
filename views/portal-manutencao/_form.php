<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
require 'style.php';


/* @var $this yii\web\View */
/* @var $model app\models\PortalManutencao */
/* @var $form yii\widgets\ActiveForm */
?>
<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?=$model->isNewRecord ? 'Cadastrar' : 'Alterar'?> Manutenção </h1>
    </div>
</div>
<div class="grid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="diarias-view" style="margin-left: 209px;  ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon glyphicon glyphicon-wrench"></div>
                    Manutenção
                </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'tombo_id')->textInput()->label('Nome'); ?>
                    </div>

                    <div class="col-lg-2">
                        <?= $form->field($model, 'manutencao_data_recebimento')->textInput()->label('Quantidade'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'manutencao_pessoa_recebimento_inf')->textInput()->label('Setor'); ?>
                    </div>

                    <div class="col-lg-2">
                        <?= $form->field($model, 'manutencao_beneficiario')->dropDownList(
                            [1 => 'Ativo', 2 => 'Inativo']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'manutencao_data_devolucao')->textInput()->label('Nome'); ?>
                    </div>

                    <div class="col-lg-2">
                        <?= $form->field($model, 'manutencao_func_devolucao_inf')->textInput()->label('Quantidade'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'manutencao_beneficiario_devolucao')->textInput()->label('Setor'); ?>
                    </div>

                    <div class="col-lg-2">
                        <?= $form->field($model, 'manutencao_descricao')->dropDownList(
                            [1 => 'Ativo', 2 => 'Inativo']) ?>
                    </div>
                </div>

                <?= $form->field($model, 'manutencao_resolucao')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'manutencao_status')->textInput() ?>

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