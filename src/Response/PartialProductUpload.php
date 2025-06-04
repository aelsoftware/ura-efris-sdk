<?php

namespace UraEfrisSdk\Response;

use UraEfrisSdk\Product\ProductUpload;

class PartialProductUpload extends ProductUpload
{
    public string $returnCode;
    public string $returnMessage;

}