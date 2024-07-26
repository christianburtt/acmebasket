<?php
require "vendor/autoload.php";
use AcmeBasket\Basket;
use AcmeBasket\Catalog;
use AcmeBasket\DeliveryRules;
use AcmeBasket\Offer;
$basket = new Basket(new Catalog(), new Offer(), new DeliveryRules());
$basket->add("B01");
$basket->add("B01");
$basket->add("R01");
$basket->add("R01");
$basket->add("R01");

//use this instead of number_format because according to
//the info, we want to round down to the nearest cent
echo "$" . floor($basket->total() * 100) / 100;
?>
