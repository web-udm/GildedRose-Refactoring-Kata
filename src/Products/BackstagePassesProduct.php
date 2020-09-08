<?php

declare(strict_types=1);

namespace GildedRose\Products;

class BackstagePassesProduct extends AbstractProduct
{
    /**
     * @var array
     */
    protected $dependenceQualityOnSellIn = [
        5 => 3,
        10 => 2,
        'default' => 1,
    ];

    protected function updateQuality(): void
    {
        if ($this->item->sell_in <= 0) {
            $this->item->quality = 0;
        } else {
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
    }
}
