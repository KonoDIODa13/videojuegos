import React, { Component } from "react";
import PropTypes from "prop-types";
import { getDatos, getJuegosXPlataformas, getPlataformas } from "../auxiliar/api";
import PlataformaTemplate from "./PlataformaTemplate";

export default class PlataformaApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            plataformas: [],
            juegosXplataformas: [],
            juegos: [],
            loading: false,
        }
    }

    componentDidMount() {
        getPlataformas().then((data) => {
            this.setState({
                plataformas: data,
            });
        });

        getJuegosXPlataformas().then((data) => {
            this.setState({
                juegosXplataformas: data,
            });
        });

        getDatos().then((data) => {
            this.setState({
                juegos: data,
                loading: true,
            });
        });
    }

    render() {
        return (
            <PlataformaTemplate
                {...this.props}
                {...this.state}
            />
        );
    }
}

PlataformaApp.propTypes = {
    plataforma: PropTypes.string.isRequired,
}