<?php 

class PainelSQL{

    public static function pegaCargo(){
    return 'SELECT C.sNmCargo FROM USUARIOS_ADMIM 
    INNER JOIN CARGO C ON C.nCdCargo = USUARIOS_ADMIM.nCdCargo 
    WHERE sNmUsuario = ?';
    }
    public static function pegaAvatar(){
        return 'SELECT sDsImagem FROM USUARIOS_ADMIM WHERE sNmUsuario = ?';
    }
    public static function verificaLogin(){
        return 'SELECT * FROM USUARIOS_ADMIM WHERE sNmUsuario = ? AND sDsSenha = ?';
    }
    public static function limparUsuariosOnline(){
        return "DELETE FROM USUARIOS_ONLINE WHERE tDtUltimaAcao < :date - INTERVAL 1 MINUTE";
    }
    public static function listarUsuariosOnline(){
       return "SELECT * FROM USUARIOS_ONLINE";
    }
    public static function mostrarVisitas(){
       return "SELECT * FROM USUARIOS_VISITAS";
    }
    public static function mostrarVisitasHoje(){
        return "SELECT * FROM USUARIOS_VISITAS WHERE tDtLogin = ?";
    }
    public static function atualizarUsuario(){
        return "UPDATE USUARIOS_ADMIM SET sDsSenha = ? WHERE `sNmUsuario` = ?";
    }
    public static function atualizarCliente(){
        return "UPDATE CLIENTES SET sNmCliente = ?,
                                    sDsApelido = ?, 
                                    sDsEmail = ?,
                                    sDsSenha = ?,
                                    sDsTipoDocumento = ?,      
                                    sNrCpfCnpj = ?,
                                    sDsImagem = ?
                                WHERE `nCdCliente` = ?";
    }
    
    public static function cadastrarUsuario(){
        return "INSERT INTO USUARIOS_ADMIM VALUES (null, ? , ? ,?, ?, ?)";
    }
    public static function verificarUsuario(){
            return "SELECT * FROM USUARIOS_ADMIM WHERE `sNmUsuario` = ?";
    }
    public static function verificarCliente(){
        return "SELECT * FROM CLIENTES WHERE `sNmCliente` = ?";
}
    public static function cadastrarProduto(){
        return "INSERT INTO CONTROLE_ESTOQUE VALUES (null, ?,?,?,?,?,?,?)"; 
    }
    public static function insereImagem(){
        return "INSERT INTO CONTROLE_ESTOQUE_IMAGEM VALUES (null, ?,?)";
    }
    public static function insereCliente(){
        return "INSERT INTO CLIENTES VALUES (null, ?,?,?,?,?,?,?)";
    }
    public static function carregarClientesComFiltro($query){
        return "SELECT * FROM CLIENTES $query";
    }
    public static function carregarUsuarios(){
        return "SELECT * FROM USUARIOS_ADMIM";
    }
    public static function inserirPagamento(){
        return "INSERT INTO CONTROLE_FINANCEIRO VALUES (null, ?,?,?,?,?,null)";
    }

    public static function retornaFinanceiroCliente(){
        return "SELECT * FROM CONTROLE_FINANCEIRO CF 
        INNER JOIN CLIENTES CL ON CL.nCdCliente = CF.nCdCliente
        WHERE CF.nCdCliente = ? AND CF.bFlStatus = ? 
        ORDER BY CF.tDtVencimento ASC";
    }
    public static function retornaTodoFinanceiro(){
        return "SELECT * FROM CONTROLE_FINANCEIRO CF 
        INNER JOIN CLIENTES CL ON CL.nCdCliente = CF.nCdCliente
        WHERE CF.bFlStatus = ? 
        ORDER BY CF.tDtVencimento ASC";
    }
    public static function atualizarStatusFinanceiro(){
        return "UPDATE CONTROLE_FINANCEIRO SET bFlStatus = 1 WHERE nCdControleFinanceiro = ?";
    }
}

?>