<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $modelNivelTecnico app\models\DadosUnicoNivelTecnico */
/* @var $modelPessoaFisica app\models\DadosUnicoPessoaFisica */
/* @var $modelPessoa app\models\DadosUnicoPessoa */
/* @var $modelEndereco app\models\DadosUnicoEndereco */
/* @var $modelTelefone app\models\DadosUnicoTelefone */
/* @var $modelFuncionario app\models\DadosUnicoFuncionario */
/* @var $modelUnidadeLotacao app\models\DadosUnicoEstOrganizacionalFuncionario */
/* @var $modelDadosBancarios app\models\DadosUnicoDadosBancarios */
/* @var $modelFuncionarioArquivo app\models\DadosUnicoFuncionarioArquivo */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="col-lg-2">
            <?= $form->field($modelFuncionario, 'funcionario_tipo_id')->dropDownList(
                ArrayHelper::map(\app\models\DadosUnicoFuncionarioTipo::find()->orderBy(['funcionario_tipo_ds' => SORT_ASC])->all(), 'funcionario_tipo_id', 'funcionario_tipo_ds'))
            ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($modelFuncionario, 'funcionario_matricula')->textInput() ?>

        </div>

        <div class="col-lg-2">
            <?= $form->field($modelFuncionario, 'funcionario_dt_admissao')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99/99/9999',
            ]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($modelFuncionario, 'funcionario_dt_demissao')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99/99/9999',
            ]) ?>

        </div>
        <div class="col-lg-3">
            <?= $form->field($modelFuncionario, 'funcionario_email')->textInput() ?>

        </div>

        <div class="col">
            <div class="col-lg-3">
                <?= $form->field($modelUnidadeLotacao, 'est_organizacional_id')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoEstOrganizacional::find()->orderBy(['est_organizacional_sigla' => SORT_ASC])->all(), 'est_organizacional_id', 'est_organizacional_sigla'), ['prompt' => 'Selecione'])
                ?>
            </div>


            <div class="col-lg-3">
                <?= $form->field($modelFuncionario, 'est_organizacional_lotacao_id')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoEstOrganizacionalLotacao::find()->where(['est_organizacional_lotacao_st' => 0])->orderBy(['est_organizacional_lotacao_sigla' => SORT_ASC])->all(), 'est_organizacional_lotacao_id', 'est_organizacional_lotacao_sigla'), ['prompt' => 'Selecione'])
                ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($modelFuncionario, 'funcionario_orgao_origem')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoOrgao::find()->where(['orgao_st' => 0])->orderBy(['orgao_ds' => SORT_ASC])->all(), 'orgao_id', 'orgao_ds'), ['prompt' => 'Selecione'])
                ?>
            </div>

            <div class="col-lg-3">
                <?= $form->field($modelFuncionario, 'funcionario_orgao_destino')->dropDownList(
                    ArrayHelper::map(\app\models\DadosUnicoOrgao::find()->where(['orgao_st' => 0])->orderBy(['orgao_ds' => SORT_ASC])->all(), 'orgao_id', 'orgao_ds'), ['prompt' => 'Selecione'])
                ?>
            </div>
        </div>
        <div class="row">

        </div>
        <div class="col-lg-3">
            <?= $form->field($modelFuncionario, 'cargo_temporario')->dropDownList(
                ArrayHelper::map(\app\models\DadosUnicoCargo::find()->where(['funcionario_tipo_id' => 2])->orderBy(['cargo_ds' => SORT_ASC])->all(), 'cargo_id', 'cargo_ds'), ['prompt' => 'Selecione'])
            ?>

        </div>

        <div class="col-lg-3">
            <?= $form->field($modelFuncionario, 'cargo_permanente')->dropDownList(
                ArrayHelper::map(\app\models\DadosUnicoCargo::find()->where(['funcionario_tipo_id' => 1])->orderBy(['cargo_ds' => SORT_ASC])->all(), 'cargo_id', 'cargo_ds'), ['prompt' => 'Selecione'])
            ?>

        </div>

        <div class="col-lg-2">

            <?php
            echo $form->field($modelFuncionario, 'funcionario_onus')->dropDownList(
                [1 => 'Sim', 0 => 'Não',]
            ); ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($modelPessoaFisica, 'pessoa_fisica_clt')->textInput() ?>

        </div>

        <div class="col-lg-2">
            <?= $form->field($modelPessoaFisica, 'pessoa_fisica_clt_serie')->textInput() ?>

        </div>

        <div class="col-lg-1">
            <?= $form->field($modelPessoaFisica, 'pessoa_fisica_clt_uf')->dropDownList(
                ArrayHelper::map(\app\models\DadosUnicoEstado::find()->asArray()->orderBy(['estado_uf' => SORT_ASC])->all(), 'estado_uf', 'estado_uf'))
            ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($modelPessoaFisica, 'pessoa_fisica_pis')->textInput() ?>

        </div>

        <div class="col-lg-2">
            <?= $form->field($modelFuncionario, 'funcionario_conta_fgts')->textInput() ?>

        </div>

        <div class="col-lg-3">
            <?= $form->field($modelDadosBancarios, 'dados_bancarios_id')->dropDownList(
                ArrayHelper::map(\app\models\DadosUnicoBanco::find()->asArray()->orderBy(['banco_ds' => SORT_ASC])->all(), 'banco_id', 'banco_ds'),
                ['prompt' => 'Selecione'])

            ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($modelDadosBancarios, 'dados_bancarios_agencia')->textInput() ?>

        </div>

        <div class="col-lg-2">
            <?= $form->field($modelDadosBancarios, 'dados_bancarios_conta')->textInput() ?>

        </div>

        <div class="col-lg-3">
            <?= $form->field($modelDadosBancarios, 'dados_bancarios_conta_tipo')->dropDownList(
                [
                    'C' => 'Conta Corrente',
                    'P' => 'Conta Poupança'

                ], ['prompt' => 'Selecione']
            )
            ?>
        </div>


        <div class="clearfix">

        </div>
    </div>
</div>

<table>
    <tr>
        <th>
            Arquivo Físico
        </th>
    </tr>

</table>
<div class="panel panel-default">
    <div class="panel panel-heading">


        <div class="col-lg-2">
            <?= $form->field($modelFuncionarioArquivo, 'documento')->textInput() ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($modelFuncionarioArquivo, 'armario')->textInput() ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($modelFuncionarioArquivo, 'gaveta')->textInput() ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($modelFuncionarioArquivo, 'pasta')->textInput() ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($modelFuncionarioArquivo, 'posicao')->textInput() ?>
        </div>
        <div class="clearfix">

        </div>

    </div>

</div>
