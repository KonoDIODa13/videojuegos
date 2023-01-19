import React, { Component } from "react";
import PropTypes from 'prop-types';

export default function JuegoForm(props) {

    const { generos } = props
    /*const titulo = React.createRef();
    const director = React.createRef();
    const generos = React.createRef();
    const fecha = React.createRef();
    const desarrollador = React.createRef();
    const plataformas = React.createRef();*/

    return (
        <div>
            <form>
                <div className="form-group">
                    <label className="sr-only control-label">
                        Título del juego:
                    </label>
                    <input type="text" name="titulo" className="form-control" required="required"
                    // ref={this.titulo}
                    />
                </div>
                <br />
                <div className="form-group">
                    <label className="sr-only control-label">
                        Director del juego:
                    </label>
                    <input type="text" name="director" className="form-control" required="required"
                    //ref={this.director} 
                    />
                </div>
                <br />
                <div className="form-group">
                    <label className="sr-only control-label">
                        Géneros del juego:
                    </label><br />
                    {generos.map((genero) => (
                        <div key={genero.id}>
                            <input key={genero.toString()} type="checkbox" name="genero" value={genero.genero} />
                            <label>{genero.genero}</label>
                        </div>
                    ))}
                </div>
                <br />
                <div className="form-group">

                </div>
            </form>
            <br /><br /><br /><br /><br /><br />
        </div>
    );

}
JuegoForm.propTypes = {
    generos: PropTypes.array.isRequired,
}