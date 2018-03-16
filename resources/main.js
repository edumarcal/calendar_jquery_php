$(document).ready(function() {
	
	let startHour = $('input[name=startHour]');
	let endHour = $('input[name=endHour]');
    startHour.mask('00:00');
    endHour.mask('00:00');

	$('#calendar').fullCalendar({
		themeSystem: 'bootstrap4',
		//themeName: 'flatly',
		
		dayClick: function(date) {
		    $("#modalCreate").modal("show");
			
			// Init values date
			let now = new Date($.now());
			$('input[name=start]').val(date.format());
			$('input[name=startHour]').val(now.getHours() + ":" + now.getMinutes());

			$('.btnClose').click(function()	{
				$("#modalCreate").modal("hide");
			});
		},

		selectable: true,
		
		select: function(startDate, endDate) {
			//alert('selected ' + startDate.format() + ' to ' + endDate.format());
		},

		eventClick: function(event) {
			$.get('/event/' + event['id'],
				function(data) {
			  		$('#modal-info-edit').html(data);
				}).done(function() {
					$("#modalEdit").modal("show");

				    if (!$("#modalEdit").hasClass('in')) {
						$("#btnSave").hide();
				    }

					$("#btnEdit").click( () => {
						$("#btnEdit").hide();
						$("#btnSave").show();

						// Enable inputs
						$("input[name=title]").prop('disabled', false);
						
						$("input[name=start]").prop('disabled', false);
						$("input[name=startHour]").prop('disabled', false);

						$("input[name=end]").prop('disabled', false);
						$("input[name=endHour]").prop('disabled', false);

						$("textarea[name=description]").prop('disabled', false);
						$("input[name=url]").prop('disabled', false);
					});


			        $('.btnEditClose').click(function() {
						$("#modalEdit").modal("hide");
					});

					let start = event['start']['_i'].split(" ");
					$('input[name=start]').val(start[0]);
					$('input[name=startHour]').val(start[1].slice(0, -3));

					if (event['end'] != undefined) {
						let end = event['end']['_i'].split(" ");
						$('input[name=end]').val(end[0]);
						$('input[name=endHour]').val(end[1].slice(0, -3));
					}

					$('#btnDelete').click(() => {
						$.ajax({
						    url: '/event/'+event['id']+'/delete',
						    type: 'DELETE',
						    success: (data) => {
							    alert('Registro' + data + 'apagado com sucesso.');
							},
							error: (error) => {
							    alert(error);
							}
						});
					});

					$('#btnSave').click(() => {
						event.title = $('input[name=title]').val();
				
						$.ajax({
						    method: 'PUT',
						    url: '/event/' + event['id'] + '/update',
						    data: {
						    	"id" : event['id'],
						    	"title": $("input[name=title]").val(),
						    	"description": $("input[name=description]").val(),
						    	"startDate": $("input[name=start]").val(),
						    	"startHour": $("input[name=startHour]").val()
						    },
						    success: (data) => {
							    alert(data);
							    alert('Registro atualizado com sucesso.');
							},
							error: (error) => {
							    alert(error);
							 }
						});
						
						$('#calendar').fullCalendar('updateEvent', event);
						$("#modalEdit").modal("hide");
					});
			  });

			return false;
		},
		
  		//events: '/data.json'
  		events: '/events'
  });

});