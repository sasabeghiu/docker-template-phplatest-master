function changeBg() {
  var red = document.getElementById("red").value;
  var green = document.getElementById("green").value;
  var blue = document.getElementById("blue").value;

  document.body.style.background = "rgb(" + red + "," + green + "," + blue + ")";
}
