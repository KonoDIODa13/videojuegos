import React, { Component } from 'react';
import RepLogs from './RepLogs';
import PropTypes from 'prop-types';
import { v4 as uuid } from "uuid";

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
        this.handleNewItemSubmit = this.handleNewItemSubmit.bind(this);
    }

    handleRowClick(repLogId) {
        this.setState({ highlightedRowId: repLogId });
        console.log("se ha cambiado, solo tienes que mirar en el compoent del F12 bobo.");
    }

    handleNewItemSubmit(itemLabel, reps) {
        //console.log('TODO - handle this.new data');
        //console.log(itemLabel, reps);
        const repLogs = this.state.repLogs;
       // console.log(repLogs);
        const newRep = {
            id: uuid(),
            reps: reps,
            itemLabel: itemLabel,
            totalWeightLifted: Math.floor(Math.random() * 50)
        }
        repLogs.push(newRep);
        this.setState({ repLogs: repLogs });
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