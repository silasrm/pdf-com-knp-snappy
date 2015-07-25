#Repositório com os códigos de testes do artigo [Gerando PDF com Snappy](http://www.schoolofnet.com/2015/07/gerando-pdf-com-snappy/)


##Conteúdo extra

###PDF com URLs e HTMLs com css que possui media-queries


Se você tentar utilizar o __Snappy__ o resultado vai ser uma renderização da página na media-query mais baixa. Para resolver isso, temos a configuração ``viewport-size``:

```php
<?php

require_once 'vendor/autoload.php';

use Knp\Snappy\Pdf;

$snappy = new Pdf(
    '/usr/local/bin/wkhtmltopdf',
    [
        'viewport-size' => '1280x800',
    ]
);

// Cabeçalho para o navegador entender que o conteúdo é um PDF
header('Content-Type: application/pdf');

echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
```

Com isso, o __wkhtmltopdf__ irá induzir a página que o *viewport* que está sendo utilizado é de um de 1280px por 800px. Assim a media-query utilizada será a mais adequada a essas dimensões.


###Renderização sem bordas no PDF

Caso deseje renderizar com o conteúdo ocupando 100% das dimensões da página do PDF, defina as bordas com o valor ```0```:

```php
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

echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
```

###Setando a orientação da página no PDF

Caso deseje que a página esteja com a orientação em paisagem:

```php
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
        'orientation' => 'Landscape',
    ]
);

// Cabeçalho para o navegador entender que o conteúdo é um PDF
header('Content-Type: application/pdf');

echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
```

###Utilizando media-type print pra gerar o PDF

Para casos onde existe um css específico para impressão, e caso queira renderizar nesse modo:

```php
<?php

require_once 'vendor/autoload.php';

use Knp\Snappy\Pdf;

$snappy = new Pdf(
    '/usr/local/bin/wkhtmltopdf',
    [
        'print-media-type' => true,
    ]
);

// Cabeçalho para o navegador entender que o conteúdo é um PDF
header('Content-Type: application/pdf');

echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
```

###Adicionando rodapé no PDF

Caso deseje adicionar informações no rodapé:

```php
<?php

require_once 'vendor/autoload.php';

use Knp\Snappy\Pdf;

$snappy = new Pdf(
    '/usr/local/bin/wkhtmltopdf',
    [
        'footer-left' => 'Na Esquerda',
        'footer-center' => 'Rodapé aqui!',
        'footer-right' => 'Na Direita!',
    ]
);

// Cabeçalho para o navegador entender que o conteúdo é um PDF
header('Content-Type: application/pdf');

echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
```

###Gerando thumbnail de parte da página

Caso deseje gerar uma thumbnail de uma dimensão específica de qualquer lugar da página:

```php
<?php

require_once 'vendor/autoload.php';

use Knp\Snappy\Image;

$snappy = new Image('/usr/local/bin/wkhtmltoimage', ['format' => 'png']);
$snappy->setDefaultExtension('png');
$snappy->setOptions(
    [
        'crop-w' => 200,
        'crop-h' => 200,
        'crop-x' => 400,
        'crop-y' => 20,
    ]
);

// Cabeçalho para o navegador entender que o conteúdo é uma imagem PNG
header('Content-Type: image/png');

echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
```

###Gerando thumbnail da página sem corte

Caso deseje gerar uma thumbnail de toda a página numa dimensão de largura específica:

```php
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

echo $snappy->getOutput('http://www.schoolofnet.com/blog/');
```

##Considerações

Existem diversas outras opções de uso para __PDF__ e __imagens__, basta checar o comando *-H* do __wkhtmltopdf__ e do __wkhtmltoimage__.
