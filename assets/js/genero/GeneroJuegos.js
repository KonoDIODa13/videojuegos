import React, { Component } from "react";
import PropTypes from "prop-types";
import { over, out } from "../auxiliar/funciones";

export default class GeneroJuegos extends Component {
    constructor(props) {
        super(props);
    }

    buscaJuegos(genero, generos, juegosXgeneros, juegos) {
        let id = buscaId(genero, generos);
        let arrIdJuegos = buscaIdJuego(juegosXgeneros, id);
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
        const { genero, generos, juegosXgeneros, juegos, loading } = this.props;
        const games = this.buscaJuegos(genero, generos, juegosXgeneros, juegos);

        if (!loading) {
            return (
                <div>
                    <p> What are U waiting for?</p>
                </div>
            );
        }

        return (
            <div className="container">
                <p>Juegos en los que es uno de los géneros:</p>
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

GeneroJuegos.propType = {
    genero: PropTypes.string.isRequired,
    generos: PropTypes.array.isRequired,
    juegosXgeneros: PropTypes.array.isRequired,
    juegos: PropTypes.array.isRequired,
    loading: PropTypes.bool.isRequired,
}

function buscaId(string, array) {
    let id = 0;
    array.forEach(genero => {
        if (genero.genero == string) {
            id = genero.id;
        }
    });
    return id;
}

function buscaIdJuego(array, int) {
    let arrIdJuegos = new Array();
    array.forEach(juegoXgenero => {
        if (juegoXgenero.genero_id == int) {
            arrIdJuegos.push(juegoXgenero.videojuego_id);
        }
    });
    return arrIdJuegos;
}

function buscaDatosJuego(array1, array2) {
    let videojuegos = new Array();
    array1.forEach(juego => {
        array2.forEach(ids => {
            if (juego.id == ids) {
                videojuegos.push(juego);
            }
        });
    });
    return videojuegos;
}