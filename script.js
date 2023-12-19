/*$(document).ready(function() {
    $(".container-esquerdo").animate({left: '0%'}, 1000);
});*/


// Função para verificar se a div deve ser exibida ou não
function verificarPosicaoDiv() {
    const minhaDiv1 = document.getElementById('div1');
    const minhaDiv2 = document.getElementById('div2');
    const minhaDiv3 = document.getElementById('div3');

    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrollTop > 200) {
        minhaDiv1.style.position = 'relative';
        minhaDiv1.style.top = '0';
        minhaDiv1.style.left = '0';
    } else {
    minhaDiv1.style.position = 'static';
    }

    if (scrollTop > 400){
        minhaDiv2.style.position = 'relative';
        minhaDiv2.style.top = '0';
        minhaDiv2.style.right = '0';
    }else{
        minhaDiv2.style.position = 'static';
    }

    if (scrollTop > 700){
        minhaDiv3.style.position = 'relative';
        minhaDiv3.style.top = '0';
        minhaDiv3.style.left = '0';
    }else{
        minhaDiv3.style.position = 'static';
    }
}

   // Adicionar um evento de escuta para verificar a posição da div quando o usuário descer a tela
window.addEventListener('scroll', verificarPosicaoDiv);