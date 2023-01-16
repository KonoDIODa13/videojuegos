import React from "react";
import RepLogList from "./RepLogList";
import { PropTypes } from "prop-types";
import RepLogCreator from "./RepLogCreatorControlledComponents";

function calculateTotalWeightLifted(repLogs) {
    let total = 0;

    for (let repLog of repLogs) {
        total += repLog.totalWeightLifted;
    }

    return total;
}

export default function RepLogs(props) {
    const {
        withDino,
        highlightedRowId,
        onRowClick,
        repLogs,
        onAddRepLog,
        numberOfDinos,
        onDinoChange,
        onDeleteRepLog,
        isLoaded,
    } = props;

    let dino = "";
    if (withDino) {
        dino = <span>{'🦖'.repeat(numberOfDinos)}</span>;
    }

    return (
        <div className='col-md-7 mt-3'>
            <h2>
                Like a dino! {dino}
                <input
                    type="range"
                    value={numberOfDinos}
                    onChange={(e) => {
                        onDinoChange(e.target.value);
                    }} />
            </h2>
            <table className='table table-striped'>
                <thead>
                    <tr>
                        <th>What</th>
                        <th>How many times?</th>
                        <th>Weight (kg)</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <RepLogList
                    highlightedRowId={highlightedRowId}
                    onRowClick={onRowClick}
                    onDeleteRepLog={onDeleteRepLog}
                    repLogs={repLogs}
                    isLoaded={isLoaded}
                />
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <th>Total</th>
                        <th>{calculateTotalWeightLifted(repLogs)} kg</th>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
            <div className="row">
                <div className="col-md-6">
                    <RepLogCreator
                        highlightedRowId={highlightedRowId}
                        onAddRepLog={onAddRepLog}
                    />
                </div>
            </div>
        </div>
    );

}
RepLogs.propTypes = {
    withDino: PropTypes.bool,
    highlightedRowId: PropTypes.any,
    onRowClick: PropTypes.func.isRequired,
    repLogs: PropTypes.array.isRequired,
    numberOfDinos: PropTypes.number.isRequired,
    onDinoChange: PropTypes.func.isRequired,
    onDeleteRepLog: PropTypes.func.isRequired,
    isLoaded: PropTypes.bool.isRequired,
}