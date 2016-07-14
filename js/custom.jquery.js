//smooth scroll animation

$(document)
    .on('click', 'a[href*="#"]', function() {
      if ( this.hash && this.pathname === location.pathname ) {
        $.bbq.pushState( '#/' + this.hash.slice(1) );
        return false;
      }
    })
    .ready(function() {
      $(window).bind('hashchange', function(event) {
        var tgt = location.hash.replace(/^#\/?/,'');
        if ( document.getElementById(tgt) ) {
          $.smoothScroll({scrollTarget: '#' + tgt});
        }
      });

      $(window).trigger('hashchange');
    });



//tabs animation

$(".tabcontents").hide();
$(".tabContainer ul li .read-more a").click(function(){
  var active = $(this).attr("href");
  $(".tabContainer ul li").removeClass("active");
  $(".tabcontents").hide();
  $(this).parents("li").addClass("active");
  $(active).slideDown("fast");
  return false;
  });

$(".tabcontents .close").click(function(){
    $(this).parent().slideUp("fast");
    $(".tabContainer ul li").removeClass("active");
  });



//service animation

$( ".service" ).hover(
  function() {
    $(this).children(".service-info").stop().slideDown();
  }, function() {
    $(this).children(".service-info").stop().slideUp();
  }
);



//scroll btn animation

$(window).scroll(function(){
	var pos = $(window).scrollTop();
	if(pos>=300)
	{
		$(".gotop").fadeIn();
	}
	else
	{
		$(".gotop").fadeOut();
	}
});


//construction btn animation

$(".t-contants").hide();
$(".t-contants:first-child").show();
$(".tab-Container ul li a").click(function(){
  var active = $(this).attr("href");
  $(".tab-Container ul li a").removeClass("active");
  $(".t-contants").hide();
  $(this).addClass("active");
  $(active).fadeIn("slow");
  return false;
  });
