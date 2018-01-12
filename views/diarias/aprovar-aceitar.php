<?php
/* @var $modelAprocacao app\models\DiariaAprovacao */
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

echo Yii::$app->controller->renderPartial('view', ['model' => $model, 'id' => $model->diaria_id]);

/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-computador-form">

    <?php $form = ActiveForm::begin(); ?>


        <div style="display: none">
            <?= $form->field($modelAprovacao, 'diaria_id')->textInput(['value' => 1]); ?>

            <?= $form->field($modelAprovacao, 'diaria_aprovacao_func')->textInput(['value' => 10]); ?>

            <?= $form->field($modelAprovacao, 'diaria_aprovacao_func_exec')->textInput(['value' => 1]);; ?>

            <?= $form->field($modelAprovacao, 'diaria_aprovacao_dt')->textInput(['value' => '2015-01-01']); ?>

            <?= $form->field($modelAprovacao, 'diaria_aprovacao_hr')->textInput(['value' => '00:00']); ?>
        </div>


    <div style="margin-left: 209px;">
        <table class="diaria" style=" width: 100%">
            <tr class="bordaMenu">
                <th class="borda" style="text-align: center; width: 33%">
                    <?= Html::a('<span class="glyphicon glyphicon-open" style="color: white; font-size: 1.2em;"> Aprovar </span>', ['aprovar-aceitar', 'id' => $model->diaria_id], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'confirm' => 'Prezado Senhor, a Aprovação implica em concordância quanto à necessidade e oportunidade do deslocamento, conforme roteiro e período indicado.
            Confirma a Aprovação ?',
                            'method' => 'post',
                        ]
                    ]); ?>
                </th>
                <th class="borda" style="text-align: center; width: 33%">
                    <?= Html::a('<span class="glyphicon glyphicon-save" style="color: white; font-size: 1.2em;"> Devolver </span>', ['aprovar-devolver', 'id' => $model->diaria_id], ['class' => 'btn btn-danger']); ?>
                </th>
                <th class="borda" style="text-align: center; width: 33%">
                    <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
                </th>
            </tr>
        </table>
    </div>
    <?php ActiveForm::end(); ?>
</div>
