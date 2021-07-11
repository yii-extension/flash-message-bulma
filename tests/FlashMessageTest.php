<?php

declare(strict_types=1);

namespace Yii\Extension\Bulma\Tests;

use PHPUnit\Framework\TestCase;
use Yii\Extension\Bulma\FlashMessage;
use Yii\Extension\Bulma\Tests\TestSupport\TestTrait;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Session\Flash\FlashInterface;
use Yiisoft\Session\Session;

/**
 * @runTestsInSeparateProcesses
 */
final class FlashMessageTest extends TestCase
{
    use TestTrait;

    private FlashInterface $flash;

    protected function setUp(): void
    {
        parent::setUp();

        $this->flash = new Flash(new Session([0], null));
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->flash);
    }

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

        $html = FlashMessage::widget([$this->flash])->render();
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

        $html = FlashMessage::widget([$this->flash])->render();
        $expected = <<<HTML
        <div id="w0-message" class="message is-success">
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


        $html = FlashMessage::widget([$this->flash])->render();
        $expected = <<<HTML
        <div id="w0-message" class="message is-success">
        <div class="message-header">
        <p>Header 1</p>
        <button type="button" class="delete"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="message-body">
        Body 1
        </div>
        </div><div id="w1-message" class="message is-danger">
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

        $html = FlashMessage::widget([$this->flash])->render();
        $expected = <<<HTML
        <div id="w0-message" class="message is-danger">
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
            'primary',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget([$this->flash])->render();
        $expected = <<<HTML
        <div id="w0-message" class="message is-primary">
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

        $html = FlashMessage::widget([$this->flash])->render();
        $expected = <<<HTML
        <div id="w0-message" class="message is-info">
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

        $html = FlashMessage::widget([$this->flash])->render();
        $expected = <<<HTML
        <div id="w0-message" class="message is-primary">
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

        $html = FlashMessage::widget([$this->flash])->render();
        $expected = <<<HTML
        <div id="w0-message" class="message is-success">
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

    public function testWarning(): void
    {
        $this->flash->add(
            'warning',
            [
                'header' => 'Header 1',
                'body' =>  'Body 1',
            ],
            true,
        );

        $html = FlashMessage::widget([$this->flash])->render();
        $expected = <<<HTML
        <div id="w0-message" class="message is-warning">
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
