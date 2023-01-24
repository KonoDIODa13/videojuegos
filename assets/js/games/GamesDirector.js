import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { over, out } from "../funciones/funciones";

export default class GamesDirector extends Component {
    constructor(props) {
        super(props);
    }

    verDirector(event, director) {
        event.preventDefault();
        localStorage.setItem("director", director);
        window.location.href = "https://127.0.0.1:8000/admin/director/" + director.replace(/\s+/g, "");
    }

    render() {
        const directores = this.props.game.directores;
        return (
            <div className='container'>
                <h4>Directores:</h4>
                <ul>
                    {directores.map((director) => (
                        <li
                            key={director.toString()}
                            onClick={(event) => this.verDirector(event, director)}
                            onMouseOver={(event) => over(event)}
                            onMouseOut={(event) => out(event)}>
                            {director}
                        </li>
                    ))}
                </ul>
            </div>
        );
    }
}

GamesDirector.propTypes = {
    game: PropTypes.object.isRequired,
}