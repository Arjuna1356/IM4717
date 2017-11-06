var tabList = document.getElementsByClassName("tab_button");

for(i = 0; i < tabList.length; i++)
{
  tabList[i].addEventListener("click", openTab, false);
}

window.onload = init;