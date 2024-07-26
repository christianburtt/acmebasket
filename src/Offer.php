<?php
namespace AcmeBasket;

use AcmeBasket\Catalog;
use AcmeBasket\CatalogItem;
// use AcmeBasket\Basket;

class Offer
{
    /**
     * @var object $activeOffer
     */
    protected object $activeOffer;
    /**
     * The constructor initializes an active offer object
     * based on the hardcoded values for the exercise.
     * Obviously in real-world this would be a whole conversation
     * about what kind of data we need and how to allow for different
     * types of offers.
     */
    public function __construct()
    {
        $this->activeOffer = new \stdClass();
        $this->activeOffer->name =
            "Buy one Red Widget, get the second half off";
        $this->activeOffer->code = "R01";
        $this->activeOffer->qty = 2;
        $this->activeOffer->discount = 0.5;
    }

    /**
     * gets the discount amount or 0 if not applicable.
     * @param array<CatalogItem> $basket_items
     * @return float discount amount in dollars
     */
    public function get_discount(array $basket_items): float
    {
        $applicableItem = null;
        $applicableItemCount = 0;
        foreach ($basket_items as $item) {
            if ($item->get_code() == $this->activeOffer->code) {
                $applicableItem = $item;
                $applicableItemCount++;
            }
        }
        if ($applicableItemCount >= $this->activeOffer->qty) {
            return $applicableItem->get_price() * $this->activeOffer->discount;
        }
        return 0;
    }
}
