import React from "react";
import RepLogList from "./RepLogList";
import { PropTypes } from "prop-types";
import RepLogCreator from "./RepLogCreator";

function calculateTotalWeightLifted(repLogs) {
    let total = 0;
    for (let repLog of repLogs) {
        total += repLog.totalWeightLifted;
    }
    return total;
}

export default function RepLogs(props) {
    const { withDino, highlightedRowId, onRowClick, repLogs, onAddRepLog } = props;

    let dino = "";
    if (withDino) {
        dino = <span>🦖</span>;
    }

    return (
        <div className='col-md-7'>
            <h2>
                {dino} Like a dino! {dino}
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
                    repLogs={repLogs}
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

            <RepLogCreator
                onAddRepLog={onAddRepLog}
            />
        </div >
    );

}
RepLogs.propTypes = {
    withDino: PropTypes.bool,
    highlightedRowId: PropTypes.any,
    onRowClick: PropTypes.func.isRequired,
    repLogs: PropTypes.array.isRequired
}