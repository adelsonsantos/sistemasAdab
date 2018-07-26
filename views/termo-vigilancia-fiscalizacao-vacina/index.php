<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoVacinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Termo Vigilancia Fiscalizacao Vacinas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-vacina-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Termo Vigilancia Fiscalizacao Vacina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vigilancia_fiscalizacao_vacina_id',
            'vigilancia_fiscalizacao_febre_aftosa_revenda',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda',
            'vigilancia_fiscalizacao_brucelose_revenda',
            'vigilancia_fiscalizacao_outros_revenda',
            //'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal',
            //'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal',
            //'vigilancia_fiscalizacao_brucelose_nota_fiscal',
            //'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id',
            //'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id',
            //'vigilancia_fiscalizacao_brucelose_laboratorio_id',
            //'vigilancia_fiscalizacao_outros_laboratorio_id',
            //'vigilancia_fiscalizacao_febre_aftosa_partida',
            //'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida',
            //'vigilancia_fiscalizacao_brucelose_partida',
            //'vigilancia_fiscalizacao_outros_partida',
            //'vigilancia_fiscalizacao_febre_aftosa_validade',
            //'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade',
            //'vigilancia_fiscalizacao_brucelose_validade',
            //'vigilancia_fiscalizacao_outros_validade',
            //'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao',
            //'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao',
            //'vigilancia_fiscalizacao_brucelose_data_vacinacao',
            //'vigilancia_fiscalizacao_outros_data_vacinacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
