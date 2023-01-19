import React from "react";
import PropTypes from 'prop-types';
import JuegoTabla from "./JuegoTabla";
import JuegoForm from "./JuegoForm";

export default function JuegoTemplate(props) {

    const {
        juegos,
        isLoaded,
        generos,
    } = props;

    return (
        <div className="mb-4">
            <h1 className="text-center">Videojuegos</h1>
            <table className="table table-bordered bg-light mt-3">
                <thead>
                    <tr className="text-center">
                        <th>TÍTULO</th>
                        <th>DIRECTORES</th>
                        <th>GÉNEROS</th>
                        <th>FECHA DE PUBLICACIÓN</th>
                        <th>DESARROLLADORAS</th>
                        <th>PLATAFORMAS</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                <JuegoTabla
                    juegos={juegos}
                    isLoaded={isLoaded}
                />
            </table>
            <hr />
            <JuegoForm
                generos={generos}
            />
        </div>
    );
}

JuegoTemplate.propTypes = {
    juegos: PropTypes.array.isRequired,
    generos: PropTypes.array.isRequired,
    isLoaded: PropTypes.bool.isRequired,
}
