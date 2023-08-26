jQuery(document).ready(function() {
	jQuery.urlParam=function(name) {
		var results=new RegExp('[\?&]'+name+'=([^&#]*)').exec(window.location.href);
		if(results==null) {
			return null;
		}
		else {
			return results[1]||0;
		}
	}
	var post_id=jQuery.urlParam('post');
	var service_select=jQuery('.brand_table_service select :selected');
	jQuery.each(service_select,function() {
		var id_service=jQuery(this).val();
		var select_table=jQuery(this).parents('.rwmb-group-clone').find('.brand_table_price select');
		var table_price=jQuery(this).parents('.rwmb-group-clone').find('.option_table_type select');
		jQuery.ajax({
			type: "POST",
			url: vmajax.ajaxurl,
			data: {
				'id_service': id_service,
				'post_id': post_id,
				'action': 'get_post_table',
			},
			success: function(result) {
				select_table.empty();
				select_table.append(result);
				jQuery.each(table_price,function(index) {
					var elment=jQuery(this);
					jQuery.ajax({
						type: "POST",
						url: vmajax.ajaxurl,
						data: {
							'id_service': id_service,
							'post_id': post_id,
							'key': index,
							'action': 'get_table_price',
						},
						success: function(result) {
							elment.empty();
							elment.append(result);
						}
					});
				})
			}
		});
	})
	jQuery(document).on('change','.brand_table_service select',function() {
		var id_service=jQuery(this).val();
		var select_table=jQuery(this).parents('.rwmb-group-clone').find('.brand_table_price select');
		jQuery.ajax({
			type: "POST",
			url: vmajax.ajaxurl,
			data: {
				'id_service': id_service,
				'action': 'get_post_table',
			},
			success: function(result) {
				select_table.empty();
				select_table.append(result);
			}
		});
	});
	jQuery(document).on('change','.brand_table_price select',function() {
		var id_table=jQuery(this).val();
		var table_price=jQuery(this).parents('.rwmb-group-clone').find('.option_table_type select');
		jQuery.ajax({
			type: "POST",
			url: vmajax.ajaxurl,
			data: {
				'id_table': id_table,
				'action': 'get_table_price',
			},
			success: function(result) {
				table_price.empty();
				table_price.append(result);
			}
		});
	});

	jQuery(document).on('change','#table_service',function() {
		var id_service=jQuery(this).val();
		jQuery.ajax({
			type: "POST",
			url: vmajax.ajaxurl,
			data: {
				'id_service': id_service,
				'action': 'get_post_brands_table',
			},
			success: function(result) {
				jQuery('#table_brands').empty();
				jQuery('#table_brands').append(result);
			}
		});
	});
})