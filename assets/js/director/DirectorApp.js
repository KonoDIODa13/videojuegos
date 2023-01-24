import React, { Component } from "react";
import PropTypes from "prop-types";
import DirectorTemplate from "./DirectorTemplate";
import { getDirectores, getDatos, getJuegosXDirectores } from "../auxiliar/api";

export default class DirectorApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            directores: [],
            juegosXdirectores: [],
            juegos: [],
            loading: false,
        }
    }

    componentDidMount() {
        getDirectores().then((data) => {
            this.setState({
                directores: data,
            });
        });

        getJuegosXDirectores().then((data) => {
            this.setState({
                juegosXdirectores: data,
            });
        });

        getDatos().then((data) => {
            this.setState({
                juegos: data,
                loading: true,
            })
        })
    }

    render() {
        return (
            <DirectorTemplate
                {...this.props}
                {...this.state}
            />
        );
    }
}
DirectorApp.propTypes = {
    director: PropTypes.string.isRequired,
}