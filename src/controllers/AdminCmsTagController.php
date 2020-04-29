<?php
/**
 * Created by PhpStorm.
 * User: amelexik
 * Date: 09.01.19
 * Time: 21:24
 */

namespace skeeks\cms\tag\controllers;

use skeeks\cms\tag\models\Tag;
use skeeks\cms\backend\controllers\BackendModelStandartController;
use skeeks\cms\queryfilters\QueryFiltersEvent;
use skeeks\cms\backend\events\ViewRenderEvent;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Yii;

Class AdminCmsTagController extends BackendModelStandartController
{
    public function init()
    {
        $this->name = \Yii::t('cms/tag', 'Tag');
        $this->modelShowAttribute = "id";
        $this->modelClassName = Tag::className();
        
        $this->generateAccessActions = false;

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [

            "index" => [
//                'on beforeRender' => function (ViewRenderEvent $event) {
//
//                    $event->content = $this->renderPartial("_before-index");
//                },
//                'on afterRender'  => function (ViewRenderEvent $event) {
//                    $event->content = $this->renderPartial("_after-index");
//                },
                "filters"         => [
                    'visibleFilters' => [
                        'q',
                    ],

                    'filtersModel' => [
                        'rules' => [
                            ['q', 'safe'],
                        ],

                        'attributeDefines' => [
                            'q',
                        ],


                        'fields' => [
                            'q' => [
                                'label'          => 'Поиск',
                                'elementOptions' => [
                                    'placeholder' => 'Поиск',
                                ],
                                'on apply'       => function (QueryFiltersEvent $e) {
                                    /**
                                     * @var $query ActiveQuery
                                     */
                                    $query = $e->dataProvider->query;

                                    if ($e->field->value) {
                                        $query->andWhere(
                                            ['like', Tag::tableName().'.name', $e->field->value]
                                        );

                                        $query->groupBy([Tag::tableName().'.id']);
                                    }
                                },
                            ],
                        ],
                    ],
                ],

                "grid" => [
                    'defaultPageSize' => 20,
                    'visibleColumns'  => [
                        'checkbox',
                        'actions',

                        'custom',
                        'frequency',
                    ],

                    'columns' => [

                        'custom' => [
                            'format' => 'raw',
                            'value'  => function (Tag $cmsTagModel) {
                                $result = [];
                                $result[] = Html::a($cmsTagModel->name, "#", [
                                    'class' => 'sx-trigger-action',
                                ]);

                                return implode("<br>", $result);
                            },
                        ],
                    ],
                ],
            ],

            "create" => [
                'fields' => [$this, 'updateFields'],
            ],
            "update" => [
                'fields' => [$this, 'updateFields'],
            ],

//            "activate-multi" => [
//                'class' => BackendModelMultiActivateAction::className(),
//            ],
//
//            "inActivate-multi" => [
//                'class' => BackendModelMultiDeactivateAction::class,
//            ],
        ]);
    }

    public function updateFields()
    {
        return [
            'name',
        ];
    }
    
    public function actionSearch($query)
    {
        $models = Tag::find()->where(['like', 'name', $query])->limit(10)->all();
        $items = [];

        foreach ($models as $model) {
            $items[] = ['name' => $model->name];
        }
        // We know we can use ContentNegotiator filter
        // this way is easier to show you here :)
        Yii::$app->response->format = Response::FORMAT_JSON;

        return $items;
    }
}
