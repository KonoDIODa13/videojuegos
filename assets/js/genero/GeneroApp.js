import React, { Component } from "react";
import PropTypes from "prop-types";
import { getGeneros, getJuegosXGeneros, getDatos } from "../auxiliar/api";
import GeneroTemplate from "./GeneroTemplate";

export default class GeneroApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            generos: [],
            juegosXgeneros: [],
            juegos: []
        }
    }

    componentDidMount() {
        getGeneros().then((data) => {
            this.setState({
                generos: data,
            });
        });
        getJuegosXGeneros().then((data) => {
            this.setState({
                juegosXgeneros: data,
            });
        });

        getDatos().then((data) => {
            this.setState({
                juegos: data,
            });
        });
    }
    render() {
        return (
            <GeneroTemplate
                {...this.props}
                {...this.state}
            />
        );
    }
}
GeneroApp.propTypes = {
    genero: PropTypes.string.isRequired,
}