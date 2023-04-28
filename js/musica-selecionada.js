document.querySelector('header').addEventListener('click', (e) => {
    divClick = e.target
    buttonMenu = document.querySelector('.menu')
    imgMenu = document.querySelector('.menu-img')
    divContainer = document.querySelector('.opcoes-container')

    if(divClick == buttonMenu || divClick == imgMenu) {
        divContainer.style.display = 'flex'
    }
})


document.querySelector('.opcoes-container').addEventListener('click', (e) => {
    divClick = e.target
    divContainer = document.querySelector('.opcoes-container')
    
    if(divClick == divContainer) {
        divContainer.style.display = 'none'
    }
})

if(document.querySelector('.editar-musica')) {
    document.querySelector('.editar-musica').addEventListener('click', (e) => {
    click = e.target
    imgFechar = document.querySelector('.fechar-editar-musica')
    sectionEditarMusica = document.querySelector('.editar-musica')

    if(click == sectionEditarMusica || click == imgFechar) {
        sectionEditarMusica.style.display = 'none'
    }
})
}

if(document.querySelector('.comentario-musica')) {
    document.querySelector('.comentario-musica').addEventListener('click', (e) => {
        click = e.target
        imgFechar = document.querySelector('.comentario-excluir-musica')
        sectionEditarMusica = document.querySelector('.comentario-musica')
    
        if(click == sectionEditarMusica || click == imgFechar) {
            sectionEditarMusica.style.display = 'none'
        }
    })
}