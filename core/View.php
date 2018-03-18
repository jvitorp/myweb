<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 10:49
 */

namespace Core;

use Rain\Tpl;

abstract class View
{
    public static $template;
    public static $display;



    /*
     * Carrega as informações basicas do template;
     */
    public function __construct()
    {
        self::$template = new Tpl;

        self::$template->assign('name', Session::getSession('Logged'));
        self::$template->assign('cargo', Session::getSession('Level'));


    }

    /*
     * @param newAssign = Adiciona uma nova variavel ao template com $name = nome e $value = com o valor;
     */

    public static function newAssign($name,$value)
    {
      self::$template->assign($name,$value);

    }
    /*
     * @param setDisplay = Visualiza a view;
     */
    public static function setDisplay($name)
    {
        self::$template->draw($name);

    }


}