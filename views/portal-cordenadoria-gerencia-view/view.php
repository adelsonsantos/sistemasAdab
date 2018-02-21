<div class="margin-top-menu">
    <?php require 'style.php';
    use app\models\DiariaCoordenadoria;
    use app\models\PortalContato;
    use app\models\PortalGerencia;
    use yii\bootstrap\Html;
    use yii\helpers\ArrayHelper;

    /* @var $this yii\web\View */
    /* @var $model app\models\PortalCoordenadoriaGerencia */

    $this->title = $model->cog_id;
    $this->params['breadcrumbs'][] = ['label' => 'PortalContatoTipo Coordenadoria Gerencias', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
    <div style="position: absolute; margin-top: -30px">
        <?= Yii::$app->controller->renderPartial('menu'); ?>
    </div>

    <div style="text-align: center">
        <h1 class="font-topo">Contato</h1>
    </div>

    <div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Coordenadoria</th>
                <?php if(isset($model->ger_id)){
                   echo "<th class='borda'>Gerência</th>";
                }?>
                <th class="borda">Nome Contato</th>
                <th class="borda">DDD</th>
                <th class="borda">Telefone</th>
                <th class="borda">Ações</th>
            </tr>
            <tr>
                <td class="borda"><?= implode(ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->where(['id_coordenadoria' => $model->id_coordenadoria])->all(), 'nome', 'nome')) ?></td>
                <?php if(isset($model->ger_id)){
                    echo "<td class='borda'>".implode(ArrayHelper::map(PortalGerencia::find()->asArray()->where(['ger_id' => $model->ger_id])->all(), 'ger_nome', 'ger_nome'))."</td>";
                }?>
                <td class="borda"></td>
                <td class="borda"><?= implode(ArrayHelper::map(PortalContato::find()->asArray()->where(['con_id' => $model->con_id])->all(), 'con_ddd', 'con_ddd')) ?></td>
                <td class="borda"><?= implode(ArrayHelper::map(PortalContato::find()->asArray()->where(['con_id' => $model->con_id])->all(), 'con_telefone', 'con_telefone')) ?></td>
                <td class="borda">
                    <table style=" width: 100%">
                        <tr >
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['update', 'id' => $model->cog_id], ['class' => 'glyphicon glyphicon-pencil', 'title' =>     'Alterar']) ?>
                            </th>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['delete', 'id' => $model->cog_id], [
                                    'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                    'data' => [
                                        'confirm' => 'Tem certeza de que deseja excluir este contato?',
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