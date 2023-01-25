import React, { Component } from "react";
import PropTypes from "prop-types";
import { over, out } from "../auxiliar/funciones";

export default class PlataformaJuegos extends Component {
    constructor(props) {
        super(props);
    }
    verJuego(event, juego) {
        event.preventDefault();
        localStorage.clear();
        localStorage.setItem("juego", JSON.stringify(juego));
        window.location.href = "https://127.0.0.1:8000/admin/juego/" + juego.slug;
    }

    buscaJuegos(plataforma, plataformas, juegosXplataformas, juegos) {
        let id = buscaId(plataforma, plataformas);
        let arrIdJuegos = buscaIdJuego(juegosXplataformas, id);
        let videojuegos = buscaDatosJuego(juegos, arrIdJuegos);
        return videojuegos;
    }

    render() {
        const { plataforma, plataformas, juegosXplataformas, juegos, loading } = this.props;
        const games = this.buscaJuegos(plataforma, plataformas, juegosXplataformas, juegos);

        if (!loading) {
            return (
                <div>
                    <p>What are U waiting for</p>
                </div>
            );
        }

        return (
            <div className="container">
                <p>Los juegos están en dicha plataforma</p>
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

PlataformaJuegos.propTypes = {
    plataforma: PropTypes.string.isRequired,
    plataformas: PropTypes.array.isRequired,
    juegosXplataformas: PropTypes.array.isRequired,
    juegos: PropTypes.array.isRequired,
    loading: PropTypes.bool.isRequired,
}

function buscaId(string, array) {
    let id = 0;
    array.forEach(plataforma => {
        if (plataforma.plataforma == string) {
            id = plataforma.id;
        }
    });
    return id;
}

function buscaIdJuego(array, int) {
    let arrIdJuegos = new Array();
    array.forEach(juegoXplataforma => {
        if (juegoXplataforma.plataforma_id == int) {
            arrIdJuegos.push(juegoXplataforma.videojuego_id);
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