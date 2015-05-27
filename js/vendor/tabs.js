//Tabbed Content
$(".js-tabs-menu a").click(function(event) {

  event.preventDefault();

  //Add currency to the menu
  $(this).parent().addClass("current");
  $(this).parent().siblings().removeClass("current");

  //Setup variable for tab
  var tab = $(this).attr("href");
  
  //If its not the current tab, display none
  $(".js-tab-single").not(tab).css("display", "none");

  //Fade in the current tab
  $(tab).fadeIn();
});