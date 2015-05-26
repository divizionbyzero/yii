<?php
/**
 * Created by PhpStorm.
 * User: papka
 * Date: 5/16/15
 * Time: 3:51 PM
 */

namespace app\controllers;
use app\models\Tags;
use Yii;
use yii\web\Controller;
use app\models\Posts;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;

class PostsController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'error'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'error'],
                        'roles' => ['user'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],

        ];
    }
    public function actionTags($name = NULL)
    {
        $tags = Tags::find()->where(['name'=>$name])->all();
        $model = array();
        if(count($tags)) {
            foreach($tags as $tag) {
                if (!empty($tag->posts)) {
                    $model = array_merge($model,$tag->posts);
                }
            }

        }
        return $this->render('index', ['models' => $model]);

    }

    public function actionIndex()
    {
        $models = Posts::find()->all();
        return $this->render('index', ['models' => $models]);
    }

    private function loadModel($id)
    {
        $model = Posts::find()->where(['id' => $id])->one();

        if ($model == NULL)
            throw new HttpException(404, 'Model not found.');

        return $model;
    }

    public function actionSave($id=NULL)
    {
        if ($id == NULL) {
            $model = new Posts;
           // $tag = new Tags;
        }
        else {
            $model = $this->loadModel($id);
            //$model->tags = $model->getTagsString();
        }

        if (isset($_POST['Posts']))
        {
            $model->load($_POST);
            if (!empty($_POST['Posts']['tags'])) {
                if (!empty($model->tags)) {
                    $model->unlinkTags($model->tags);
                }
                $model->setTagsString($_POST['Posts']['tags']);
            }

            if ($model->save())
            {
                Yii::$app->session->setFlash('success', 'Model has been saved');
                $link = Url::toRoute('/posts');
                return $this->redirect($link);
            }
            else {
                Yii::$app->session->setFlash('error', 'Model could not be saved');
            }
        }

        $parents = \app\models\Categories::find()->all();
        $select = array();
        foreach($parents as $parent) {
            $select[$parent->id] = $parent->name;
        }
        $model->tags = $model->getTagsString();
        return $this->render('save', array('model' => $model, 'select' => $select));
    }

    public function actionDelete($id=NULL)
    {
        $model = $this->loadModel($id);

        if (!$model->delete())
            Yii::$app->session->setFlash('error', 'Unable to delete model');

        $link = Url::toRoute('/posts');
        return $this->redirect($link);
    }
} 