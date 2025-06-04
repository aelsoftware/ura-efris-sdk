<?php

namespace UraEfrisSdk\Product;

use UraEfrisSdk\Builder;

class GoodsStockMaintain
{

    public function __construct(public StockIn $goodsStockIn, public array $goodsStockInItem = array())
    {}

    public function addGoodsStockInItem(array $goodsStockInItems): int
    {
        return array_push($this->goodsStockInItem, ...$goodsStockInItems);
    }

}