<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimalCampos */
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
                    Campos do Animal da Vigilância e Fiscalização
                </th>
            </tr>
            <td>

                <div class="row">
                    <div class="col-lg-5">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_animal_id')->dropDownList(
                            ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoAnimal::find()->asArray()->orderBy('vigilancia_fiscalizacao_animal_nome')->all(), 'vigilancia_fiscalizacao_animal_id', 'vigilancia_fiscalizacao_animal_nome')) ?>
                    </div>
                </div>

                <div class="row">
                    <table class="diaria" style="margin-left: 6px">
                        <tr>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_nascidos')->checkbox() ?>
                            </td>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_nascidas')->checkbox() ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_mortos')->checkbox()?>
                            </td>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_mortas')->checkbox()?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_existentes')->checkbox()?>
                            </td>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_existentes')->checkbox()?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_vacinados')->checkbox()?>
                            </td>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas')->checkbox()?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_quantidade')->checkbox() ?>
                            </td>
                            <td>
                                <div class="col-lg-3">
                                <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_st')->dropDownList(
                                    [1 => 'Ativo', 2 => 'Inativo']);?>
                                </div>
                            </td>
                        </tr>
                    </table>

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