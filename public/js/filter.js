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