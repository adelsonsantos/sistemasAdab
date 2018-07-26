<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoAnimalCamposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Termo Vigilancia Fiscalizacao Animal Campos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-animal-campos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Termo Vigilancia Fiscalizacao Animal Campos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vigilancia_fiscalizacao_animal_campos_id',
            'vigilancia_fiscalizacao_animal_id',
            'vigilancia_fiscalizacao_animal_campos_machos_nascidos:boolean',
            'vigilancia_fiscalizacao_animal_campos_machos_mortos:boolean',
            'vigilancia_fiscalizacao_animal_campos_machos_existentes:boolean',
            //'vigilancia_fiscalizacao_animal_campos_machos_vacinados:boolean',
            //'vigilancia_fiscalizacao_animal_campos_femeas_nascidas:boolean',
            //'vigilancia_fiscalizacao_animal_campos_femeas_mortos:boolean',
            //'vigilancia_fiscalizacao_animal_campos_existentes:boolean',
            //'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas:boolean',
            //'vigilancia_fiscalizacao_animal_campos_quantidade:boolean',
            //'vigilancia_fiscalizacao_animal_campos_st',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
