<?php
return [
    'components' => [
        'tag' => [
            'class' => 'skeeks\cms\tag\CmsTagComponent',
        ],
        'i18n' => [
            'translations' => [
                'cms/tag' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/tag/messages',
                ]
            ]
        ],
        'urlManager' => [
            'rules' => [
                'tag/<tag>' => 'tag/tag/index',
            ]
        ],
        'authManager' => [
            'config' => [
                'roles' => [
                    [
                        'name'  => \skeeks\cms\rbac\CmsManager::ROLE_ADMIN,
                        'child' => [
                            //Есть доступ к системе администрирования
                            'permissions' => [
                                "tag/admin-cms-tag",
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'modules'    =>
        [
            'tag' => [
                'class' => 'skeeks\cms\tag\CmsTagModule',

            ]
        ]
];