<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoFuncionario */

$this->title = 'Update Dados Unico Funcionario: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Dados Unico Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->funcionario_id, 'url' => ['view', 'id' => $model->funcionario_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dados-unico-funcionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
