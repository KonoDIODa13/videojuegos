import { React } from "react";
import PropTypes from "prop-types"

export default function DirectorJuegos(props) {
    const { director } = props;
}

/*function buscarId(director) {

}*/

DirectorJuegos.propTypes = {
    director: PropTypes.string.isRequired,
}