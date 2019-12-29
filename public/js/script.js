
$('#header').css('background-color', 'inherit');  // d'abord, on masque le deuxième menu de navigation, qui porte la classe "navigation2"
var hauteur = 1; // XXX, c'est le nombre de pixels à partir duquel on déclenche le tout
$(function(){
    $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
        if ($(this).scrollTop() > hauteur) { //si on a défile de plus de XXX (variable "hauteur) pixels du haut vers le bas
            $('#header').css('background-color', '#0D0E1F'); // On masque le 1
        } else {
            $('#header').css('background-color', 'inherit'); // "et vice et versa" (© Les inconnus, 1990 ^^)
        }
    });
});

let saison = document.getElementById('nbSaisons').value;

$(document).ready(function(){
    $('#caroussel_saison').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4
    });
});

$(document).ready(function(){
    for (let i = 1; i<=saison;i++){
    $('.caroussel_episode_'+i+'').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4
    });}
});


for (j=2;j<=saison;j++){
    $('.caroussel_episode_'+j+'').hide();
}

for (k=1;k<=saison;k++){

    $('.btn_saison_'+ k +'').click(function(){
        for (let m = 1; m<=saison;m++) {
            alert(k);
            $('.caroussel_episode_' + m + '').hide()
            console.log('caroussel_episode_'+m);

        }
        for (let i = 1; i<=saison;i++) {
            $('.btn_saison_' + i + '').css('background-color', 'inherit');
            $('.btn_saison_' + i + '').css('color', 'white');
        }
        $(this).css('background','white');
        $(this).css('color','black');







    });


    console.log('carousode_'+k);
    console.log('coucou');
}




