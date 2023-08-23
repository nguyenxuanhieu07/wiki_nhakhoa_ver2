jQuery(document).ready(function(){
	jQuery.urlParam = function(name){
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (results==null){
			return null;
		}
		else{
			return results[1] || 0;
		}
	}
	var post_id = jQuery.urlParam('post')

	var ids = [];
	jQuery.each(jQuery('#doctor_province :selected'), function(){
		ids.push(jQuery(this).val());
	})
	var list_id = ids;
	if(list_id.length > 0){
		jQuery.ajax({
			type: "POST",
			url: vmajax.ajaxurl,
			data: {
				'id' : list_id,
				'post_id' : post_id,
				'action' : 'check_district',
			},
			success: function(result) {
				jQuery('#doctor_district').empty();
				jQuery('#doctor_district').append(result);
			}
		});
	}
	jQuery('#doctor_province').on('change', function(){
		var id_province = jQuery(this).val();
		jQuery.ajax({
			type: "POST",
			url: vmajax.ajaxurl,
			data: {
				'id_province' : id_province,
				'post_id' : post_id,
				'action' : 'wiki_get_district',
			},
			success: function(result) {
				jQuery('#doctor_district').empty();
				jQuery('#doctor_district').append(result);
			}
		});
	});
})