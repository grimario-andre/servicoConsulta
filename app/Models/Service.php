<?php
namespace App\Models;

use App\Services\Helpers\HelperValidate as HV;
use App\Services\ServiceCurl as SC;

/**
 * Classe abstrata e modelo para aquelas que vao a herdar, a classe herdeira sempre vai chamar a super classe para realiazer as tarefas 
 * e a mesma vai se relacionar com qualquer outra para cumprir a tarefa que a classe herdeira solicitar.
 */
abstract class Service 
{

    #region Atributes
    /**
     * Atributo responsavel por receber o endereco url
     *
     * @var string
     */
    private string $url;

    /**
     * Atributo responsavel por receber o recurso para a busca, cpnj, cpf, cep
     *
     * @var string
     */
    private string $resource;

    /**
     * Atributo responsavel por receber o valor de retorno do tipo string
     *
     * @var string
     */
    private string $value;

    /**
     * Atributo responsavel por criar uma instancia da classe Helper Validate
     *
     * @var HV
     */
    private HV     $helper;

    /**
     * atributo responsavel por criar uma instancia da classe Service Curl
     *
     * @var SC
     */
    private SC     $curl;
    #endregion


    /**
     * Metodo construtor abstrato com dois paramentos, sera usado para criar instancia da classe na classe herdeira
     *
     * @param string $url
     * @param string $resource
     */
    abstract public function __construct(string $url, string $resource);


    abstract public function read(): string;


    /**
     * Metodo responsavel por criar uma instacia da classe Helper Validate
     *
     * @return HV
     */
    protected function createHelper()
    {
        return self::setHelper(new HV());
    }

    
    /**
     * Metodo responsavel por criar uma instacia da classe Helper Validate
     *
     * @return SC
     */
    protected function createCurl()
    {
        return self::setCurl(new SC());
    }

    #region GETTERS & SETTERS

    /**
     * Atributo responsavel por exibir o endereco url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Atributo responsavel por receber o endereco url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Atributo responsavel por exibir o endereco resource
     */ 
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Atributo responsavel por receber o endereco resource
     *
     * @return  self
     */ 
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Atributo responsavel por exibir o valor do tipo string
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Atributo responsavel por receber o valor de retorno do tipo string
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Atributo responsavel por exibir uma instancia da classe Helper Validate
     */ 
    public function getHelper()
    {
        return $this->helper;
    }

    /**
     * Atributo responsavel por criar uma instancia da classe Helper Validate
     *
     * @return  self
     */ 
    public function setHelper($helper)
    {
        $this->helper = $helper;

        return $this;
    }

    /**
     * atributo responsavel por exibir uma instancia da classe Service Curl
     */ 
    public function getCurl()
    {
        return $this->curl;
    }

    /**
     * atributo responsavel por criar uma instancia da classe Service Curl
     *
     * @return  self
     */ 
    public function setCurl($curl)
    {
        $this->curl = $curl;

        return $this;
    }
    #endregion
}