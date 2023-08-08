<?php 

class SiteSQL{

    public static function RetornaToken(){
        return "SELECT nCdUsuario FROM USUARIOS_ONLINE WHERE sDsToken = ?";
    }
    
    public static function AtualizaToken(){
        return "UPDATE USUARIOS_ONLINE SET tDtUltimaAcao = ? WHERE sDsToken = ?";
    }
    public static function InsereUsuario(){
        return "INSERT INTO USUARIOS_ONLINE VALUES (null,?,?,?)";
    }
    public static function InsereVisita(){
        return "INSERT INTO USUARIOS_VISITAS VALUES (null, ?,?)";
    }
    
}

?>