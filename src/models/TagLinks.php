<?php

namespace skeeks\cms\tag\models;

use Yii;

/**
 * This is the model class for table "{{%tag_links}}".
 *
 * @property int $element_id
 * @property int $tag_id
 */
class TagLinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tag_links}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['element_id', 'tag_id'], 'required'],
            [['element_id', 'tag_id'], 'integer'],
            [['element_id', 'tag_id'], 'unique', 'targetAttribute' => ['element_id', 'tag_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'element_id' => Yii::t('skeeks/tag', 'Element ID'),
            'tag_id' => Yii::t('skeeks/tag', 'Tag ID'),
        ];
    }
}
