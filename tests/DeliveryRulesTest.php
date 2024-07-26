<?php
use PHPUnit\Framework\TestCase;
use AcmeBasket\DeliveryRules;

class DeliverRulesTest extends TestCase
{
    //tests default rules
    public function testDefaultRules()
    {
        $deliveryRules = new DeliveryRules();

        $this->assertEquals(4.95, $deliveryRules->get_delivery_charge(40));
        $this->assertEquals(2.95, $deliveryRules->get_delivery_charge(60));
        $this->assertEquals(0, $deliveryRules->get_delivery_charge(100));
    }
    //testing custom rules
    public function testCustomRules()
    {
        $rules = [[30, 5.95], [70, 3.95], [100, 1.95]];
        $deliveryRules = new DeliveryRules($rules);

        $this->assertEquals(5.95, $deliveryRules->get_delivery_charge(20));
        $this->assertEquals(3.95, $deliveryRules->get_delivery_charge(50));
        $this->assertEquals(1.95, $deliveryRules->get_delivery_charge(80));
        $this->assertEquals(0, $deliveryRules->get_delivery_charge(110));
    }
    //edge case if they try to pass in a non-array
    public function testNoDeliveryChargeForEmptyRules()
    {
        $this->expectException(TypeError::class);
        $deliveryRules = new DeliveryRules(null);
        $deliveryRules = new DeliveryRules(123);
    }
    /**
     * We could also test that the rules are in the correct format, but that's
     * not really necessary at this point. More work needs to be done in the
     * DeliveryRules constructor
     */
}
