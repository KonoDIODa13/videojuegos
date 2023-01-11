import { Controller } from "@hotwired/stimulus";
import { useClickOutside, useDebounce } from "stimulus-use";

export default class extends Controller {
    static values = {
        url: String,
    }
    static targets = ['result'];
    static debounces = ['onSearchInput'];
    static debounces = ['search'];

    connect() {
        useClickOutside(this);
        useDebounce(this);
        console.log(useClickOutside(this));
        //console.log(useDebounce(this));
    }

    onSearchInput(event) {
        this.search(event.currentTarget.value);
        //console.log(event.currentTarget.value);
        /*const response = await fetch(`${this.urlValue}?${params.toString()}`);
        //console.log(await response.text());
        this.resultTarget.innerHTML = await response.text();*/
    }
    async search(query) {
        const params = new URLSearchParams({
            q: query,
        })
        const response = await fetch(`${this.urlValue}?${params.toString()}`);
        this.resultTarget.innerHTML = await response.text();
    }

    ClickOutside(event) {
        this.resulTarget.innerHTML = "";
    }
}