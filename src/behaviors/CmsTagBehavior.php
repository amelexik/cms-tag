<?php

namespace skeeks\cms\tag\behaviors;

use creocoder\taggable\TaggableBehavior;
use creocoder\taggable\TaggableQueryBehavior;
use skeeks\cms\tag\models\Tag;
use yii\db\ActiveQuery;
use yii\validators\SafeValidator;

/**
 * Created by PhpStorm.
 * User: amelexik
 * Date: 22.01.19
 * Time: 15:06
 */
Class CmsTagBehavior extends TaggableBehavior
{
    /**
     * @param \yii\base\Component $owner
     */
    public function attach($owner)
    {
        parent::attach($owner);
        $owner->validators[] = SafeValidator::createValidator('safe', $owner, ['tagValues']);
    }


    public function getTags()
    {
        return $this->owner->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('{{%tag_links}}', ['element_id' => 'id']);
    }
}