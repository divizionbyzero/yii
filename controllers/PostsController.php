<?php
/**
 * Created by PhpStorm.
 * User: papka
 * Date: 5/16/15
 * Time: 3:51 PM
 */

namespace app\controllers;
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
        if ($id == NULL)
            $model = new Posts;
        else
            $model = $this->loadModel($id);

        if (isset($_POST['Posts']))
        {
            $model->load($_POST);

            if ($model->save())
            {
                Yii::$app->session->setFlash('success', 'Model has been saved');
                $link = Url::toRoute('/posts');
                return $this->redirect($link);
            }
            else
                Yii::$app->session->setFlash('error', 'Model could not be saved');
        }

        $parents = \app\models\Categories::find()->all();
        $select = array();
        foreach($parents as $parent) {
            $select[$parent->id] = $parent->name;
        }

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