<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$login = new \app\models\LoginForm();
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'login-form'],
    'action' => yii\helpers\Url::toRoute('site/login'),
    'fieldConfig' => [
        'template' => "{label}{input}{error}",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

<?= $form->field($login, 'email')
    ->textInput(['class' => 'input-field clearfix'])
    ->label('Email',['class' =>'clearfix']) ?>

<?= $form->field($login, 'password')
    ->passwordInput(['class' => 'input-field clearfix'])
    ->label('Пароль',['class' =>'clearfix']) ?>

<?= $form->field($login, 'rememberMe', [
    'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
])->checkbox() ?>

<?= Html::submitButton('Войти', ['class' => 'clearfix', 'name' => 'login-button']) ?>


<?php ActiveForm::end(); ?>