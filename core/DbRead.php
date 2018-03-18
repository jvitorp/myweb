<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20/02/18
 * Time: 03:16
 */

namespace Core;

use PDO;


class DbRead extends DBConnect
{
    private static $Connect,$Result;
    /*
     *  @param return = returna um array simples se a consulta for sucesso
     */
    public static function SimpleRead($query , array $Dados)
    {
            self::$Connect = parent::getConn();
            self::$Result = self::$Connect->prepare($query);
            self::$Result->execute($Dados);
        return self::$Result->fetch(PDO::FETCH_OBJ);
    }

    /*
     * @param FullRead = Retorna um array multidemensional
     */
    public static function FullRead($query , array $Dados)
    {
            self::$Connect = parent::getConn();
            self::$Result = self::$Connect->prepare($query);
            self::$Result->execute($Dados);
        return self::$Result->fetchAll(PDO::FETCH_OBJ);
    }
    /*
   * @param FullRead = Retorna um array multidemensional
   */
    public static function Query($query)
    {
        self::$Connect = parent::getConn();
        self::$Result = self::$Connect->prepare($query);
        self::$Result->execute();
        return self::$Result->fetchAll(PDO::FETCH_ASSOC);
    }
    /*
     * @param getCount = Retorna quantidade de resultados;
     */
    public static function getCount()
    {
        return self::$Result->rowCount();
    }




}