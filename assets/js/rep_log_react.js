import React from "react";
import ReactDom from 'react-dom';

// se puede hacer pero es un coñazo
/*const el = React.createElement(
    'h2',
    null,
    'Lift History!',
    React.createElement('span', null, '❤️')
);*/

// mejor asi weee pero el watch se mosquea. Instalar paquete y descomentar en el webpack
const el = <h2>Lift Stuff! <span>❤️</span></h2>;

console.log(el);

ReactDom.render(el, document.getElementById('lift-stuff-app'));