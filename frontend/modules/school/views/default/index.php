<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\school\models\GroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расписание';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'lessons_dt',
                'filter'    => \kartik\time\TimePicker::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'lessons_dt',
                        'pluginOptions' => [
                            'showSeconds' => false,
                            'showMeridian' => false,
                            'minuteStep' => 1,
                            'defaultTime' => false,
                        ]
                    ])
            ],
            [
                'attribute' => 'teacher',
                'format' => 'text',
                'value' => function($model){
                    return $model->group->teacher->name;
                }
            ],
        ],
    ]); ?>
</div>
