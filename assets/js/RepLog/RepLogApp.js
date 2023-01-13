import React, { Component } from 'react';
import RepLogs from './RepLogs';
import PropTypes from 'prop-types';
export default class RepLogApp extends Component {

    constructor(props) {
        super(props);

        this.state = {
            highlightedRowId: null
        };
        this.handleRowClick = this.handleRowClick.bind(this);
    }

    handleRowClick(repLogId) {
        this.setState({ highlightedRowId: repLogId });
        console.log("se ha cambiado, solo tienes que mirar en el compoent del F12 bobo.");
    }

    render() {
        const { highlightedRowId } = this.state;
        const { withDino } = this.props;


        return <RepLogs
            highlightedRowId={highlightedRowId}
            withDino={withDino}
            onRowClick={this.handleRowClick}
        />

    }
}
RepLogApp.propType = {
    withDino: PropTypes.bool
}