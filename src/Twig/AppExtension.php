<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('time', [$this, 'timestamp']),
        ];
    }


    function timestamp($time) {
        echo date("N", $time);
    }
}