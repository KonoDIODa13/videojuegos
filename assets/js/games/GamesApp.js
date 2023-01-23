import React, { Component } from 'react';
import PropTypes from 'prop-types';
import GamesDirector from './GamesDirector';

export default class GamesApp extends Component {
    constructor(props) {
        super(props);
    }
    render() {
        const game = this.props.juego;

        return (
            < div className='container-fluid bg-light'>
                <h1 className='text-center'>{game.titulo}</h1>

                <GamesDirector
                    game={game}
                />
            </div>
        );
    }
}

GamesApp.propTypes = {
    juego: PropTypes.object.isRequired,
}