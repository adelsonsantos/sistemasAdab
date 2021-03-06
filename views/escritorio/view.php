<div class="margin-top-menu">
    <?php require 'style.php';
    use app\models\DiariaCoordenadoria;
    use app\models\PortalEscritorio;
    use app\models\PortalGerencia;
    use yii\bootstrap\Html;
    use yii\helpers\ArrayHelper;

    /* @var $this yii\web\View */
    /* @var $model app\models\PortalEscritorio */

    $this->title = $model->esc_id;
    $this->params['breadcrumbs'][] = ['label' => 'Coordenadoria ', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
    <div style="position: absolute; margin-top: -30px">
        <?= Yii::$app->controller->renderPartial('menu'); ?>
    </div>

    <div style="text-align: center">
        <h1 class="font-topo">Escritório </h1>
    </div>

    <div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Coordenadoria</th>
                <th class="borda">Gerência</th>
                <th class="borda">Escritório</th>
                <th class="borda">Ações</th>
            </tr>
            <tr>
                <td class="borda"><?= implode(ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->where(['id_coordenadoria' => $model->id_coordenadoria])->all(), 'nome', 'nome')) ?></td>
                <td class="borda"><?= implode(ArrayHelper::map(PortalGerencia::find()->asArray()->where(['ger_id' => $model->ger_id])->all(), 'ger_id', 'ger_nome')) ?></td>
                <td class="borda"><?= implode(ArrayHelper::map(PortalEscritorio::find()->asArray()->where(['esc_id' => $model->esc_id])->all(), 'esc_id', 'esc_nome')) ?></td>
                <td class="borda" style="width: 20%">
                    <table style=" width: 100%">
                        <tr >
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['update', 'id' => $model->id_coordenadoria], ['class' => 'glyphicon glyphicon-pencil', 'title' =>     'Alterar']) ?>
                            </th>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['delete', 'id' => $model->id_coordenadoria], [
                                    'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                    'data' => [
                                        'confirm' => 'Tem certeza de que deseja excluir este Escritório?',
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