<?php
    function insereCliente($itens, $link){
        $linhaInsert = "INSERT INTO cliente(nome,cpf,endereco,telefone,cliente_caminho_img) values (";
        $linhaValores = "'" . $itens['nome'] . "','" . $itens['cpf'] . "','" . $itens['endereco'] . "','" 
        . $itens['telefone'] . "','" . $itens['cliente_caminho_img'] . "')";
        $query = $linhaInsert . $linhaValores;

        echo "linhaInsert: $linhaInsert";
        echo "<br>linhaValores: $linhaValores";
        echo "<br>query: $query";
        
        mysql_query($query,$link) or die(mysql_error());       
    }

    function atualizaCliente($itens, $link){
        $query = 'UPDATE cliente
                set cliente_caminho_img = "' . $itens['arq'] . '",
                    nome = "' . $itens['nome'] . '",
                    cpf = "' . $itens['cpf'] . '",
                    endereco = "' . $itens['endereco'] . '",
                    telefone = "' . $itens['telefone'] . '"
                where id_cliente = "' . $itens['idCliente'] . '"';
        mysql_query($query,$link) or die();	
    }

    function deletaCliente($id, $link){
        $query = "delete from cliente where id_cliente = $id";
		mysql_query($query, $link);
    }

?>