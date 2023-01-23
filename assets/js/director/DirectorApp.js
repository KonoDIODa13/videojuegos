import React, { Component } from "react";
import { PropTypes } from "prop-types";
import DirectorTemplate from "./DirectorTemplate";
import getDirectores from "../juego/JuegoApi";

export default class DirectorApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            directores: [],
            juegosXdirector:[],
            juegos:[],
        }
    }

    componentDidMount() {
        getDirectores().then((data) => {
            this.setState({
                directores: data,
            });
        });

        get
    }

    render() {
        ;
        return (
            <DirectorTemplate
                {...this.props}
            />
        );
    }
}
DirectorApp.propTypes = {
    director: PropTypes.string.isRequired,
}