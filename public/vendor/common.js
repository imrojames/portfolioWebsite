// Notification message fadeIn and fadeOut
$(document).ready(function(){
    $('.alert').fadeIn(300).delay(1500).fadeOut(400);
});

//Close button from add-edit-form
$('.btn-frm-close-profile').click(function(){
	window.location.href = '/1438';
});

$('.btn-frm-close-about').click(function(){
	window.location.href = '/1438/about';
});

$('.btn-frm-close-objective').click(function(){
	window.location.href = '/1438/resume';
});

$('.btn-frm-close-education').click(function(){
	window.location.href = '/1438/resume';
});

$('.btn-frm-close-experience').click(function(){
	window.location.href = '/1438/resume';
});

$('.btn-frm-close-portfolio').click(function(){
	window.location.href = '/1438/portfolio';
});

// Delete Education using modal dialog
$('.delete-edu').click(function(){
	var id = $(this).parents('p').attr('id');
	$('#id').val(id);
	$('#delete-educ-modal').modal('show');

	$('.btn-yes').click(function(){
		var eduId = $('#id').val();
		$.ajax({
			url:'/education/'+eduId+'/delete',
			type: 'GET',
			success:function(data){
				window.location.href = '/resume';
			}
		});
	});
});

// Delete Education using modal dialog
$('.delete-exp').click(function(){
	var id = $(this).parents('p').attr('id');
	$('#id').val(id);
	$('#delete-educ-modal').modal('show');

	$('.btn-yes').click(function(){
		var expId = $('#id').val();
		$.ajax({
			url:'/experience/'+expId+'/delete',
			type: 'GET',
			success:function(data){
				window.location.href = '/resume';
			}
		});
	});
});

// Delete portfolio using modal dialog
$('.delete-portfolio').click(function(){
	var id = $(this).parents('div').attr('id');
	$('#id').val(id);
	$('#delete-port-modal').modal('show');

	$('.btn-yes').click(function(){
		var expId = $('#id').val();
		$.ajax({
			url:'/portfolio/'+expId+'/delete',
			type: 'GET',
			success:function(data){
				window.location.href = '/portfolio';
			}
		});
	});
});
