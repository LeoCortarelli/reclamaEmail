var pesquisa = document.getElementById('pesquisa');

pesquisa.addEventListener("keydown", function(event){
    if(event.key === "Enter"){
        pesquisaData();    // FUNÇÃO CASO O USUARIO DIGITE A TECLA ENTER
    }
})

function pesquisaData(){
    window.location = 'tabela.php?pesquisa='+pesquisa.value;
}