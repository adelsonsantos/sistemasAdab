<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProdutor */

$this->title = $model->vigilancia_fiscalizacao_produtor_id;
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Produtors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-produtor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vigilancia_fiscalizacao_produtor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vigilancia_fiscalizacao_produtor_id], [
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
            'vigilancia_fiscalizacao_produtor_id',
            'vigilancia_fiscalizacao_produtor_tipo_id',
            'vigilancia_fiscalizacao_produtor_cpf',
            'vigilancia_fiscalizacao_produtor_cnpj',
            'vigilancia_fiscalizacao_produtor_svo',
        ],
    ]) ?>

</div>
