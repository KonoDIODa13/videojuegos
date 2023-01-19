export function getJuegos() {
    return fetch('/juegos')
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

export function getJuegosXPlataformas() {
    return fetch('/juegos_plataformas')
        .then(response => {
            return response.json();
        });
}
export function getDatos() {
    return fetch("/datos")
        .then(response => {
            return response.json();
        });
}