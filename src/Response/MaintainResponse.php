<?php

namespace UraEfrisSdk\Response;

use UraEfrisSdk\Product\StockInItem;

class MaintainResponse extends StockInItem
{
    public ?string $returnCode;
    public ?string $returnMessage;
}