<?php
/**
 * Created by PhpStorm.
 * User: papka
 * Date: 5/26/15
 * Time: 9:56 PM
 */

namespace app\controllers;


use yii\web\Controller;
use yii\helpers\Json;
use app\models\Tags;

class AjaxController extends Controller {

    public function actionTags() {
        $tags = Tags::find()->all();
        $return = array();
        foreach($tags as $tag) {
            $return[] = $tag->name;
        }
        return Json::encode($return);
    }
} 