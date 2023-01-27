import AOS from "aos";
import * as bootstrap from "bootstrap";
import { navAdjust, searchFocus } from "./modules/nav";
import "./index.css";

document.addEventListener("DOMContentLoaded", () => {
  AOS.init({
    duration: 800,
    delay: 200,
    disable: "phone",
  });

  navAdjust();
  searchFocus();

});
