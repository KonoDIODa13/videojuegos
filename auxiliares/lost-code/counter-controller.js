import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ['count'];
    count = 0;
    //connect() {
        // this.element.innerHTML = "You have clicked me 0 times";

        // const counterNumElement = this.element.getElementsByClassName('counter-count')[0]; si no utilizamos target
        /* this.element.addEventListener('click', () => {
             console.log(this.countTarget); // nos devuelve el elemento y si hay varios, nos devuelve el primero
             console.log(this.countTargets); // devuelve un array con todos los datos de dicho elemento
             console.log(this.hasCountTarget); // si existe el countTarget
             this.count++;
             this.countTarget.innerHTML = this.count; // aqui cambias dependiendo de como lo tengas
         })*/
    //}

    increment() {
        this.count++;
        this.countTargets[0].innerHTML = this.count;
    }
}