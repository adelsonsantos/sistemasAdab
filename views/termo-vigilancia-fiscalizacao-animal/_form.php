<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimal */
/* @var $form yii\widgets\ActiveForm */
require 'style.php';
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?= $model->isNewRecord ? 'Cadastrar' : 'Alterar' ?>
            animal</h1>
    </div>
</div>
<div class="grid">
    <?php $form = ActiveForm::begin(); ?>
    <div class="diarias-view" style="margin-left: 209px;  ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon glyphicon-plus"></div>
                    Animal da Vigilância e Fiscalização
                </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-5">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_animal_nome')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_animal_st')->dropDownList(
                            [1 => 'Ativo', 2 => 'Inativo']); ?>
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