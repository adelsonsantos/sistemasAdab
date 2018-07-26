<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacao */

$this->title = $model->vigilancia_fiscalizacao_id;
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vigilancia_fiscalizacao_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vigilancia_fiscalizacao_id], [
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
            'vigilancia_fiscalizacao_id',
            'coordenadas_id',
            'gerencia_id',
            'municipio_id',
            'data_create',
            'vigilancia_fiscalizacao_veiculo_id',
            'vigilancia_fiscalizacao_status_id',
            'vigilancia_fiscalizacao_vacina_id',
            'vigilancia_fiscalizacao_observacao',
            'vigilancia_fiscalizacao_produtor_id',
            'vigilancia_fiscalizacao_proprietario_id',
            'vigilancia_fiscalizacao_local_id',
        ],
    ]) ?>

</div>
