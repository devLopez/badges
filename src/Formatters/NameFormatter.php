<?php

namespace Igrejanet\Badges\Formatters;

class NameFormatter
{
    public static function generateName(string $pessoa): string
    {
        $nomeFormatado = '';
        $char          = 14;

        $pessoa = static::prepareNameForGeneration($pessoa);

        foreach ($pessoa as $key => $nome) {
            if (!(strlen($nomeFormatado) + strlen($nome) < $char)) {
                return trim($nomeFormatado);
            }

            if (in_array($nome, ['De', 'Da', 'Do', 'Das', 'Dos', 'E'])) {
                if (!(strlen($nomeFormatado) + strlen($nome) + strlen(@$pessoa[$key + 1]) < $char)) {
                    return trim($nomeFormatado);
                }

                $nome = strtolower($nome);
            }

            $nomeFormatado .= ' ' . $nome;
        }

        return trim($nomeFormatado);
    }

    protected static function prepareNameForGeneration(string $name): array
    {
        return explode(' ', explode('- ', ucwords(strtolower($name)))[0]);
    }
}
