import React from "react";
import { createRoot } from 'react-dom/client';
import RepLogApp from "./RepLog/RepLogApp";

// se puede hacer pero es un coñazo
/*const el = React.createElement(
    'h2',
    null,
    'Lift History!',
    React.createElement('span', null, '❤️')
);*/

// mejor asi weee pero el watch se mosquea. Instalar paquete y descomentar en el webpack
//const el = <h2>Lift Stuff! <span>❤️</span></h2>;


const root = createRoot(document.getElementById('root'));

console.log(<RepLogApp />);
root.render(<RepLogApp />)
//ReactDom.render(<RepLogApp />, document.getElementById('lift-stuff-app'));