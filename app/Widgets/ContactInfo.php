<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class ContactInfo extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('theme::widgets.contact_info', [
            'contact_email' => setting('site.contact_email'),
            'contact_phone' => setting('site.contact_phone'),
            'contact_adress' => setting('site.contact_adress'),
            'contact_desc' => setting('site.contact_desc')
        ]);
    }
}