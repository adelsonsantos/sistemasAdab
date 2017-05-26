<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\Button;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<style>
    .containerClass {
        border: 2px solid;
        color: #434344;
        border-radius: 30px;
        align-items: center;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: center;
        margin-right: 25%;
        margin-left: 25%;
    }
</style>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body>
<div class="containerClass">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'row',
                'offset' => 'col',
                'wrapper' => 'col',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>
    <br>
    <?= $form->field($model, 'usuario_login')->textInput(['style' => 'width:auto; margin:auto'])?>
    <div class="row" style="width: auto">
        <?= Html::submitButton('Alterar Senha', ['class' => 'btn btn-primary col', 'name' => 'login-button', 'style'=>'width:55%; float:left; text-align:center']) ?>
        <?= Html::Button('Cancelar', ['class' => 'btn  col', 'name' => 'login-button', 'style'=>'width:37%; float:right; text-align:center', 'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['/site/index']) . "';",]) ?>
        <br>
    </div><br>
    <?php ActiveForm::end(); ?>
</div>
</body>
