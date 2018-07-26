<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAtividade */

$this->title = $model->vigilancia_fiscalizacao_atividade_id;
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-atividade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vigilancia_fiscalizacao_atividade_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vigilancia_fiscalizacao_atividade_id], [
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
            'vigilancia_fiscalizacao_atividade_id',
            'vigilancia_fiscalizacao_atividade_nome',
            'vigilancia_fiscalizacao_atividade_st',
        ],
    ]) ?>

</div>
