<?php

class ManutencaoDAO{
    private $conexao;

    public function __construct(){

        include_once 'MySQL.php';
        $this->conexao = new MySQL();

    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM manutencao WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM manutencao");
        $stmt->execute();

        $arr_manut = array();

        while($f = $stmt->fetchObject()){
            $arr_manut[] = $f;
        }

        return $arr_manut;
    }

    public function insert($dados_manutencao) {
        $sql = "INSERT INTO manutencao(id_categoria, descricao, preco, marca, observacao, estoque, unidade, validade, ativo, ncm, cfop, pis, cofins, icms_cst, aliquota_pis, aliquota_cofins, aliquota_icms, ipi, aliquota_reducao_bc, origem_icms, cest, gtin, aliquota_mva, codigo_barras) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
    
        // Corrigindo os índices
        $stmt->bindValue(1, $dados_manutencao['id_categoria']);
        $stmt->bindValue(2, $dados_manutencao['descricao']);
        $stmt->bindValue(3, $dados_manutencao['preco']);
        $stmt->bindValue(4, $dados_manutencao['marca']);
        $stmt->bindValue(5, $dados_manutencao['observacao']);
        $stmt->bindValue(6, $dados_manutencao['estoque']);
        $stmt->bindValue(7, $dados_manutencao['unidade']);
        $stmt->bindValue(8, $dados_manutencao['validade']);
        $stmt->bindValue(9, $dados_manutencao['ativo']);
        $stmt->bindValue(10, $dados_manutencao['ncm']);
        $stmt->bindValue(11, $dados_manutencao['cfop']);
        $stmt->bindValue(12, $dados_manutencao['pis']);
        $stmt->bindValue(13, $dados_manutencao['cofins']);
        $stmt->bindValue(14, $dados_manutencao['icms_cst']);
        $stmt->bindValue(15, $dados_manutencao['aliquota_pis']);
        $stmt->bindValue(16, $dados_manutencao['aliquota_cofins']);
        $stmt->bindValue(17, $dados_manutencao['aliquota_icms']);
        $stmt->bindValue(18, $dados_manutencao['ipi']);
        $stmt->bindValue(19, $dados_manutencao['aliquota_reducao_bc']);
        $stmt->bindValue(20, $dados_manutencao['origem_icms']);
        $stmt->bindValue(21, $dados_manutencao['cest']);
        $stmt->bindValue(22, $dados_manutencao['gtin']);
        $stmt->bindValue(23, $dados_manutencao['aliquota_mva']);
        $stmt->bindValue(24, $dados_manutencao['codigo_barras']);
    
        $stmt->execute();
    }   

    public function update($dados_manutencao) {
        $sql = "UPDATE manutencao 
                SET id_categoria = ?, descricao = ?, preco = ?, marca = ?, observacao = ?, estoque = ?, unidade = ?, validade = ?, ativo = ?, ncm = ?, cfop = ?, pis = ?, cofins = ?, icms_cst = ?, aliquota_pis = ?, aliquota_cofins = ?, aliquota_icms = ?, ipi = ?, aliquota_reducao_bc = ?, origem_icms = ?, cest = ?, gtin = ?, aliquota_mva = ?, codigo_barras = ? 
                WHERE id = ?";
        
        $stmt = $this->conexao->prepare($sql);
    
        // Corrigindo os índices
        $stmt->bindValue(1, $dados_manutencao['id_categoria']);
        $stmt->bindValue(2, $dados_manutencao['descricao']);
        $stmt->bindValue(3, $dados_manutencao['preco']);
        $stmt->bindValue(4, $dados_manutencao['marca']);
        $stmt->bindValue(5, $dados_manutencao['observacao']);
        $stmt->bindValue(6, $dados_manutencao['estoque']);
        $stmt->bindValue(7, $dados_manutencao['unidade']);
        $stmt->bindValue(8, $dados_manutencao['validade']);
        $stmt->bindValue(9, $dados_manutencao['ativo']);
        $stmt->bindValue(10, $dados_manutencao['ncm']);
        $stmt->bindValue(11, $dados_manutencao['cfop']);
        $stmt->bindValue(12, $dados_manutencao['pis']);
        $stmt->bindValue(13, $dados_manutencao['cofins']);
        $stmt->bindValue(14, $dados_manutencao['icms_cst']);
        $stmt->bindValue(15, $dados_manutencao['aliquota_pis']);
        $stmt->bindValue(16, $dados_manutencao['aliquota_cofins']);
        $stmt->bindValue(17, $dados_manutencao['aliquota_icms']);
        $stmt->bindValue(18, $dados_manutencao['ipi']);
        $stmt->bindValue(19, $dados_manutencao['aliquota_reducao_bc']);
        $stmt->bindValue(20, $dados_manutencao['origem_icms']);
        $stmt->bindValue(21, $dados_manutencao['cest']);
        $stmt->bindValue(22, $dados_manutencao['gtin']);
        $stmt->bindValue(23, $dados_manutencao['aliquota_mva']);
        $stmt->bindValue(24, $dados_manutencao['codigo_barras']);
        $stmt->bindValue(25, $dados_manutencao['id']);
    
        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM manutencao where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }
}