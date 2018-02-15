<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\RedaFichaInscricao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reda-ficha-inscricao-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-7">
                            <?= $form->field($model, 'NOM_CANDIDATO')->textInput() ?>
                        </div>
                        <div class="col-sm-2">
                            <?= $form->field($model, "DTC_NASCIMENTO")->widget(
                                DatePicker::className(), [
                                'inline' => false,
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd/mm/yyyy'
                                ]
                            ]); ?>
                        </div>
                            <div class="col-sm-3">
                                <?= $form->field($model, 'NUM_CPF')->widget(MaskedInput::className(), [
                                    'mask' => '999.999.999-99',
                                ]) ?>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <?= $form->field($model, 'NUM_RG')->widget(MaskedInput::className(), [
                                'mask' => '99.999.999-99',
                            ]) ?>
                        </div>

                        <div class="col-sm-3">
                            <?= $form->field($model, 'NOM_ORGAO_EMISSOR')->textInput() ?>
                        </div>

                        <div class="col-sm-3">
                            <?= $form->field($model, 'DES_RACA')->dropDownList(
                                    [
                                            'Amarela' => 'Amarela',
                                            'Branca' => 'Branca',
                                            'Indígena' => 'Indígena',
                                            'Parda' => 'Parda',
                                            'Preta' => 'Preta',
                                            'Outros' => 'Outros',
                                    ]
                                )
                            ?>
                        </div>

                        <div class="col-sm-3">
                            <?= $form->field($model, 'DES_ESTADO_CIVIL')->dropDownList(
                                [
                                    'Solteiro' => 'Solteiro',
                                    'Casado' => 'Casado',
                                    'Divorciado' => 'Divorciado',
                                    'Viúvo' => 'Viúvo',
                                    'União Estável' => 'União Estável',
                                    'Outros' => 'Outros',
                                ]
                            )
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <?= $form->field($model, 'STS_DEFICIENTE_FISICO')->textInput() ?>

                        <?= $form->field($model, 'DES_DEFICIENCIA')->textInput() ?>

                        <?= $form->field($model, 'STS_FILHOS')->textInput() ?>

                        <?= $form->field($model, 'QTD_FILHOS')->textInput() ?>
                    </div>
                    <br>

                <div class="row">
                    <div class="col-sm-8">
                        <?= $form->field($model, 'DES_ENDERECO')->textInput() ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'NOM_BAIRRO')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($model, 'NUM_CEP')->widget(MaskedInput::className(), [
                            'mask' => '99999-999',
                        ]) ?>
                    </div>
                    <div class="col-sm-5">
                        <?= $form->field($model, 'NOM_CIDADE')->textInput() ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'NOM_ESTADO')->dropDownList(
                            [
                                'AC' => 'Acre',
                                'AL' => 'Alagoas',
                                'AP' => 'Amapá',
                                'AM' => 'Amazonas',
                                'BA' => 'Bahia',
                                'CE' => 'Ceará',
                                'DF' => 'Distrito Federal',
                                'ES' => 'Espírito Santo',
                                'GO' => 'Goiás',
                                'MA' => 'Maranhão',
                                'MT' => 'Mato Grosso',
                                'MG' => 'Minas Gerais',
                                'PA' => 'Pará',
                                'PB' => 'Paraíba',
                                'PR' => 'Paraná',
                                'PE' => 'Pernambuco',
                                'PI' => 'Piauí',
                                'RJ' => 'Rio de Janeiro',
                                'RN' => 'Rio Grande do Norte',
                                'RS' => 'Rio Grande do Sul',
                                'RO' => 'Rondônia',
                                'RR' => 'Rorâima',
                                'SC' => 'Santa Catarina',
                                'SP' => 'São Paulo',
                                'SE' => 'Sergipe',
                                'TO' => 'Tocantins',
                            ]
                        )
                        ?>
                    </div>
                </div>
            </div>
        </div>






    <?= $form->field($model, 'NOM_ESTADO')->textInput() ?>

    <?= $form->field($model, 'NUM_TELEFONE01')->textInput() ?>

    <?= $form->field($model, 'NUM_TELEFONE02')->textInput() ?>

    <?= $form->field($model, 'DES_EMAIL')->textInput() ?>

    <?= $form->field($model, 'DTC_CADASTRO')->textInput() ?>

    <?= $form->field($model, 'STS_APROVADO')->textInput() ?>

    <?= $form->field($model, 'NUM_CNH')->textInput() ?>

    <?= $form->field($model, 'TIP_CATEGORIA')->textInput() ?>

    <?= $form->field($model, 'DTC_VALIDADE_CNH')->textInput() ?>

    <?= $form->field($model, 'COD_CARGO_CURSO_PROCESSO')->textInput() ?>

    <?= $form->field($model, 'DES_CARGO_CURSO_PROCESSO')->textInput() ?>

    <?= $form->field($model, 'DES_RACA')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
