<?php

namespace UraEfrisSdk\Response;

use UraEfrisSdk\Page;

class PagedQueryResponse
{
    public Page $page;
    public array $records;
}