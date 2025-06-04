<?php

namespace UraEfrisSdk;

class Builder
{
    /**
     * @return Builder
     */
    public static function build(): self
    {
        return new self();
    }

}