<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RedaFichaInscricaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reda Ficha Inscricaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reda-ficha-inscricao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reda Ficha Inscricao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDE_FICHA_INSCRICAO',
            'IDE_PROCESSO_SELETIVO',
            'NOM_CANDIDATO',
            'DTC_NASCIMENTO',
            'NUM_CPF',
            //'NUM_RG',
            //'NOM_ORGAO_EMISSOR',
            //'DES_ESTADO_CIVIL',
            //'STS_DEFICIENTE_FISICO',
            //'DES_DEFICIENCIA',
            //'STS_FILHOS',
            //'QTD_FILHOS',
            //'DES_ENDERECO',
            //'NOM_BAIRRO',
            //'NUM_CEP',
            //'NOM_CIDADE',
            //'NOM_ESTADO',
            //'NUM_TELEFONE01',
            //'NUM_TELEFONE02',
            //'DES_EMAIL:email',
            //'DTC_CADASTRO',
            //'STS_APROVADO',
            //'NUM_CNH',
            //'TIP_CATEGORIA',
            //'DTC_VALIDADE_CNH',
            //'COD_CARGO_CURSO_PROCESSO',
            //'DES_CARGO_CURSO_PROCESSO',
            //'DES_RACA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
