import React from "react";
import PropTypes from "prop-types";
import GamesDirector from "./GamesDirector";
import GameGenero from "./GamesGenero";
import GameDesarrolladora from "./GameDesarrolladora";
import GamePlataforma from "./GamePlataforma";
//import foto from "../../../public/fotos/horizontal";

export default function GamesTemplate(props) {
    const { game } = props;
    const directores = game.directores;
    const generos = game.generos;
    const desarrolladoras = game.desarrolladoras;
    const plataformas = game.plataformas;

    /*const imagen = new Image();
    imagen.src = "C:/Users/jgonzalez/PhpstormProjects/tfg/public/fotos/horizontal/" + game.slug + ".jpeg";*/

    return (
        <div className="container bg-light">
            <h1 className="text-center">{game.titulo}</h1>
            <GamesDirector
                directores={directores}
            />
            <GameGenero
                generos={generos}
            />
            <div className="container">
                <h4>Fecha de Publicación:</h4>
                <ul>
                    <li>{game.fechaPublicacion}</li>
                </ul>
            </div>
            <GameDesarrolladora
                desarrolladoras={desarrolladoras}
            />

            <GamePlataforma
                plataformas={plataformas}
            />
        </div>
    );

}
GamesTemplate.propTypes = {
    game: PropTypes.object.isRequired,
}