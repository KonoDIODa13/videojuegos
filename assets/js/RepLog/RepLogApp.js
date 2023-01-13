import React, { Component } from 'react';
import RepLogs from './RepLogs';
import PropTypes from 'prop-types';
export default class RepLogApp extends Component {

    constructor(props) {
        super(props);

        this.state = {
            highlightedRowId: null,
            repLogs: [
                { id: 1, reps: 25, itemLabel: 'My Laptop', totalWeightLifted: 112.5 },
                { id: 2, reps: 10, itemLabel: 'Big Dio Monkey', totalWeightLifted: 180 },
                { id: 8, reps: 4, itemLabel: 'Uwu', totalWeightLifted: 72 }
            ]
        };

        this.handleRowClick = this.handleRowClick.bind(this);
    }

    handleRowClick(repLogId) {
        this.setState({ highlightedRowId: repLogId });
        console.log("se ha cambiado, solo tienes que mirar en el compoent del F12 bobo.");
    }

    handleNewItemSubmit(itemName, reps) {
        console.log('TODO - handle this.new data');
        console.log(itemName, reps)
    }

    render() {

        return <RepLogs
            {...this.props}
            {...this.state}
            onRowClick={this.handleRowClick}
            onNewItemSubmit={this.handleNewItemSubmit}
        />

    }
}
RepLogApp.propType = {
    withDino: PropTypes.bool
}