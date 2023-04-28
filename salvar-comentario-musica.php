<?php
    include('config.php');

    $sql = "UPDATE letra SET comentario = '{$_REQUEST["comentario"]}' WHERE musica_id=".$_REQUEST["id"];

    $res = $conn->query($sql);

    if($res==true) {
            print "<script>alert('Editou com sucesso');</script>";
            print "<script>location.href='musica-selecionada.php?id={$_REQUEST["id"]}';</script>";
    } else {
        print "<script>alert('Não foi possível cadastrar com sucesso');</script>";
    }
?>