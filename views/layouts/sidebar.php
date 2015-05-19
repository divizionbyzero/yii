<?php use yii\helpers\Url; ?>
<div class="sidebar"  ng-hide="tab === 1">
    <div class="side-title">Господа, в чем дело?</div>
    <div class="side-content">В целом пока не очень понятно.
       <?php $img = Url::toRoute('/img').'/cockroach.jpg' ?>
        <img src="<?= $img; ?>" class="clearfix">
    </div>
</div>