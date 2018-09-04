<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $modelNivelTecnico app\models\DadosUnicoNivelTecnico */
/* @var $modelPessoaFisica app\models\DadosUnicoPessoaFisica */
/* @var $modelPessoa app\models\DadosUnicoPessoa */
/* @var $modelEndereco app\models\DadosUnicoEndereco */

?>
<div class="panel panel-default">
    <div class="panel-heading">

        <div class="col">
            <div class="col-lg-2">
                <?= $form->field($modelEndereco, 'estado_uf')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoEstado::find()->asArray()->orderBy(['estado_uf' => SORT_ASC])->all(), 'estado_uf', 'estado_uf'),
                    [
                        'prompt' => 'Selecione o Estado',
                        'onchange' => '
            $.get( "' . Url::toRoute('/dados-unico-funcionario/get-municipio') . '", { id: $(this).val() } )
            .done(function( data ) {
            $( "#' . Html::getInputId($modelEndereco, 'municipio_cd') . '" ).html( data );
            }
            );
            '
                    ]
                ) ?>
            </div>

            <div class="col-lg-2">
                <?= $form->field($modelEndereco, 'municipio_cd')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => $modelEndereco->municipio_cd])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'),
                    [
                        'prompt' => 'Selecione o Minicípio'
                    ]) ?>
            </div>

        </div>
        <div>
            <div class="col-lg-4">
                <?= $form->field($modelEndereco, 'endereco_bairro')->textInput() ?>

            </div>

            <div>
                <div class="col-lg-2">
                    <?= $form->field($modelEndereco, 'endereco_cep')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '99999-999',
                    ]) ?>


                </div>
            </div>
            <div class="col-lg-4">
                <?= $form->field($modelEndereco, 'endereco_ds')->textInput() ?>

            </div>

            <div class="col-lg-1">
                <?= $form->field($modelEndereco, 'endereco_num')->textInput() ?>

            </div>


            <div class="col-lg-5">
                <?= $form->field($modelEndereco, 'endereco_complemento')->textInput() ?>

            </div>
            <div class="col-lg-6">
                <?= $form->field($modelEndereco, 'endereco_referencia')->textInput() ?>

            </div>

        </div>
        <div class="clearfix">
        </div>
    </div>
</div>

