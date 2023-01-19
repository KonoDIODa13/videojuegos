import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { getDatos, getJuegos, getJuegosXPlataformas, getPlataformas } from "./JuegoApi";
import JuegoTemplate from "./JuegoTemplate";

export default class JuegoApp extends Component {

    constructor(props) {
        super(props);

        this.state = {
            juegos: [],
            isLoaded: false
        };
    }

    componentDidMount() {
        getDatos().then((data) => {
            this.setState({
                juegos: data,
                isLoaded: true
            });
        })
        /*getJuegos().then((data) => {
            this.setState({
                juegos: data,
                isLoaded: true
            });
        })*/

        /*getPlataformas().then((data) => {
            this.setState({
                plataformas: data
            })
        })

        getJuegosXPlataformas().then((data) => {
            this.setState({
                juegos_plataformas: data
            })
        })*/
    }

    render() {
        return (
            <JuegoTemplate
                {...this.state}
            />
        )
    }
}
JuegoApp.propType = {
    working: PropTypes.bool,
}

