import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class GamesDirector extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        const director = this.props.game.directores;
        console.log(director);

        return (
            <div></div>
        );

    }
}

GamesDirector.propTypes = {
    game: PropTypes.object.isRequired,
}