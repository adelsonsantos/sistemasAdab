<?php

/* @var $this yii\web\View */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use app\assets\AppAsset;
use kartik\form\ActiveForm;

AppAsset::register($this);
?>
<head>
    <style>
        table.diaria {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
        }

        td, th.borda {
            border: 0.5px solid #b5b5b5;
            text-align: left;
            padding: 8px;
        }

        tr.bordaMenu {
            background-color: #cecece;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }

        .font-topo {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<style>
    .containerClass {
        border: 2px solid;
        color: #434344;
        border-radius: 30px;
        align-items: center;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        margin-right: 30%;
        margin-left: 30%;
    }
</style>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
</head>
<body>
<div class="containerClass">

    <div style="width: 100%; text-align: center">
        <img src="<?= Yii::$app->request->baseUrl . '../../image/adab.png'; ?>"
             style="width: 85px; margin-bottom: 10px; margin-top: 10px;">
    </div>


    <div class="row" style="margin: auto; width: 100%; margin-left: 1px; margin-right: 1px; margin-bottom: 10px">
        <div class="col-lg-15" style=" margin-top: 12px">
            <table class="diaria" style="text-align: center; height: 8px; font-size: 12px; width: 100%">
                <tr style="height: 5px">
                    <th class="borda " style="width: 10%; background-color: #eee;">
                        <div class="glyphicon glyphicon-chevron-right" style="width: 100%; text-align: center">
                            <div class="col-lg-1 " style="text-align: center">
                            </div>
                        </div>
                    </th>
                    <th class="borda" style="width: 95%; text-align: center">
                        <div class="row" style="margin: auto;">
                            <div class="col-lg-17">Informe seu Login e Senha.
                            </div>
                        </div>
                    </th>
                </tr>
            </table>
        </div>
    </div>
    <?php
    $form = ActiveForm::begin([
        'id' => 'form-signup',
        'type' => ActiveForm::TYPE_HORIZONTAL
    ]); ?>

    <div class="row" style="margin: auto; width: 81%;">
        <div class="col-lg-10" style="margin-left: 6px">
            <?= $form->field($model, 'usuario_login', [
                'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-user"></i>']]
            ]); ?>
        </div>
    </div>
    <div class="row" style="margin: auto; width: 81%;">
        <div class="col-lg-10" style="margin-left: 6px; margin-top: 12px">
            <?= $form->field($model, 'usuario_senha', [
                'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-lock"></i>']]
            ])->passwordInput(); ?>
        </div>
    </div>

    <div class="col">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style' => 'width:50%; margin-left:25%']) ?>
    </div>
    <br>
    <div class="col" style="text-align: center">
        <?= Html::a('<u>Esqueceu a Senha?</u>', ['/site/updatepassword']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
</body>
