$(document).ready(function()
{
	$("#photo_save").click( function()
	{
		var user_id = $('.username').text();

		var photo = $('.filename').text();

		if(photo!='')
		{
		$.ajax({
			type: "POST",
			url: "../model/profile.php",
			data:{
					photo:photo,
					user_id:user_id,
					choice:3
				},
			cache: false,
			success: function(data)
			{
				var obj=jQuery.parseJSON(data);
				$(".user").attr("src",(obj.photo));
				if(data=1) {
					swal('', 'Your photo has changed', 'success');
					$("#photo").modal("hide");
					location.reload();
				}
				else {
					swal('', 'Your photo has not changed', 'warning');

				}
			}
		});
		}
		else
		{

			swal('', 'Your photo has not changed', 'warning');
		}
									  
	});
});