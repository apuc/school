<?php

namespace frontend\modules\school\models;

use common\models\db\Lessons;
use yii\data\ActiveDataProvider;

class School extends Lessons
{
    public $group;
    public $teacher;

    public function rules()
    {
        return [
            [['name', 'group', 'teacher'], 'string'],
            [['lessons_dt'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Lessons::find();
        $query->joinWith('group.teacher');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'name',
                    'lessons_dt' => [
                        'asc' => ['`lessons`.`lessons_dt` is null' => SORT_ASC],
                    ],
                    'teacher' => [
                        'asc' => ['`teacher`.`name`' => SORT_ASC],
                        'desc' => ['`teacher`.`name`' => SORT_DESC],
                    ],
                ],
            ],

        ]);
        $this->load($params);

        $query->andFilterWhere([
            'LIKE',
            '`lessons`.`name`',
            $this->name,
        ]);
        $query->andFilterWhere([
            '`lessons`.`lessons_dt`' => $this->lessons_dt,
        ]);
        $query->andFilterWhere(['LIKE', '`teacher`.`name`', $this->teacher]);

        return $dataProvider;
    }
}