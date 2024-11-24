<?php

class ProdutoDAO{
    private $conexao;

    public function __construct(){

        include_once 'MySQL.php';
        $this->conexao = new MySQL();

    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM produto WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM produto");
        $stmt->execute();

        $arr_prod = array();

        while($f = $stmt->fetchObject()){
            $arr_prod[] = $f;
        }

        return $arr_prod;
    }

    public function insert($dados_produto) {
        $sql = "INSERT INTO produto(id_categoria, descricao, preco, marca, observacao, estoque, unidade, validade, ativo, ncm, cfop, pis, cofins, icms_cst, aliquota_pis, aliquota_cofins, aliquota_icms, ipi, aliquota_reducao_bc, origem_icms, cest, gtin, aliquota_mva, codigo_barras) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
    
        // Corrigindo os índices
        $stmt->bindValue(1, $dados_produto['id_categoria']);
        $stmt->bindValue(2, $dados_produto['descricao']);
        $stmt->bindValue(3, $dados_produto['preco']);
        $stmt->bindValue(4, $dados_produto['marca']);
        $stmt->bindValue(5, $dados_produto['observacao']);
        $stmt->bindValue(6, $dados_produto['estoque']);
        $stmt->bindValue(7, $dados_produto['unidade']);
        $stmt->bindValue(8, $dados_produto['validade']);
        $stmt->bindValue(9, $dados_produto['ativo']);
        $stmt->bindValue(10, $dados_produto['ncm']);
        $stmt->bindValue(11, $dados_produto['cfop']);
        $stmt->bindValue(12, $dados_produto['pis']);
        $stmt->bindValue(13, $dados_produto['cofins']);
        $stmt->bindValue(14, $dados_produto['icms_cst']);
        $stmt->bindValue(15, $dados_produto['aliquota_pis']);
        $stmt->bindValue(16, $dados_produto['aliquota_cofins']);
        $stmt->bindValue(17, $dados_produto['aliquota_icms']);
        $stmt->bindValue(18, $dados_produto['ipi']);
        $stmt->bindValue(19, $dados_produto['aliquota_reducao_bc']);
        $stmt->bindValue(20, $dados_produto['origem_icms']);
        $stmt->bindValue(21, $dados_produto['cest']);
        $stmt->bindValue(22, $dados_produto['gtin']);
        $stmt->bindValue(23, $dados_produto['aliquota_mva']);
        $stmt->bindValue(24, $dados_produto['codigo_barras']);
    
        $stmt->execute();
    }   

    public function update($dados_produto) {
        $sql = "UPDATE produto 
                SET id_categoria = ?, descricao = ?, preco = ?, marca = ?, observacao = ?, estoque = ?, unidade = ?, validade = ?, ativo = ?, ncm = ?, cfop = ?, pis = ?, cofins = ?, icms_cst = ?, aliquota_pis = ?, aliquota_cofins = ?, aliquota_icms = ?, ipi = ?, aliquota_reducao_bc = ?, origem_icms = ?, cest = ?, gtin = ?, aliquota_mva = ?, codigo_barras = ? 
                WHERE id = ?";
        
        $stmt = $this->conexao->prepare($sql);
    
        // Corrigindo os índices
        $stmt->bindValue(1, $dados_produto['id_categoria']);
        $stmt->bindValue(2, $dados_produto['descricao']);
        $stmt->bindValue(3, $dados_produto['preco']);
        $stmt->bindValue(4, $dados_produto['marca']);
        $stmt->bindValue(5, $dados_produto['observacao']);
        $stmt->bindValue(6, $dados_produto['estoque']);
        $stmt->bindValue(7, $dados_produto['unidade']);
        $stmt->bindValue(8, $dados_produto['validade']);
        $stmt->bindValue(9, $dados_produto['ativo']);
        $stmt->bindValue(10, $dados_produto['ncm']);
        $stmt->bindValue(11, $dados_produto['cfop']);
        $stmt->bindValue(12, $dados_produto['pis']);
        $stmt->bindValue(13, $dados_produto['cofins']);
        $stmt->bindValue(14, $dados_produto['icms_cst']);
        $stmt->bindValue(15, $dados_produto['aliquota_pis']);
        $stmt->bindValue(16, $dados_produto['aliquota_cofins']);
        $stmt->bindValue(17, $dados_produto['aliquota_icms']);
        $stmt->bindValue(18, $dados_produto['ipi']);
        $stmt->bindValue(19, $dados_produto['aliquota_reducao_bc']);
        $stmt->bindValue(20, $dados_produto['origem_icms']);
        $stmt->bindValue(21, $dados_produto['cest']);
        $stmt->bindValue(22, $dados_produto['gtin']);
        $stmt->bindValue(23, $dados_produto['aliquota_mva']);
        $stmt->bindValue(24, $dados_produto['codigo_barras']);
        $stmt->bindValue(25, $dados_produto['id']);
    
        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM produto where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getUnidadeVenda() {
        $sql = "SELECT id, descricao FROM unidade_venda";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna um array com os dados
    }
}