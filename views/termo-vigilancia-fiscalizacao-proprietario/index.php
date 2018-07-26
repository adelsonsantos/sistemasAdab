<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoProprietarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Termo Vigilancia Fiscalizacao Proprietarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-proprietario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Termo Vigilancia Fiscalizacao Proprietario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vigilancia_fiscalizacao_proprietario_id',
            'vigilancia_fiscalizacao_proprietario_tipo_id',
            'vigilancia_fiscalizacao_proprietario_cpf',
            'vigilancia_fiscalizacao_proprietario_cnpj',
            'vigilancia_fiscalizacao_proprietario_svo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
