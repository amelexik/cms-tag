<?php

namespace skeeks\cms\tag\controllers;

use skeeks\cms\tag\models\Tag;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

/**
 * Class TagController
 * @package skeeks\cms\tag\controllers
 */
class TagController extends Controller
{

    public $model;
    
    public function actionIndex($tag)
    {
        $this->model = Tag::find()
            ->where(['name'=>$tag])
            ->one();


        if (!$this->model) {
            throw new NotFoundHttpException(\Yii::t('skeeks/cms', 'Page not found'));
        }

        $this->view->title = $this->model->name;

        return $this->render($this->action->id, [
            'model' => $this->model
        ]);
    }

}
