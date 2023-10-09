<?php

	class contatoModel{
        public static function retornaId($usuario) {
            $sql = MySql::conectar()->prepare("
            SELECT nCdCliente FROM CLIENTES WHERE sNmCliente = '$usuario'
            ");
        $sql->execute();
        $sql->fetch();
        return $sql;
        }
        
        
        public static function contato($usuario , $assunto , $mensagem){
            $sql = MySql::conectar()->prepare(
                "INSERT INTO CONTATO (nCdCliente, sDsAssunto , sDsMensagem) VALUES ($usuario , '$assunto' , '$mensagem')"
            );
            if($sql->execute() == true){
                return true;
            }else{
                return false;
            }

        }

    }
?>