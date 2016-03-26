$(document).ready(function(){
	if($('.triggers-messages').css('display') == "block"){
		$('.triggers-messages').fadeIn().delay(3000).fadeOut(function(){
			$(this).removeClass('show');
		});
	}

	$("input[type='password']").attr('maxlength', '12');

	$('#nova-senha').keyup(function(){
		var nova_senha = $(this).val();
		var confirm_senha = $('#confirm-senha').val();

		var search_alnum = /^[0-9]+$/ig;
		var search_alpha = /^[A-Z]+$/ig;

		if(search_alnum.test(nova_senha)){return true;}
		if(search_alpha.test(nova_senha)){return true}

		if(search_alpha && search_alnum){
			if(nova_senha.length >= 8 && nova_senha.length <= 12){
				$(this).parent().removeClass('has-error');
				$(this).parent().addClass('has-success');
				$(this).parent().children('span').fadeIn(200);
			}	else {
				$(this).parent().removeClass('has-success');
				$(this).parent().addClass('has-error');
				$(this).parent().children('span').hide();
			}

			if(confirm_senha == nova_senha && confirm_senha != ''){
				$('#confirm-senha').parent().removeClass('has-error');
				$('#confirm-senha').parent().addClass('has-success');
				$('#confirm-senha').parent().children('span').fadeIn(200);
				$('#atualizacao-senha-usuario').attr('type', 'submit');
				$('#atualizacao-senha-usuario').attr('disabled', false);
			} else {
				$('#confirm-senha').parent().removeClass('has-success');
				$('#confirm-senha').parent().addClass('has-error');
				$('#confirm-senha').parent().children('span').hide();
			}
		}
	});

	$('#confirm-senha').keyup(function(){
		var nova_senha = $('#nova-senha').val();
		var confirm_senha = $(this).val();
		var search_alnum = /^[0-9]+$/ig;
		var search_alpha = /^[A-Z]+$/ig;

		if(search_alnum.test(confirm_senha)){return true;}
		if(search_alpha.test(confirm_senha)){return true}

		if(search_alpha && search_alnum){
			if((confirm_senha == nova_senha && nova_senha != '') && confirm_senha.length >= 8 && confirm_senha.length <= 12){
				$(this).parent().removeClass('has-error');
				$(this).parent().addClass('has-success');
				$(this).parent().children('span').fadeIn(200);
				$('#atualizacao-senha-usuario').attr('type', 'submit');
				$('#atualizacao-senha-usuario').attr('disabled', false);
			} else {
				$(this).parent().removeClass('has-success');
				$(this).parent().addClass('has-error');
				$(this).parent().children('span').hide();
			}
		}
	});
});
