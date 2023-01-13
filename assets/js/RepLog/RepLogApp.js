import React, { Component } from 'react';
import RepLogList from './RepLogList';

export default class RepLogApp extends Component {

    constructor(props) {
        super(props);

        this.state = {
            highlightedRowId: null
        };
        this.handleRowClick = this.handleRowClick.bind(this);
    }

    handleRowClick(repLogId) {
        this.setState({ highlightedRowId: repLogId });
    }

    render() {
        const { highlightedRowId } = this.state;
        const { withDino } = this.props;
        let dino = '';
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
                    <RepLogList
                        highlightedRowId={highlightedRowId}
                        onRowClick={this.handleRowClick}
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
}