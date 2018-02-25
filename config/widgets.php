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
    ],
    'widgets' => [
        'textWidget' => [
                'namespace' => 'App\Widgets\TextWidget',
                'placeholder' => 'Text Widget',
                'fields' => [
                    'title' => 'text',
                    'body' => 'text_area',
                ]
            ],
        'socialLinks' => [
            'namespace' => 'App\Widgets\SocialLinks',
            'placeholder' => 'Social Icon Widget',
            'fields' => [
                'title' => 'text',
                'body' => 'image',
            ]
        ],
    ],
];