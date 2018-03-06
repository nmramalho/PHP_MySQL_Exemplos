<?php
include_once 'departamento.php';
include_once 'operacoesbd.php';

class Componente{

    /**
     * Construtor padrão
     */
    function __construct()
    {

    }    
    
    /** 
     * Método para construir ao cabeçalho da página
     * 
     * @access public 
     * @param string $titulo titulo da página
     * @return void
    */ 
    public function Cabecalho($titulo){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?=$titulo?></title>
        </head>
        <h1 align="center"><?=$titulo?></h1>
        <p align="center">O elemento <strong>select</strong> é preenchido com base nos registos da tabela departamento</p>
        <body>
      <?php
    }
 
     /** 
     * Método para criar o rodapé da página
     * 
     * @access public 
     * @param string $texto do rodapé
     * @return void
    */    
    public function Rodape($titulo){
    ?>
        <h5 align="center"><?=$titulo?></h5>
        </body>
        </html>
      <?php
    }
    
    
    
    function CriaSelectDepartamentos(){
        
        $departamento = new Departamento();  
        $operacoesbd = new OperacoesBD(); 
        
        
        $arrayDepartamentos = $operacoesbd->arrayDepartamentos();
        
        echo '<select name="departamento">';

        foreach($arrayDepartamentos as $departamento) {
            echo '<option value="'.$departamento->getId().'">'.$departamento->getNome().' </option>';
        }
        echo "</select>";
    }

    
    public function mostraFormNovoFuncionario(){
    ?>
        <form method="POST" action="inserenovofuncionario.php">
          Nome:<br>
          <input type="text" name="nome"><br>
          Apelido:<br>
          <input type="text" name="apelido"><br>
    <?php
        $this->CriaSelectDepartamentos();
    ?>
          <br><br>
          <input type="submit" value="Submit">
        </form>
      <?php
    }
    
    
    
    
    
}   
    

