<?php
namespace App\Services\Helpers;

use App\Models\Helper as H;
use App\Interfaces\TraitHelper as TH;

/**
 * Classe herdeira de Helper e vai usar a classe TraitHelper para realizar as validacoes, que outras classes vao necessitar.
 */
class HelperValidate extends H 
{
    use TH;
    
    /**
     * Construtor da classe que retorna um objeto de Helper.
     */
    public function __construct()
    {
        parent::setHelper(H::class);
        return self::class;
    }

    /**
     * Metodo estatico para remover todos os caracteres cujo nao sao numero de parametro recurso e vai retornar o mesmo.
     *
     * @param string $resource
     * @return string $value
     */
    public static function validateStripSpecialsChars(string $resource)
    {
        $value = preg_replace('/\D/','',$resource);
        return $value;
    }

    /**
     * Metodo para validar o tamanho da string, vai receber o recurso e a valor cujo deve ser usado para validacao do recurso.
     *
     * @param string $resource
     * @param string $value
     * @return string $resource
     */
    public function validateLength(string $resource, string $value)
    {
        if (strlen($resource) != ($value)) {

            header('Location:http://localhost:8000/public/test.php?status=error');
            exit;
        }
        
        return $resource;
    }

    /**
     * Metodo para validar e concatenar parametro e valor
     *
     * @param string $param
     * @param string $value
     * @return string 
     */
    public function validateContac(string $param, string $value)
    {
        if (strlen($param) == '') {

            header('Location:http://localhost:8000/public/test.php?status=error');
            exit;
        }
        return $param.$value;
    }
}