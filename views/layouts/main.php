<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\FooterAsset;

use app\components\widgets\LoginWidget;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
FooterAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="store">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap clearfix">
        <div class="header">
            <?php if (Yii::$app->user->isGuest) : ?>
            <div class="supernavigation clearfix">
                <a href ng-click="tab = 1">Войти</a>
                <a href ng-click="tab = 2">Зарегистрироваться</a>
            </div>
            <?php else : ?>
                <div class="supernavigation clearfix">
                    <?php echo Yii::$app->user->getIdentity()->username;?>
                    <a href="<?php echo Url::toRoute('posts/index');?>">Выйти</a>
                </div>
            <?php endif; ?>
            <div class="head-title">
                <a href="<?php echo Url::toRoute('posts/index'); ?>">
                    <h1 class="main-header-text">Скорее в номер! Марсиане атакуют людей!</h1>
                </a>
                <p class="header-quote-author">www.learn.javascript.ru</p>
            </div>
            <div class="navigation clearfix">
                <?php
                echo \yii\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Home', 'url' => ['posts/index']],
                    ['label' => 'Войти', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Выйти', 'url' => ['site/logout'], 'visible' => !Yii::$app->user->isGuest],
                ],
                ]); ?>
            </div>
        </div>
        <div class="login-wrap">
            <div class="login" ng-show="tab === 1">
                <?php $this->beginContent('@app/views/layouts/login-form.php'); ?>
                <?php $this->endContent(); ?>
            </div>
            <div class="signup" ng-show="tab === 2">

                <form action="" name="signup" class="signup-form">
                    <label class="clearfix">E-mail<input type="email" class="input-field clearfix" required></label>
                    <label class="clearfix">Имя<input type="text" class="input-field clearfix" required></label>
                    <label  class="clearfix">Пароль<input type="password" class="input-field clearfix" required></label>
                    <label class="clearfix">Повторите пароль<input type="password" class="input-field clearfix" required></label>
                    <input type="submit" class="clearfix" value="Зарегистрироваться">
                </form>
            </div>
        </div>
        <div class="main clearfix" ng-hide="tab === 2">

            <?php $this->beginContent('@app/views/layouts/sidebar.php'); ?>
            <?php $this->endContent(); ?>

            <div class="content clearfix"  ng-hide="tab === 1">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-links">
            <a href="http://vk.com" class="vk"><div class="icon"></div></a>
            <a href="http://facebook.com" class="fb"><div class="icon"></div></a>
            <a href="http://instagram.com" class="insta"><div class="icon"></div></a>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
