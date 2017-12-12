<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\school\models\Lessons */
/* @var $form yii\widgets\ActiveForm */
/* @var $groups \backend\modules\school\models\Groups */
?>

<div class="lessons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_id')->dropDownList(
            \yii\helpers\ArrayHelper::map($groups, 'id', 'name'),
            ['prompt' => 'Выберите группу']
    ) ?>

    <?= $form->field($model, 'lessons_dt')->widget(\kartik\time\TimePicker::className(),
        [
            'pluginOptions' => [
                'showSeconds' => false,
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => false,
            ]
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
