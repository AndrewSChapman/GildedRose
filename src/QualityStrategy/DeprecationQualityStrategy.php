<?php

namespace App\QualityStrategy;

/**
 * Class DeprecationQualityStrategy
 * @package App\QualityStrategy
 *
 * Decreases quality by the defined depreciation speed, unless the sell date has past, in which case the
 * quality is decreased by 2 * depreciation speed.  Quality may not be less than 0.
 *
 * SellIn is decreased by 1.
 */
final class DeprecationQualityStrategy implements QualityStrategyInterface
{
    /** @var int */
    private $depreciationSpeed;

    public function __construct(int $depreciationSpeed)
    {
        $this->depreciationSpeed = $depreciationSpeed;
    }

    public function calculateNewQuality(int $sellInDays, int $currentQuality): int
    {
        $newQuality = ($sellInDays <= 0) ?
            $currentQuality - (2 * $this->depreciationSpeed) :
            $currentQuality - $this->depreciationSpeed;

        // Qualities must not less than zero
        if ($newQuality < 0) {
            $newQuality = 0;
        }

        return $newQuality;
    }

    public function getNewSellIn(int $currentSellIn): int
    {
        return $currentSellIn - 1;
    }
}
