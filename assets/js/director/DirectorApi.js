export function getDirectores() {
    return fetch("/directores")
        .then(response => {
            return response.json();
        });
}

export function getJuegosXDirectores() {
    return fetch("/juegos_directores")
        .then(response => {
            return response.json();
        });
}

export function getDatos() {
    return fetch("/mostrarDatos")
        .then(response => {
            return response.json();
        });
}