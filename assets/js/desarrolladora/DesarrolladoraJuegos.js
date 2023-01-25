import React, { Component } from "react";
import PropTypes from "prop-types";
import { over, out } from "../auxiliar/funciones";

export default class DesarrolladoraJuegos extends Component {
    constructor(props) {
        super(props);
    }

    verJuego(event, juego) {
        event.preventDefault();
        localStorage.clear();
        localStorage.setItem("juego", JSON.stringify(juego));
        window.location.href = "https://127.0.0.1:8000/admin/juego/" + juego.slug;
    }

    buscaJuegos(desarrolladora, desarrolladoras, juegosXdesarrolladoras, juegos) {
        let id = buscaId(desarrolladora, desarrolladoras);
        let arrIdJuegos = buscaIdJuego(juegosXdesarrolladoras, id);
        let videojuegos = buscaDatosJuego(juegos, arrIdJuegos);
        return videojuegos;
    }

    render() {
        const { desarrolladora, desarrolladoras, juegosXdesarrolladoras, juegos } = this.props;
        const games = this.buscaJuegos(desarrolladora, desarrolladoras, juegosXdesarrolladoras, juegos);

        return (
            <div className="container">
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

DesarrolladoraJuegos.propTypes = {
    desarrolladora: PropTypes.string.isRequired,
    desarrolladoras: PropTypes.array.isRequired,
    juegosXdesarrolladoras: PropTypes.array.isRequired,
    juegos: PropTypes.array.isRequired,
}

function buscaId(string, array) {
    let id = 0;
    array.forEach(desarrolladora => {
        if (desarrolladora.desarrolladora == string) {
            id = desarrolladora.id;
        }
    });
    return id;
}

function buscaIdJuego(array, int) {
    let arrIdJuegos = new Array();
    array.forEach(juegoXdesarrolladora => {
        if (juegoXdesarrolladora.empresa_desarrolladora_id == int) {
            arrIdJuegos.push(juegoXdesarrolladora.videojuego_id);
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