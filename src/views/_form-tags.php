<?php
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\models\CmsContentElement */
/* @var $relatedModel \skeeks\cms\relatedProperties\models\RelatedPropertiesModel */
?>
<?php $fieldSet = $form->fieldSet(\Yii::t('cms/tag', 'Tags')); ?>

<?php
echo $form->field($model, 'tagValues')->widget(\dosamigos\selectize\SelectizeTextInput::className(), [
    'loadUrl'       => ['/tag/admin-cms-tag/search'],
    'options'       => ['class' => 'form-control'],
    'clientOptions' => [
        'plugins'     => ['remove_button'],
        'valueField'  => 'name',
        'labelField'  => 'name',
        'searchField' => ['name'],
        'create'      => true,
    ],
])->label(\Yii::t('cms/tag', 'Tags list')) ?>



<?php $fieldSet::end(); ?>
