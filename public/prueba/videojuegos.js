function filtrarXgenero(generos) {
    let filtrar = document.querySelector("#filtrar");
    filtrar.addEventListener('click', (event) => {
        let checkboxes = document.querySelectorAll('input[name="genero"]:checked');
        let values = [];
        checkboxes.forEach((checkbox) => {
            values.push(checkbox.value);
        });
        console.log(values);
    })
}