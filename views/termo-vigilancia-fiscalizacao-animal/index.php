<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoAnimalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Termo Vigilancia Fiscalizacao Animals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-animal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Termo Vigilancia Fiscalizacao Animal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vigilancia_fiscalizacao_animal_id',
            'vigilancia_fiscalizacao_animal_nome',
            'vigilancia_fiscalizacao_animal_st',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
