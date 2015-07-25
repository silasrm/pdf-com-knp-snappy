<?php

require_once 'vendor/autoload.php';

use Knp\Snappy\Image;

$snappy = new Image('/usr/local/bin/wkhtmltoimage', ['format' => 'png']);
$snappy->setDefaultExtension('png');
$snappy->setOptions(
    [
        'width' => 200,
    ]
);

// Cabeçalho para o navegador entender que o conteúdo é uma imagem PNG
header('Content-Type: image/png');
// Se quiser forçar o download, descomente a linha abaixo e
// modifica o valor do parâmetro filename para o valor desejado
//header('Content-Disposition: attachment; filename="schoolofnet-blog-home.png"');

echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
// Se quiser salvar numa pasta do servidor ao invés mostrar no navegador,
// comente a linha do getOutput(),
// descomente a linha abaixo e arrume o segundo parâmetro.
//$snappy->generate('http://www.schoolofnet.com/blog/', '/app/arquivos/son/home-blog.png');