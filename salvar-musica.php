<?php
    include('config.php');
    $sql = "INSERT INTO musicas (nome, autor, link_video, tom) VALUES ('".addslashes($_REQUEST["nomemusica"])."','".addslashes($_REQUEST["autormusica"])."','".$_REQUEST["linkmusica"]."','".$_REQUEST["tommusica"]."')";


    $res = $conn->query($sql);

    if($res==true) {
        $last_id = $conn->insert_id;

        $sql = "INSERT INTO letra (letra, musica_id) VALUES ('".addslashes($_REQUEST["letramusica"])."', $last_id)";

        $res = $conn->query($sql);
        if($res==true) {
            print "<script>alert('Cadastrou com sucesso');</script>";
            print "<script>location.href='index.php';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar com sucesso');</script>";
            print "<script>location.href='index.php'</script>";
        }
    } else {
        print "<script>alert('Não foi possível cadastrar com sucesso');</script>";
    }
?>