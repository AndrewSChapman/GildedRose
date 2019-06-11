<?php

namespace App\QualityStrategy;

/**
 * Class StaticQualityStrategy
 * @package App\QualityStrategy
 *
 * The StaticQualityCalculator does absolutely nothing other than returning
 * the current quality and sellin for an item - no adjustments are made.
 */
final class StaticQualityStrategy implements QualityStrategyInterface
{
    public function calculateNewQuality(int $sellInDays, int $currentQuality): int
    {
        return $currentQuality;
    }

    public function getNewSellIn(int $currentSellIn): int
    {
        return $currentSellIn;
    }
}
