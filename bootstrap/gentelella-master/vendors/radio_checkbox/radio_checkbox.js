
function toogleCheck(id){

	
	var input = $('input[id="'+id+'"]');

	input.click();
	
	var li = input.parent().parent();
	var verify = li.attr('data-verify');
	var disabled = input.attr('disabled');

	if (disabled != 'disabled'){
	
		if (verify == "2"){

			if (li.hasClass('label-checkbox-active')){
				li.toggleClass('label-checkbox-active',false);

			}else {
				li.toggleClass('label-checkbox-active',true);
			}

			li.attr('data-verify','1');

		}else {

			li.attr('data-verify','2');

		}
	}

}