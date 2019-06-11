<?php

namespace App\QualityStrategy;

/**
 * Class AppreciationQualityStrategy
 * @package App\QualityStrategy
 *
 * Increases quality by 1, unless the sell date has past, in which case the
 * quality is increased by 2.  Quality may not exceed the defined maxQuality.
 *
 * SellIn is decreased by 1.
 */
final class AppreciationQualityStrategy implements QualityStrategyInterface
{
    /** @var int */
    private $maxQuality;

    public function __construct(int $maxQuality)
    {
        $this->maxQuality = $maxQuality;
    }

    public function calculateNewQuality(int $sellInDays, int $currentQuality): int
    {
        $newQuality = ($sellInDays <= 0) ?
            $currentQuality + 2 :
            $currentQuality + 1;

        // Qualities must not be greater than the defined limit
        if ($newQuality > $this->maxQuality) {
            $newQuality = $this->maxQuality;
        }

        return $newQuality;
    }

    public function getNewSellIn(int $currentSellIn): int
    {
        return $currentSellIn - 1;
    }
}
