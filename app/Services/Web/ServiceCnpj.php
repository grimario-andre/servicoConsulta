<?php

namespace App\Services\Web;

use App\Interfaces\InterfaceService as IS;
use App\Models\Service as S;

/**
 * Classe para excutar servico de busca CNPJ que vai herdar da classe Service e implementar a interface InterfaceService.
 * A mesma sera como um objeto ponte para espicificar o servico a ser usado e ao mesmo ninguem vai saber que esta e a classe ServiceCnpj pois as chamadas a serem feitas serao a    
 * partir da classe Service.
 */
class ServiceCnpj extends S implements IS
{
    /**
     * Metodo construtor herdado de Service
     *
     * @param string $url
     * @param string $resource
     */
    public function __construct(string $url, string $resource)
    {
        parent::setUrl($url);
        parent::setResource($resource);
        parent::createHelper();
        parent::createCurl();

        return self::class;
    }

    /**
     * Metodo exibir herdado da classe Service.
     * 
     * @return string
     */
    public function read(): string 
    {
        return parent::getResource();
    }


    /**
     * Metodo busca servico vai receber um parametro, o recurso para o qual deve ir buscar o valor em uma api e pode retornar como uma string, objeto ou array.
     *
     * @param string $cnpj
     * @return string/stdClass/array
     */
    public function searchService(string $cnpj)
    { 
        //RECEBER O RECURSO
        parent::setResource($cnpj);
        //VALIDA O RECURSO REMOVE CARACTERES NAO NUMERAIS
        parent::setValue(parent::getHelper()->validateStripSpecialsChars(parent::getResource()));
        //VALIDA O RECURSO COMPARA TAMANHO
        parent::setValue(parent::getHelper()->validateLength(parent::getValue(), 14));
        //VALIDA RECURSO JUNTA RECURSO
        parent::setValue(parent::getHelper()->validateContac('/buscarcnpj?cnpj=',parent::getValue()));
        //MONTA RECURSO E EXECUTA O CURL
        parent::setValue(parent::getCurl()->factoryCurl(parent::getUrl(), parent::getValue()));
        //DEFINE O RETORNO DO RECURSO
        parent::getHelper()->setStdObject(parent::getHelper()->converter(parent::getValue(), false));
        
        return parent::getHelper()->getStdObject();
    }
}