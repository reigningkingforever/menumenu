// jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

$(".list-wrapper").each(function( index ) {
	var items = $(this).find('.list-item');
	var numitems = items.length;
	var perPage = 12;
	
	
	items.slice(perPage).hide();

	$(this).parent().find('.pagination-container').pagination({
		items: numitems,
		itemsOnPage: perPage,
		prevText: "&laquo;",
		nextText: "&raquo;",
		onPageClick: function (pageNumber) {
			var showFrom = perPage * (pageNumber - 1);
			var showTo = showFrom + perPage;
			items.hide().slice(showFrom, showTo).show();
		}
	});

});

