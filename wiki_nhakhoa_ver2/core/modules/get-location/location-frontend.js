jQuery('#name-province').on('change', function(){
	var id_province = jQuery(this).val();
	jQuery.ajax({
		type: "POST",
		url: vmajax.ajaxurl,
		data: {
			'id_province' : id_province,
			'action' : 'wiki_get_district_fd',
		},
		success: function(result) {
			jQuery('#name-district').empty();
			jQuery('#name-district').append(result);
		}
	});
})