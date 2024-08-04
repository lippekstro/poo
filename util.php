<?php

class Util
{
    public static function varDumpFormatado($item) // metodo estatico, nao preciso criar um objeto da classe apenas chamar a classe :: e o nome do metodo
    {
        echo "<pre>";
        var_dump($item);
        echo "</pre>";
    }
}
