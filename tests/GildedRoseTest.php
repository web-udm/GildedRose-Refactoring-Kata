<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    //TODO дать адекватные имена айтемам
    //TODO назвать тесты
    public function ordinaryProductDataProvider(): array
    {
        return [
            'sell_in and quality greater than zero' => ['Sword of Power', 10, 10, 2, 8, 8],
            'sell_in less than zero' => ['The Magic Paw', 1, 10, 2, -1, 7],
            'quality less than zero' => ['The Book of Curses', 10, 1, 2, 8, 0],
        ];
    }

    public function agedBrieProductDataProvider(): array
    {
        return [
            'sell_in and quality greater than zero' => ['Aged Brie', 10, 10, 2, 8, 12],
            'quality greater than 50' => ['Aged Brie', 10, 49, 2, 8, 50],
            'sell_in less than zero' => ['Aged Brie', 1, 10, 2, -1, 13],
        ];
    }

    public function sulfarasProductDataProvider(): array
    {
        return [
            ['Sulfuras, Hand of Ragnaros', 1, 80, 2, 1, 80],
        ];
    }

    public function backstagePassesProductDataProvider(): array
    {
        return [
            'sell_in less than 10' => ['Backstage passes to a TAFKAL80ETC concert', 11, 10, 2, 9, 13],
            'sell_in less than 5' => ['Backstage passes to a TAFKAL80ETC concert', 6, 10, 2, 4, 15],
            'quality greater than 50' => ['Backstage passes to a TAFKAL80ETC concert', 10, 49, 2, 8, 50],
            'sell_in less than 0' => ['Backstage passes to a TAFKAL80ETC concert', 1, 10, 2, -1, 0],
        ];
    }

    public function conjuredProductDataProvider(): array
    {
        return [
            'sell_in and quality greater than zero' => ['Conjured Mana Cake', 10, 10, 2, 8, 6],
            'sell_in less than 0' => ['Conjured Mana Cake', 1, 10, 2, -1, 4],
            'quality less than 0' => ['Conjured Mana Cake', 10, 1, 2, 8, 0],
        ];
    }

    /**
     * @dataProvider ordinaryProductDataProvider
     * @dataProvider agedBrieProductDataProvider
     * @dataProvider backstagePassesProductDataProvider
     * @dataProvider sulfarasProductDataProvider
     * @dataProvider conjuredProductDataProvider
     */
    public function testMain(
        string $name,
        int $sellIn,
        int $quality,
        int $days,
        int $reusltSellIn,
        int $resultQuality
    ): void {
        $items = [new Item($name, $sellIn, $quality)];
        $gildedRose = new GildedRose($items);

        for ($i = 0; $i < $days; $i++) {
            $gildedRose->updateQuality();
        }

        $this->assertSame($reusltSellIn, $items[0]->sell_in);
        $this->assertSame($resultQuality, $items[0]->quality);
    }
}
