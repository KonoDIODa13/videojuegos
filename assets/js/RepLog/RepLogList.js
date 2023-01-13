import React from "react";

export default function RepLogLists(props) {


    const { highlightedRowId, onRowClick } = props;
    const repLogs = [
        { id: 1, reps: 25, itemLabel: 'My Laptop', totalWeightLifted: 112.5 },
        { id: 2, reps: 10, itemLabel: 'Big Dio Monkey', totalWeightLifted: 180 },
        { id: 8, reps: 4, itemLabel: 'Uwu', totalWeightLifted: 72 }
    ];

    return (
        <tbody>
            {repLogs.map((repLog) => (
                <tr key={repLog.id}
                    className={highlightedRowId === repLog.id ? 'info' : ''}
                    onClick={() => onRowClick(repLog.id)}>
                    <td>{repLog.itemLabel}</td>
                    <td>{repLog.reps}</td>
                    <td>{repLog.totalWeightLifted}</td>
                    <td>...</td>
                </tr>
            ))}
        </tbody>
    );

}