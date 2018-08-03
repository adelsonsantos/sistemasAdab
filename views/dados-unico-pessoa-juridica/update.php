<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoPessoaJuridica */

$this->title = 'Update Dados Unico Pessoa Juridica: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Dados Unico Pessoa Juridicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pessoa_id, 'url' => ['view', 'id' => $model->pessoa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dados-unico-pessoa-juridica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
