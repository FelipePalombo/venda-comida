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

    function geraConsultaCliente($link){
        $query = 'SELECT * from cliente';
        $res = mysql_query($query,$link);
        $qtd = mysql_num_rows($res);
        if($qtd > 0){
            while($linha = mysql_fetch_assoc($res)){
                $array[] = $linha;
            }
            return $array;
        }else{
            return -1;
        }
    }

    function mostraClientesEmTr($linha){
        for($i = 0; $i < count($linha); $i++){
            $idq = $linha[$i]['id_cliente'];
            echo '<tr>';						
                echo '<td>';
                    echo '<a data-toggle="modal" data-target="#modalEditar" class="editButton btn btn-light" id=' . $idq . ' onClick="transferirDadosModal(' . $idq . ')" ><i class="icon ion-md-create text-warning w-100"></i></a>  | ';
                    echo '<a class="btn btn-light" href="acao.clientes.php?acao=delete&id_cliente='.$linha[$i]['id_cliente'].'"><i class="icon ion-md-close text-danger w-100"></i></a>';
                echo '</td>';
                echo '<td><img src="' . $linha[$i]['cliente_caminho_img'] . '" alt="Imagem do cliente." width=60 height=60></td>';
                echo '<td>' . $linha[$i]['cpf'] . '</td>';
                echo '<td>' . $linha[$i]['nome'] .'</td>';
                echo '<td>' . $linha[$i]['endereco'] .'</td>';
                echo '<td>' . $linha[$i]['telefone'] . '</td>';
            echo '</tr>';
        }
    }
?>