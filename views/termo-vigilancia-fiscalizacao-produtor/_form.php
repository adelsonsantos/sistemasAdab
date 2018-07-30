<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProdutor */
/* @var $form yii\widgets\ActiveForm */
require 'style.php';
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?= $model->isNewRecord ? 'Cadastrar' : 'Alterar' ?>
            produtor</h1>
    </div>
</div>
<div class="grid">
    <?php $form = ActiveForm::begin(); ?>
    <div class="diarias-view" style="margin-left: 209px;  ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon glyphicon-plus"></div>
                    Produtor da Vigilância e Fiscalização
                </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-3">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_nome')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_tipo_id')->dropDownList(
                            [1 => 'CPF', 2 => 'CNPJ'],
                            [
                                'onchange' => '                                
                                if(this.value == 1){
                                    document.getElementById("field-cnpj").style.display = "none";
                                    document.getElementById("field-cpf").style.display = "block";
                                    document.getElementById("termovigilanciafiscalizacaoprodutor-vigilancia_fiscalizacao_produtor_cpf").value = null;                                    
                                }else{
                                    document.getElementById("field-cpf").style.display = "none";
                                    document.getElementById("field-cnpj").style.display = "block";
                                    document.getElementById("termovigilanciafiscalizacaoprodutor-vigilancia_fiscalizacao_produtor_cnpj").value = null;
                                }
                                '
                            ]
                        ); ?>
                    </div>
                    <div class="col-lg-2" id="field-cpf">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_cpf')->widget(MaskedInput::className(), [
                            'mask' => '999.999.999-99',
                        ]); ?>
                    </div>
                    <div class="col-lg-2" id="field-cnpj">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_cnpj')->widget(MaskedInput::className(), [
                            'mask' => '99.999.999/9999-99',
                        ]); ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_svo')->textInput(['maxlength' => true]) ?>
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
    <script>
        document.getElementById("field-cnpj").style.display = "none";
        document.getElementById("field-cpf").style.display = "block";
    </script>
    <?php
    if(isset($model->vigilancia_fiscalizacao_produtor_tipo_id) && $model->vigilancia_fiscalizacao_produtor_tipo_id == 2){?>
        <script>
            document.getElementById("field-cnpj").style.display = "block";
            document.getElementById("field-cpf").style.display = "none";
        </script>
    <?php }?>
