<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoSegurancaUsuario */

$this->params['breadcrumbs'][] = ['label' => 'Usuário', 'url' => ['index']];
?>
<div class="dados-unico-seguranca-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
