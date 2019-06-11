<?php

namespace App\QualityStrategy;

/**
 * Class BackstagePassQualityStrategy
 * @package App\QualityStrategy
 *
 * Implements the custom strategy for a back stage pass.
 * If the concert is over, the quality is always 0.
 * Usually the quality is increased by 1, however, if there
 * are fewer than 10 days until the concert, quality is increased by 2.
 * If there are fewer than 5 days, quality is increased by 3.
 *
 * SellIn is decreased by 1.
 */
final class BackstagePassQualityStrategy implements QualityStrategyInterface
{
    /** @var int */
    private $maxQuality;

    public function __construct(int $maxQuality)
    {
        $this->maxQuality = $maxQuality;
    }

    public function calculateNewQuality(int $sellInDays, int $currentQuality): int
    {
        // If the concert is over, quality is always 0.
        if ($sellInDays <= 0) {
            return 0;
        }

        // Increment by 1 in most cases.
        $incrementBy = 1;

        if ($sellInDays <= 5) {
            $incrementBy = 3;
        } else if ($sellInDays <= 10) {
            $incrementBy = 2;
        }

        $newQuality = $currentQuality + $incrementBy;

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
