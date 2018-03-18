<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28/02/18
 * Time: 19:16
 */

namespace Core;


class Upload
{
    public  $file;
    public $type = array('gif','jpg','jpe','jpeg','png');
    public $size = 2048576;
    public $local = 'uploads/thumb/';
    public static $error;

    public function __construct($files)
    {
        $this->file = $files;

    }
    private function getType()
    {
        $type = isset($this->file['type']) ? explode("/",$this->file['type']) : array("none","none");
        if(in_array($type[1], $this->type)){
            return $type[1];
        }
        else{
            return false;
        }
    }
    private function getSize()
    {
        if($this->file['size'] > $this->size)
        {
            return true;
        }
    }
    /*
     * Retorna o erro do arquivo
     */
    private function setRename($name)
    {
        $newName = crypt($name."".date("d-m-y h:m:s"),uniqid(rand(), true)).".....";
        $n = preg_replace("/[][><}{)(:.;,!?*%~^`@]/", "", $newName);
        $new = str_replace("/","y",$n);
        return $new.".".$this->getType();
    }
    /*
     * Retorna o erro do arquivo
     */
    public static function getError()
    {
        if(self::$error)
            return self::$error['error'];
    }
    /*
     * @param = Efetua o upload no servidor realizando a verificação de extesão e size
     * renomeia para evitar upload de arquivos invalidos e execuções do mesmo
     */
    public function setUpload()
    {
        $local = "uploads/thumb/".$this->setRename($this->file['name']);


       if($this->getType() || $this->getSize())
       {
           if (move_uploaded_file($this->file['tmp_name'], $local )) {
                return $local;
           } else {
                self::$error = ['error' => 'não foi possivel realizar upload'];
                return false;
           }
       }
       else{
           self::$error = ['error' => 'não foi possivel realizar upload: Tamanho ou tipo de arquivo não disponivel'];
           return false;

       }

    }
}