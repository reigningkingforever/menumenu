var display = [];
$(document).ready(function(){
	
	$('.foodtype:checked').each(function(index){
		display.push($(this).val());
	});
	displays(display);
});

$('.foodtype').click(function(){
	display = [];
	$('.foodtype:checked').each(function(index){
		display.push($(this).val());
	});
	displays(display);
})

function displays(display){
	$('.grid').addClass('hidemeal');
	display.forEach(function(value, index, array){
		$('.grid[data-foodtype='+value+']').removeClass('hidemeal');
	})
}
$(document).on('click','#openfilter',function() {
	$([document.documentElement, document.body]).animate({
        scrollTop: $("#restaurant-menu").offset().top
    }, 2000);
	 $(".slidenav").removeClass("slideOut");
	 $(".slidenav").addClass("slideIn");
	 $(this).removeAttr("id").attr('id','closefilter');
 });

$(document).on('click','#closefilter',function() {
    $(".slidenav").removeClass("slideIn");
    $(".slidenav").addClass("slideOut");
    $(this).removeAttr("id").attr('id','openfilter');
});

$(document).on('click','#to-top',function() {
	$([document.documentElement, document.body]).animate({
        scrollTop: $("#page-top").offset().top
    }, 2000);
})