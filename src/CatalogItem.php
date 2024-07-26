<?php

namespace AcmeBasket;
class CatalogItem
{
    /**
     * @var string $name
     */
    protected string $name;
    /**
     * @var string $code
     */
    protected string $code;
    /**
     * @var float $price
     */
    protected float $price;
    public function __construct(string $name, string $code, float $price)
    {
        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
    }
    public function get_name(): string
    {
        return $this->name;
    }
    public function get_code(): string
    {
        return $this->code;
    }
    public function get_price(): float
    {
        return $this->price;
    }
    public function set_price(float $newPrice): void
    {
        $this->price = $newPrice;
    }
}
