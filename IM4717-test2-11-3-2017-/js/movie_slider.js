var setPause;
var pause;

var opacity;

var clearTimer;
var timer;

var slider;
var slideList;
var posterList;
var posterCount;
var currIndex;

var radioList;

function init()
{
  if (!setPause)
  {
    setPause = 5; 
  } // for safety

  pause = setPause*1000; // now in millisec

  timer = window.setTimeout("showNextSlide()", pause*.95); // start

  slider = document.getElementById("movie_slider");
  slideList = slider.getElementsByClassName("movie_slide");
  posterList = slider.getElementsByTagName("img");
  posterCount = posterList.length;
  currIndex = 0;
  
  radioList = document.getElementsByClassName("radio_label");
  
  setActiveRadio(radioList[0]);
}

function clickSliderArrow(event)
{
  if(event.currentTarget.id == "slider_next")
  {
    clearTimeout(clearTimer);
    showNextSlide();
  }
  else
  {
    clearTimeout(clearTimer);
    showPrevSlide();
  }
}

function showNextSlide()
{
  slideList[currIndex].style.zIndex = "0";
  
  posterList[currIndex].style.display = "none";
  
  if((++currIndex) == posterList.length)
  {
    currIndex = 0;
  }
  
  slideList[currIndex].style.zIndex = "1";
  
  posterList[currIndex].style.display = "block";
  
  setActiveRadio(radioList[currIndex]);
  
  fadeIn(posterList[currIndex]);
}

function showPrevSlide()
{
  slideList[currIndex].style.zIndex = "0";
  
  posterList[currIndex].style.display = "none";
  
  if((--currIndex) < 0)
  {
    currIndex = posterCount - 1;
  }
  
  slideList[currIndex].style.zIndex = "1";
  
  posterList[currIndex].style.display = "block";
  
  setActiveRadio(radioList[currIndex]);
  
  fadeIn(posterList[currIndex]);
}

function fadeIn(currSlide, opacity) 
{
	if ( !opacity )
  {
    // no need to give a starting opacity value (i.e.: 0)
		opacity = 0;
	}
  
	if (opacity <= 50) 
  {
    // soft starting
		currSlide.style.opacity = opacity/100;
		opacity += 1;
		clearTimeout(timer);
		timer = setTimeout(fadeIn, 15, currSlide, opacity);
	}
  
	if ( opacity > 50 && opacity <= 70) 
  {
    // speeding up 
		currSlide.style.opacity = opacity/100;
		opacity += 1;
		clearTimeout(timer);
		timer = setTimeout(fadeIn, 10, currSlide, opacity);
	}
  
	if ( opacity > 70 && opacity < 100) 
  {
    // fast ending 
		currSlide.style.opacity = opacity/100;
		opacity += 1;
		clearTimeout(timer);
		timer = setTimeout(fadeIn, 5, currSlide, opacity);
	}
  
	if (opacity == 100)
  {
		clearTimeout(clearTimer);
		clearTimer = setTimeout("showNextSlide()", pause);
	}
}

function setActiveRadio(activeRadio)
{ 
  for(i = 0; i <radioList.length; i++)
  {
    if(radioList[i] != activeRadio)
    {
      radioList[i].classList.remove("active");
    }
    else
    {
      radioList[i].classList.add("active");
    }
  }
}

function changeSlides(event)
{
  var slideClicked = event.currentTarget;
  
  clearTimeout(clearTimer);
  
  setActiveRadio(slideClicked);
  
  slideList[currIndex].style.zIndex = "0";
  
  posterList[currIndex].style.display = "none";
  
  for(i = 0; i <radioList.length; i++)
  {
    if(radioList[i] == slideClicked)
    {
      currIndex = i;
    }
  }
  
  slideList[currIndex].style.zIndex = "1";
  
  posterList[currIndex].style.display = "block";
  
  fadeIn(posterList[currIndex]);
}