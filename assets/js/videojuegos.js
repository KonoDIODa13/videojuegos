import React from "react";
import { createRoot } from "react-dom/client";
import JuegoApp from "./juego/JuegoApp"

if (document.getElementById("root") != null) {
    const root = createRoot(document.getElementById('root'));
    const working = true;

    root.render(
        <JuegoApp
            working={working}
        />
    );
} else {
    console.log("no hay root");
}

