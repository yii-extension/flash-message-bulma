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

    /**
     * @runInSeparateProcess
     */
    public function testFlashMessageMultiple(): void
    {
        $this->flash->add(
            'is-success',
            [
                'header' => 'testMe 1',
                'body' =>  'testMe 1'
            ],
            true
        );

        $this->flash->add(
            'is-danger',
            [
                'header' => 'testMe 2',
                'body' =>  'testMe 2'
            ],
            true
        );


        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-success">
<div class="message-header">
<p>testMe 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
testMe 1
</div>
</div><div id="w2-message" class="message is-danger">
<div class="message-header">
<p>testMe 2</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
testMe 2
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }
}
