<?php

declare(strict_types=1);

namespace Yii\Extension\Widget;

use Yiisoft\Session\Flash\Flash;
use Yiisoft\Widget\Widget;
use Yiisoft\Yii\Bulma\Message;

final class FlashMessage extends Widget
{
    private Flash $flash;

    public function __construct(Flash $flash)
    {
        $this->flash = $flash;
    }

    public function run(): string
    {
        $flashes = $this->flash->getAll();
        $html = '';

        /** @var array $data */
        foreach ($flashes as $type => $data) {
            /** @var array $message */
            foreach ($data as $message) {
                $headerColor = 'is-dark';
                $headerMessage = '';
                $bodyMessage = '';

                if (is_string($type)) {
                    $headerColor = $type;
                }

                if (isset($message['header']) && is_string($message['header'])) {
                    $headerMessage = $message['header'];
                }

                if (isset($message['body']) && is_string($message['body'])) {
                    $bodyMessage = $message['body'];
                }

                $html .= Message::widget()
                    ->headerColor($headerColor)
                    ->headerMessage($headerMessage)
                    ->body($bodyMessage)
                    ->render();
            }
        }

        return $html;
    }
}
