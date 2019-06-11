<?php

namespace App;

use App\QualityStrategy\QualityStrategyFactoryInterface;

class GildedRose
{
    /** @var array */
    private $items;

    /** @var QualityStrategyFactoryInterface */
    private $qualityStrategyFactory;

    public function __construct(QualityStrategyFactoryInterface $qualityStrategyFactory, array $items)
    {
        $this->items = $items;
        $this->qualityStrategyFactory = $qualityStrategyFactory;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as $item) {
            $strategy = $this->qualityStrategyFactory->getQualityStrategy($item);
            $item->quality = $strategy->calculateNewQuality($item->sellIn, $item->quality);
            $item->sellIn = $strategy->getNewSellIn($item->sellIn);
        }
    }
}
