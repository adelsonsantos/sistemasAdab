<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimal */

$this->title = $model->vigilancia_fiscalizacao_populacao_animal_id;
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Populacao Animals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-populacao-animal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vigilancia_fiscalizacao_populacao_animal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vigilancia_fiscalizacao_populacao_animal_id], [
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
            'vigilancia_fiscalizacao_populacao_animal_id',
            'vigilancia_fiscalizacao_id',
            'vigilancia_fiscalizacao_faixa_etaria_id',
            'vigilancia_fiscalizacao_populacao_animal_machos_nascidos',
            'vigilancia_fiscalizacao_populacao_animal_machos_mortos',
            'vigilancia_fiscalizacao_populacao_animal_machos_existentes',
            'vigilancia_fiscalizacao_populacao_animal_machos_vacinados',
            'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas',
            'vigilancia_fiscalizacao_animal_campos_femeas_mortos',
            'vigilancia_fiscalizacao_populacao_animal_femeas_existentes',
            'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas',
            'vigilancia_fiscalizacao_populacao_animal_quantidade',
            'vigilancia_fiscalizacao_populacao_animal_st',
            'vigilancia_fiscalizacao_animal_id',
        ],
    ]) ?>

</div>
