import React, { Component } from "react";
import PropTypes from "prop-types";
import { over, out } from "../auxiliar/funciones";

export default class GameGenero extends Component {
    constructor(props) {
        super(props);
    }

    verGenero(event, genero) {
        event.preventDefault();
        localStorage.setItem("genero", genero)
        window.location.href = "https://127.0.0.1:8000/admin/genero/" + genero.replace(/\s+/g, "");
    }
    
    render() {
        const generos = this.props.generos;
        return (
            <div className="container">
                <h4>Géneros:</h4>
                <ul>
                    {generos.map((genero) => (
                        <li
                            key={genero.toString()}
                            onMouseOver={(event) => over(event)}
                            onMouseOut={(event) => out(event)}
                            //onClick={(event) => this.verGenero(event, genero)}
                        >
                            {genero}
                        </li>
                    ))}
                </ul>
            </div>
        );
    }
}

GameGenero.propTypes = {
    generos: PropTypes.array.isRequired,
}