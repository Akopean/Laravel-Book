<?php
/*
 * Ключ: краткое название виджета для обращения к нему из шаблона
 * Значение: название класса виджета с пространством имен
 */
return [
    'group' => [
        'leftSidebar' => 'Left Sidebar',
        'rightSidebar' => 'Right Sidebar',
        'footer' => 'Footer',
        'rightSidebar' => 'Right Sidebar',
    ],
    'widgets' => [
        'Text' => [
            'namespace' => 'App\Widgets\TextWidget',
            'placeholder' => 'Text Widget',
            'desc' => 'Arbitrary text.',
            'fields' => [
                'title' => [
                    'type' => 'text',
                ],
                'body' => [
                    'type' => 'text_area',
                    ],
            ]
        ],
        'SocialLinks' => [
            'namespace' => 'App\Widgets\SocialLinks',
            'placeholder' => 'Social Icon Widget',
            'desc' => 'Arbitrary text.',
            'fields' => [
                'title' => [
                    'type' => 'text',
                ],
                'bodys' => [
                    'type' => 'rich_text_box',
                ],
                'sbody' => [
                    'type' => 'rich_text_box',
                ],
            ]
        ],
    ],
];