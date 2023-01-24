import React from "react";
import PropTypes from "prop-types";
import DirectorJuegos from "./DirectorJuegos";

export default function DirectorTemplate(props) {
    const { director, directores, juegosXdirectores, juegos, loading } = props;

    return (
        <div className="container">
            <h2>{director}</h2>
            <DirectorJuegos
                director={director}
                directores={directores}
                juegosXdirectores={juegosXdirectores}
                juegos={juegos}
                loading={loading}
            />
        </div>
    );
}

DirectorTemplate.propTypes = {
    director: PropTypes.string.isRequired,
    directores: PropTypes.array.isRequired,
    juegosXdirectores: PropTypes.array.isRequired,
    juegos: PropTypes.array.isRequired,
    loading: PropTypes.bool.isRequired,
}