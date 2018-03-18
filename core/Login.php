<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 11:15
 */

namespace Core;

use Core\Session;
use Core\DbRead;

class Login
{
    private  $email;
    private  $pass;
    private  $Select;
    private  $Msg;

    public function __construct($email,$pass)
    {
        $this->email = (string) $email;
        $this->pass = (string) $pass;
    }

    public function setLogin()
    {
        $query = "SELECT * FROM cms_users WHERE user_email = ? AND user_pass = ?";
        $this->Select = DbRead::SimpleRead($query,array($this->email,$this->pass));

        if(DbRead::getCount() > 0 )
        {
            Session::setSession("Logged",$this->Select->user_name);
            Session::setSession("Level",$this->Select->user_level);

            DbUpdate::Update("UPDATE cms_users set user_session = NOW() WHERE user_email = ?",array($this->email));
            return true;
        }
        else{
            return false;
        }
    }










}