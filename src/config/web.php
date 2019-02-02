<?php
return [
    'components' => [
        'tag' => [
            'class' => 'skeeks\cms\tag\CmsTagComponent',
        ],
        'i18n' => [
            'translations' => [
                'skeeks/tag' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/tag/messages',
                ]
            ]
        ]
    ],
    'modules'    =>
        [
            'tag' => [
                'class' => 'skeeks\cms\tag\CmsTagModule',

            ]
        ]
];