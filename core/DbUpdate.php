<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20/02/18
 * Time: 03:16
 */

namespace Core;


class DbUpdate extends DBConnect
{
    private static $Connect,$Update;
    /*
     *  @param return = returna um array simples se a consulta for sucesso
     */
    public static function Update($query , array $Dados)
    {
        self::$Connect = parent::getConn();
        self::$Update = self::$Connect->prepare($query);
        self::$Update->execute($Dados);

    }



}