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
    }

    render() {
        const desarrolladoras = this.props.desarrolladoras;

        return (
            <div className="container">
                <h4>Desarrolladoras:</h4>
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
            </div>
        );
    }
}

GameDesarrolladora.propTypes = {
    desarrolladoras: PropTypes.array.isRequired,
}