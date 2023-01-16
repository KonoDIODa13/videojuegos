import React, { Component } from 'react';
import RepLogs from './RepLogs';
import PropTypes from 'prop-types';
import { v4 as uuid } from "uuid";
import { getRepLogs } from '../api/rep_log_api';

export default class RepLogApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            highlightedRowId: null,
            repLogs: [],
            numberOfDinos: 1,
            isLoaded: false,
        };

        this.handleRowClick = this.handleRowClick.bind(this);
        this.handleAddRepLog = this.handleAddRepLog.bind(this);
        this.handleDinoChange = this.handleDinoChange.bind(this);
        this.handleDeleteRepLog = this.handleDeleteRepLog.bind(this);
    }

    componentDidMount() {
        getRepLogs().then((data) => {
            console.log(data)
            this.setState({
                repLogs: data,
                isLoaded: true
            })
        })
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