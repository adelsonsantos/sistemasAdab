<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoPessoaJuridica */

$this->title = $model->pessoa_id;
$this->params['breadcrumbs'][] = ['label' => 'Dados Unico Pessoa Juridicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-unico-pessoa-juridica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pessoa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pessoa_id], [
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
            'pessoa_id',
            'pessoa_juridica_cnpj',
            'pessoa_juridica_nm_fantasia',
            'pessoa_juridica_insc_mun',
            'pessoa_juridica_insc_est',
            'pessoa_juridica_dt_abertura',
            'pessoa_juridica_contato',
            'pessoa_juridica_fornecedor',
        ],
    ]) ?>

</div>
