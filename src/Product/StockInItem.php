<?php

namespace UraEfrisSdk\Product;

use UraEfrisSdk\Builder;

class StockInItem
{
    public function __construct(
        public string  $quantity,
        public string  $unitPrice,
        public ?string $commodityGoodsId = null,
        public ?string $goodsCode = null,
        public ?string $measureUnit = null,
        public ?string $remarks = null,
        public ?string $fuelTankId = null,
        public ?string $lossQuantity = null,
        public ?string $originalQuantity = null,
        public ?string $returnCode = null,
        public ?string $returnMessage = null
    )
    {
    }

}