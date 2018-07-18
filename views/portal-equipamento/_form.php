<script type="application/javascript">
    function ativar() {
        document.getElementById("entrada-equipamento").style.display = 'block';
        document.getElementById("button-entrada").style.display = 'none';
    }

    function desativar() {
        document.getElementById("entrada-equipamento").style.display = 'none';
        document.getElementById("button-entrada").style.display = 'block';
    }
</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEquipamento2 */
/* @var $modelEntrada app\models\PortalEntrada2 */
/* @var $form yii\widgets\ActiveForm */
require 'style.php';


/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerencia */
/* @var $contato app\models\PortalContato */
/* @var $form yii\widgets\ActiveForm */
?>
<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?= $model->isNewRecord ? 'Cadastrar' : 'Alterar' ?>
            Equipamento </h1>
    </div>
</div>
<div class="grid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="diarias-view" style="margin-left: 209px;  ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon fa fa-keyboard-o"></div>
                    Equipamento
                </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'equipamento_nome')->textInput()->label('Nome'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'equipamento_quantidade_min')->textInput()->label('Quantidade Mínima'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'equipamento_status')->dropDownList(
                            [1 => 'Ativo', 2 => 'Inativo']) ?>
                    </div>

                    <div class="col-lg-1">
                        <div id="button-entrada">
                            <?= Html::button('<div style="font-family: Arial, Helvetica, sans-serif;">Entrada</div>', ['class' => 'btn btn-primary glyphicon glyphicon-plus', 'onClick' => 'ativar();']); ?>
                        </div>
                    </div>

                </div>
                <br>
                <div class="col" id="entrada-equipamento" style="display: none">
                    <table class="diaria">
                        <tr class="bordaMenu" style="background-color: #d0d0d0">
                            <th class="borda">
                                <div class="col">
                                    Entrada: <i
                                            style="margin-left: 90%"><?= Html::button('', ['class' => 'btn btn-danger glyphicon glyphicon-minus', 'onClick' => 'desativar();']); ?></i>
                                </div>
                </div>
            </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($modelEntrada, 'entrada_quantidade')->textInput()->label('Quantidade', ['disabled' => ($model->isNewRecord) ? 'disabled' : false]); ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($modelEntrada, 'setor_id')->dropDownList(
                            ArrayHelper::map(\app\models\PortalSetor::find()->asArray()->where(['setor_id' => 16])->orderBy('setor_nome')->all(), 'setor_id', 'setor_nome'))->label('Setor'); ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($modelEntrada, 'entrada_pessoa')->dropDownList(
                            ArrayHelper::map(\app\models\DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => Yii::$app->user->getId()])->all(), 'pessoa_id', 'pessoa_nm'))->label('Pessoa'); ?>
                    </div>
                </div>
            </td>
        </table>
    </div>


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



