<?php

	class servicosModel{


    public static function retornaTodosServicos(){
       $sql = MySql::conectar()->prepare("SELECT CE.*, CEI.*
        FROM CONTROLE_SERVICOS CE
        INNER JOIN CONTROLE_SERVICOS_IMAGEM CEI ON CEI.nCdServico = CE.nCdServico
        WHERE CEI.nCdImagem = (
            SELECT MIN(nCdImagem)
            FROM CONTROLE_SERVICOS_IMAGEM
            WHERE nCdServico = CE.nCdServico
        ) AND CE.bFlAtivo = 1");
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function retornaTodosServicosPorId($id , $query){
        $sql = MySql::conectar()->prepare("SELECT CE.*, CEI.*
         FROM CONTROLE_SERVICOS CE
         INNER JOIN CONTROLE_SERVICOS_IMAGEM CEI ON CEI.nCdServico = CE.nCdServico
         WHERE CEI.nCdImagem = (
             SELECT MIN(nCdImagem)
             FROM CONTROLE_SERVICOS_IMAGEM
             WHERE nCdServico = CE.nCdServico 
         );
         AND CE.nCdServico = $id OR $query");
         
         $sql->execute();
         return $sql->fetch();
     }
     public static function retornaProfissionais($cargo) {
        $sql = MySql::conectar()->prepare("SELECT * FROM USUARIOS_ADMIM WHERE nCdCargo = $cargo");
         $sql->execute();
         return $sql->fetchAll();
     }

	
}
?>