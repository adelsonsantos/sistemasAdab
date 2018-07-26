<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoVacina */

$this->title = $model->vigilancia_fiscalizacao_vacina_id;
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Vacinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-vacina-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vigilancia_fiscalizacao_vacina_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vigilancia_fiscalizacao_vacina_id], [
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
            'vigilancia_fiscalizacao_vacina_id',
            'vigilancia_fiscalizacao_febre_aftosa_revenda',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda',
            'vigilancia_fiscalizacao_brucelose_revenda',
            'vigilancia_fiscalizacao_outros_revenda',
            'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal',
            'vigilancia_fiscalizacao_brucelose_nota_fiscal',
            'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id',
            'vigilancia_fiscalizacao_brucelose_laboratorio_id',
            'vigilancia_fiscalizacao_outros_laboratorio_id',
            'vigilancia_fiscalizacao_febre_aftosa_partida',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida',
            'vigilancia_fiscalizacao_brucelose_partida',
            'vigilancia_fiscalizacao_outros_partida',
            'vigilancia_fiscalizacao_febre_aftosa_validade',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade',
            'vigilancia_fiscalizacao_brucelose_validade',
            'vigilancia_fiscalizacao_outros_validade',
            'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao',
            'vigilancia_fiscalizacao_brucelose_data_vacinacao',
            'vigilancia_fiscalizacao_outros_data_vacinacao',
        ],
    ]) ?>

</div>
