import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { getDatos, getGeneros, getPlataformas } from "../auxiliar/api";
//import JuegoDatatable from './JuegoDatatable';
import JuegoTemplate from "./JuegoTemplate";
import { v4 as uuid } from "uuid";


export default class JuegoApp extends Component {

    constructor(props) {
        super(props);

        this.state = {
            juegos: [],
            generos: [],
            plataformas: [],
            isLoaded: false
        };

        this.crearJuego = this.crearJuego.bind(this);
        this.eliminarJuego = this.eliminarJuego.bind(this);
    }

    componentDidMount() {
        getGeneros().then((data) => {
            this.setState({
                generos: data,
            });
        });

        getPlataformas().then((data) => {
            this.setState({
                plataformas: data
            })
        })

        getDatos().then((data) => {
            this.setState({
                juegos: data,
                isLoaded: true
            })
        })
    }
    crearJuego(array) {
        const nuevoJuego = {
            id: uuid(),
            titulo: array[0],
            directores: array[1],
            generos: array[2],
            fechaPublicacion: array[3],
            desarrolladoras: array[4],
            plataformas: array[5],
            slug: array[6],
        }

        this.setState(prevState => {
            const nuevaLista = [...prevState.juegos, nuevoJuego];
            return { juegos: nuevaLista }
        });

    }

    eliminarJuego(juegoId) {
        this.setState((prevState) => {
            return { juegos: this.state.juegos.filter(games => games.id !== juegoId) }
        });
    }

    render() {
        return (
            <JuegoTemplate
                {...this.state}
                nuevoJuego={this.crearJuego}
                borrarJuego={this.eliminarJuego}
            />
        )
    }
}
JuegoApp.propType = {
    working: PropTypes.bool,
}

