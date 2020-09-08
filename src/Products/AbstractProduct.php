<?php

declare(strict_types=1);

namespace GildedRose\Products;

use GildedRose\Item;

abstract class AbstractProduct
{
    /**
     * @var int
     */
    protected $maxQuality = 50;

    /**
     * @var int
     */
    protected $minQuality = 0;

    /**
     * @var int
     */
    protected $sellInStep = -1;

    /**
     * @var array
     */
    protected $dependenceQualityOnSellIn = [
        0 => -2,
        'default' => -1,
    ];

    /**
     * @var Item
     */
    protected $item;

    /**
     * AbstractProduct constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function update(): void
    {
        $this->updateQuality();

        $this->updateSellIn();
    }

    protected function updateQuality(): void
    {
        foreach ($this->dependenceQualityOnSellIn as $sellIn => $qualityStep) {
            if ($sellIn === 'default') {
                $this->item->quality += $qualityStep;
                break;
            }

            if ($this->item->sell_in <= $sellIn) {
                $this->item->quality += $qualityStep;
                break;
            }
        }

        $this->qualityCheck();
    }

    protected function updateSellIn(): void
    {
        $this->item->sell_in += $this->sellInStep;
    }

    protected function qualityCheck(): void
    {
        if ($this->item->quality > $this->maxQuality) {
            $this->item->quality = $this->maxQuality;
        }

        if ($this->item->quality < $this->minQuality) {
            $this->item->quality = $this->minQuality;
        }
    }
}
