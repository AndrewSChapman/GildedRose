<?php

namespace App\QualityStrategy;

use App\Item;

/**
 * Interface QualityStrategyFactoryInterface
 * @package App\QualityStrategy
 *
 * Defines the interface for the quality strategy factory.
 */
interface QualityStrategyFactoryInterface
{
    public function getQualityStrategy(Item $item): QualityStrategyInterface;
}
