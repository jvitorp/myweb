<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29/03/18
 * Time: 19:42
 */

namespace Core\Helpers;

use Core\DbRead;
class Page
{
    private $total;
    private $registros;
    private $numPaginas;
    private $Pagina;
    private $First;
    private $Last;
    private $Table;
    private $Order;
    private $Col;
    private $Query;
    private $btn;
    /*
     * @var $total = Total de Post ou itens
     * @var $registros = Numero a ser exibidos por páginas
     * @var $pagina = pagina atual
     * @var $colunas = Colunas que serão utilizadas para serem carregadas na paginas
     * @var $tables = tabela da db que serão carregadas
     * @var $order = Ordem que o seus post serão exibidos
     */
    public function __construct($total,$registros,$pagina, $colunas,$tables,$order = "")
    {
        $this->total = (int) $total;
        $this->registros = (int) $registros;
        $this->numPaginas = ceil($total/$registros);
        $this->First = ($registros * $pagina) - $registros;
        $this->Last = $registros;
        $this->Pagina = $pagina;
        $this->Col = $colunas;
        $this->Table = $tables;
        $this->Order = $order;
    }
    /*
     * @var $string = query que será criada no construct
     *
     */
    public function Page()
    {
        $string = "SELECT {$this->Col} from {$this->Table} {$this->Order}  LIMIT  {$this->First},{$this->registros} ";
        // Caso numero de paginas for menor que o total de paginas retorna um false
        if($this->numPaginas >= $this->Pagina) {
            $this->Query = DbRead::Query($string);
            // Gera os button
            for ($i = 1; $i <= $this->numPaginas; $i++) {

                if($i == $this->Pagina){
                    $this->btn .= "<li><a class='button small active' href='/post/page/{$i}'>{$i}</a></li>";
                }else{
                    $this->btn .= "<li><a class='button small' href='/post/page/{$i}'>{$i}</a></li>";
                }
            }
        }
        else{
            return false;
        }

    }
    /*
     * @return retorna os Post
     */
    public function getPost()
    {
        return $this->Query;
    }

    /*
     * @return Retorna os botões com os links
     */
    public function getBtn()
    {
        return $this->btn;
    }



}