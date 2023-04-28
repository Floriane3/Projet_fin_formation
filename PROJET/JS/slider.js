const slide = ["../public/chaton.jpg", "../public/slider/Armerie2.jpg", "../public/slider/chou2.jpg","../public/chatons.jpg", "../public/slider/Hortensia3.jpg", "../public/slider/pdt4.jpg", "../public/slider/Campanule3.jpg"];
let numero = 0;

function ChangeSlide(sens) {
    numero = numero + sens;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
    document.getElementById("slide").src = slide[numero];
}
/*setInterval("ChangeSlide(1)", 4000);*/