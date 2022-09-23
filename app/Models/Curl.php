<?php
namespace App\Models;

/**
 * Classe abstrata modelo que receber, processar e devolver dados a classe com se relacionar.
 */
abstract class Curl
{
    /**
     * Atributo que vai receber a classe Curl
     *
     * @var string
     */
    private string $curl;

    /**
     * Contrutor abstrato
     */
    abstract public function __construct();

    /**
     * Atributo que vai exibir a classe Curl
     */ 
    public function getCurl()
    {
        return $this->curl;
    }

    /**
     * Atributo que vai atribuir a classe Curl
     *
     * @return  self
     */ 
    public function setCurl($curl)
    {
        $this->curl = $curl;

        return $this;
    }
}