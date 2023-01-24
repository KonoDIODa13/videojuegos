import React, { Component } from "react";
import PropTypes from "prop-types";
import { over, out } from "../auxiliar/funciones";

export default class GameDesarrolladora extends Component {
    constructor(props) {
        super(props);
    }

    verDesarrolladora(event, desarrolladora) {
        event.preventDefault();
        localStorage.setItem("desarrolladora", desarrolladora);
        window.location.href = "https://127.0.0.1:8000/admin/desarrolladora" + desarrolladora.replace(/\s+/g, "");
    }

    render() {
        const desarrolladoras = this.props.desarrolladoras;
        return (
            <div className="container">
                <h4>Desarrolladoras:</h4>
                <ul>
                    {desarrolladoras.map((desarrolladora) => (
                        <li
                            key={desarrolladora.toString}
                            onMouseOver={(event) => over(event)}
                            onMouseOut={(event) => out(event)}
                        //onclick={(event)=>this.verDesarrolladora(event, desarrolladora)}
                        >
                            {desarrolladora}
                        </li>
                    ))}
                </ul>
            </div>
        );
    }
}

GameDesarrolladora.propTypes = {
    desarrolladoras: PropTypes.array.isRequired,
}