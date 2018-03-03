<?php

namespace Igrejanet\Badges\Formatters;

/**
 * NameFormatter
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 2.0.0
 * @since   03/03/2018
 * @package Igrejanet\Badges\Formatters
 */
class NameFormatter
{
    /**
     * @param   string $pessoa
     * @return  string
     */
    public static function generateName(string $pessoa) : string
    {
        $nome_formatado = '';
        $char 			= 14;

        $pessoa = static::prepareNameForGeneration($pessoa);

        foreach ($pessoa as $key => $nome) {
            if (!(strlen($nome_formatado) + strlen($nome) < $char)) {
                return trim($nome_formatado);
            }

            if (($nome == 'De') || ($nome == 'Da') || ($nome == 'Do') || ($nome == 'Das') || ($nome == 'Dos') || ($nome == 'E')) {
                if (!(strlen($nome_formatado) + strlen($nome) + strlen(@$pessoa[$key + 1]) < $char)) {
                    return trim($nome_formatado);
                }
                $nome = strtolower($nome);
            } else {
                $nome_formatado .= ' '.$nome;
            }
        }

        return trim($nome_formatado);
    }

    /**
     * @param   string  $name
     * @return  array
     */
    private static function prepareNameForGeneration(string $name) : array
    {
        return explode(' ', explode('- ', ucwords(strtolower($name)))[0]);
    }
}