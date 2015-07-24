<?php

require_once 'vendor/autoload.php';

use Knp\Snappy\Pdf;

$snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

// Cabeçalho para o navegador entender que o conteúdo é um PDF
header('Content-Type: application/pdf');
// Se quiser forçar o download, descomente a linha abaixo e
// modifica o valor do parâmetro filename para o valor desejado
//header('Content-Disposition: attachment; filename="relatorio.pdf"');

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

$snappy->getOutputFromHtml($html, ['encoding' => 'UTF8']);
// Se quiser salvar numa pasta do servidor ao invés mostrar no navegador,
// comente a linha do getOutputFromHtml(),
// descomente a linha abaixo e arrume o segundo parâmetro.
//$snappy->generateFromHtml($html, 'relatorio.pdf', ['encoding' => 'UTF8']);
