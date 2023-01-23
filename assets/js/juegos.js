import React from "react";
import { createRoot } from "react-dom/client";
import GamesApp from "./games/GamesApp";

if (document.getElementById("game") != null) {
    const root = createRoot(document.getElementById('game'));
    let juego = JSON.parse(localStorage.getItem("juego"));

    root.render(
        <GamesApp
            juego={juego}
        />
    );
}
