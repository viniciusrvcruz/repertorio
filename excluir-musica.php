<?php 
    include ('config.php');

    $sql = "DELETE FROM letra WHERE musica_id=".$row->id;

    $res = $conn->query($sql);

    if($res==true) {
        $sql = "DELETE FROM musicas WHERE id=".$row->id;

        $res = $conn->query($sql);
        if($res==true) {
            print "<script>alert('Música excluida com sucesso');</script>";
            print "<script>location.href='index.php';</script>";
        } else {
            print "<script>alert('Não foi possível excluir!');</script>";
            print "<script>location.href='index.php';</script>";
        }
    } else {
        print "<script>alert('Não foi possível excluir!');</script>";
    }
?>