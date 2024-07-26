# ACME Widget E-commerce Basket

## What is it?

This PHP module is a Basket for e-commerce that has the following interface:

- it is initialized with a product Catalog, DeliverRules, and Offers
- it has an add method, which allows input of a product code as a prameter
- it has a total method that returns the total cost fo the basket, taking into account the delivery and offer rules.

## How do I use it?

first\

```
composer install
```

then, inside your php:\

```
import AcmeBasket\Basket;\
import AcmeBasket\Catalog;\
import AcmeBasket\DeliveryRules;\
import AcmeBasket\Offer;\

$basket = new Basket(new Catalog(), new Offer(), new DeliveryRules());
```

Add a product to the basket:\

```
$basket->add("R01");
```

get the total:\

```
$basket->total();
```

see the index.php for an example.

## Assumptions made

I went ahead and decided the order of operations:

1. Add item(s) to the basket
2. Determine if offer(s) apply
3. Calculate the delivery cost

Also, based on the given test data, I used a floor function for rounding down to the nearest cent.
