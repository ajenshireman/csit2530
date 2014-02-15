$(function(){
	// Clear the form
	$('#btnClear').click(function(e){
		e.preventDefault();
		clearForm($(this).closest('form'));
	});
	
});

function clearForm ( form ) {
	form.find('input[type=text], input[type=password], input[type=number], select, textarea').val('');
	ftForm.find('input[type=checkbox], input[type=radio]').removeAttr('checked').removeAttr('selected');
}