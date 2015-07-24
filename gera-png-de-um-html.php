<?php

require_once 'vendor/autoload.php';

use Knp\Snappy\Image;

$snappy = new Image('/usr/local/bin/wkhtmltoimage', ['format' => 'png']);
$snappy->setDefaultExtension('png');

// Cabeçalho para o navegador entender que o conteúdo é uma imagem PNG
header('Content-Type: image/png');
// Se quiser forçar o download, descomente a linha abaixo e
// modifica o valor do parâmetro filename para o valor desejado
//header('Content-Disposition: attachment; filename="relatorio.png"');

$html = <<<'EOD'
<h1 style="color: red;">Relatório</h1>
<br/>
<table width="100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Fulano da Silva</td>
            <td>fulano@dasilva.com</td>
            <td>11 99999-8888</td>
        </tr>
        <tr>
            <td>Sicrano Santos</td>
            <td>sicrano@gmail.com</td>
            <td>11 99999-7777</td>
        </tr>
        <tr>
            <td>João das Botas</td>
            <td>j.botas@empresa.com.br</td>
            <td>11 99999-6666</td>
        </tr>
    </thead>
</table>
EOD;

echo $snappy->getOutputFromHtml($html, ['encoding' => 'UTF8']);
// Se quiser salvar numa pasta do servidor ao invés mostrar no navegador,
// comente a linha do getOutputFromHtml(),
// descomente a linha abaixo e arrume o segundo parâmetro.
//$snappy->generateFromHtml($html, 'relatorio.png', ['encoding' => 'UTF8']);
