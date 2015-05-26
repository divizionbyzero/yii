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

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['category' => 'id']);
    }

    // tags
/*
    public function transactions()
    {
        return [
            self::SCENARIO_INSERT => self::OP_ALL
        ];
    }
*/
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['id' => 'tag_id'])
            ->viaTable('posts_tags', ['post_id' => 'id']);
    }
    public function setTags($tags)
    {
        $this->populateRelation('tags', $tags);
        //$this->frequency = count($tags);
    }

    public function setTagsString($value)
    {
        $tags = [];
        if (!empty($value)) {
            $value = explode(',', $value);
            foreach ($value as $name) {
                $tag = Tags::findOne(['name' => $name]);
                $tag = $tag ? $tag : new Tags();
                $tag->name = trim($name);
                $tag->save();
                $tags[] = $tag;
            }
        }
        $this->setTags($tags);
    }

    public function getTagsString()
    {
        $return = array();
        $tags = $this->tags;
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $return[] = $tag->name;
            }
            return implode(',', $return);
        }
        else {
            return '';
        }
    }

    public function unlinkTags($tags)
    {
        if(!empty($tags)) {
            $this->populateRelation('tags', $tags);
        }
        $relatedRecords = $this->getRelatedRecords();

        if (isset($relatedRecords['tags'])) {
            foreach ($relatedRecords['tags'] as $tag) {
                $this->unlink('tags', $tag, true);
            }
        }
    }

    public function afterSave($insert)
    {
        $relatedRecords = $this->getRelatedRecords();

        if (isset($relatedRecords['tags'])) {
            foreach ($relatedRecords['tags'] as $tag) {
                $this->link('tags', $tag);
            }
        }
    }
}
