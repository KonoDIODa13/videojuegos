import React from "react";
import { createRoot } from "react-dom/client";
import DirectorApp from "./director/DirectorApp";

if (document.getElementById("director") != null) {
    const root = createRoot(document.getElementById("director"));
    const director = localStorage.getItem("director");

    root.render(
        <DirectorApp
            director={director}
        />
    );
}