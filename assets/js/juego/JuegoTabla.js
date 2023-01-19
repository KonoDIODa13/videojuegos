import React from "react";
import PropTypes, { array } from 'prop-types';

export default function JuegoTabla(props) {

    const { juegos,
        isLoaded,
    } = props;

    function mostrarPlataformas(plataformas) {
        return (
            <td>
                {plataformas.map((array) => (
                    <span key={array.id}>{array.plataforma}<br /></span>
                ))}
            </td>
        );
    }
    function mostrarDirectores(directores) {
        return (
            <td>
                {directores.map((array) => (
                    <span key={array.id}>{array.nombre}<br /></span>
                ))}
            </td>
        );
    } function mostrarGeneros(generos) {
        return (
            <td>
                {generos.map((array) => (
                    <span key={array.id}>{array.genero}<br /></span>
                ))}
            </td>
        );
    }
    function mostrarJuego(event, slug) {
        event.preventDefault();
        window.location.href = "https://127.0.0.1:8000/videojuegos/juego/" + slug;

    }


    if (!isLoaded) {
        return (
            <tbody>
                <tr>
                    <td colSpan="5" className="text-center">Cargando</td>
                </tr>
            </tbody>
        )
    }

    return (
        <tbody className="text-secondary text-center">
            {juegos.map((juego) =>
            (
                <tr key={juego.id}>
                    <td className="text-black"><span onClick={(event) => mostrarJuego(event, juego.slug)}>{juego.titulo}</span></td>
                    <td>{juego.fecha_publicacion}</td>
                    {mostrarPlataformas(juego.plataformas)}
                    {mostrarDirectores(juego.directores)}
                    {mostrarGeneros(juego.generos)}
                </tr>
            ))}
        </tbody>
    )
}

JuegoTabla.propTypes = {
    juegos: PropTypes.array.isRequired,
    isLoaded: PropTypes.bool.isRequired,
}