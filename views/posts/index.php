<?php
use yii\helpers\Html;
use app\components\widgets;
use yii\helpers\Url;
$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-danger" role="alert">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
    <?php echo Html::a('Create New Post', array('save'), array('class' => 'btn btn-primary pull-right')); ?>
       <?php $tab = 3; ?>
       <?php foreach ($models as $post): ?>
            <div class="post clearfix">
                <div class="post-header">
                    <div class="post-title clearfix">
                        <span><?php echo $post->title; ?></span>
                    </div>
                </div>
                <div class="post-content">
                    <div class="post-content-small" ng-hide="tab === <?php echo $tab; ?>" ng-show="tab === <?php echo $tab+1; ?>">
                        <?php echo substr($post->body, 0, 300);?>
                    </div>
                    <a class="post-content-proceed" href ng-click="tab = <?php echo $tab; ?>" ng-hide="tab === <?php echo $tab; ?>">Читать далее</a>

                    <div class="post-content-big" ng-show="tab === <?php echo $tab; ?>">
                        <?php echo $post->body; ?>
                        <a class="post-content-cut" href="" ng-click="tab = <?php echo $tab+1; ?>" ng-show="tab === <?php echo $tab; ?>">Свернуть</a>
                    </div></div>
                <div class="post-footer">
                    <div class="post-date">
                        <?php echo Yii::$app->formatter->asDatetime($post->created); ?>
                    </div>
                    <div class="post-tags">
                        <?php foreach($post->tags as $tag) : ?>
                            <span>
                                <?php  echo HTMl::a( $tag->name, Url::toRoute(['posts/tags', 'name'=>$tag->name])); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <?php echo Html::a('Edit', array('save', 'id' => $post->id), array('class' => 'btn btn-primary pull-right')); ?>
                    <?php echo Html::a('Delete', array('delete', 'id' => $post->id), array('class' => 'btn btn-primary pull-right')); ?>
                </div>


            </div>
            <?php $tab += 2; ?>
        <?php endforeach; ?>

