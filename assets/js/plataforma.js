import React from "react";
import { createRoot } from "react-dom/client";
import PlataformaApp from "./plataforma/PlataformaApp"

if (document.getElementById("plataforma")) {
    const root = createRoot(document.getElementById("plataforma"));
    const plataforma = localStorage.getItem("plataforma");

    root.render(
        <PlataformaApp
            plataforma={plataforma}
        />
    );
}