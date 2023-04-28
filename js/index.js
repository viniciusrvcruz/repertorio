let pesquisar = document.querySelector('#pesquisar-musica')
let divMusica = document.querySelectorAll('.musica-container')
let divNomeMusica = document.querySelectorAll('.link-musica')
let sectionMusicas = document.querySelector('#musicas')

pesquisar.addEventListener('input', () => {
    mostrarPesquisa()
})

document.querySelector('#button-voltar-pesquisar').addEventListener('click', () => {
    pesquisar.value = ''
    document.querySelector('#button-voltar-pesquisar').style.display = 'none'
    document.querySelector('#button-pesquisar').style.display = 'flex'

    for(let i = 0; i < divMusica.length; i++) {
        sectionMusicas.style.display = 'block'
        divMusica[i].style.display = 'flex'
    }
})

document.querySelector('.adicionar-musica').addEventListener('click', (e) => {
    click = e.target
    imgFechar = document.querySelector('.fechar-nova-musica')
    sectionAdicionarMusica = document.querySelector('.adicionar-musica')

    if(click == sectionAdicionarMusica || click == imgFechar) {
        sectionAdicionarMusica.style.display = 'none'
    }
})

function mostrarPesquisa() {
    if(pesquisar.value) {
        let cont = 0

        document.querySelector('#button-voltar-pesquisar').style.display = 'flex'
        document.querySelector('#button-pesquisar').style.display = 'none'
        
        for(let i = 0; i < divMusica.length; i++) {
            if(divNomeMusica[i].innerHTML.toLowerCase().includes(`${pesquisar.value.toLowerCase()}`)) {
                sectionMusicas.style.display = 'block'
                divMusica[i].style.display = 'flex'
                continue
            } else {
                divMusica[i].style.display = 'none'
                cont++
            }
        }
        
        if(cont == divMusica.length) {
            for(let i = 0; i < divMusica.length; i++) {
                divMusica[i].style.display = 'none'
                sectionMusicas.style.display = 'none'
            }
        }
    }
}