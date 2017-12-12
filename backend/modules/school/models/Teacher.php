<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 12.12.17
 * Time: 11:24
 */

namespace backend\modules\school\models;

class Teacher extends \common\models\db\Teacher
{
    public static function  getAll()
    {
        return self::find()->all();
    }
}