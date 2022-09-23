<?php
namespace App\Interfaces;

/**
 * Contrato de interface para ser implementado na classe ServiceCurl
 */
interface InterfaceCurl
{
    public function factoryCurl(string $url, string $value);
}