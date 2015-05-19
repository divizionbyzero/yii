<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;


class Posts extends ActiveRecord
{
    //public $title;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['body'], 'string'],
            [['category'], 'integer'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'created' => 'Created',
            'updated' => 'Updated',
            'category' => 'Category',
        ];
    }

    public function behaviors()
    {
        return array(
            'timestamp' => array(
                'class' => 'yii\behaviors\TimestampBehavior',
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('UNIX_TIMESTAMP()'),
            )
        );
    }
}
