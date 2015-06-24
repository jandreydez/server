<?php
/*
 * Versão: 1.0
 * Desenvolvedor: Vlamir Santo
 * Classe de CRUD ao banco de dados
 */

require_once 'inc_config.php';

class crud {
 
    /*
     * Declaração de variáveis
     */
    static private $database = DB_DATABASE;
    static private $user = DB_USER;
    static private $password = DB_PASS;
    static private $host = DB_SERVER;
    static private $conexao = null;
    static private $debug = true;
    public $tabela;
    public $tabela_join;

    public function setTabela( $tabela )
    {
        $this->tabela = $tabela;
    }

    public function setTabelaJoin( $tabela_join )
    {
        $this->tabela_join = $tabela_join;
    }

    /*
     * Método de conexão com o banco de dados
     */
    private function connect()
    {
        if(is_null(self::$conexao)){
            $con = mysql_connect(self::$host, self::$user, self::$password);
            self::$conexao = mysql_select_db(self::$database, $con);
            if(self::$conexao){
                return self::$conexao;
            } else {
                die("Não foi possível conectar ao Banco de Dados! Por favor, contate o suporte.");
            }
        }
    }

    /*
     * Método de desconexão com o banco de dados
     */
    protected function close_connect()
    {
        if(self::$conexao){
            mysql_close(self::$conexao);
        }
    }

    /*
     * Método de execução de query
     * @params $sql
     * @return resultado da consulta
     */
    protected function execute($sql)
    {
        if(is_null(self::$conexao)){
            self::connect();
        }
        $resultado = mysql_query($sql);
        return $resultado;
    }

    /* 
     * Método de inclusão de registros dados no banco
     * @params array $dados
     * @return true
     */
    protected function insert(array $dados)
    {
        $sql = "INSERT INTO $this->tabela (";
        $separador = "";
        foreach($dados as $campo => $valor){
            $sql .= $separador . $campo;
            $separador = ", ";
        }
        $sql .= ") VALUES (";
        $separador = "";
        foreach($dados as $campo => $valor){
            $sql .= $separador . "'$valor'";
            $separador = ", ";
        }
        $sql .= ")";
        $this->execute($sql);
        return true;
    }
    
    /*
     * Método de alteração de registros no banco de dados
     * $params array $dados, $condicao
     * @return true
     */
    protected function update(array $dados, $condicao)
    {
        $sql = "UPDATE $this->tabela SET ";
        $separador = "";
        foreach($dados as $campo => $valor){
            $sql .= "$separador $campo = '$valor'";
            $separador = ", ";
        }
        $sql .= " WHERE $condicao";
        $this->execute($sql);
        return true;
    }

    /*
     * Método de consulta de registros do banco de dados
     * @params array $campos a serem retornados
     * @params $condicao da query não obrigatória
     * @params $fetch executa ou não o fetch object
     * @return $dados
     */
    protected function select(array $campos, $condicao = false, $ordem = 'ASC', $fetch = false)
    {
        $sql = "SELECT " . join(', ', $campos) . " FROM $this->tabela ";
        if($condicao){
            $sql .= $condicao;
        }
        $sql .= " ORDER BY id $ordem";
        $query = $this->execute($sql);
        if($fetch){
            $query = $this->fetch($query);
        }
        return $query;
    }

    protected function selectCount($campo, $condicao = false, $group_by, $ordem = 'id ASC', $fetch = false)
    {
        $sql = "SELECT tb2.titulo, tb1.id_opcao, COUNT($campo) AS total FROM $this->tabela tb1 ";
        $sql .= "LEFT JOIN $this->tabela_join tb2 ON tb2.id = tb1.id_opcao ";
        if($condicao){
            $sql .= $condicao;
        }
        if($group_by) {
            $sql .= " GROUP BY $group_by ";
        }
        $sql .= " ORDER BY $ordem";
        $query = $this->execute($sql);
        if($fetch){
            $query = $this->fetch($query);
        }
        return $query;
    }

    // FUNÇÃO DE EXCLUSÃO DE DADOS NO BANCO DE DADOS
    protected function delete( $condicao )
    {
        $sql = "DELETE FROM $this->tabela WHERE $condicao";
        $this->execute( $sql );
        return true;
    }

    /*
     * Método de fetch para consultas
     */
    public function fetch($resultado)
    {
        if($resultado){
            $objeto = mysql_fetch_object($resultado);
            return $objeto;
        }
    }

    /*
     * Método para tratamento de injeção de SQL
     */
    protected function sanitize($string)
    {
        $saida = htmlspecialchars($string, ENT_QUOTES);
        $saida = strip_tags($string);
        $saida = utf8_decode($saida);
        return $saida;
    }

}