import React from "react";
import PropTypes from 'prop-types';

export default function JuegoTabla(props) {

    const { juegos,
        isLoaded,
    } = props;

    function mostrarPlataformas(plataformas) {
        return (
            <td className="text-secondary text-center">
                {plataformas.map((plataforma) => (
                    <span key={plataforma.toString()}>{plataforma}<br /></span>
                ))}
            </td>
        );
    }

    function mostrarDirectores(directores) {
        return (
            <td className="text-secondary text-center">
                {directores.map((director) => (
                    <span key={director.toString()}>{director}<br /></span>
                ))}
            </td>
        );
    }

    function mostrarGeneros(generos) {
        return (
            <td className="text-secondary text-center">
                {generos.map((genero) => (
                    <span key={genero.toString()}>{genero}<br /></span>
                ))}
            </td>
        );
    }

    function mostrarDesarrolladoras(desarrolladoras) {
        return (
            <td className="text-secondary text-center">
                {desarrolladoras.map((desarrollador) => (
                    <span key={desarrollador.toString()}>{desarrollador}<br /></span>
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
                    <td colSpan="7" className="text-center">Cargando...</td>
                </tr>
            </tbody>
        )
    }

    return (
        <tbody>
            {juegos.map((juego) =>
            (
                <tr key={juego.id}>
                    <td className="text-center"><a onClick={(event) => mostrarJuego(event, juego.slug)} className="datos">{juego.titulo}</a></td>
                    {mostrarDirectores(juego.directores)}
                    {mostrarGeneros(juego.generos)}
                    <td className="text-secondary text-center">{juego.fechaPublicacion}</td>
                    {mostrarDesarrolladoras(juego.desarrolladoras)}
                    {mostrarPlataformas(juego.plataformas)}
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>
                    </td>
                </tr>
            ))}
        </tbody>
    )
}

JuegoTabla.propTypes = {
    juegos: PropTypes.array.isRequired,
    isLoaded: PropTypes.bool.isRequired,
}