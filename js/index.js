let pesquisar = document.querySelector('#pesquisar-musica')
let divMusica = document.querySelectorAll('.musica-container')
let divNomeMusica = document.querySelectorAll('.link-musica')
let sectionMusicas = document.querySelector('#musicas')
let qtdMusicas = document.querySelector('.nome-da-musica h3')

if(divMusica != null && divMusica.length > 1) {
    qtdMusicas.innerHTML = `${divMusica.length} Músicas`
} else {
    qtdMusicas.innerHTML = `${divMusica.length} Música`
}

pesquisar.addEventListener('input', () => {
    mostrarPesquisa()
})

document.querySelector('.icons-menu-user').addEventListener('click', (e) => {
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
            if(divNomeMusica[i].innerHTML.normalize('NFD').replace(/[\u0300-\u036f\s'"`]/g, '').toLowerCase().includes(`${pesquisar.value.replace(/[\u0300-\u036f\s'"`]/g, '').toLowerCase()}`) || divNomeMusica[i].innerHTML.toLowerCase().includes(`${pesquisar.value.toLowerCase()}`)) {
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

function share(){
	if (navigator.share !== undefined) {
		navigator.share({
			title: 'Repertório',
			text: 'Esse é o meu repertório',
			url: 'https://projeto-teste1.000webhostapp.com/',
		})
		.then(() => console.log('Successful share'))
		.catch((error) => console.log('Error sharing', error));
	}
}