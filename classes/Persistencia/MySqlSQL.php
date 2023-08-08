<?php 

class MysqlSQL{
    public static function conectar(){
        return "SELECT nCdUsuario FROM USUARIOS_ONLINE WHERE sDsToken = ?";
    }
    public static function deleteById($nome_tabela,$where,$id){
        return "DELETE FROM $nome_tabela WHERE $where = $id";
    }
}

?>