<?php

/* @var $this \yii\web\View */
/* @var $thisController \app\controllers\SiteController */
/* @var $content string */
/* @var string $sexo */
/* @var string $nameCase */

use app\models\DadosUnicoPessoaFisica;
use app\models\DadosUnicoPessoa;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<?php $this->beginBody() ?>

<div>

</div>
<div class="wrap">
    <?php
    if(!Yii::$app->user->isGuest){

    $pessoa = new DadosUnicoPessoa();
    $sexoPessoa = new DadosUnicoPessoaFisica();

    if(isset(Yii::$app->getUser()->id)){
       $sexo = isset($sexoPessoa->getSexoById(Yii::$app->user->getId())[0]->pessoa_fisica_sexo) ? $sexoPessoa->getSexoById(Yii::$app->user->getId())[0]->pessoa_fisica_sexo : '';
       $pessoaName = isset($pessoa->getUserNameById(Yii::$app->user->getId())[0]->pessoa_nm) ? $pessoa->getUserNameById(Yii::$app->user->getId())[0]->pessoa_nm : '';
       $nameCase = strtolower($pessoaName);
    }
    ?>
    <style>
        table.menu {
            width: 100%
        }
    </style>
    <table class="menu">
        <tr>
            <th> <img src="<?php echo Yii::$app->request->baseUrl . '../../image/adab.png'; ?>" style="width: 80px; margin-left:10%; margin-bottom: 10px; margin-top: 10px"></th>
            <th style="text-align: right"> <h5 style="margin-right: 30px"><i> <?php echo $sexo === 'M' ? 'Bem Vindo Sr. '. ucwords($nameCase) : 'Bem Vinda Sra. '. ucwords($nameCase); ?> </i></h5></th>
        </tr>
    </table>
 <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse',
            'style' => 'background:#023156'
        ]
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar'],
        'items' => [
            ['label' => 'Início', 'url' => ['/site/index']],
            //['label' => 'About', 'url' => ['/site/about']],
           // ['label' => 'Contact', 'url' => ['/site/contact']]
        ],
    ]);
?>

 <ul class="nav navbar-nav navbar-right">
    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar'],
        'items' => [
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                 '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    ' Sair ' . Yii::$app->user->isGuest . '',
                    ['class' => 'btn btn-link logout glyphicon glyphicon-log-out']
                )
                . Html::endForm()
                .'</li>'
            )
        ],
    ]); ?>
</ul> <?php
NavBar::end();
?>
        <?php try {
            echo Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
        } catch (Exception $e) {
        } ?>
        <?= $content ?>

</div>
<?php $this->endBody() ?>


<?php $this->endPage();
}
else
{
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="row" style="width: auto; height: auto; min-width: 800px"><?= $content ?></div>
    </div>
    <?php $this->endBody() ?>
    <?php $this->endPage();
}?>
