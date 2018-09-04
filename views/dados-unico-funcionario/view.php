<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoFuncionario */

$this->title = $model->funcionario_id;
$this->params['breadcrumbs'][] = ['label' => 'Dados Unico Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-unico-funcionario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->funcionario_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->funcionario_id], [
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
            'funcionario_id',
            'pessoa_id',
            'funcionario_tipo_id',
            'funcao_id',
            'cargo_permanente',
            'funcionario_matricula',
            'funcionario_ramal',
            'funcionario_email:email',
            'funcionario_dt_admissao',
            'funcionario_dt_demissao',
            'funcionario_orgao_origem',
            'funcionario_conta_fgts',
            'contrato_id',
            'funcionario_salario',
            'cargo_temporario',
            'funcionario_orgao_destino',
            'est_organizacional_lotacao_id',
            'funcionario_validacao_propria',
            'funcionario_validacao_rh',
            'funcionario_envio_email:email',
            'funcionario_tipo_id_old',
            'motorista',
            'funcionario_onus',
        ],
    ]) ?>

</div>
