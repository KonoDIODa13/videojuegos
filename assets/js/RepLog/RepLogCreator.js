import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class RepLogCreator extends Component {

    constructor(props) {
        super(props);

        this.quantityInput = React.createRef();
        this.itemSelected = React.createRef();

        this.handleFormSubmit = this.handleFormSubmit.bind(this);
    }

    handleFormSubmit(event) {
        event.preventDefault();

        const { onNewItemSubmit } = this.props;

        const quantityInput = this.quantityInput.current;
        const itemSelected = this.itemSelected.current;

        onNewItemSubmit(
            itemSelected.options[itemSelected.selectedIndex].text,
            quantityInput.value
        );
        quantityInput.value = "";
        itemSelected.selectedIndex = 0;
    }
    render() {

        return (
            <div>
                <form className='form-inline' onSubmit={this.handleFormSubmit}>
                    <div className='form-group'>
                        <label className='sr-only control-label required'
                            htmlFor="rep_log_item">
                            What did you lift?
                        </label>
                        <select id="rep_log_item"
                            name="item"
                            required="required"
                            className="form-control"
                            ref={this.itemSelected}>

                            <option value="">What did you lift?</option>
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
                            className="form-control"
                            ref={this.quantityInput} />
                    </div>
                    <br />
                    <button type="submit" className="btn btn-primary">I Lifted
                        it!
                    </button>
                </form>
            </div>
        );
    }
}

RepLogCreator.propTypes = {
    onNewItemSubmit: PropTypes.func.isRequired
}