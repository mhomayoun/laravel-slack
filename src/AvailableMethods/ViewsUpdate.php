<?php

namespace Pdffiller\LaravelSlack\AvailableMethods;

class ViewsUpdate extends ViewsOpen
{
    public function getName(): string
    {
        return 'views.update';
    }

    public function getUrl(): string
    {
        return 'https://slack.com/api/views.update';
    }

}
