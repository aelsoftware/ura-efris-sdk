<?php

namespace UraEfrisSdk\Payload;

use UraEfrisSdk\Product\StockTransfer;
use UraEfrisSdk\Product\StockTransferItem;

class GoodsStockTransfer
{
    /**
     * @param StockTransfer $goodsStockTransfer
     * @param array<StockTransferItem> $goodsStockTransferItem
     */

    public function __construct(
        public StockTransfer $goodsStockTransfer,
        /**
         * @var array<StockTransferItem>
         */
        public array $goodsStockTransferItem = array()
    )
    {
    }

    /**
     * @var array<StockTransferItem> $stockTransferItems
     */
    public function addStockTransferItems(array $stockTransferItems): void
    {
            array_push($this->goodsStockTransferItem, ...$stockTransferItems);
    }
}