const d = document;
const view = d.querySelector('#view')
const previewsDivId = d.querySelector('#previews')
const previewsStockDivId = d.querySelector('#previewsStock')

const imagesUrl = "https://picsum.photos/seed/{seed}/1960/1080";
const maxPreview = 5;

let images = [];
let selected = 0;

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Ce block changeras quand les images seont en BDD
function getImgs() {
    for (let i = 0; i < 10; i++) {
        images.push(imagesUrl.replace("{seed}", 1 + Math.floor(Math.random() * 100)))
    }
}

getImgs()
////////////////////////////////////////////////////////////////////////////////////////////////////////////
init().then(e => {
    const previews = d.querySelectorAll('.preview')
    previews.forEach(preview => {
        preview.addEventListener('click', e => {
            selected = preview.getAttribute('data-id')
            hideAndSeek()
        })
    })
});


async function init() {
    for (let i = 0; i < images.length; i++) {

        // Préparation d'un nouvel élément <img>
        let newElement = d.createElement("img");

        // Ajout src et data-place
        newElement.src = images[i]
        newElement.dataset.id = i

        // Ajout des class
        newElement.classList.add("preview")

        // Ajouter l'élément préparé
        previewsStockDivId.appendChild(newElement)
    }
    hideAndSeek()
}


function hideAndSeek() {
    const previews = d.querySelectorAll('.preview')

    let totalImages = images.length;


    let gauche = selected - 2
    if (gauche < 0) {
        gauche = previews[totalImages + gauche]
    } else {
        gauche = previews[gauche]
    }

    let milieuGauche = selected - 1
    if (milieuGauche < 0) {
        milieuGauche = previews[totalImages + milieuGauche]
    } else {
        milieuGauche = previews[milieuGauche]
    }

    let milieu = previews[selected]

    let milieuDroite = selected + 1
    if (milieuDroite > totalImages) {
        milieuDroite = previews[milieuDroite - totalImages]
    } else {
        milieuDroite = previews[milieuDroite]
    }
    let droite = selected + 2
    if (droite > totalImages){
        droite = previews[droite - totalImages]
    }else{
        droite = previews[droite]
    }

    gauche.classList.add('mr-3', 'gauche')
    milieuGauche.classList.add('mr-3')
    milieu.classList.add('center-image')
    milieuDroite.classList.add('ml-3')
    droite.classList.add('ml-3')


    previewsDivId.appendChild(gauche)
    previewsDivId.appendChild(milieuGauche)
    previewsDivId.appendChild(milieu)
    previewsDivId.appendChild(milieuDroite)
    previewsDivId.appendChild(droite)

    if (view) {
        view.src = previews[selected].src
    }
}






