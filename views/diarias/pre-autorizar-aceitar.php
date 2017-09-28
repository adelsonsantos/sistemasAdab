<?php
/* @var $modelPreAutorizacao app\models\DiariaPreAutorizacao */
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

echo Yii::$app->controller->renderPartial('view', ['model' => $model, 'id' => $model->diaria_id]);

/* @var $form yii\widgets\ActiveForm */
$form = ActiveForm::begin();


?>



<?php ActiveForm::end(); ?>

<div class="portal-computador-form">

    <?php $form = ActiveForm::begin(); ?>
    <div style="display: none">
        <?= $form->field($modelPreAutorizacao, 'diaria_id')->textInput(); ?>

        <?= $form->field($modelPreAutorizacao, 'diaria_pre_autorizacao_func')->textInput(); ?>

        <?= $form->field($modelPreAutorizacao, 'diaria_pre_autorizacao_func_exec')->textInput();; ?>

        <?= $form->field($modelPreAutorizacao, 'diaria_pre_autorizacao_dt')->textInput(); ?>

        <?= $form->field($modelPreAutorizacao, 'diaria_pre_autorizacao_hr')->textInput(); ?>
    </div>



<div style="margin-left: 209px;">
    <table class="diaria" style=" width: 100%">
        <tr class="bordaMenu" >
            <th class="borda" style="text-align: center; width: 33%">
                <?= Html::a('<span class="glyphicon glyphicon-open" style="color: white; font-size: 1.2em;"> Pré-Autorizar </span>', ['pre-autorizar-aceitar', 'id' => $model->diaria_id], [
                    'class' => 'btn btn-success',
                    'data' => [
                        'confirm' => 'Prezado Senhor, a Pré-Autorização implica em concordância quanto à necessidade e oportunidade do deslocamento, conforme roteiro e período indicado.
            Confirma a Pré-Autorização ?',
                        'method' => 'post',
                    ]
                ]); ?>
            </th>
            <th class="borda" style="text-align: center; width: 33%">
                <?= Html::a('<span class="glyphicon glyphicon-save" style="color: white; font-size: 1.2em;"> Devolver </span>', ['pre-autorizar-aceitar', 'id' => $model->diaria_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'method' => 'post',
                    ]
                ]); ?>
            </th>
            <th class="borda" style="text-align: center; width: 33%">
                <?= Html::a( 'Voltar', Yii::$app->request->referrer, [ 'class' => 'btn btn-default']);?>
            </th>
        </tr>
    </table>

</div>


    <?php ActiveForm::end(); ?>

</div>
