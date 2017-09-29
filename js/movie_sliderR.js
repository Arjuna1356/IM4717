var sliderNext = document.getElementById("slider_next");
var sliderPrev = document.getElementById("slider_prev");

sliderNext.addEventListener("click", clickSliderArrow, false);
sliderPrev.addEventListener("click", clickSliderArrow, false);

var radioList = document.getElementsByClassName("radio_label");

for(i = 0; i < radioList.length; i++)
{
  radioList[i].addEventListener("click", changeSlides, false);
}

window.onload = init;