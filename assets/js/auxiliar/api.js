export function getJuegos() {
    return fetch('/juegos')
        .then(response => {
            return response.json();
        });
}

export function getDirectores() {
    return fetch("/directores")
        .then(response => {
            return response.json();
        });
}

export function getGeneros() {
    return fetch('/generos')
        .then(response => {
            return response.json();
        });
}

export function getDesarrolladoras() {
    return fetch('/desarrolladoras')
        .then(response => {
            return response.json();
        });
}
export function getPlataformas() {
    return fetch('/plataformas')
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

export function getJuegosXGeneros() {
    return fetch("/juegos_generos")
        .then(response => {
            return response.json();
        });
}

export function getJuegosXDesarrolladoras() {
    return fetch("/juegos_desarrolladoras")
        .then(response => {
            return response.json();
        });
}

export function getJuegosXPlataformas() {
    return fetch('/juegos_plataformas')
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