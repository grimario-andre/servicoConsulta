<?php
namespace App\Interfaces;

/**
 * InterefaceService devera ser implementada na classe modelo Service assim vai ser mantido um contrato entre interface e classe. 
 */
interface InterfaceService
{
    public function searchService(string $resource);
}