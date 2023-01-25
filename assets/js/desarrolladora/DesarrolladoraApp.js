import React, { Component } from "react";
import PropTypes from "prop-types";
import { getDatos, getDesarrolladoras, getJuegosXDesarrolladoras } from "../auxiliar/api"
import DesarrolladoraTemplate from "./DesarrolladoraTemplate";

export default class DesarrolladoraApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            desarrolladoras: [],
            juegosXdesarrolladoras: [],
            juegos: [],
            loading: false,
        }
    }

    componentDidMount() {
        getDesarrolladoras().then((data) => {
            this.setState({
                desarrolladoras: data,
            });
        });

        getJuegosXDesarrolladoras().then((data) => {
            this.setState({
                juegosXdesarrolladoras: data,
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
            <DesarrolladoraTemplate
                {...this.props}
                {...this.state}
            />
        );
    }
}

DesarrolladoraApp.propTypes = {
    desarrolladora: PropTypes.string.isRequired,
}