<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAtividade */

$this->title = 'Create Termo Vigilancia Fiscalizacao Atividade';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-atividade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
