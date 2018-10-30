<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoSegurancaUsuario */
/* @var $modelFuncionario app\models\DadosUnicoFuncionario */
/* @var $modelUsuarioSegurancaUsuario app\models\SegurancaUsuarioTipoUsuario */
/* @var $dados app\models\SegurancaTipoUsuario */
/* @var $sistema app\models\SegurancaSistema */

$this->params['breadcrumbs'][] = ['label' => 'Usuário', 'url' => ['index']];
?>
<div class="dados-unico-seguranca-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelFuncionario' => $modelFuncionario,
        'modelUsuarioSegurancaUsuario' => (empty($modelUsuarioSegurancaUsuario)) ? [new app\models\SegurancaUsuarioTipoUsuario] : $modelUsuarioSegurancaUsuario,
        'sistema' => $sistema,
        'dados' => $dados
    ]) ?>

</div>
