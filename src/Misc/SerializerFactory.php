<?php

namespace UraEfrisSdk\Misc;

use UraEfrisSdk\Misc\Normalizers\TaxpayerTypeNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerFactory
{
    public static function create(): Serializer
    {
        $normalizers = [new ObjectNormalizer(null, null, null, new ReflectionExtractor()), new TaxpayerTypeNormalizer(), new ArrayDenormalizer()];
        $encoders = [new JsonEncoder()];

        return new Serializer($normalizers, $encoders);
    }
}