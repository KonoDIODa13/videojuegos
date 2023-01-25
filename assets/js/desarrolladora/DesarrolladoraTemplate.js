import React from "react";
import PropTypes from "prop-types";
import DesarrolladoraJuegos from "./DesarrolladoraJuegos";

export default function DesarrolladoraTemplate(props) {
    const { desarrolladora, desarrolladoras, juegosXdesarrolladoras, juegos } = props;

    return (
        <div className="container">
            <h1>{desarrolladora}</h1>
            <DesarrolladoraJuegos
                desarrolladora={desarrolladora}
                desarrolladoras={desarrolladoras}
                juegosXdesarrolladoras={juegosXdesarrolladoras}
                juegos={juegos}
            />
        </div>
    );
}

DesarrolladoraTemplate.propTypes = {
    desarrolladora: PropTypes.string.isRequired,
    desarrolladoras: PropTypes.array.isRequired,
    juegosXdesarrolladoras: PropTypes.array.isRequired,
    juegos: PropTypes.array.isRequired,
}