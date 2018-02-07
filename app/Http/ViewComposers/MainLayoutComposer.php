<?php
namespace App\Http\ViewComposers;

Class MainLayoutComposer {

  public function compose($view) {
    $view->with('main', 'Вывыодим данные через $view->compose');
  }
}
