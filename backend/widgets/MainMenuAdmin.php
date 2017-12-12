<?php
namespace backend\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class MainMenuAdmin extends Widget
{
    public function run(){
        echo \yii\widgets\Menu::widget(
            [
                'items' => [
                    [
                        'label' => 'Пользователи',
                        'url' => Url::to(['/user/admin']),
                        'template' => '<a href="{url}"><i class="fa fa-users"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'user' || Yii::$app->controller->module->id == 'rbac',

                    ],
                    [
                        'label' => 'Школа',
                        /*'active' => Yii::$app->controller->id == 'site',*/
                        'items' => [
                            [
                                'label' => 'Учителя',
                                'url' => Url::to(['/school/teacher']),
                                'active' => Yii::$app->controller->id == 'teacher',
                            ],
                            [
                                'label' => 'Группы',
                                'url' => Url::to(['/school/groups']),
                                'active' => Yii::$app->controller->id == 'groups',
                            ],
                            [
                                'label' => 'Уроки',
                                'url' => Url::to(['/school/lessons']),
                                'active' => Yii::$app->controller->id == 'lessons',
                            ],
                        ],
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'template' => '<a href="#"><i class="fa fa-newspaper-o"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
                        'active' => Yii::$app->controller->module->id == 'school',
                    ],
                ],
                'activateItems' => true,
                'activateParents' => true,
                'activeCssClass'=>'active',
                'encodeLabels' => false,
                /*'dropDownCaret' => false,*/
                'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",
                'options' => [
                    'class' => 'sidebar-menu',
                ]
            ]
        );
    }
}