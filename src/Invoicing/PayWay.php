<?php

namespace UraEfrisSdk\Invoicing;

use JsonSerializable;
use UraEfrisSdk\BaseModel;

class PayWay extends BaseModel implements JsonSerializable
{
    public function __construct(
        public string $paymentMode,
        public string $paymentAmount,
        public string $orderNumber)
    {
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): array
    {
        return [$this->paymentMode, $this->paymentAmount, $this->orderNumber];
    }
}