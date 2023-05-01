<?php 
    include('config.php');

    $sql = "SELECT * FROM musicas WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $row->nome; ?></title>
    <link rel="stylesheet" href="css/style-selecionar-musica.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    </style>
    <script src="js/musica-selecionada.js" defer></script>
</head>

<body>
    <header>
        <section>
            <button class="voltar" onclick="window.history.back();";><img src="Icons/back_icon.png" alt="Voltar"></button>
            <h1><?php print $row->nome ." ($row->tom)";?> </h1>
            <button class="menu"><img src="Icons/menu_tres_pontinhos_icon.png" alt="menu" class="menu-img"></button>
            <div class="opcoes-container">
                <div class="opcoes">
                    <p onclick="document.querySelector('.editar-musica').style.display = 'flex';document.querySelector('.opcoes-container').style.display = 'none';">Editar</p>
                    <p>Compartilhar</p>
                    <p onclick="if(confirm('Deseja mesmo excluir a música?')){location.href='?page=excluir-musica&id=<?php print $row->id;?>'}else{false}">Excluir</p>
                </div>
            </div>
        </section>
    </header>
    <main>
        <section class="video">
            <iframe src="https://www.youtube.com/embed/<?php print substr($row->link_video, 17);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </section>
        <section class="letra-container">
            <div class="nome-anotacoes">
                <div class="nome-autor-tom">
                    <h1><?php print $row->nome;?></h1>
                    <h3><?php print $row->autor;?></h3>
                    <h2>Tom: <?php print $row->tom;?></h2>
                </div>
                <button class="btn-anotacoes" onclick="document.querySelector('.comentario-musica').style.display = 'flex';"><img src="Icons/comment_text_icon.png" alt="Anotações"></button>
            </div>
            <div class="letra">
                <?php 

                $sql_letra = "SELECT letra FROM letra WHERE musica_id=".$_REQUEST["id"];
                $res_letra = $conn->query($sql_letra);
                $letra = $res_letra->fetch_object()->letra;
                
                $letraQuebraDeLinha = nl2br($letra);
                $letraFormatada = '<p>' . preg_replace('/\n(\s*\n)+/', '</p><p>', $letraQuebraDeLinha) . '</p>';
        
                print $letraFormatada
                ?>
            </div>
        </section>
    </main>
    <section class="comentario-musica">
        <div class="comentario-musica-container">
            <div class="comentario-musica-close">
                <div class="comentario-header">
                    <h1>Comentários</h1>
                    <img src="Icons/close_icon.png" alt="Fechar"class="comentario-excluir-musica">
                </div>
                <h2><?php print $row->nome; ?></h2>
                <h3><?php print $row->autor; ?></h3>
            </div>
            <form action="salvar-comentario-musica.php" method="POST">
                <input type="hidden" name="id" value="<?php print $row->id; ?>">
                <textarea name="comentario" id="comentario" cols="30" rows="10" maxlength="2000" placeholder="Digite um comentário"><?php
                $sql_letra = "SELECT comentario FROM letra WHERE musica_id=".$_REQUEST["id"]; 
                $res_letra = $conn->query($sql_letra);
                $comentario = $res_letra->fetch_object()->comentario;
                print $comentario;
                ?></textarea>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    <section class="editar-musica">
        <div class="editar-musica-container">
            <div class="editar-musica-close">
                <h1>Editar música</h1>
                <img src="Icons/close_icon.png" alt="Fechar" class="fechar-editar-musica">
            </div>
            <form action="salvar-editar-musica.php" method="POST">
                <input type="hidden" name="id" value="<?php print $row->id; ?>">
                <div>
                    <label for="nomemusica">Nome da música</label>
                    <input type="text" name="nomemusica" id="nomemusica" placeholder="Digite o nome da música" value="<?php print $row->nome; ?>">
                </div>
                <div>
                    <label for="autormusica">Banda ou Cantor(a)</label>
                    <input type="text" name="autormusica" id="autormusica" placeholder="Digite banda ou cantor(a)" value="<?php print $row->autor;?>">
                </div>
                <div>
                    <label for="tommusica">Tom da música</label>
                    <select name="tommusica" id="tommusica">
                        <option value="<?php print $row->tom;?>"><?php print $row->tom;?></option>
                        <option value="C">C</option>
                        <option value="C#">C#</option>
                        <option value="D">D</option>
                        <option value="D#">D#</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="F#">F#</option>
                        <option value="G">G</option>
                        <option value="G#">G#</option>
                        <option value="A">A</option>
                        <option value="A#">A#</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <div>
                    <label for="linkmusica">Link do vídeo ou arquivo</label>
                    <input type="url" name="linkmusica" id="linkmusica" placeholder="Link do vídeo ou arquivo da música" value="<?php print $row->link_video;?>">
                </div>
                <div>
                    <label for="letramusica">Letra</label>
                    <textarea name="letramusica" id="letramusica" cols="30" rows="10" maxlength="5000" placeholder="Digite a letra da música ou cole" required><?php
                            $sql_letra = "SELECT letra FROM letra WHERE musica_id=".$_REQUEST["id"]; 
                            $res_letra = $conn->query($sql_letra);
                            $letra = $res_letra->fetch_object()->letra;
                            print $letra;?>
                    </textarea>
                </div>
                <button type="submit">Concluído</button>
            </form>
        </div>
    </section>
    <?php 
        include('config.php');
        switch (@$_REQUEST["page"]) {
            case "excluir-musica":
                include("excluir-musica.php");
                break;
        }
    ?>
</body>
</html>