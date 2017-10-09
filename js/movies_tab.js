var tabBtns;
var tabContent;
  
function openTab(event) 
{ 
  var selectedTab = event.currentTarget;
  var currTabIndex = 0;

  for (var i = 0; i < tabBtns.length; i++) 
  {
    tabBtns[i].classList.remove("active");
    
    if(tabBtns[i] == event.currentTarget)
    {
      currTabIndex = i;
    }
  }

  for (i = 0; i < tabContent.length; i++) 
  {
    tabContent[i].style.display = "none";
  }
  
  tabContent[currTabIndex].style.display = "block";
  tabBtns[currTabIndex].classList.add("active");
}

function init()
{
  tabBtns = document.getElementsByClassName("tab_button");
  tabContent = document.getElementsByClassName("movie_display");
  
  tabContent[0].style.display = "block";
  tabBtns[0].classList.add("active");
}