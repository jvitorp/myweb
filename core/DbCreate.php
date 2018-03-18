<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20/02/18
 * Time: 03:16
 */

namespace Core;


class DbCreate extends DBConnect
{
    private static $Connect,$Create;
    /*
     *  @param return = returna um array simples se a consulta for sucesso
     */
    public static function Create($query , array $Dados)
    {
        self::$Connect = parent::getConn();
        self::$Create = self::$Connect->prepare($query);
        self::$Create->execute($Dados);
    }
    /*
     *  @param return = retorna o ultimo Id inserido no sistema
     */
    public static function LastInsert()
    {
        return self::$Create->lastIsertId();
    }
    /*
     *  @param return = retorna a quantidade de linhas afetadas
     */
    public static function rowCount()
    {
        return self::$Create->rowCount();
    }
}