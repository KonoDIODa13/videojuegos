import React from "react";
import RepLogLists from "./RepLogList";

export default function RepLogs(props) {
    const { withDino, highlightedRowId, onRowClick } = props;

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
                        <th>Weight</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <RepLogLists
                    highlightedRowId={highlightedRowId}
                    onRowClick={onRowClick}
                />
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <th>Total</th>
                        <th>TODO</th>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
            <form className='form-inline'>
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