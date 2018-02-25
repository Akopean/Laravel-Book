<?php

namespace App\Widgets\Core;

interface WidgetFieldInterface {
    /**
     *  Возвращаем  массив полей   ['title' => 'textinput', '...' => 'checkbox']
     *  Поля предназначены для вывода/изменения информации в админ панели
     *  @return array
     */
    public function getField();
}