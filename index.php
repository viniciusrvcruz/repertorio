<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repertório</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="js/index.js" defer></script>
</head>

<!--https://ayltoninacio.com.br/blog/como-baixar-imagem-de-capa-miniatura-thumbnail-youtube-->

<body>
    <header>
        <h2>Repertório</h2>
    </header>
    <main>
        <section id="nome-repertorio">
            <div class="nome-da-musica">
                <h1>Repertorio do Vinicius</h1>
                <h3><?php 
                        include('config.php');

                        $sql = "SELECT COUNT(*) as total FROM musicas";
                        $resultado = mysqli_query($conn, $sql);
                        $linha = mysqli_fetch_assoc($resultado);
                        $total = $linha["total"];
                        if($total > 1) {
                            print $total. " músicas";
                        } else if($total == 1) {
                            print $total. " música";
                        } else {
                            print "Nenhuma música";
                        }
                        
                    ?></h3>
            </div>
            <div class="icons-menu-user">
                <span class="material-symbols-outlined icon-menu">
                    menu
                </span>
                <span class="material-symbols-outlined">
                    group
                </span>
            </div>
        </section>
        <div id="pesquisar">
            <div class="container-pesquisar">
                <button id="button-pesquisar"><img src="Icons/search.png" alt="pesquisar"></button>
                <button id="button-voltar-pesquisar"><img src="Icons/back_icon.png" alt="pesquisar"></button>
                <input type="text" name="pesquisar-musica" id="pesquisar-musica" placeholder="Digite o nome da música">
            </div>
        </div>
        <?php 
                /*if(@$_POST['pesquisar-musica']) {
                    include('pesquisar-musicas.php');
                }*/
                include('config.php');
                include("listar-musicas.php");
        ?>
        <button onclick="document.querySelector('.adicionar-musica').style.display = 'flex';" id="btn-adicionar-musica"><span class="material-symbols-outlined">add</span></button>
        <section class="adicionar-musica">
        <div class="adicionar-musica-container">
            <div class="adicionar-musica-close">
                <h1>Nova música</h1>
                <img src="Icons/close_icon.png" alt="Fechar" class="fechar-nova-musica">
            </div>
            <form action="salvar-musica.php" method="post">
                <div>
                    <label for="nomemusica">Nome da música</label>
                    <input type="text" name="nomemusica" id="nomemusica" placeholder="Digite o nome da música">
                </div>
                <div>
                    <label for="autormusica">Banda ou Cantor(a)</label>
                    <input type="text" name="autormusica" id="autormusica" placeholder="Digite banda ou cantor(a)">
                </div>
                <div>
                    <label for="tommusica">Tom da música</label>
                    <select name="tommusica" id="tommusica">
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
                    <input type="url" name="linkmusica" id="linkmusica" placeholder="Link do vídeo ou arquivo da música">
                </div>
                <div>
                    <label for="letramusica">Letra</label>
                    <textarea name="letramusica" id="letramusica" cols="30" rows="10" maxlength="5000" placeholder="Digite a letra da música ou cole" required></textarea>
                </div>
                <button type="submit">Concluído</button>
            </form>
        </div>
    </section>
    </main>
    <footer>
        <div class="nome-span-footer">
            <span class="material-symbols-outlined icons-footer">home</span>
        </div>
        <div class="nome-span-footer">
            <span class="material-symbols-outlined  icons-footer">event_available</span>
        </div>
        <div class="nome-span-footer"><span class="material-symbols-outlined  icons-footer">library_books</span></div>
        <div class="nome-span-footer">
            <span class="material-symbols-outlined icons-footer">groups</span>
        </div>
        <div class="nome-span-footer">
            <span class="material-symbols-outlined icons-footer">mic</span>   
        </div>
    </footer>

    <script>// script provisório para fazer o footer esconder com o scrooll
        var lastScrollTop = 0;
        var footer = document.querySelector('footer');

        window.addEventListener('scroll', function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                footer.style.bottom = '-100px';
                document.querySelector('#btn-adicionar-musica').style.bottom = '20px';
            } else {
                footer.style.bottom = '0';
                document.querySelector('#btn-adicionar-musica').style.bottom = '82px';
            }
        lastScrollTop = scrollTop;
        });

    </script>
</body>
</html>