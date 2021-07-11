<?php

declare(strict_types=1);

namespace Yii\Extension\Bulma;

use Yiisoft\Session\Flash\FlashInterface;

final class FlashMessage extends Widget
{
    private array $flashTypes = [
        'danger' => 'is-danger',
        'dark' => 'is-dark',
        'info' => 'is-info',
        'link' => 'is-link',
        'primary' => 'is-primary',
        'success' => 'is-success',
        'warning' => 'is-warning',
    ];
    private FlashInterface $flash;

    public function __construct(FlashInterface $flash)
    {
        $this->flash = $flash;
    }

    protected function run(): string
    {
        $flashes = $this->flash->getAll();
        $html = '';

        /** @var array $data */
        foreach ($flashes as $type => $data) {
            if (isset($this->flashTypes[$type]) && is_string($this->flashTypes[$type])) {
                /** @var array $message */
                foreach ($data as $message) {
                    $headerMessage = '';
                    $bodyMessage = '';

                    if (isset($message['header']) && is_string($message['header'])) {
                        $headerMessage = $message['header'];
                    }

                    if (isset($message['body']) && is_string($message['body'])) {
                        $bodyMessage = $message['body'];
                    }

                    if ($bodyMessage !== '') {
                        $html .= Message::widget()
                            ->body($bodyMessage)
                            ->headerColor($this->flashTypes[$type])
                            ->headerMessage($headerMessage)
                            ->render();
                    }
                }
            }
        }

        return $html;
    }
}
