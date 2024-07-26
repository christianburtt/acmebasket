<?php

namespace AcmeBasket;
use AcmeBasket\CatalogItem;

class Catalog
{
    /**
     * @var array<CatalogItem> $catalogItems
     */
    protected array $catalogItems = [];
    public function __construct()
    {
        $this->catalogItems = [
            new CatalogItem("Red widget", "R01", 32.95),
            new CatalogItem("Blue widget", "B01", 7.95),
            new CatalogItem("Green widget", "G01", 24.95),
        ];
    }
    /**
     * Get item by code
     * @param string $code
     * @return ?CatalogItem
     */
    public function get_item_by_code(string $code): ?CatalogItem
    {
        foreach ($this->catalogItems as $item) {
            if ($item->get_code() == $code) {
                return $item;
            }
        }
        return null;
    }
    /**
     * Get catalog items
     * gets the whole catalog
     * @return array<object>
     */
    public function get_catalog_items(): array
    {
        return $this->catalogItems;
    }
}
