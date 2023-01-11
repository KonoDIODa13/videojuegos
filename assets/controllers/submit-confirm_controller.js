import { Controller } from "@hotwired/stimulus";
import Swal from "sweetalert2";

export default class extends Controller {
    static values = {
        title: String,
        text: String,
        icon: String,
        confirmButtonText: String,
        submitAsync: Boolean,
    }

    onSubmit(event) {
        event.preventDefault();
        console.log(event);
        Swal.fire({
            title: this.titleValue || null,
            text: this.textValue || null,
            icon: this.iconValue || null,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: this.confirmButtonTextValue || 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return this.submitForm();
            }
        })
        /*.then((result) => {
            this.element.submit();
        })*/
    }

    submitForm() {
        /*console.log(this.element.action);
        return fetch(this.element.action, {
            method: this.element.method,
            headers: new URLSearchParams(new FormData(this.element)),
        })*/
        if (!this.submitAsyncValue) {
            this.element.submit();

            return;
        }
    }
}