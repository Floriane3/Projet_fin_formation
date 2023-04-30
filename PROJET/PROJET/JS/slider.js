//on sélectionne les images dans un tableau, dans un constante
const slide = ["../public/slider/chaton.jpg", "../public/slider/Armerie2.jpg", "../public/slider/chou2.jpg","../public/slider/chatons.jpg", "../public/slider/Hortensia3.jpg", "../public/slider/pdt4.jpg", "../public/slider/Campanule3.jpg"];
//on commence le slider a 0
let numero = 0;
//fonction qui changera d'image
function ChangeSlide(sens) {
    //la constante numero change selon le sens dans lequel on va
    numero = numero + sens;
    // boucles selon le sens
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
        
        //l'élément slide est modifié pour afficher l'image correspondant au numero dans le tableau slide
    document.getElementById("slide").src = slide[numero];
}
