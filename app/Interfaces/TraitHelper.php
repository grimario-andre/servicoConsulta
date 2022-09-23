<?php
namespace App\Interfaces;

/**
 * Trait para trabalhar em conjunto da classe Helper e assim os metedos daqui possam trabalhar sobre o conceito de poliformismo.
 * Todos os metedos deverao ser implementados de forma abstrata nesta trait.
 */
trait TraitHelper 
{
    abstract public function validateLength();
    abstract public function validateContac();
}
