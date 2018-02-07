<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class SocialLinks extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $soc_links = [
            'twitter' => setting('social.twitter'),
            'facebook' => setting('social.facebook'),
            'instagram' => setting('social.instagram')
        ];

        return view('theme::widgets.social_links', [
            'soc_links' => $soc_links
        ]);
    }
}