<p align="center">
    <a href="https://github.com/yii-extension" target="_blank">
        <img src="https://lh3.googleusercontent.com/ehSTPnXqrkk0M3U-UPCjC0fty9K6lgykK2WOUA2nUHp8gIkRjeTN8z8SABlkvcvR-9PIrboxIvPGujPgWebLQeHHgX7yLUoxFSduiZrTog6WoZLiAvqcTR1QTPVRmns2tYjACpp7EQ=w2400" height="100px">
    </a>
    <h1 align="center">Flash Message Bulma Widget</h1>
    <br>
</p>

[![Total Downloads](https://poser.pugx.org/yii-extension/flash-message-bulma/downloads)](//packagist.org/packages/yii-extension/flash-message-bulma)
[![build](https://github.com/yii-extension/flash-message-bulma/workflows/build/badge.svg?branch=main)](https://github.com/yii-extension/flash-message-bulma/actions)
[![codecov](https://codecov.io/gh/yii-extension/flash-message-bulma/branch/main/graph/badge.svg?token=KB6T5KMGED)](https://codecov.io/gh/yii-extension/flash-message-bulma)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyii-extension%2Fflash-message-bulma%2Fmain)](https://dashboard.stryker-mutator.io/reports/github.com/yii-extension/flash-message-bulma/main)
[![static analysis](https://github.com/yii-extension/flash-message-bulma/workflows/static%20analysis/badge.svg)](https://github.com/yii-extension/flash-message-bulma/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yii-extension/flash-message-bulma/coverage.svg)](https://shepherd.dev/github/yii-extension/flash-message-bulma)


## Installation

```shell
composer require yii-extension/flash-message-bulma
```

## Usage

In controller or action:

```php
<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Session\Flash\Flash;

final class Action
{
    public function index(Flash $flash): ResponseInterface
    {
        $flash->add(
            'success', // types: [danger, dark, info, link, primary, success, warning]
            [
                'header' => 'Header message flash', // Its optional.
                'body' => 'body message flash' // Its mandatory.
            ],
            true
        );
    }
}
```

In layout:

```php
<?php

declare(strict_types=1);

use Yii\Extension\Widget\FlashMessage;

?>

<?= FlashMessage::widget() ?>
```

### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

### Mutation testing

The package tests are checked with [Infection](https://infection.github.io/) mutation framework. To run it:

```shell
./vendor/bin/infection
```

### Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
./vendor/bin/psalm
```
