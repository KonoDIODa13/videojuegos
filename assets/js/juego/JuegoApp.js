import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { getData, getGeneros } from "./JuegoApi";
//import JuegoDatatable from './JuegoDatatable';
import JuegoTemplate from "./JuegoTemplate";


export default class JuegoApp extends Component {

    constructor(props) {
        super(props);

        this.state = {
            juegos: [],
            generos: [],
            isLoaded: false
        };
    }

    componentDidMount() {
        /* getDatos().then((data) => {
             this.setState({
                 juegos: data,
                 isLoaded: true
             });
         })*/
        /*getJuegos().then((data) => {
            this.setState({
                juegos: data,
                isLoaded: true
            });
        })*/

        getGeneros().then((data) => {
            this.setState({
                generos: data,
            });
        });

        /*getPlataformas().then((data) => {
            this.setState({
                plataformas: data
            })
        })*/

        /*getJuegosXPlataformas().then((data) => {
            this.setState({
                juegos_plataformas: data
            })
        })*/
        getData().then((data) => {
            this.setState({
                juegos: data,
                isLoaded: true
            })
        })
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

