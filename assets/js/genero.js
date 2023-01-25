import React from "react";
import { createRoot } from "react-dom/client";
import GeneroApp from "./genero/GeneroApp";

if (document.getElementById("genero") != null) {
    const root = createRoot(document.getElementById("genero"));
    const genero = localStorage.getItem("genero");

    root.render(
        <GeneroApp
            genero={genero}
        />
    )
}