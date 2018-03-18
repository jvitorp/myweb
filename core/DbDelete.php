<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20/02/18
 * Time: 03:17
 */

namespace Core;


class DbDelete
{
    private static $Connect,$Delete;
    /*
     *  @param return = returna um array simples se a consulta for sucesso
     */
    public static function Delete($query , array $Dados)
    {
        self::$Connect = parent::getConn();
        self::$Delete = self::$Connect->prepare($query);
        self::$Delete->execute($Dados);

    }
}