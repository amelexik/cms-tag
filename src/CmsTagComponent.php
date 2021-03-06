<?php

namespace skeeks\cms\tag;

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use skeeks\cms\tag\assets\CmsTagAsset;

class CmsTagComponent extends \skeeks\cms\base\Component
{
    /**
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('cms/tag', 'Tags'),
            'image' => [
                CmsTagAsset::class, 'icons/tag-logo.png'
            ],
        ]);
    }
}