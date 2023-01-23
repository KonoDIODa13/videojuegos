import { Component, React } from "react";
import PropTypes from "prop-types"

export default function DirectorJuegos(props) {

    const { director, directores, juegosXdirectores } = props;

    this.state = {
        id: 0,
        array: [],
    };

    function buscaDirector(director, directores) {
        directores.forEach(arrDirector => {
            if (arrDirector.director = director);
            const id = arrDirector.id;
            this.setState({
                id: id
            });
        });
    }

    function buscaJuegos(id, juegos_directores) {
        juegos_directores.forEach(juego_director => {
            console.log(juego_director);

        });
    }

    return
        /*<div>
            <p>{this.state.id}</p>
        </div>*/
        ;
}

DirectorJuegos.propTypes = {
    director: PropTypes.string.isRequired,
    directores: PropTypes.array.isRequired,
    juegosXdirectores: PropTypes.array.isRequired,
}