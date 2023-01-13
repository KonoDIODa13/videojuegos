import React, { Component } from 'react';

export default class RepLogApp extends Component {
    render() {
        let dino = '';
        if (this.props.withDino) {
            dino = <span>🦖</span>;
        }

        const repLogs = [
            { id: 1, reps: 25, itemLabel: 'My Laptop', totalWeightLifted: 112.5 },
            { id: 2, reps: 10, itemLabel: 'Big Dio Monkey', totalWeightLifted: 180 },
            { id: 8, reps: 4, itemLabel: 'Bleach', totalWeightLifted: 72 }

        ];
        // se puede meter directamente en el dom pero esto también funciona añadiendo en el <tbody> {repLogElements}</tbody>
        /*const repLogElements = repLogs.map((repLog) => {
            return (
                <tr key={repLog.id}>
                    <td>{repLog.itemLabel}</td>
                    <td>{repLog.reps}</td>
                    <td>{repLog.totalWeightLifted}</td>
                    <td>...</td>
                </tr>
            )
        });*/

        return (
            <div className='col-md-7 js-rep-log-table'>
                <h2>
                    {dino} Like a dino! {dino}
                </h2>
                <table className='table table-striped'>
                    <thead>
                        <tr>
                            <th>What</th>
                            <th>How many times?</th>
                            <th>Weight</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        {repLogs.map((repLog) => (
                            <tr key={repLog.id}>
                                <td>{repLog.itemLabel}</td>
                                <td>{repLog.reps}</td>
                                <td>{repLog.totalWeightLifted}</td>
                                <td>...</td>
                            </tr>
                        ))}
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>&nbsp;</td>
                            <th>Total</th>
                            <th>TODO</th>
                            <td>&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        );
    }
}