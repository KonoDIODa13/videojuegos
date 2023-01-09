function filtrarXgenero() {
    let checkboxes = document.querySelectorAll('input[name="genero"]:checked');
    let generos = [];
    checkboxes.forEach((checkbox) => {
        generos.push(checkbox.value);
    });
    /*let resultado = document.getElementById("resultado");
    resultado.innerHTML += generos;*/
}