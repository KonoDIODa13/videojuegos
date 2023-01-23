import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { getData, getGeneros, getPlataformas } from "./JuegoApi";
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

        getPlataformas().then((data) => {
            this.setState({
                plataformas: data
            })
        })

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
    crearJuego(array) {
        console.log(array);
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

    render() {
        return (
            <JuegoTemplate
                {...this.state}
                nuevoJuego={this.crearJuego}
            />
        )
    }
}
JuegoApp.propType = {
    working: PropTypes.bool,
}

