$(function() {
	$.get('dashboard/xhrGetListings', function(o) {
		for (let i = 0; i < o.length; i++) {
			$('#listInserts').append('<div class="listItem">' + o[i].text + '<a class="del" rel="' + o[i].id + '" href="#">X</a></div>')
		}
	
		$('.listItem').on('click', '.del', function() {
			var delItem = $(this)
			var id = $(this).attr('rel')
			alert(id)
			
			$.post('dashboard/xhrDeleteListing', {'id': id}, function() {
				delItem.parent().remove()
			})
			
			return false
		})
	}, 'json')
	
	$('#randomInsert').submit(function() {
		var url = $(this).attr('action')
		var data = $(this).serialize()
		
		$.post(url, data, function(o) {
			$('#listInserts').append('<div class="listItem">' + o.text + '<a class="del" rel="' + o.id + '" href="#">X</a></div>')
			alert(data)
		}, 'json')
		
		return false
	})
})