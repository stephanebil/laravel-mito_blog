// test animation scroll
let el = document.querySelector("#toto");
el.style.color= "red";

var slideL = {
  distance: "150%",
  origin: "left",
  opacity: null,
  duration: 500,
  // delay: 4000,
};
var slideR = {
  distance: "150%",
  origin: "right",
  opacity: null,
};

var slideB = {
  distance: "150%",
  origin: "bottom",
  opacity: null,
  scale: 0.7,
  duration: 800,
  delay: 200,
  rotate: {
    x: 80,
    y: 50,
    z: 50,
  },
};


// ScrollReveal().reveal("#logo", "#container_card", slideL);
ScrollReveal().reveal("#logo", slideL);
ScrollReveal().reveal( "#container_card", slideB);
ScrollReveal().reveal("#navitem", slideR);