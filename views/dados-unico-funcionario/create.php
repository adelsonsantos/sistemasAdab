<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoFuncionario */
/* @var $modelPessoaFisica app\models\DadosUnicoPessoaFisica*/
/* @var $modelPessoa app\models\DadosUnicoPessoa*/
/* @var $modelNivelTecnico app\models\DadosUnicoNivelTecnico*/
/* @var $modelEndereco app\models\DadosUnicoEndereco*/
/* @var $modelsTelefone app\models\DadosUnicoTelefone*/
/* @var $modelFuncionario app\models\DadosUnicoFuncionario*/
/* @var $modelUnidadeLotacao  app\models\DadosUnicoEstOrganizacionalFuncionario*/
/* @var $modelDadosBancarios  app\models\DadosUnicoDadosBancarios*/
/* @var $modelFuncionarioArquivo  app\models\DadosUnicoFuncionarioArquivo*/


$this->params['breadcrumbs'][] = ['label' => 'Dados Unico Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-unico-funcionario-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelPessoaFisica'=> $modelPessoaFisica,
        'modelPessoa'=>$modelPessoa,
        'modelNivelTecnico'=>$modelNivelTecnico,
        'modelEndereco'=>$modelEndereco,
        'modelsTelefone' => (empty($modelsTelefone)) ? [new app\models\DadosUnicoTelefone] : $modelsTelefone,
        'modelFuncionario'=>$modelFuncionario,
        'modelUnidadeLotacao'=> $modelUnidadeLotacao,
        'modelDadosBancarios'=>$modelDadosBancarios,
        'modelFuncionarioArquivo'=>$modelFuncionarioArquivo
    ]) ?>

</div>
