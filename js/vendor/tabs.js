//Tabbed Content
$(".js-tabs-menu a").click(function(event) {

  event.preventDefault();

  //Add currency to the menu
  $(this).parent().addClass("current");
  $(this).parent().siblings().removeClass("current");

  //Setup variable for tab using its href
  var tab = $(this).attr("href");
  
  //If its not the current tab, hide it
  $(".js-tab-single").not(tab).css("visibility", "hidden");

  //Show the corresponding tab
  $(tab).addClass("current");
});