$(function(){
	$('#body .admin.confirm').click(function(){
		var a = this;
		
		$dialog = $('<div>').text('This is an admin action. Are you sure you want to do this?').dialog({
			modal: true,
			title: 'Admin Action',
			buttons: {
				'Yes': function(){
					window.location.href = $(a).prop('href');
					
					$dialog.dialog('close'); 
				},
				'No': function(){
					$dialog.dialog('close');
				}
			}
		});
		
		return false;
	});
});
