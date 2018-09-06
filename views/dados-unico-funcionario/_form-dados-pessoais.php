<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $modelNivelTecnico app\models\DadosUnicoNivelTecnico */
/* @var $modelPessoaFisica app\models\DadosUnicoPessoaFisica */
/* @var $modelPessoa app\models\DadosUnicoPessoa */

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="col">
            <div class="col-lg-3">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_cpf')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '999.999.999-99',
                ]) ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_dt_nasc')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '99/99/9999',
                ]) ?>


            </div>
            <div class="col-lg-4">
                <?= $form->field($modelPessoa, 'pessoa_nm')->textInput() ?>

            </div>
            <div class="col-lg-2">

                <?php
                echo $form->field($modelPessoaFisica, 'pessoa_fisica_sexo')->dropDownList(
                    ['M' => 'Masculino', 'F' => 'Feminino',]
                ); ?>
            </div>
        </div>
        <div class="row"></div>
        <div class="col">
            <div class="col-lg-3">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_rg')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '99.999.999-99',
                ]) ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_rg_orgao')->textInput() ?>

            </div>
            <div class="col-lg-1">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_rg_uf')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoEstado::find()->asArray()->orderBy(['estado_uf' => SORT_ASC])->all(), 'estado_uf', 'estado_uf'))
                ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_rg_dt')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '99/99/9999',
                ]) ?>

            </div>
            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_grupo_sanguineo')->dropDownList(
                    [
                        'A+' => 'Tipo A+',
                        'A-' => 'Tipo A-',
                        'AB+' => 'Tipo AB+',
                        'AB-' => 'Tipo AB-',
                        'B+' => 'Tipo B+',
                        'B-' => 'Tipo B-',
                        'O+' => 'Tipo O+',
                        'O-' => 'Tipo O-'

                    ], ['prompt' => 'Selecione']
                )
                ?>
            </div>
            <div class="col-lg-1">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_filho')->textInput() ?>

            </div>
            <div class="col-lg-1">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_filha')->textInput() ?>

            </div>
        </div>

        <div class="col">


            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'estado_civil_id')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoEstadoCivil::find()->asArray()->orderBy(['estado_civil_ds' => SORT_ASC])->all(), 'estado_civil_id', 'estado_civil_ds'),
                    ['prompt' => 'Selecione'])

                ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'nivel_escolar_id')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoNivelEscolar::find()->asArray()->orderBy(['nivel_escolar_ds' => SORT_ASC])->all(), 'nivel_escolar_id', 'nivel_escolar_ds'),
                    ['prompt' => 'Selecione'])

                ?>
            </div>
            <div class="col-lg-1">
                <?= $form->field($modelNivelTecnico, 'nivel_tecnico_semestre')->textInput() ?>

            </div>
            <div class="col-lg-2">
                <?= $form->field($modelNivelTecnico, 'nivel_tecnico_curso_ds')->textInput() ?>

            </div>
            <div class="col-lg-3">
                <?= $form->field($modelNivelTecnico, 'nivel_tecnico_instituicao_ds')->textInput() ?>

            </div>
            <div class="col-lg-2">
                <?= $form->field($modelNivelTecnico, 'nivel_tecnico_conselho')->textInput() ?>

            </div>

        </div>

        <div class="col">
            <div class="col-lg-3">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_nm_pai')->textInput() ?>

            </div>
            <div class="col-lg-3">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_nm_mae')->textInput() ?>

            </div>
            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_nacionalidade')->dropDownList(
                    ['BRASIL' => 'BRASIL',]
                ) ?>
            </div>


            <div class="col-lg-3">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_naturalidade_uf')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoEstado::find()->asArray()->orderBy(['estado_uf' => SORT_ASC])->all(), 'estado_uf', 'estado_uf'),
                    [
                        'prompt' => 'Selecione o Estado',
                        'onchange' => '
            $.get( "' . Url::toRoute('/dados-unico-funcionario/get-municipio') . '", { id: $(this).val() } )
            .done(function( data ) {
            $( "#' . Html::getInputId($modelPessoaFisica, 'pessoa_fisica_naturalidade') . '" ).html( data );
            }
            );
            '
                    ]
                ) ?>
            </div>

            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_naturalidade')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => $modelPessoaFisica->pessoa_fisica_naturalidade])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'),
                    [
                        'prompt' => 'Selecione o Minicípio'
                    ]) ?>
            </div>

        </div>
        <div class="clearfix">
        </div>

    </div>
</div>

<table>
    <tr>
        <th>
            Dados Adicionais
        </th>
    </tr>

</table>
<div class="panel panel-default">
    <div class="panel panel-heading">

        <div class="col">


            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_titulo')->textInput() ?>

            </div>

            <div class="col-lg-1">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_titulo_zona')->textInput() ?>

            </div>

            <div class="col-lg-1">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_titulo_secao')->textInput() ?>

            </div>
            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_titulo_uf')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoEstado::find()->asArray()->orderBy(['estado_uf' => SORT_ASC])->all(), 'estado_uf', 'estado_uf'),
                    [
                        'prompt' => 'Selecione o Estado',
                        'onchange' => '
            $.get( "' . Url::toRoute('/dados-unico-funcionario/get-municipio') . '", { id: $(this).val() } )
            .done(function( data ) {
            $( "#' . Html::getInputId($modelPessoaFisica, 'pessoa_fisica_titulo_cidade') . '" ).html( data );
            }
            );
            '
                    ]
                ) ?>
            </div>
            <div class="col-lg-3" style="margin-top: 5px">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_titulo_cidade')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => $modelPessoaFisica->pessoa_fisica_titulo_cidade])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'),
                    [
                        'prompt' => 'Selecione o Minicípio'
                    ])->label('') ?>
            </div>
            <div>
                <div class="col-lg-2">
                    <?= $form->field($modelPessoaFisica, 'pessoa_fisica_cnh')->textInput() ?>

                </div>

            </div>
            <div>
                <div class="col-lg-1">
                    <?= $form->field($modelPessoaFisica, 'pessoa_fisica_cnh_categoria')->textInput() ?>

                </div>
            </div>
            <div class="col-lg-2">
                <?php
                echo $form->field($modelPessoaFisica, 'pessoa_fisica_cnh_lente_corretiva')->dropDownList(
                    [1 => 'Sim', 0 => 'Não',]
                ); ?>
            </div>

            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_passaporte')->textInput() ?>

            </div>

            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_reservista')->textInput() ?>

            </div>
            <div class="col-lg-1">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_reservista_uf')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoEstado::find()->asArray()->orderBy(['estado_uf' => SORT_ASC])->all(), 'estado_uf', 'estado_uf'))
                ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($modelPessoaFisica, 'pessoa_fisica_reservista_ministerio')->dropDownList(
                    [
                        'Aeronáutica' => 'Aeronáutica',
                        'Exército'=>'Exército',
                        'Marinha'=> 'Marinha'


                    ], ['prompt' => 'Selecione']
                )
                ?>
            </div>

        </div>
        <div class="clearfix">
        </div>
    </div>
</div>

