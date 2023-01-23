import React, { Component } from "react";
import PropTypes from 'prop-types';

export default class JuegoForm extends Component {
    constructor(props) {
        super(props);

        this.arrGeneros = new Array();
        this.arrPlataformas = new Array();
        this.arrDirectores = new Array();
        this.arrDesarrolladoras = new Array();

        this.titulo = React.createRef();
        this.fecha = React.createRef();

        this.state = {
            director: [],
            genero: [],
            desarrollador: [],
            plataforma: [],
            fechaError: "",
        }

        this.crearJuego = this.crearJuego.bind(this);

    }

    getDirector(event) {
        let array = this.arrDirectores;
        array.push(event.target.value);
        this.setState({
            director: array,
        });
    }

    getGenero(event) {
        let array = this.arrGeneros;
        const genero = event.target.value;
        let indexNotU = array.indexOf(genero);
        if (indexNotU > -1) {
            array.splice(indexNotU, 1);
        } else {
            array.push(genero);
        }
        this.setState({
            genero: array,
        });
    }

    getDesarrolladora(event) {
        let array = this.arrDesarrolladoras;
        array.push(event.target.value);
        this.setState({
            desarrollador: array,
        });
    }

    getPlataforma(event) {
        let array = this.arrPlataformas;
        const plataforma = event.target.value;
        let indexNotU = array.indexOf(plataforma);
        if (indexNotU > -1) {
            array.splice(indexNotU, 1);
        } else {
            array.push(plataforma);
        }
        this.setState({
            plataforma: array,
        });
    }

    crearJuego(event) {
        event.preventDefault();
        const { nuevoJuego } = this.props;
        const { director, genero, desarrollador, plataforma } = this.state;

        const tituloInput = this.titulo.current;
        const fechaInput = this.fecha.current;
        const slug = tituloInput.value.replace(/\s+/g, "");


        if (fechaInput.value <= 2000) {
            this.setState({
                fechaError: "El año tiene que ser mayor o igual a 2000."
            });
            return;
        }
        const juego = new Array(
            tituloInput.value,
            director,
            genero,
            fechaInput.value,
            desarrollador,
            plataforma,
            slug
        );
        nuevoJuego(juego);
        this.setState({
            fechaError: "",
        })
        document.getElementById("formulario").reset();
    }

    render() {
        const { generos, plataformas, isLoaded } = this.props;
        const { fechaError } = this.state;

        if (!isLoaded) {
            return (
                <div>
                    <p className="text-center">Cargando...</p>
                </div>
            )
        }

        return (
            <div className="container" >
                <h1 className="text-center"> Añadir Juego</h1>
                <div className="container align-center m-3">

                    <form onSubmit={this.crearJuego} id="formulario">
                        <div className={`form-group bg-light m-3 p-4 rounded ${fechaError ? 'has error' : ''}`}>

                            <label className="control-label text-center">
                                Título del juego:
                            </label>
                            <input type="text" name="titulo" className="form-control" required="required" ref={this.titulo} />
                            <br />

                            <label className="control-label text-center">
                                Director del juego:
                            </label>
                            <input type="text" name="director" className="form-control" onChange={this.getDirector.bind(this)} />
                            <br />

                            <label className="text-center">
                                Géneros del juego:
                            </label><br />
                            <div name="generoCheckbox">
                                {generos.map((genero) => (
                                    <div key={genero.id}>
                                        <input key={genero.toString()} type="checkbox" name="genero" value={genero.genero} onChange={this.getGenero.bind(this)} defaultChecked={false} />
                                        <label>{genero.genero}</label>
                                    </div>
                                ))}
                            </div>

                            <br />
                            <label className="control-label text-center">
                                Año de publicación:
                            </label>
                            <input type="number" placeholder="2000" name="fecha" className="form-control" required="required" ref={this.fecha} />
                            <div className="bg-danger">
                                {fechaError && <span className='help-block text-dark'>{fechaError}</span>}
                            </div>
                            <br />

                            <label className="control-label text-center">
                                Empresa Desarrolladora:
                            </label>
                            <input type="text" name="desarrolladora" className="form-control" onChange={this.getDesarrolladora.bind(this)} />
                            <br />

                            <label className="sr-only control-label text-center">
                                Plataformas del juego:
                            </label><br />
                            <div>
                                {plataformas.map((plataforma) => (
                                    <div key={plataforma.id}>
                                        <input key={plataforma.toString()} type="checkbox" name="plataforma" value={plataforma.plataforma} onChange={this.getPlataforma.bind(this)} defaultChecked={false} />
                                        <label className="text-">{plataforma.plataforma}</label>
                                    </div>
                                ))}
                            </div>
                            <button type="submit" className="btn btn-primary">Añadir juego</button>
                        </div>
                    </form>
                </div>
                <br /><br /><br /><br /><br /><br />
            </div >
        );
    }

}
JuegoForm.propTypes = {
    generos: PropTypes.array.isRequired,
    plataformas: PropTypes.array.isRequired,
    isLoaded: PropTypes.bool.isRequired,
    nuevoJuego: PropTypes.func.isRequired,
}