<?php
namespace App\Services;

use App\Interfaces\InterfaceCurl as IC;
use App\Models\Curl as C;

/**
 * Classe modelo ServiceCurl ela vai receber dados para serem processados atraves do CURL e vai devolver por padrao um valor a classe que usa-la.
 */
class ServiceCurl extends C implements IC
{

    /**
     * Construtor da classe que retorna um objeto de Curl
     */
    public function __construct()
    {
        parent::setCurl(C::class);
        return self::class;
    }

    /**
     * Metodo para fabricar o servico curl, ele vai receber um endereco url e um valor e vai retornar uma string.
     *
     * @param string $url
     * @param string $value
     * @return string
     */
    public function factoryCurl(string $url, string $value):string
    {
        $endPoint = $url.$value;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL                 => $endPoint,
            CURLOPT_CUSTOMREQUEST       => 'GET',
            CURLOPT_RETURNTRANSFER      => true,
            CURLOPT_SSL_VERIFYHOST      => false,
            CURLOPT_SSL_VERIFYSTATUS    => false,
            CURLOPT_SSL_VERIFYPEER      => false
        ]);

        $result = curl_exec($curl);
        curl_close($curl);

       return $result;
    }
}