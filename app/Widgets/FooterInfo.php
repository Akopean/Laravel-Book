<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class FooterInfo extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $footer_info  = setting('site.footer_info');
        return $footer_info;
    }
}