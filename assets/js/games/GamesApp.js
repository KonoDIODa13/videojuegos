import React, { Component } from 'react';
import PropTypes from 'prop-types';
import GamesTemplate from './GamesTemplate';

export default class GamesApp extends Component {
    constructor(props) {
        super(props);
    }
    render() {
        const game = this.props.juego;

        return (
            <GamesTemplate
                game={game}
            />
        );
    }
}

GamesApp.propTypes = {
    juego: PropTypes.object.isRequired,
}