import React from "react";
import PropTypes from 'prop-types';
import JuegoTabla from "./JuegoTabla";

export default function JuegoTemplate(props) {

    const { juegos,
        isLoaded
    } = props;

    return (
        <div>
            <h1 className="text-center">Videojuegos</h1>
            <table className="table table-bordered bg-light mt-3">
                <thead>
                    <tr className="text-center">
                        <th>Titulo</th>
                        <th>Fecha de publicación</th>
                        <th>Plataformas</th>
                        <th>Directores</th>
                        <th>Géneros</th>
                    </tr>
                </thead>
                <JuegoTabla
                    juegos={juegos}
                    isLoaded={isLoaded}
                />
            </table>
        </div>
    );
}

JuegoTabla.propTypes = {
    juegos: PropTypes.array.isRequired,
    isLoaded: PropTypes.bool.isRequired,
}
