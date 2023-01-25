import React, { Component } from "react";
import PropTypes from "prop-types";
import { over, out } from "../auxiliar/funciones";

export default class GamePlataforma extends Component {
    constructor(props) {
        super(props);
    }

    verPlataforma(event, plataforma) {
        event.preventDefault();
        localStorage.setItem("plataforma", plataforma);
        window.location.href = "https://127.0.0.1:8000/admin/plataforma/" + plataforma.replace(/\s+/g, "");
    }

    render() {
        const plataformas = this.props.plataformas;
        return (
            <div className="container">
                <h4>Plataformas:</h4>
                <ul>
                    {plataformas.map((plataforma) => (
                        <li
                            key={plataforma.toString()}
                            onMouseOver={(event) => over(event)}
                            onMouseOut={(event) => out(event)}
                            onClick={(event) => this.verPlataforma(event, plataforma)}
                        >
                            {plataforma}
                        </li>
                    ))}
                </ul>
            </div>
        );
    }
}

GamePlataforma.propTypes = {
    plataformas: PropTypes.array.isRequired,
}