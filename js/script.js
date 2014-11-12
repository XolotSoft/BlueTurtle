$(document).ready(function() {
     $('#palCla').keypress(function() {
          $('#conPal').removeAttr('disabled');
     });
     $('#conPal').focusout(function() {
          var a = $('#conPal').val();
          var b = $('#palCla').val();
          if (a!=b) {
               alert("Son diferentes las palabras clave");
               $('#conPal').val("");
               $('#palCla').val("");
          }
     });
});

function envRapOp(op){
     	if (op=="palabra") {
     		$('#oculto').css('display', 'block');
               $('#palCla').focus().attr('required', 'required');
               $('#conPal').attr('required', 'required');
     	}
     	if (op=="basica") {
     		$('#oculto').css('display', 'none');
               $('#conPal').val("").removeAttr('required');
               $('#palCla').val("").removeAttr('required');
     	}
     	if (op=="") {
     		$('#oculto').css('display', 'none');
               $('#conPal').val("").removeAttr('required');
               $('#palCla').val("").removeAttr('required');
     	}
     }