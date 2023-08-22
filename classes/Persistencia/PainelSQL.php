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
    public static function carregarProdutosComFiltro($query){
        return "SELECT CE.*, COALESCE(CEI.nCdImagem, '') AS nCdImagem, COALESCE(CEI.sDsImagem, '') AS sDsImagem
        FROM CONTROLE_ESTOQUE CE
        LEFT JOIN (
            SELECT nCdProduto, nCdImagem AS minImagem
            FROM CONTROLE_ESTOQUE_IMAGEM
            GROUP BY nCdProduto
        ) CEI_MIN ON CE.nCdProduto = CEI_MIN.nCdProduto
        LEFT JOIN CONTROLE_ESTOQUE_IMAGEM CEI ON CEI.nCdProduto = CE.nCdProduto AND CEI.nCdImagem = CEI_MIN.minImagem
        WHERE CE.dQtItem > 0".$query;
    }
    
    public static function carregarProdutosFalta(){
        return "SELECT CE.*, COALESCE(CEI.nCdImagem, '') AS nCdImagem, COALESCE(CEI.sDsImagem, '') AS sDsImagem
        FROM CONTROLE_ESTOQUE CE
        LEFT JOIN (
            SELECT nCdProduto, nCdImagem AS minImagem
            FROM CONTROLE_ESTOQUE_IMAGEM
            GROUP BY nCdProduto
        ) CEI_MIN ON CE.nCdProduto = CEI_MIN.nCdProduto
        LEFT JOIN CONTROLE_ESTOQUE_IMAGEM CEI ON CEI.nCdProduto = CE.nCdProduto AND CEI.nCdImagem = CEI_MIN.minImagem
        WHERE CE.dQtItem = 0";
    }
    public static function carregarUsuarios(){
        return "SELECT * FROM USUARIOS_ADMIM";
    }
    public static function inserirPagamento(){
        return "INSERT INTO CONTROLE_FINANCEIRO VALUES (null, ?,?,?,?,?)";
    }

    public static function retornaFinanceiroCliente(){
        return "SELECT * FROM CONTROLE_FINANCEIRO CF 
        INNER JOIN CLIENTES CL ON CL.nCdCliente = CF.nCdCliente
        WHERE CF.nCdCliente = ? AND CF.bFlStatus = ? 
        ORDER BY CF.tDtVencimento ASC";
    }
    public static function retornaTodoFinanceiro($query){
        return "SELECT * FROM CONTROLE_FINANCEIRO CF 
        INNER JOIN CLIENTES CL ON CL.nCdCliente = CF.nCdCliente
        $query AND bFlStatus = ?
        ORDER BY CF.tDtVencimento ASC";
    }
    public static function retornaTodoFinanceiroSemStatus($query){
        return "SELECT * FROM CONTROLE_FINANCEIRO CF 
        INNER JOIN CLIENTES CL ON CL.nCdCliente = CF.nCdCliente
        $query
        ORDER BY CF.tDtVencimento ASC";
    }
    public static function atualizarStatusFinanceiro(){
        return "UPDATE CONTROLE_FINANCEIRO SET bFlStatus = 1 WHERE nCdControleFinanceiro = ?";
    }
    public static function retornaEstoqueCompleto(){
        return "SELECT CE.*, CEI.*
        FROM CONTROLE_ESTOQUE CE
        INNER JOIN CONTROLE_ESTOQUE_IMAGEM CEI ON CEI.nCdProduto = CE.nCdProduto
        WHERE CEI.nCdImagem = (
            SELECT MIN(nCdImagem)
            FROM CONTROLE_ESTOQUE_IMAGEM
            WHERE nCdProduto = CE.nCdProduto
        )";
    }
    public static function atualizarQuantidadeProduto(){
        return "UPDATE CONTROLE_ESTOQUE SET dQtItem = ? WHERE nCdProduto = ?";
    }
    public static function verificaEstoque(){
        return "SELECT * FROM CONTROLE_ESTOQUE WHERE dQtItem = 0";
    }
    public static function deletarProduto(){
        return "DELETE FROM CONTROLE_ESTOQUE WHERE nCdProduto = ?";
    }
    public static function deletarImagemProduto(){
        return "DELETE FROM CONTROLE_ESTOQUE_IMAGEM WHERE nCdProduto = ?";
    }
    public static function deletarImagemPorId(){
        return "DELETE FROM CONTROLE_ESTOQUE_IMAGEM WHERE nCdImagem = ?";
    }
    public static function retornaImagem(){
        return "SELECT * FROM CONTROLE_ESTOQUE_IMAGEM WHERE nCdProduto = ?";
    }
    public static function retornaImagemPorId(){
        return "SELECT sDsImagem FROM CONTROLE_ESTOQUE_IMAGEM WHERE nCdImagem = ?";
    }
    public static function retornaProdutoPorId(){
        return "SELECT * FROM CONTROLE_ESTOQUE WHERE nCdProduto = ?";
    }
    public static function atualizaProdutoPorId(){
        return "UPDATE CONTROLE_ESTOQUE SET sNmProduto = ?, sDsProduto = ?, sDsLargura = ?, sDsAltura = ?, sDsComprimento = ?, sDsPeso = ? , dQtItem = ? WHERE nCdProduto = ?";
    }
}

?>