<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoSegurancaUsuario */

$this->title = $model->pessoa_id;
$this->params['breadcrumbs'][] = ['label' => 'Dados Unico Seguranca Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-unico-seguranca-usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pessoa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pessoa_id], [
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
            'pessoa_id',
            'usuario_login',
            'usuario_senha',
            'usuario_st',
            'usuario_dt_criacao',
            'usuario_dt_alteracao',
            'usuario_primeiro_logon',
            'usuario_diaria',
            'id_coordenadoria',
        ],
    ]) ?>


</div>
