<?php

namespace Igrejanet\Badges;

/**
 * View
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.2.0
 * @since   02/09/2017
 * @package Igrejanet\Badges
 */
class View
{
    /**
     * @param   string  $view
     * @param   array  $data
     * @return  string
     */
    public static function render($view, array $data) : string
    {
        extract($data);

        ob_start();

        include $view;

        return ob_get_clean();
    }
}