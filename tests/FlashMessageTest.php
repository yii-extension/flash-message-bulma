<?php

declare(strict_types=1);

namespace Yii\Extension\Widget\Tests;

use Yii\Extension\Widget\FlashMessage;

/**
 * @runTestsInSeparateProcesses
 */
final class FlashMessageTest extends TestCase
{
    public function testFlashMessageEmpty(): void
    {
        $this->flash->add(
            'success',
            [
                'header' => '',
                'body' =>  '',
            ],
            true,
        );

        $html = FlashMessage::widget()->render();

        $this->assertEquals('', $html);
    }

    public function testFlashMessageCheckType(): void
    {
        $this->flash->add(
            'testMe',
            [
                'message' => 'Error testMe message',
            ],
            true,
        );

        $this->flash->add(
            'success',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-success">
<div class="message-header">
<p>Header 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 1
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }

    public function testFlashMessageMultiple(): void
    {
        $this->flash->add(
            'success',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1'
            ],
            true
        );

        $this->flash->add(
            'danger',
            [
                'header' => 'Header 2',
                'body' =>  'Body 2'
            ],
            true
        );


        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-success">
<div class="message-header">
<p>Header 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 1
</div>
</div><div id="w2-message" class="message is-danger">
<div class="message-header">
<p>Header 2</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 2
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }

    public function testFlashMessageDanger(): void
    {
        $this->flash->add(
            'danger',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-danger">
<div class="message-header">
<p>Header 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 1
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }

    public function testFlashMessageDark(): void
    {
        $this->flash->add(
            'dark',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-dark">
<div class="message-header">
<p>Header 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 1
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }

    public function testFlashMessageInfo(): void
    {
        $this->flash->add(
            'info',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-info">
<div class="message-header">
<p>Header 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 1
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }

    public function testFlashMessagePrimary(): void
    {
        $this->flash->add(
            'primary',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-primary">
<div class="message-header">
<p>Header 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 1
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }

    public function testFlashMessageSuccess(): void
    {
        $this->flash->add(
            'success',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-success">
<div class="message-header">
<p>Header 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 1
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }

    public function testFlashMessageWarning(): void
    {
        $this->flash->add(
            'warning',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget()->render();

        $expected = <<<HTML
<div id="w1-message" class="message is-warning">
<div class="message-header">
<p>Header 1</p>
<button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
</div>
<div class="message-body">
Body 1
</div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }
}
