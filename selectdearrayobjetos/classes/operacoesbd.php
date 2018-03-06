<?php
include_once 'configuracao.php';
include_once 'departamento.php';


class OperacoesBD {
    

    private $configuracao;

    /**
     * Construtor padrão
     */
    function __construct()
    {
        $this->configuracao = new Configuracao();
    }

    /** 
     * Função para estabelecer a ligação
     * 
     * @access public 
     * @return $ligação Devolve a ligação caso sucesso FALSE caso insucesso.
    */ 
    public function ligaBD() {
 
        /* estabelece a ligação à base de dados */
        $ligacao = new mysqli($this->configuracao->host, $this->configuracao->user, $this->configuracao->password, $this->configuracao->db);
    
        /* verifica ligação*/
        if ($ligacao->connect_errno) {
            echo("Falha na ligação: " . $ligacao->connect_error);
            return false;
        }

        return $ligacao;
    }   
    
   /**
    * 
    * @return boolean| Departamento Devolve array de departamentos caso sucesso e 
    * FALSE caso insucesso
    */
    public function arrayDepartamentos() {
  
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 
        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }
        $consulta = "SELECT * FROM departamento";
        if (!$resultado = $ligacao->query($consulta)) {
            echo(" Falha na consulta: ". $ligacao->error);
            $ligacao->close(); // fecha a ligação
            return false;
        }
        $departamentos = array();
         
        /* percorrer os registos (linhas) da tabela*/
         while ($row = $resultado->fetch_assoc()){    /* fetch associative array */
             $tempDepartamento = new Departamento();
             $tempDepartamento->setId($row["id"]);
             $tempDepartamento->setNome($row["nome"]);
             $departamentos[] = $tempDepartamento;
             }
    
        $resultado->free();     /* liberta o resultado*/
        $ligacao->close();      /* fecha a ligação */
        return $departamentos;  /* devolve o array */
    }
   
}    