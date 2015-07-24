<?php

require_once 'vendor/autoload.php';

use Knp\Snappy\Pdf;

$snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

// Cabeçalho para o navegador entender que o conteúdo é um PDF
header('Content-Type: application/pdf');
// Se quiser forçar o download, descomente a linha abaixo e
// modifica o valor do parâmetro filename para o valor desejado
//header('Content-Disposition: attachment; filename="schoolofnet-blog-artigos.pdf"');

echo $snappy->getOutput(
    array(
        'http://www.schoolofnet.com/2015/07/trabalhando-com-repository-no-laravel/',
        'http://www.schoolofnet.com/2015/04/como-usar-os-metodos-magicos-no-php/',
        'http://www.schoolofnet.com/2015/04/enviando-emails-utilizando-swift-mailer/',
        'http://www.schoolofnet.com/2015/04/instalando-e-integrando-apache-com-php-no-windows/',
    )
);

// Se quiser salvar numa pasta do servidor ao invés mostrar no navegador,
// comente a linha do getOutput(),
// descomente a linha abaixo e arrume o segundo parâmetro.
//$snappy->generate(
//    [
//        'http://www.schoolofnet.com/2015/07/trabalhando-com-repository-no-laravel/',
//        'http://www.schoolofnet.com/2015/04/como-usar-os-metodos-magicos-no-php/',
//        'http://www.schoolofnet.com/2015/04/enviando-emails-utilizando-swift-mailer/',
//        'http://www.schoolofnet.com/2015/04/instalando-e-integrando-apache-com-php-no-windows/',
//    ],
//    '/app/arquivos/son/artigos.pdf'
//);