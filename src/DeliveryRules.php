<?php
namespace AcmeBasket;

class DeliveryRules
{
    /**
     * @var array<array<int,float>> $deliveryRules
     */
    protected array $deliveryRules = [];
    /**
     * Constructor
     * Expecting an array of 2-element arrays
     * We should do more error/type checking here, but we'll leave that for later
     * @param array<array<int,float>> $rules optional
     * @return void
     */
    public function __construct(array $rules = [])
    {
        if (!empty($rules)) {
            $this->deliveryRules = $rules;
        } else {
            $this->deliveryRules = [[50, 4.95], [90, 2.95]];
        }
    }
    /**
     * Get delivery charge
     * @param float $basket_total the total price of the basket/order
     * @return float price of deliver for the order
     */
    public function get_delivery_charge(float $basket_total)
    {
        $deliveryPrice = 0;
        //loop through all rules arrays
        foreach ($this->deliveryRules as $rule) {
            //destructure array for readability
            [$limit, $price] = $rule;
            //if our total is less than the limit, we pay this delivery fee
            if ($basket_total < $limit) {
                $deliveryPrice = $price;
                break;
            }
        }
        return $deliveryPrice;
    }
}
