<?php
//namespace App\Twig;
//
//use Twig\Extension\AbstractExtension;
//use Twig\TwigFilter;
//
//class AppExtension extends AbstractExtension
//{
//    public function getFilters()
//    {
//        return array(
//            new TwigFilter('price', array($this, 'priceFilter')),
//        );
//    }
//
//    public function priceFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
//    {
//        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
//        $price = '$'.$price;
//
//        return $price;
//    }
//}