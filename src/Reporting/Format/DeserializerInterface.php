<?php
namespace App\Reporting\Format;

interface DeserializerInterface
{
    public function deserialize(string $str ) : Report;
}