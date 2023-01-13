import React from "react";
import RepLogList from "./RepLogList";
import { PropTypes } from "prop-types";

function calculateTotalWeightLifted(repLogs) {
    let total = 0;
    for (let repLog of repLogs) {
        total += repLog.totalWeightLifted;
    }
    return total;
}

export default function RepLogs(props) {
    const { withDino, highlightedRowId, onRowClick, repLogs, onNewItemSubmit } = props;

    let dino = "";
    if (withDino) {
        dino = <span>🦖</span>;
    }

    function handleFormSubmit(event) {
        event.preventDefault();
        console.log("Do you believe in gravity?");
        //console.log(event.target);
        onNewItemSubmit('Coffee Cup', event.target.elements.namedItem("reps").value);
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
            <form className='form-inline' onSubmit={handleFormSubmit}>
                <div className='form-group'>
                    <label className='sr-only control-label required'
                        htmlFor="rep_log_item">
                        What did you lift?
                    </label>
                    <select id="rep_log_item"
                        name="item"
                        required="required"
                        className="form-control">
                        <option value="" defaultValue={""}>What did you lift?</option>
                        <option value="Cat">Cat</option>
                        <option value="fat_Dio">Big Dio Monkey</option>
                        <option value="laptop">My Laptop</option>
                        <option value="coffee_cup">Coffee Cup</option>
                    </select>
                </div>
                <br />
                <div className="form-group">
                    <label className="sr-only control-label required"
                        htmlFor="rep_log_reps">
                        How many times?
                    </label>
                    <input type="number" id="rep_log_reps"
                        name="reps" required="required"
                        placeholder="How many times?"
                        className="form-control" />
                </div>
                <br />
                <button type="submit" className="btn btn-primary">I Lifted
                    it!
                </button>
            </form>
        </div >
    );

}
RepLogs.propTypes = {
    withDino: PropTypes.bool,
    highlightedRowId: PropTypes.any,
    onRowClick: PropTypes.func.isRequired,
    repLogs: PropTypes.array.isRequired
}