<div class="margin-top-menu">
    <?php require 'style.php';
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model app\models\TermoVigilanciaFiscalizacaoAcao */

    $this->params['breadcrumbs'][] = ['label' => 'Ação da Vigilância e Fiscalizacao', 'url' => ['index']];

    ?>
    <div style="position: absolute; margin-top: -30px">
        <?= Yii::$app->controller->renderPartial('menu'); ?>
    </div>

    <div style="text-align: center">
        <h1 class="font-topo">Ação</h1>
    </div>

    <div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">ID</th>
                <th class="borda" style="width: 50%">Nome</th>
                <th class="borda">Campo complementar</th>
                <th class="borda">St</th>
                <th class="borda">Ações</th>
            </tr>
            <tr>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_acao_id; ?></td>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_acao_nome; ?></td>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_acao_cmp_complentar == 1 ? "Sim" : "Não"; ?></td>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_acao_st == 1 ? "Ativo" : "Inativo"; ?></td>
                <td class="borda">
                    <table style=" width: 100%">
                        <tr>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['update', 'id' => $model->vigilancia_fiscalizacao_acao_id], ['class' => 'glyphicon glyphicon-pencil', 'title' => 'Alterar']) ?>
                            </th>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['delete', 'id' => $model->vigilancia_fiscalizacao_acao_id], [
                                    'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                    'data' => [
                                        'confirm' => 'Tem certeza de que deseja excluir esta ação?',
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