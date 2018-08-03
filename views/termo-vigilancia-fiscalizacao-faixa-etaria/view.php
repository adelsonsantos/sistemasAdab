<div class="margin-top-menu">
    <?php require 'style.php';
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use yii\helpers\ArrayHelper;

    /* @var $this yii\web\View */
    /* @var $model app\models\TermoVigilanciaFiscalizacaoFaixaEtaria */

    $this->params['breadcrumbs'][] = ['label' => 'Faixa etária', 'url' => ['index']];

    ?>
    <div style="position: absolute; margin-top: -30px">
        <?= Yii::$app->controller->renderPartial('menu'); ?>
    </div>

    <div style="text-align: center">
        <h1 class="font-topo">Faixa etária</h1>
    </div>

    <div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">ID</th>
                <th class="borda">Animal</th>
                <th class="borda" style="width: 50%">Faixa etária</th>
                <th class="borda">Ações</th>
            </tr>
            <tr>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_animal_faixa_etaria_id; ?></td>
                <td class="borda"><?= implode(ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoAnimal::find()->asArray()->where(['vigilancia_fiscalizacao_animal_id' => $model->vigilancia_fiscalizacao_animal_id])->all(), 'vigilancia_fiscalizacao_animal_id', 'vigilancia_fiscalizacao_animal_nome'))?></td>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_animal_faixa_etaria_periodo; ?></td>
                <td class="borda">
                    <table style=" width: 100%">
                        <tr>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['update', 'id' => $model->vigilancia_fiscalizacao_animal_faixa_etaria_id], ['class' => 'glyphicon glyphicon-pencil', 'title' => 'Alterar']) ?>
                            </th>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['delete', 'id' => $model->vigilancia_fiscalizacao_animal_faixa_etaria_id], [
                                    'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                    'data' => [
                                        'confirm' => 'Tem certeza de que deseja excluir esta faixa etária?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </th>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', Yii::$app->request->referrer, ['class' => 'glyphicon glyphicon-chevron-left', 'title' => 'voltar']); ?>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
