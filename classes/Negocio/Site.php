<?php 
class Site{
    public static function updateUsuarioOnline(){
        if(isset($_SESSION['online'])){
            $token = $_SESSION['online'];
            $verificarToken = MySql::conectar()->prepare(SiteSQL::RetornaToken());
            $verificarToken->execute(array($_SESSION['online']));

            if($verificarToken->rowCount() == 1){
                $sql = MySql::conectar()->prepare(SiteSQL::AtualizaToken());
                $sql->execute(array(HORARIO_ATUAL, $token));
            }else{
                $token = $_SESSION['online'];
                $sql = MySql::conectar()->prepare(SiteSQL::InsereUsuario());
                $sql->execute(array(IP_ADDR,$token,HORARIO_ATUAL));
            }   
        }
        else{
            $_SESSION['online'] = uniqid();
            $token = $_SESSION['online'];
            $sql = MySql::conectar()->prepare(SiteSQL::InsereUsuario());
            $sql->execute(array(IP_ADDR,$token,HORARIO_ATUAL));
        }
    }

        public static function contadorVisitas(){
            if(!isset($_COOKIE['visita'])){
                setcookie('visita',true,time() + (60*60*24*7));
                $sql = MySql::conectar()->prepare(SiteSQL::InsereVisita());
                $sql->execute(array(IP_ADDR, HORARIO_ATUAL));
            }
        }
    }

?>