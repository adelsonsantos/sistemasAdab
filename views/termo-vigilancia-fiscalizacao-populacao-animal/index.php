<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Termo Vigilancia Fiscalizacao Populacao Animals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-populacao-animal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Termo Vigilancia Fiscalizacao Populacao Animal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vigilancia_fiscalizacao_populacao_animal_id',
            'vigilancia_fiscalizacao_id',
            'vigilancia_fiscalizacao_faixa_etaria_id',
            'vigilancia_fiscalizacao_populacao_animal_machos_nascidos',
            'vigilancia_fiscalizacao_populacao_animal_machos_mortos',
            //'vigilancia_fiscalizacao_populacao_animal_machos_existentes',
            //'vigilancia_fiscalizacao_populacao_animal_machos_vacinados',
            //'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas',
            //'vigilancia_fiscalizacao_animal_campos_femeas_mortos',
            //'vigilancia_fiscalizacao_populacao_animal_femeas_existentes',
            //'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas',
            //'vigilancia_fiscalizacao_populacao_animal_quantidade',
            //'vigilancia_fiscalizacao_populacao_animal_st',
            //'vigilancia_fiscalizacao_animal_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
