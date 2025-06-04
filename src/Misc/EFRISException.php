<?php

namespace UraEfrisSdk\Misc;

use Exception;
use UraEfrisSdk\Response\Response;

class EFRISException extends Exception
{
    public function __construct(public $message, public Response $data)
    {
        parent::__construct($message);
    }
}