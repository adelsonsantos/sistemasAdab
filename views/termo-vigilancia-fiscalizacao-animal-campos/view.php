<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimalCampos */

$this->title = $model->vigilancia_fiscalizacao_animal_campos_id;
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Animal Campos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-animal-campos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vigilancia_fiscalizacao_animal_campos_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vigilancia_fiscalizacao_animal_campos_id], [
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
            'vigilancia_fiscalizacao_animal_campos_id',
            'vigilancia_fiscalizacao_animal_id',
            'vigilancia_fiscalizacao_animal_campos_machos_nascidos:boolean',
            'vigilancia_fiscalizacao_animal_campos_machos_mortos:boolean',
            'vigilancia_fiscalizacao_animal_campos_machos_existentes:boolean',
            'vigilancia_fiscalizacao_animal_campos_machos_vacinados:boolean',
            'vigilancia_fiscalizacao_animal_campos_femeas_nascidas:boolean',
            'vigilancia_fiscalizacao_animal_campos_femeas_mortas:boolean',
            'vigilancia_fiscalizacao_animal_campos_femeas_existentes:boolean',
            'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas:boolean',
            'vigilancia_fiscalizacao_animal_campos_quantidade:boolean',
            'vigilancia_fiscalizacao_animal_campos_st',
        ],
    ]) ?>

</div>
