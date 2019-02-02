<?php
/**
 * Created by PhpStorm.
 * User: amelexik
 * Date: 09.01.19
 * Time: 21:24
 */

namespace skeeks\cms\tag\controllers;

use skeeks\cms\modules\admin\controllers\AdminModelEditorController;
use skeeks\cms\tag\models\Tag;
use yii\web\Response;
use Yii;

Class AdminTagController extends AdminModelEditorController
{
    public function init()
    {
        $this->name = \Yii::t('skeeks/tag', 'Tag');
        $this->modelShowAttribute = "name";
        $this->modelClassName = Tag::className();

        parent::init();
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
