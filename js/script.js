$(document).ready(function() {
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
               $('#palCla').focus();
     	}
     	if (op=="basica") {
     		$('#oculto').css('display', 'none');
               $('#conPal').val("");
               $('#palCla').val("");
     	}
     	if (op=="") {
     		$('#oculto').css('display', 'none');
               $('#conPal').val("");
               $('#palCla').val("");
     	}
     }