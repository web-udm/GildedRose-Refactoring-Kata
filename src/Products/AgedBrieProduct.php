<?php

declare(strict_types=1);

namespace GildedRose\Products;

class AgedBrieProduct extends AbstractProduct
{
    /**
     * @var array
     */
    protected $dependenceQualityOnSellIn = [
        0 => 2,
        'default' => 1,
    ];
}
