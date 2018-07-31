<div class="margin-top-menu">
    <?php require 'style.php';

    use yii\helpers\Html;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model app\models\TermoVigilanciaFiscalizacaoProprietario */

    $this->params['breadcrumbs'][] = ['label' => 'Proprietário da Vigilância e Fiscalizacao', 'url' => ['index']];

    ?>
    <div style="position: absolute; margin-top: -30px">
        <?= Yii::$app->controller->renderPartial('menu'); ?>
    </div>

    <div style="text-align: center">
        <h1 class="font-topo">Proprietário</h1>
    </div>

    <div class="diarias-view" style="margin-left: 209px; margin-top: 44px; ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">ID</th>
                <th class="borda">Nome</th>
                <?= $model->vigilancia_fiscalizacao_proprietario_tipo_id == 1 ? "<th class='borda'>CPF</th>" : "<th class='borda'>CNPJ</th>" ?>
                <th class="borda">Svo</th>
                <th class="borda">Ações</th>
            </tr>
            <tr>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_proprietario_id; ?></td>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_proprietario_nome; ?></td>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_proprietario_tipo_id == 1 ? $model->vigilancia_fiscalizacao_proprietario_cpf : $model->vigilancia_fiscalizacao_proprietario_cnpj; ?></td>
                <td class="borda"><?= $model->vigilancia_fiscalizacao_proprietario_svo; ?></td>
                <td class="borda">
                    <table style=" width: 100%">
                        <tr>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['update', 'id' => $model->vigilancia_fiscalizacao_proprietario_id], ['class' => 'glyphicon glyphicon-pencil', 'title' => 'Alterar']) ?>
                            </th>
                            <th style="text-align: center; width: 33%">
                                <?= Html::a('', ['delete', 'id' => $model->vigilancia_fiscalizacao_proprietario_id], [
                                    'class' => 'glyphicon glyphicon-remove', 'title' => 'Deletar',
                                    'data' => [
                                        'confirm' => 'Tem certeza de que deseja excluir este proprietário?',
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