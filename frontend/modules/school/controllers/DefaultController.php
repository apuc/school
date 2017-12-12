<?php

namespace frontend\modules\school\controllers;

use frontend\modules\school\models\School;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `school` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new School();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }
}
