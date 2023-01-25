import React from "react";
import { createRoot } from "react-dom/client";
import DesarrolladoraApp from "./desarrolladora/DesarrolladoraApp";

if (document.getElementById("desarrolladora")) {
    const root = createRoot(document.getElementById("desarrolladora"));
    const desarrolladora = localStorage.getItem("desarrolladora")

    root.render(
        <DesarrolladoraApp
            desarrolladora={desarrolladora}
        />
    );
}