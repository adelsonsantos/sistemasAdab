<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoPessoaJuridica */

$this->title = 'Create Dados Unico Pessoa Juridica';
$this->params['breadcrumbs'][] = ['label' => 'Dados Unico Pessoa Juridicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-unico-pessoa-juridica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
