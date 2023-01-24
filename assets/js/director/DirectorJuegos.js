import React, { Component } from "react";
import PropTypes from "prop-types"
import { over, out } from "../auxiliar/funciones";

export default class DirectorJuegos extends Component {
    constructor(props) {
        super(props);
    }

    buscaJuegos(director, directores, juegosXdirectores, juegos) {
        let id = buscaId(director, directores);
        let arrIdJuegos = buscarIdJuego(juegosXdirectores, id);
        let videojuegos = buscaDatosJuego(juegos, arrIdJuegos);
        return videojuegos;
    }

    verJuego(event, juego) {
        event.preventDefault();
        localStorage.clear();
        localStorage.setItem("juego", JSON.stringify(juego));
        window.location.href = "https://127.0.0.1:8000/admin/juego/" + juego.slug;
    }

    render() {
        const { director, directores, juegosXdirectores, juegos, loading } = this.props;
        const games = this.buscaJuegos(director, directores, juegosXdirectores, juegos);

        if (!loading) {
            return (
                <div>
                    <p> What are U waiting for?</p>
                </div>
            );
        }

        return (
            <div>
                <p>Juegos en los que ha sido Director:</p>
                <ul>
                    {games.map((game) => (
                        <li
                            key={game.id}
                            onMouseOver={(event) => over(event)}
                            onMouseOut={(event) => out(event)}
                            onClick={(event) => this.verJuego(event, game)}
                        >
                            {game.titulo}
                        </li>
                    ))}
                </ul>
            </div>
        );

    }
}

function buscaId(director, directores) {
    let id = 0;
    directores.forEach(directors => {
        if (directors.director == director) {
            id = directors.id;
        }
    });
    return id;
}

function buscarIdJuego(juegosXdirectores, id) {
    let arrIdJuegos = new Array();
    juegosXdirectores.forEach(juegoXdirector => {
        if (juegoXdirector.director_id == id) {
            arrIdJuegos.push(juegoXdirector.videojuego_id);
        }
    });
    return arrIdJuegos;
}

function buscaDatosJuego(juegos, arrIdJuegos) {
    let videojuegos = new Array();
    juegos.forEach(juego => {
        arrIdJuegos.forEach(ids => {
            if (juego.id == ids) {
                videojuegos.push(juego);
            }
        });
    });
    return videojuegos;
}

DirectorJuegos.propTypes = {
    director: PropTypes.string.isRequired,
    directores: PropTypes.array.isRequired,
    juegosXdirectores: PropTypes.array.isRequired,
    juegos: PropTypes.array.isRequired,
    loading: PropTypes.bool.isRequired,
}