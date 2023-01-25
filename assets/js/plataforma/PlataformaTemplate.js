import React from "react";
import PropTypes from "prop-types";
import PlataformaJuegos from "./PlataformaJuegos";

export default function PlataformaTemplate(props) {
    const { plataforma, plataformas, juegosXplataformas, juegos, loading } = props;

    return (
        <div className="container">
            <h2>{plataforma}</h2>
            <PlataformaJuegos
                plataforma={plataforma}
                plataformas={plataformas}
                juegosXplataformas={juegosXplataformas}
                juegos={juegos}
                loading={loading}
            />
        </div>
    )
}

PlataformaTemplate.propTypes = {
    plataforma: PropTypes.string.isRequired,
    plataformas: PropTypes.array.isRequired,
    juegosXplataformas: PropTypes.array.isRequired,
    juegos: PropTypes.array.isRequired,
    loading: PropTypes.bool.isRequired,
}