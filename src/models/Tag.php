<?php

namespace skeeks\cms\tag\models;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property int $id
 * @property string $name
 * @property int $frequency
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms/tag', 'ID'),
            'name' => Yii::t('cms/tag', 'Name'),
            'frequency' => Yii::t('cms/tag', 'Frequency'),
        ];
    }
}
