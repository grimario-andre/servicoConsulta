<?php
namespace App\Models;

use stdClass;

/**
 * Classe abstrata criada para se relacionar facilmente com qualquer outra classe, se o envovimento de uma terceira.
 * O Helper sera herdado por sua familia, como helper validate.
 */
abstract class Helper
{
    #region ATRIBUTOS
    /**
     * Atributo usado para acessar a classe.
     *
     * @var string
     */
    private string   $helper;

    /**
     * Atribudo usado para receber um retorno em forma de Objto.
     *
     * @var stdClass
     */
    private stdClass $stdObject;

    /**
     * Atributo usado para receber um retorno em forma de array.
     *
     * @var array
     */
    private array    $array;     

    #endregion

    /**
     * Construtor abstrato da classe
     */
    abstract public function __construct();
    
    /**
     * Metodo statico para converter um recurso, deve-se informar o recurso e o valor false para retornar um objeto e true para um array.
     *
     * @param string $resource
     * @param bool $value
     * @return stdClass/array
     */
    public static function converter(string $resource, bool $value)
    {
        switch ($value) {
            case false;
                return json_decode($resource);
                break;
            
            case true;
                return json_decode($resource, true);
                break;
        }
    }

    #region GETTERS & SETTERS
    /**
     * Atributo usado para acessar a classe.
     */ 
    public function getHelper()
    {
        return $this->helper;
    }

    /**
     * Atributo usado para atribuir a classe.
     *
     * @return  self
     */ 
    public function setHelper($helper)
    {
        $this->helper = $helper;

        return $this;
    }

    /**
     * Atribudo usado para exibir um retorno em forma de Objto.
     */ 
    public function getStdObject()
    {
        return $this->stdObject;
    }

    /**
     * Atribudo usado para atribuir um retorno em forma de Objto.
     *
     * @return  self
     */ 
    public function setStdObject($stdObject)
    {
        $this->stdObject = $stdObject;

        return $this;
    }

    /**
     * Atributo usado para exibir um retorno em forma de array.
     */ 
    public function getArray()
    {
        return $this->array;
    }

    /**
     * Atributo usado para atribir um retorno em forma de array.
     *
     * @return  self
     */ 
    public function setArray($array)
    {
        $this->array = $array;

        return $this;
    }

    #endregion

}