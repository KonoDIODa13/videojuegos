import React from "react";
import { PropTypes } from "prop-types";
import DirectorJuegos from "./DirectorJuegos";

export default function DirectorTemplate(props) {
    const { director, directores, juegosXdirectores } = props;

    return (
        <div>
            <h2>{director}</h2>
            <DirectorJuegos
                director={director}
                directores={directores}
                juegosXdirectores={juegosXdirectores}
            />
        </div>
    );
}

DirectorTemplate.propTypes = {
    director: PropTypes.string.isRequired,
    directores: PropTypes.array.isRequired,
    juegosXdirectores: PropTypes.array.isRequired,
}