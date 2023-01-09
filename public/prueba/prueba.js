
function buscaColor() {
    const btn = document.querySelector('#btn');
    let checkboxes = document.querySelectorAll('input[name="color"]:checked');
    let values = [];
    checkboxes.forEach((checkbox) => {
        values.push(checkbox.value);
    });
    console.log(values);
}