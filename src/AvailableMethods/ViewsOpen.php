<?php

namespace Pdffiller\LaravelSlack\AvailableMethods;

class ViewsOpen extends DialogOpen
{
    public function getName(): string
    {
        return 'views.open';
    }

    public function getUrl(): string
    {
        return 'https://slack.com/api/views.open';
    }

}
