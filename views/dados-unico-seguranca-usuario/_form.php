<?php
require 'style.php';

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $thisController app\controllers\DadosUnicoSegurancaUsuarioController */
/* @var $model app\models\DadosUnicoSegurancaUsuario */
/* @var $modelFuncionario app\models\DadosUnicoFuncionario */
/* @var $sistema app\models\SegurancaSistema */
/* @var $dados app\models\SegurancaTipoUsuario */
/* @var $form yii\widgets\ActiveForm */
?>
<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?= $model->isNewRecord ? 'Cadastrar' : 'Alterar' ?> usuário</h1>
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>

<div class="diarias-view" style="margin-left: 209px;  ">
    <table class="diaria">
        <tr class="bordaMenu">
            <th class="borda">
                <div class="glyphicon glyphicon-user"></div>
                Usuário

            </th>

        </tr>
        <td>
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'pessoa_id')->dropDownList(
                        ArrayHelper::map(\app\models\DadosUnicoPessoa::find()->where(['pessoa_id' => $model->pessoa_id])->all(), 'pessoa_id', 'pessoa_nm')); ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'usuario_login')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($modelFuncionario, 'funcionario_email')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <?= $form->field($model, 'id_coordenadoria')->dropDownList(
                        ArrayHelper::map(\app\models\DiariaCoordenadoria::find()->orderBy('nome')->all(), 'id_coordenadoria', 'nome')); ?>
                </div>
                <div class="col-lg-2">
                    <?= $form->field($modelFuncionario, 'funcionario_ramal')->textInput(); ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'mail')->dropDownList([0 =>'Não', 1 => 'Sim']); ?>
                </div>

            </div>

            <?php

foreach ($sistema as $key) {
    echo $this->render('_form-sistema', [
        'form' => $form,
        'model' => $model,
        'modelUsuarioSegurancaUsuario' => (empty($modelUsuarioSegurancaUsuario)) ? [new app\models\SegurancaUsuarioTipoUsuario] : $modelUsuarioSegurancaUsuario,
        'key' => $key,
        'dados' => $dados
    ]);
}
            ?>
            <table class="diaria" style="width: 100%; margin-top: 30px;">
                <tr class="bordaMenu" style="background-color: #d0d0d0">
                    <th class="borda" style="text-align: center; width: 50%">
                        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
                    </th>
                    <th class="borda" style="text-align: center; width: 50%">
                        <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
                    </th>
                </tr>
            </table>
          <?php ActiveForm::end(); ?>
        </td>
    </table>
</div>


