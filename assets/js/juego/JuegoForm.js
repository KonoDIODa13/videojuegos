import React, { Component } from "react";
import PropTypes from 'prop-types';

export default class JuegoForm extends Component {
    constructor(props) {
        super(props);
        this.arrGeneros = new Array();
        this.titulo = React.createRef();
        this.director = React.createRef();
        this.fecha = React.createRef();
        this.desarrollador = React.createRef();
        //this.plataforma = React.createRef();

        this.state = {
            genero: [],
        }
    }

    //this.crearJuego = this.crearJuego.bind(this);


    getValorGenero(event) {
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
        })

    }

    crearJuego(event) {
        event.preventDefault();
        juego = new Array(
            "titulo" = this.titulo.current.value,
            "director" = this.director.current.value,
            "genero" = this.setState.genero,
            "fecha" = this.fecha.current.value,
            "desarrollador" = this.desarrollador.current.value
        );
        const { nuevoJuego } = this.props;
        console.log(juego);
        nuevoJuego(juego)
    }

    render() {
        const { generos, plataformas, isLoaded } = this.props;

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

                    <form>
                        <div className="form-group bg-light m-3 p-4 rounded">

                            <label className="control-label text-center">
                                Título del juego:
                            </label>
                            <input type="text" name="titulo" className="form-control" required="required" ref={this.titulo} />
                            <br />

                            <label className="control-label text-center">
                                Director del juego:
                            </label>
                            <input type="text" name="director" className="form-control" ref={this.director} />
                            <br />

                            <label className="text-center">
                                Géneros del juego:
                            </label><br />
                            {generos.map((genero) => (
                                <div key={genero.id}>
                                    <input key={genero.toString()} type="checkbox" name="genero" value={genero.genero} onChange={this.getValorGenero.bind(this)} defaultChecked={false} />
                                    <label>{genero.genero}</label>
                                </div>
                            ))}

                            <br />
                            <label className="control-label text-center">
                                Año de publicación:
                            </label>
                            <input type="number" placeholder="2000" name="fecha" className="form-control" required="required" ref={this.fecha} />
                            <br />

                            <label className="control-label text-center">
                                Empresa Desarrolladora:
                            </label>
                            <input type="text" name="desarrolladora" className="form-control" ref={this.desarrollador} />
                            <br />

                            <label className="sr-only control-label text-center">
                                Plataformas del juego:
                            </label><br />
                            {plataformas.map((plataforma) => (
                                <div key={plataforma.id}>
                                    <input key={plataforma.toString()} type="checkbox" name="plataforma" value={plataforma.plataforma} />
                                    <label className="text-">{plataforma.plataforma}</label>
                                </div>
                            ))}
                            <button type="submit" className="btn btn-primary" onClick={(event) => this.crearJuego(event)}>Añadir juego</button>
                        </div>
                    </form>
                </div>
                <br /><br /><br /><br /><br /><br />
            </div>
        );
    }

}
JuegoForm.propTypes = {
    generos: PropTypes.array.isRequired,
    plataformas: PropTypes.array.isRequired,
    isLoaded: PropTypes.bool.isRequired,
    nuevoJuego: PropTypes.func.isRequired,
}