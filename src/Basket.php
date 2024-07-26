<?php

namespace AcmeBasket;

use AcmeBasket\Catalog;
use AcmeBasket\CatalogItem;
use AcmeBasket\Offer;
use AcmeBasket\DeliverRules;

class Basket
{
    /**
     * @var array<CatalogItem> $items
     */
    protected array $items = [];

    /**
     * @var Catalog $catalog
     */
    protected Catalog $catalog;

    /**
     * @var DeliveryRules $deliveryRules
     */
    protected DeliveryRules $deliveryRules;

    /**
     * @var Offer $offer
     */
    protected Offer $offer;

    public function __construct(
        Catalog $newCat,
        Offer $newOffer,
        DeliveryRules $newDeliveryRules
    ) {
        $this->items = []; // empty basket
        $this->catalog = $newCat;
        $this->offer = $newOffer;
        $this->deliveryRules = $newDeliveryRules;
    }

    /**
     * adds a Catalog item to the current basket
     * @param CatalogItem $item
     */
    protected function add_item(CatalogItem $item): void
    {
        // add item to basket
        $this->items[] = $item;
    }

    /**
     * add
     * adds a Catalog item based on the code
     * @param string $code
     */
    public function add(string $code): void
    {
        // get item from catalog
        $item = $this->catalog->get_item_by_code($code);
        // add item to basket if not null
        if ($item) {
            $this->add_item($item);
        }
    }
    /**
     * Generates a total price
     */
    public function total(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->get_price();
        }
        $total -= $this->offer->get_discount($this->get_items());
        $total += $this->deliveryRules->get_delivery_charge($total);
        return $total;
    }

    /**
     * returns all the items in the current basket
     * @return array<CatalogItem>
     *
     */
    public function get_items(): array
    {
        return $this->items;
    }

    public function display_items(): string
    {
        $output = "";
        foreach ($this->items as $item) {
            $output .=
                $item->get_name() .
                " " .
                $item->get_price() .
                " " .
                $item->get_code() .
                "<br>";
        }
        return $output;
    }

    /**
     * empties the current basket.
     */
    public function empty(): void
    {
        $this->items = [];
    }
}
