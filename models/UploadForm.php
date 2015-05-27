<?php
/**
 * Created by PhpStorm.
 * User: papka
 * Date: 5/26/15
 * Time: 10:39 PM
 */

namespace app\models;


use yii\base\Model;

class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'maxFiles' => 10], // <--- here!
        ];
    }
}