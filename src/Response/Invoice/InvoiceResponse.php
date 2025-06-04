<?php

namespace UraEfrisSdk\Response\Invoice;

use UraEfrisSdk\Invoicing\Invoice;

class InvoiceResponse extends Invoice
{
    public array $existInvoiceList;
    public AgentEntity $agentEntity;
}