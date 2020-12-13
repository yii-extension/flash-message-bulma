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

        foreach ($flashes as $type => $data) {
            foreach ($data as $message) {
                $html .= Message::widget()
                    ->headerColor($type)
                    ->headerMessage($message['header'] ?? '')
                    ->body($message['body'] ?? '')
                    ->render();
            }
        }

        return $html;
    }
}
