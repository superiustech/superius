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
        )");
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function retornaTodosServicosPorId($id){
        $sql = MySql::conectar()->prepare("SELECT CE.*, CEI.*
         FROM CONTROLE_SERVICOS CE
         INNER JOIN CONTROLE_SERVICOS_IMAGEM CEI ON CEI.nCdServico = CE.nCdServico
         WHERE CEI.nCdImagem = (
             SELECT MIN(nCdImagem)
             FROM CONTROLE_SERVICOS_IMAGEM
             WHERE nCdServico = CE.nCdServico
         );
         AND CE.nCdServico = $id");
         
         $sql->execute();
         return $sql->fetch();
     }

	
}
?>