    <?php

    require_once 'vendor/autoload.php';

    use Knp\Snappy\Pdf;

    $snappy = new Pdf(
        '/usr/local/bin/wkhtmltopdf',
        [
            'viewport-size' => '1280x800',
            'margin-top' => 0,
            'margin-right' => 0,
            'margin-bottom' => 0,
            'margin-left' => 0,
        ]
    );

    // Cabeçalho para o navegador entender que o conteúdo é um PDF
    header('Content-Type: application/pdf');
    // Se quiser forçar o download, descomente a linha abaixo e
    // modifica o valor do parâmetro filename para o valor desejado
    //header('Content-Disposition: attachment; filename="schoolofnet-blog-home.pdf"');

    echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
    // Se quiser salvar numa pasta do servidor ao invés mostrar no navegador,
    // comente a linha do getOutput(),
    // descomente a linha abaixo e arrume o segundo parâmetro.
    //$snappy->generate('http://www.schoolofnet.com/blog/', '/app/arquivos/son/home-blog.pdf');