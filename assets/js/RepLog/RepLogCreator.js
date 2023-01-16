import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class RepLogCreator extends Component {

    constructor(props) {
        super(props);

        this.quantityInput = React.createRef();
        this.itemSelected = React.createRef();

        this.state = {
            quantityInputError: ""
        }

        this.itemOptions = [
            { id: 'cat', text: 'Cat' },
            { id: 'big_dio_monkey', text: 'Big Dio Monkey' },
            { id: 'laptop', text: 'My Laptop' },
            { id: 'coffee_cup', text: 'Coffee Cup' }
        ];

        this.handleFormSubmit = this.handleFormSubmit.bind(this);
    }

    handleFormSubmit(event) {
        event.preventDefault();

        const { onAddRepLog } = this.props;

        const quantityInput = this.quantityInput.current;
        const itemSelected = this.itemSelected.current;

        if (quantityInput.value <= 0) {
            console.log(quantityInput.value);
            this.setState({
                quantityInputError: "Ponga usted un numero mayor que 0."
            });
            return;
        }

        onAddRepLog(
            itemSelected.options[itemSelected.selectedIndex].text,
            quantityInput.value
        );
        quantityInput.value = "";
        itemSelected.selectedIndex = 0;

        this.setState({
            quantityInputError: ""
        });

    }
    render() {
        const { quantityInputError } = this.state;
        return (
            <div>
                <form onSubmit={this.handleFormSubmit}>
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
                            {this.itemOptions.map(option => {
                                return <option value={option.id} key={option.id}>{option.text}</option>
                            })}
                        </select>
                    </div>
                    <div className={`form-group ${quantityInputError ? 'has-error' : ''}`}>
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
                            {quantityInputError && <span className='help-block'>{quantityInputError}</span>}
                        </div>
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
    onAddRepLog: PropTypes.func.isRequired
}