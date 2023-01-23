import React, { Component } from "react";
import { PropTypes } from "prop-types";
import DirectorTemplate from "./DirectorTemplate";
import { getDirectores, getJuegosXDirectores } from "./DirectorApi";

export default class DirectorApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            directores: [],
            juegosXdirectores: [],
            juegos: [],
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