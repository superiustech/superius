<?php 

class GDA{
    public static function insert($arr){
        $certo = true;
        $nome_tabela = $arr['nome_tabela'];
        $query = "INSERT INTO `$nome_tabela` VALUES (null";
        foreach ($arr as $key => $value) {
            $nome = $key;
            $valor = $value;
            if($nome == 'acao' || $nome == 'nome_tabela')
                continue;
            if($value == ''){
                $certo = false;
                break;
            }
            $query.=",?";
            $parametros[] = $value;
        }

        $query.=")";
        if($certo == true){
            $sql = MySql::conectar()->prepare($query);
            $sql->execute($parametros);
            $lastId = MySql::conectar()->lastInsertId();
            $sql = MySql::conectar()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = $lastId");
            $sql->execute(array($lastId));
        }
        return $certo;
    }

    public static function update($arr,$single = false){
        $certo = true;
        $first = false;
        $nome_tabela = $arr['nome_tabela'];

        $query = "UPDATE `$nome_tabela` SET ";
        foreach ($arr as $key => $value) {
            $nome = $key;
            $valor = $value;
            if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
                continue;
            if($value == ''){
                $certo = false;
                break;
            }
            
            if($first == false){
                $first = true;
                $query.="$nome=?";
            }
            else{
                $query.=",$nome=?";
            }

            $parametros[] = $value;
        }

        if($certo == true){
            if($single == false){
                $parametros[] = $arr['id'];
                $sql = MySql::conectar()->prepare($query.' WHERE id=?');
                $sql->execute($parametros);
            }else{
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
            }
        }
        return $certo;
    }

    public static function selectAll($tabela,$start = null,$end = null){
        if($start == null && $end == null)
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC");
        else
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end");

        $sql->execute();

        
        return $sql->fetchAll();

    }

    public static function deletar($tabela,$id=false){
        if($id == false){
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
        }else{
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
        }
        $sql->execute();
    }

    public static function redirect($url){
        echo '<script>location.href="'.$url.'"</script>';
        die();
    }

    /*
        Metodo especifico para selecionar apenas 1 registro.
    */
    public static function select($table,$query = '',$arr = ''){
        if($query != false){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
            $sql->execute($arr);
        }else{
            $sql = MySql::conectar()->prepare("SELECT * FROM `$table`");
            $sql->execute();
        }
        return $sql->fetch();
    }

}

?>