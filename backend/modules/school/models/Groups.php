<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 12.12.17
 * Time: 11:37
 */

namespace backend\modules\school\models;

class Groups extends \common\models\db\Groups
{
    public static function  getAll()
    {
        return self::find()->all();
    }
}