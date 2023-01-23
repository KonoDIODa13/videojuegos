import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class GamesDirector extends Component {
    constructor(props) {
        super(props);
    }

    verDirector(event, director) {
        event.preventDefault();
        localStorage.setItem("director", director);
        window.location.href = "https://127.0.0.1:8000/admin/director/" + director.replace(/\s+/g, "");
    }

    overDirectores(event) {
        let ª = event.target;
        ª.style.color = "blue";
        ª.style.cursor = "pointer";
    }

    outDirectores(event) {
        let ª = event.target;
        ª.style.color = "black";
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
                            onMouseOver={(event) => this.overDirectores(event)}
                            onMouseOut={(event) => this.outDirectores(event)}>
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