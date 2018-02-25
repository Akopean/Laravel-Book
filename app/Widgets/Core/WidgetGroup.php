<?php

namespace App\Widgets\Core;

use App\Widget as Widgets;
use Widget;

class WidgetGroup
{
    protected $widget, $group;
    protected $db;


    public function __construct(){
        $config = config('widgets');
        $this->group = $config['group'];
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     * @param $widget_zone
     */
    public function run($widget_zone)
    {
        if (!array_key_exists($widget_zone, $this->group)){
           return;
        }

        $widgets = Widgets::where(['group' => $widget_zone])->get();

        foreach ($widgets as $w){
            $widget = json_decode($w['value']);
            if (!empty($widget) && !is_null($widget))
            Widget::group($widget_zone)->addWidget($widget->widget, $widget);
        }

        echo Widget::group($widget_zone)->display();
    }
}