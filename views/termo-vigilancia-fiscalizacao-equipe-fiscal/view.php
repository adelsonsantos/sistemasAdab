<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoEquipeFiscal */

$this->title = $model->vigilancia_fiscalizacao_equipe_fiscal_id;
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Equipe Fiscals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-equipe-fiscal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vigilancia_fiscalizacao_equipe_fiscal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vigilancia_fiscalizacao_equipe_fiscal_id], [
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
            'vigilancia_fiscalizacao_equipe_fiscal_id',
            'pessoa_id',
            'vigilancia_fiscalizacao_id',
        ],
    ]) ?>

</div>
