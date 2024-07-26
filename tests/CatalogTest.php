<?php
use PHPUnit\Framework\TestCase;
use AcmeBasket\Catalog;

class CatalogTest extends TestCase
{
    //tests single items
    public function testGetItem()
    {
        $catalog = new Catalog();

        $redWidget = $catalog->get_item_by_code("R01");
        $greenWidget = $catalog->get_item_by_code("G01");
        $blueWidget = $catalog->get_item_by_code("B01");
        $nullWidget = $catalog->get_item_by_code("Z01");
        $this->assertEquals(32.95, $redWidget->get_price());
        $this->assertEquals(24.95, $greenWidget->get_price());
        $this->assertEquals(7.95, $blueWidget->get_price());
        $this->assertNull($nullWidget);
    }
    //testing whole catalog
    public function testGetCatalog()
    {
        $catalog = new Catalog();

        $this->assertIsArray($catalog->get_catalog_items());
        $this->assertIsObject($catalog->get_catalog_items()[0]);
    }
}
