<?php

declare(strict_types=1);

namespace GildedRose\Products;

class ConjuredProduct extends AbstractProduct
{
    protected $dependenceQualityOnSellIn = [
        0 => -4,
        'default' => -2,
    ];
}
