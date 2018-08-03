<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DadosUnicoPessoaJuridicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dados Unico Pessoa Juridicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-unico-pessoa-juridica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dados Unico Pessoa Juridica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pessoa_id',
            'pessoa_juridica_cnpj',
            'pessoa_juridica_nm_fantasia',
            'pessoa_juridica_insc_mun',
            'pessoa_juridica_insc_est',
            //'pessoa_juridica_dt_abertura',
            //'pessoa_juridica_contato',
            //'pessoa_juridica_fornecedor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
