<?php

    namespace Igrejanet\Badges;

    /**
     * View
     *
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @version 1.1.0
     * @since   30/08/2017
     * @package Igrejanet\Badges
     */
    class View
    {
        /**
         * @param   string  $view
         * @param   array  $data
         * @return  string
         */
        public static function render($view, array $data)
        {
            extract($data);

            ob_start();

            include $view;

            return ob_get_clean();
        }
    }