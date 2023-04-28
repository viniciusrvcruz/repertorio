<?php
    include('config.php');

    $nomeSalvar = addslashes($_REQUEST["nomemusica"]);
    $autorSalvar = addslashes($_REQUEST["autormusica"]);
    $link_videoSalvar = $_REQUEST["linkmusica"];
    $tomSalvar = $_REQUEST["tommusica"];

    $sql = "UPDATE musicas SET 
    
    nome = '{$nomeSalvar}',
    autor = '{$autorSalvar}',
    link_video = '{$link_videoSalvar}',
    tom = '{$tomSalvar}' WHERE id=".$_REQUEST["id"];

    $res = $conn->query($sql);

    if($res==true) {
        $letraSalvar = addslashes($_REQUEST["letramusica"]);

        $sql = "UPDATE letra SET 
        
        letra = '{$letraSalvar}' WHERE musica_id=".$_REQUEST["id"];

        $res = $conn->query($sql);
        if($res==true) {
            print "<script>alert('Editou com sucesso');</script>";
            print "<script>location.href='musica-selecionada.php?id={$_REQUEST["id"]}';</script>";
        } else {
            print "<script>alert('Não foi possível editar!);</script>";
            print "<script>location.href='?page=listar-musica;</script>";
        }
    } else {
        print "<script>alert('Não foi possível cadastrar com sucesso');</script>";
    }
?>