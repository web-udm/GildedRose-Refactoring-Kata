<?php

declare(strict_types=1);

namespace GildedRose\Products;

class SulfarasProduct extends AbstractProduct
{
    /**
     * @var array
     */
    protected $dependenceQualityOnSellIn = [
        'default' => 0,
    ];

    /**
     * @var int
     */
    protected $sellInStep = 0;

    /**
     * @var int
     */
    protected $maxQuality = 80;

    /**
     * @var int
     */
    protected $minQuality = 80;
}
