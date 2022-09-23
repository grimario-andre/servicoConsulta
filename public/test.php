<?php

//MENSAGEM DE CABECALHO
$mensagem = '';
$status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);

if ($status) {
    switch ($status) {
        case 'error':
            $mensagem = '<div class="alert alert-danger">Acao nao Executada!</div>';
            break;

        default:
            $mensagem = '<div class="alert alert-success">Acao Executada!</div>';
            break;
    }
}
?>

<?= $mensagem ?>


<section>
        <a href="/public/index.php">
            <button class="btn btn-success">
                Nova Vaga
            </button>
        </a>
    </section>

