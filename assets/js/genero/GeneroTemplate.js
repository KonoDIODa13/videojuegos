import React from "react";
import PropTypes from "prop-types";
import GeneroJuegos from "./GeneroJuegos"

export default function GeneroTemplate(props) {
    const { genero, generos, juegosXgeneros, juegos } = props;

    return (
        <div className="container">
            <h2>{genero}</h2>
            <GeneroJuegos
                genero={genero}
                generos={generos}
                juegosXgeneros={juegosXgeneros}
                juegos={juegos}
            />
        </div>
    );
}

GeneroTemplate.propTypes = {
    genero: PropTypes.string.isRequired,
    generos: PropTypes.array.isRequired,
    juegosXgeneros: PropTypes.array.isRequired,
    juegos: PropTypes.array.isRequired,
}