<?php

namespace App\QualityStrategy;

/**
 * Interface QualityStrategyInterface
 * @package App\QualityStrategy
 *
 * Defines the common interface for all the quality strategies.
 */
interface QualityStrategyInterface
{
    public function calculateNewQuality(int $sellInDays, int $currentQuality): int;
    public function getNewSellIn(int $currentSellIn): int;
}
