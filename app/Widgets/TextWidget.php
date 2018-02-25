<?php

namespace App\Widgets;

use App\Widgets\Core\WidgetFieldInterface;
use Arrilot\Widgets\AbstractWidget;

class TextWidget extends AbstractWidget implements WidgetFieldInterface
{

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->field = [
            'title' => 'textinput',
            'body' => 'richtextbox',
        ];
    }

    /**
     * @return array
     */
    public function getField()
    {
        return [
            'title' => 'textinput',
            'body' => 'richtextbox',
        ];
    }

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
            'contact_desc' => setting('site.contact_desc'),
        ]);
    }
}