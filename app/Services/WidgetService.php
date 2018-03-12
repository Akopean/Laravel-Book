<?php

namespace App\Services;


class WidgetService {

    protected $config;
    protected $widget;
    protected $errors;

    public function getField()
    {
        return $this->widget->getField();
    }

    public function hasErrors()
    {
        return (count($this->errors) > 0) ? true : false;
    }

    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * WidgetService constructor.
     * @param $dir
     */
 /*   public function __construct($dir)
    {
        $this->config = config('widgets')['widgets'];
        if (array_key_exists($dir, $this->config) &&
            array_key_exists('namespace', $this->config[$dir]) &&
            class_exists($this->config[$dir]['namespace'])) {

            $class = $this->config[$dir]['namespace'];
            $this->widget = new $class;

            if (!($this->widget instanceof WidgetFieldInterface)) {
                $this->errors[] = ['error' => 'Widget Not Implement WidgetFieldInterface'];
            }
        }
        else {
            $this->errors[] = ['error'=>'Widget Not Found'];
        }
    }
*/

    public function __construct($dir)
    {

    }
}