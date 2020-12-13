<?php

declare(strict_types=1);

namespace Yii\Extension\Widget\Tests;

use Yii\Extension\Widget\FlashMessage;

final class FlashMessageTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testFlashMessage(): void
    {
        $this->flash->add(
            'is-success',
            [
                'header' => 'testMe',
                'body' =>  'testMe'
            ],
            true
        );

        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-success">
<div class="message-header">
<p>testMe</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
testMe
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }
}
