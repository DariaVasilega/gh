<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{

    public function getFilters()
    {
        return array(
            new TwigFilter('country', array($this, 'serverTimezone')),
        );
    }

    public function serverTimezone()
    {
            return date_default_timezone_get();
    }



}