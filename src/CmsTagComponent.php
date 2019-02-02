<?php

namespace skeeks\cms\tag;

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

class CmsTagComponent extends \skeeks\cms\base\Component
{
    /**
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('skeeks/tag', 'Tags'),
        ]);
    }
}