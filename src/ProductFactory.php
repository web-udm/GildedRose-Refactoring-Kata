<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Products\AgedBrieProduct;
use GildedRose\Products\BackstagePassesProduct;
use GildedRose\Products\ConjuredProduct;
use GildedRose\Products\OrdinaryProduct;
use GildedRose\Products\SulfarasProduct;

class ProductFactory
{

    /**
     * @param Item $item
     * @return AgedBrieProduct|BackstagePassesProduct|ConjuredProduct|OrdinaryProduct|SulfarasProduct
     */
    public static function build(Item $item)
    {
        switch ($item->name) {
            case 'Aged Brie':
                return new AgedBrieProduct($item);
            case 'Sulfuras, Hand of Ragnaros':
                return new SulfarasProduct($item);
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePassesProduct($item);
            case 'Conjured Mana Cake':
                return new ConjuredProduct($item);
            default:
                return new OrdinaryProduct($item);
        }
    }
}
