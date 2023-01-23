import React from "react";
import { PropTypes } from "prop-types";
import DirectorJuegos from "./DirectorJuegos";

export default function DirectorTemplate(props) {
    const { director } = props;
    return (
        <div>
            <h2>{director}</h2>
            <DirectorJuegos
                director={director}
            />
        </div>
    );
}

DirectorTemplate.propTypes = {
    director: PropTypes.string.isRequired,
}