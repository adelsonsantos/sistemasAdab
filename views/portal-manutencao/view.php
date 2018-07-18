<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalManutencao */

$this->title = $model->manutencao_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Manutencaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-manutencao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->manutencao_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->manutencao_id], [
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
            'manutencao_id',
            'tombo_id',
            'manutencao_data_recebimento',
            'manutencao_pessoa_recebimento_inf',
            'manutencao_beneficiario',
            'manutencao_data_devolucao',
            'manutencao_func_devolucao_inf',
            'manutencao_beneficiario_devolucao',
            'manutencao_descricao',
            'manutencao_resolucao',
            'manutencao_status',
        ],
    ]) ?>

</div>
