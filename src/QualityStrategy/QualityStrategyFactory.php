<?php

namespace App\QualityStrategy;

use App\Item;
use App\ProductName;

/**
 * Class QualityStrategyFactory
 * @package App\QualityStrategy
 *
 * Is responsible for creating the correct quality strategy depending on which product
 * is being evaluated.
 */
final class QualityStrategyFactory implements QualityStrategyFactoryInterface
{
    private const STANDARD_QUALITY_CHANGE_RATE = 1;
    private const MAX_QUALITY = 50;

    public function getQualityStrategy(Item $item): QualityStrategyInterface
    {
        switch ($item->name) {
            case ProductName::AGED_BRIE:
                return new AppreciationQualityStrategy(self::MAX_QUALITY);

            case ProductName::BACKSTAGE_PASS:
                return new BackstagePassQualityStrategy(self::MAX_QUALITY);

            case ProductName::CONJURED_MANA_CAKE:
                return new DeprecationQualityStrategy(self::STANDARD_QUALITY_CHANGE_RATE * 2);

            case ProductName::SULFURAS:
                return new StaticQualityStrategy(80);

            default:
                return new DeprecationQualityStrategy(self::STANDARD_QUALITY_CHANGE_RATE);
        }
    }
}
