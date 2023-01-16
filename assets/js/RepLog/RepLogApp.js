import React, { Component } from 'react';
import RepLogs from './RepLogs';
import PropTypes, { number } from 'prop-types';
import { v4 as uuid } from "uuid";

export default class RepLogApp extends Component {

    constructor(props) {
        super(props);

        this.state = {
            highlightedRowId: null,
            repLogs: [
                { id: uuid(), reps: 25, itemLabel: 'My Laptop', totalWeightLifted: 112.5 },
                { id: uuid(), reps: 10, itemLabel: 'Big Dio Monkey', totalWeightLifted: 180 },
                { id: uuid(), reps: 4, itemLabel: 'Uwu', totalWeightLifted: 72 }
            ],
            numberOfDinos: 1
        };

        this.handleRowClick = this.handleRowClick.bind(this);
        this.handleAddRepLog = this.handleAddRepLog.bind(this);
        this.handleDinoChange = this.handleDinoChange.bind(this);
        this.handleDeleteRepLog = this.handleDeleteRepLog.bind(this);
    }

    handleRowClick(repLogId) {
        this.setState({ highlightedRowId: repLogId });
    }

    handleAddRepLog(itemLabel, reps) {
        const newRep = {
            id: uuid(),
            reps: reps,
            itemLabel: itemLabel,
            totalWeightLifted: Math.floor(Math.random() * 50)
        }
        this.setState(prevState => {
            const newRepLogs = [...prevState.repLogs, newRep];
            return { repLogs: newRepLogs };
        })
    }

    handleDinoChange(dinoCount) {
        this.setState({
            numberOfDinos: dinoCount
        });
    }

    handleDeleteRepLog(id) {
        this.setState((prevState) => {
            return {
                repLogs: this.state.repLogs.filter(repLog => repLog.id !== id)
            };
        });
    }

    render() {

        return <RepLogs
            {...this.props}
            {...this.state}
            onRowClick={this.handleRowClick}
            onAddRepLog={this.handleAddRepLog}
            onDinoChange={this.handleDinoChange}
            onDeleteRepLog={this.handleDeleteRepLog}
        />

    }
}
RepLogApp.propType = {
    withDino: PropTypes.bool
}