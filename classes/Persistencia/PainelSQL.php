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
    public static function retornaCliente(){
        return 'SELECT * FROM CLIENTES WHERE sNmCliente = ? AND sDsSenha = ?';
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
        return "INSERT INTO CONTROLE_ESTOQUE VALUES (null, ?,?,?,?,?,?,?,?,?,?,?)"; 
    }
    public static function cadastrarServico(){
        return "INSERT INTO CONTROLE_SERVICOS VALUES (null, ?,?,?,?,?,?)"; 
    }
    public static function insereImagem(){
        return "INSERT INTO CONTROLE_ESTOQUE_IMAGEM VALUES (null, ?,?)";
    }
    public static function insereImagemServico(){
        return "INSERT INTO CONTROLE_SERVICOS_IMAGEM VALUES (null, ?,?)";
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
    public static function carregarServicoComFiltro($query){
        return "SELECT CE.*, COALESCE(CEI.nCdImagem, '') AS nCdImagem, COALESCE(CEI.sDsImagem, '') AS sDsImagem
        FROM CONTROLE_SERVICOS CE
        LEFT JOIN (
            SELECT nCdServico, nCdImagem AS minImagem
            FROM CONTROLE_SERVICOS_IMAGEM
            GROUP BY nCdServico
        ) CEI_MIN ON CE.nCdServico = CEI_MIN.nCdServico
        LEFT JOIN CONTROLE_SERVICOS_IMAGEM CEI ON CEI.nCdServico = CE.nCdServico AND CEI.nCdImagem = CEI_MIN.minImagem
        WHERE bFlAtivo = 1".$query;
    }
    public static function carregarServicoComFiltroDesativado($query){
        return "SELECT CE.*, COALESCE(CEI.nCdImagem, '') AS nCdImagem, COALESCE(CEI.sDsImagem, '') AS sDsImagem
        FROM CONTROLE_SERVICOS CE
        LEFT JOIN (
            SELECT nCdServico, nCdImagem AS minImagem
            FROM CONTROLE_SERVICOS_IMAGEM
            GROUP BY nCdServico
        ) CEI_MIN ON CE.nCdServico = CEI_MIN.nCdServico
        LEFT JOIN CONTROLE_SERVICOS_IMAGEM CEI ON CEI.nCdServico = CE.nCdServico AND CEI.nCdImagem = CEI_MIN.minImagem
        WHERE bFlAtivo = 0".$query;
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
    public static function  retornaTodoFinanceiro($query){
        return "SELECT * FROM CONTROLE_FINANCEIRO CF 
        INNER JOIN CLIENTES CL ON CL.nCdCliente = CF.nCdCliente
        $query AND bFlStatus = ?
        ORDER BY CF.tDtVencimento ASC";
    }
    public static function retornaContato($query){
        return "SELECT * FROM CONTATO CT
        INNER JOIN CLIENTES CL ON CL.nCdCliente = CT.nCdCliente
        WHERE sDsStatus = 0 $query";
    }
    public static function  retornaAgendaServico($query){
        return "SELECT * FROM CONTROLE_SERVICOS_AGENDA CSA
        LEFT JOIN CLIENTES CL ON CL.nCdCliente = CSA.nCdCliente
        LEFT JOIN CONTROLE_SERVICOS CSE ON CSA.nCdServico = CSE.nCdServico
        WHERE CSA.sDsStatus = ?
        ORDER BY CSA.tDtServico ASC;";
    }
    public static function  retornaAgendaServicoTMP($query){
        return "SELECT * FROM CONTROLE_SERVICOS_AGENDA CSA
        LEFT JOIN CLIENTES CL ON CL.nCdCliente = CSA.nCdCliente
        LEFT JOIN CONTROLE_SERVICOS CSE ON CSA.nCdServico = CSE.nCdServico
        WHERE CSA.sDsStatus = ? AND CSA.nCdUsuarioAdmin = ?
        ORDER BY CSA.tDtServico ASC;";
    }
    public static function  retornaAgendaServicoId($query){
        return "SELECT * FROM CONTROLE_SERVICOS_AGENDA CSA
        LEFT JOIN CLIENTES CL ON CL.nCdCliente = CSA.nCdCliente
        LEFT JOIN CONTROLE_SERVICOS CSE ON CSA.nCdServico = CSE.nCdServico
        WHERE CSA.sDsStatus = ? AND CSA.nCdUsuarioAdmin = ?
        ORDER BY CSA.tDtServico ASC;";
    }
    public static function verificaAgenda(){
        return "SELECT * FROM CONTROLE_SERVICOS_REALIZAR WHERE nCdAgendaServico = ?";
    }
    public static function atualizaStatusServicoAgenda(){
        return "UPDATE CONTROLE_SERVICOS_AGENDA SET sDsStatus = ? , nCdUsuarioAdmin = ? WHERE nCdAgendaServico = ?" ;
    }
    public static function atualizaStatusServicoRealizar(){
        return "UPDATE CONTROLE_SERVICOS_Realizar SET sDsStatus = ? WHERE nCdAgendaServico = ?" ;
    }
    public static function deletaAgendarServico(){
        return "DELETE FROM CONTROLE_SERVICOS_AGENDA WHERE nCdAgendaServico = ?" ;
    }
    public static function  retornaAgendaServicoPorId(){
        return "SELECT * FROM CONTROLE_SERVICOS_AGENDA CSA
        LEFT JOIN CLIENTES CL ON CL.nCdCliente = CSA.nCdCliente
        LEFT JOIN CONTROLE_SERVICOS CSE ON CSA.nCdServico = CSE.nCdServico
        WHERE CSA.nCdAgendaServico = ?
        ORDER BY CSA.tDtServico ASC;";
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
    public static function verificaServicos(){
        return "SELECT * FROM CONTROLE_SERVICOS WHERE bFlAtivo = 0";
    }
    public static function deletarProduto(){
        return "DELETE FROM CONTROLE_ESTOQUE WHERE nCdProduto = ?";
    }
    public static function deletarServico(){
        return "DELETE FROM CONTROLE_SERVICOS WHERE nCdServico = ?";
    }
    public static function deletarImagemProduto(){
        return "DELETE FROM CONTROLE_ESTOQUE_IMAGEM WHERE nCdProduto = ?";
    }
    public static function deletarImagemServico(){
        return "DELETE FROM CONTROLE_SERVICOS_IMAGEM WHERE nCdServico = ?";
    }
    public static function deletarImagemPorId(){
        return "DELETE FROM CONTROLE_ESTOQUE_IMAGEM WHERE nCdImagem = ?";
    }
    public static function deletarImagemServicoPorId(){
        return "DELETE FROM CONTROLE_SERVICOS_IMAGEM WHERE nCdImagem = ?";
    }
    public static function retornaImagem(){
        return "SELECT * FROM CONTROLE_ESTOQUE_IMAGEM WHERE nCdProduto = ?";
    }
    public static function retornaImagemServico(){
        return "SELECT * FROM CONTROLE_SERVICOS_IMAGEM WHERE nCdServico = ?";
    }
    public static function retornaImagemPorId(){
        return "SELECT sDsImagem FROM CONTROLE_ESTOQUE_IMAGEM WHERE nCdImagem = ?";
    }
    public static function retornaImagemServicoPorId(){
        return "SELECT sDsImagem FROM CONTROLE_SERVICOS_IMAGEM WHERE nCdImagem = ?";
    }
    public static function retornaProdutoPorId(){
        return "SELECT * FROM CONTROLE_ESTOQUE WHERE nCdProduto = ?";
    }
    public static function retornaServicoPorId(){
        return "SELECT * FROM CONTROLE_SERVICOS WHERE nCdServico = ?";
    }
    public static function atualizaProdutoPorId(){
        return "UPDATE CONTROLE_ESTOQUE SET sNmProduto = ?, sDsProduto = ?, sDsLargura = ?, sDsAltura = ?, sDsComprimento = ?, sDsPeso = ? , dQtItem = ? , dVlPreco = ?  , sDsProdutoDetalhada = ? WHERE nCdProduto = ?";
    }
    public static function atualizaServicoPorId(){
        return "UPDATE CONTROLE_SERVICOS SET sDsNome = ?, sDsServico = ?, sDsServicoDetalhada = ?, sDsPreco = ?, sNmCategoria = ?, bFlAtivo = ?  WHERE nCdServico = ?";
    }
    public static function insereDesconto(){
        return "UPDATE CONTROLE_ESTOQUE SET dVlPrecoDesconto = ? , dVlDesconto = ? WHERE nCdProduto = ?";
    }
    public static function retornaClientePorId(){
        return "SELECT * FROM CLIENTES WHERE nCdCliente = ?";
    }
    public static function enviarMensagem() {
        return "INSERT INTO CHAT_ADMIN (nCdUsuarioAdmin, sDsMensagem) VALUES (?, ?);";
    }
    public static function retornaMensagem() {
        return "SELECT CA.*, UA.*, CG.* FROM CHAT_ADMIN CA
                INNER JOIN USUARIOS_ADMIM UA ON CA.nCdUsuarioAdmin = UA.nCdUsuarioAdmin
                INNER JOIN CARGO CG ON CG.nCdCargo = UA.nCdCargo
                ORDER BY nCdChat DESC
                LIMIT 25";
    }
    public static function retornaProdutoComFiltro($query){
        return "SELECT * FROM PEDIDOS $query";
    }
    public static function aceitaServico(){
        return "INSERT INTO CONTROLE_SERVICOS_REALIZAR (nCdAgendaServico , nCdServico , nCdUsuarioAdmin , sDsStatus) VALUES (?,?,?,1);";
    }
    public static function respondeChamado(){
        return "UPDATE CONTATO SET sDsStatus = 1 WHERE nCdContato = ?";
    }
    public static function insereServico(){
        return "INSERT INTO CONTROLE_SERVICOS_AGENDA (nCdServico, nCdCliente, tDtServico) VALUES (?,?,?)";
    }
    public static function deletaChamado(){
        return "DELETE FROM CONTATO WHERE nCdContato = ?";
    }
}

?>  