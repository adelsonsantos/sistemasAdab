<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RedaFichaInscricao */

$this->title = $model->IDE_FICHA_INSCRICAO;
$this->params['breadcrumbs'][] = ['label' => 'Reda Ficha Inscricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reda-ficha-inscricao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDE_FICHA_INSCRICAO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDE_FICHA_INSCRICAO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDE_FICHA_INSCRICAO',
            'IDE_PROCESSO_SELETIVO',
            'NOM_CANDIDATO',
            'DTC_NASCIMENTO',
            'NUM_CPF',
            'NUM_RG',
            'NOM_ORGAO_EMISSOR',
            'DES_ESTADO_CIVIL',
            'STS_DEFICIENTE_FISICO',
            'DES_DEFICIENCIA',
            'STS_FILHOS',
            'QTD_FILHOS',
            'DES_ENDERECO',
            'NOM_BAIRRO',
            'NUM_CEP',
            'NOM_CIDADE',
            'NOM_ESTADO',
            'NUM_TELEFONE01',
            'NUM_TELEFONE02',
            'DES_EMAIL:email',
            'DTC_CADASTRO',
            'STS_APROVADO',
            'NUM_CNH',
            'TIP_CATEGORIA',
            'DTC_VALIDADE_CNH',
            'COD_CARGO_CURSO_PROCESSO',
            'DES_CARGO_CURSO_PROCESSO',
            'DES_RACA',
        ],
    ]) ?>

</div>
