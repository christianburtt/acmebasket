<?php
use PHPUnit\Framework\TestCase;
use AcmeBasket\Catalog;
use AcmeBasket\Basket;
use AcmeBasket\Offer;
use AcmeBasket\DeliveryRules;
use AcmeBasket\CatalogItem;

class BasketTest extends TestCase
{
    //tests single items
    public function testAddItem()
    {
        $catalog = new Catalog();
        $rules = new DeliveryRules();
        $offer = new Offer();
        $basket = new Basket($catalog, $offer, $rules);

        $basket->add("B01");
        $this->assertContainsOnly(
            "AcmeBasket\CatalogItem",
            $basket->get_items()
        );
        // $this->assertEquals(32.95, $redWidget->get_price());
        // $this->assertEquals(24.95, $greenWidget->get_price());
        // $this->assertEquals(7.95, $blueWidget->get_price());
        // $this->assertNull($nullWidget);
    }
    //testing whole catalog
    public function testCalculateTotal()
    {
        $catalog = new Catalog();
        $rules = new DeliveryRules();
        $offer = new Offer();
        $basket = new Basket($catalog, $offer, $rules);
        $basket->add("B01");
        $basket->add("G01");
        $this->assertEquals(37.85, $basket->total());
    }
}
