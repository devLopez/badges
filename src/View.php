<?php

namespace Igrejanet\Badges;

class View
{
    public static function render(string $view, array $data): string
    {
        extract($data);

        ob_start();

        include $view;

        return ob_get_clean();
    }
}
