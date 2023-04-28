<?php 
    include('config.php');

    $sql = "SELECT * FROM musicas";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0) {
        print "<section id=\"musicas\">";
        while($row = $res->fetch_object()) {
            $id = $row->id;
            $sql_letra = "SELECT letra FROM letra WHERE musica_id=$id";
            $res_letra = $conn->query($sql_letra);
            $letra = $res_letra->fetch_object()->letra;

            $link = substr($row->link_video, 17);

            print "<div onclick=\"location.href='musica-selecionada.php?id=".$row->id."';\" class=\"musica-container\">
            <div class=\"video-musica-autor-container\">
                <img src=\"https://img.youtube.com/vi/$link/maxresdefault.jpg\" alt=\"Oh, quão lindo esse nome é\">
                <div class=\"musica-autor\">
                    <div class=\"link-musica\">$row->nome</div>
                    <p class=\"autor\">$row->autor</p>
                </div>
            </div>
            <p class=\"tom-musica\">Tom: $row->tom</p>
        </div>";
        }
        print "</section>";
    }
?>