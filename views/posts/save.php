<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="body-content">



        <?php $form = ActiveForm::begin(array(
            'options' => array('class' => 'form-horizontal', 'role' => 'form'),
        )); ?>
        <div class="form-group">
            <?php echo $form->field($model, 'title')->textInput(array('class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->field($model, 'category')->dropDownList($select, ['prompt' => 'None']); ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'body')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) ?>
        </div>
        <div class="form-group">
            <?php echo $form->field($model, 'tags')->textInput(array('class' => 'form-control')); ?>
        </div>
        <?php echo Html::submitButton('Submit', array('class' => 'btn btn-primary pull-right')); ?>
        <?php ActiveForm::end(); ?>

    </div>
</div>
