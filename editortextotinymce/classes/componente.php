<?php

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
    public function CabecalhoComTinyMCE($titulo){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            
            <script src='js/tinymce/tinymce.min.js'></script>
            <script>
                tinymce.init({
                  selector: '#mytextarea'
                });
            </script>
            
            <title><?=$titulo?></title>
        </head>
        <h1 align="center"><?=$titulo?></h1>
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
    
    public function mostraFormNovoArtigo(){
    ?>
        <form method="POST" action="#">
            Título:<br>
            <input type="text" name="titulo"><br>
            <textarea id="mytextarea">Agora podes formatar este texto! ;) </textarea>
            <input type="text" name="conteudo"><br><br>
            <input type="submit" value="Publicar">
        </form>
      <?php
    }
    
    
    
    
    
}   
    

