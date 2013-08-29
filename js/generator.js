// Img editor by CHACKNORRIS


// Z-Position -------------------------------------------------------------------------------
$(function (){
  $("#arriba").click(function(){  
  var z_position = parseInt($('.selected').css("z-index")); 
	  
	  $(".selected").css("z-index", z_position + 1);
  });
	  $("#abajo").click(function(){
  	  var z_position = $('.selected').css("z-index");
	  
	  if (z_position > 1)
	  {
	  $(".selected").css("z-index", z_position - 1);
		  }

  });
});

// Funcion Publicar
$('.publicar-a').click(function(){
  var html = $("#sandbox_box").html();
  if (html != "") {
	$("#html_shoot").val(html);
	var data = {
	 img_div: $("#html_shoot").val()
	};
	var ajaxurl = "consultas_sql.php";
	$.post(ajaxurl, data, function(id_insert) {
		$.ajax({
		    url:"proxy.php?id_insert="+id_insert,
		    type:'GET',
		    dataType:"json",
		    success:function(rsp){
		    	alert(rsp.respuesta);
		    }
		});
	});
  }else{alert("vacio");}
  //$("#form").submit();
});

// Boton Restaurar
$('.restaurar-a').click(function(){
  $("#sandbox_box").html("");
});

// Boton Guardar
$('.guardar-a').click(function(){
    var html = $("#sandbox_box").html();
    if (html != "") {
  	$("#html_shoot").val(html);
  	var data = {
  	 img_div: $("#html_shoot").val()
  	};
  	var ajaxurl = "consultas_sql.php";
  	$.post(ajaxurl, data, function(id_insert) {
  		$.ajax({
  		    url:"proxy.php?id_insert="+id_insert,
  		    type:'GET',
  		    dataType:"json",
  		    success:function(rsp){
				var url = 'download.php?url=http://miapp.cl/heroku/memefactory/'+id_insert+'_image.jpg';
				window.open(url, '_blank');
  		    }
  		});
  	});
    }else{alert("vacio");}
    //$("#form").submit();
});

// List of Fondos y Memes ---------------------------------------------------------------------

$(".fondo_meme").click(function(){
	$(".memes_bigbox").fadeOut("fast");
	$(".background_bigbox").fadeToggle("fast");
	$(".minibox").click(function(){
		$('.memes_bigbox').fadeOut();$('.background_bigbox').fadeOut();
	});
});

$(".personajes_meme").click(function(){
	$(".background_bigbox").fadeOut("fast");
	$(".memes_bigbox").fadeToggle("fast");
	$(".minibox").click(function(){
		
		$('.memes_bigbox').fadeOut();$('.background_bigbox').fadeOut();
	});
});

$("button.cerrar").click(function(){
	$(this).parent("div").fadeOut("fast");
});

$(".background_bigbox img").click(function(){
	var img_num = $(this).next().text();
	$('#sandbox_box').css("background-image","url(img/fondos/"+ img_num +".jpg)");
	$(".background_bigbox").fadeOut("fast");
});

$(".memes_bigbox .memebox").click(function(){
	var img_num = $(this).children("img").next().text();
		
	$("div").removeClass("new_meme");
		
	$("#sandbox_box").append('<div class="minibox new_meme" style="z-index:1"><div class="form meme"><img src="img/memes/meme' + img_num + '.png" /><img src="img/memes/meme'+ img_num +'_flip.png" style="display:none;" /></div></div>');
	
	var da_height = 125*$(".new_meme img").css("height").replace('px', '')/$(".new_meme img").css("width").replace('px', '');
	
	$('.new_meme').css({"width":"125px","height":da_height});
	$('.new_meme img').css({"width":"100%","height":"100%"});
	$(".memes_bigbox").fadeOut("fast");
	$(".minibox" ).draggable({ containment: "#sandbox_box", scroll: false });
	$(".minibox").resizable({containment: "#sandbox_box"});
	$('.form').mousedown(function(){
			$('.form').removeClass('rotate');
			$('.minibox').removeClass('selected');
			$(this).addClass('rotate');
			$(this).parent('.minibox').addClass('selected');
			console.log("click form");
			if ($(this).hasClass("meme")) hideToolText(); else showToolText();
	});
	$('.minibox').mousedown(function(){
		$('.minibox').removeClass('selected');
		$(this).addClass('selected'); 
		console.log("click minibox");
		if(!$(this).children().hasClass('meme')) showToolText();
		
	});
	$('.meme').mousedown(function(){$('#flipImg').show()});
	
	$('.minibox').click(function(){
		if(!$(this).children().hasClass('meme'))
		{$('#flipImg').hide()}
		console.log("click minibox");
	});
	
});
	// Flip Meme
	
	$('#flipImg').click(function(){
		$(".selected .meme img").toggle();
	});

	

// Eliminar -------------------------------------------------------------------------------------
$('#erase_element').click(function(){$('.selected').remove();});

// Funcion de Añadir Texto	--------------------------------------------------------------------

	// Clear Text
	$('#texto_input').click(function(){
		$(this).val('');
	})

$('#addtext').click(function(){
	if ( $('#texto_input').val() == "") return false;
	$('#sandbox_box').append( "<div class='minibox scale' style='z-index:1;'><p class='texto'>" + $('#texto_input').val() + "</p></div>" );
	$("#texto_input").val('');
	$('.minibox').mousedown(function(){$('.minibox').removeClass('selected');$(this).addClass('selected');});
	$('.meme').mousedown(function(){$('#flipImg').show()});
	$('.minibox').click(function(){
		if(!$(this).children().hasClass('meme'))
		{$('#flipImg').hide()}
		});	
	
	
	//Editar Texto
	$('#editar_texto').click(function(){
			var text_edit = $('.selected').children('.texto').text();

			if ( $(".texto").parent().hasClass("selected") )
			  {
				var elColor = $('.selected').children('.texto').css("color");
				var elFamily = $('.selected').children('.texto').css("font-family");
				var elSize = $('.selected').children('.texto').css("font-size");
				var elZindex = $('.selected').children('.texto').css("z-index");

				$('.selected').children('.texto').remove();
				$('.selected').append("<textarea class='edit_block' >"+ text_edit +"</textarea>");
				$('.main_toolbox').hide();
				$('.text_toolbox').show();
				$('.selected').children('.edit_block').css("font-family", elFamily)
				$('.selected').children('.edit_block').css("font-size", elSize)
				$('.selected').children('.edit_block').css("color", elColor)
				$('.selected').children('.edit_block').css("color", elZindex)
				$("#tipos").change(function() {
					//alert($(this).val());
					$('.selected').children('.edit_block').css("font-family", $(this).val());
				
				});
				$("#tipo_size").change(function() {
					//alert($(this).val());
					$('.selected').children('.edit_block').css("font-size", $(this).val() + "px");
				
				});
			  }
	});
	
	//Cerrar Texto
	$('#cerrar_texto').click(function(){
			var edit_block = $('.edit_block').val();
			var font_family = $('.edit_block').css("font-family");
			var font_size = $('.edit_block').css("font-size");
			var font_color = $('.edit_block').css("color");
			var font_zindex = $('.edit_block').css("z-index");

			if ( $(".edit_block").parent().hasClass("selected") )
			  {
				$('.selected').children('.edit_block').remove();
				$('.selected').append("<p class='texto'>" + edit_block + "</p>");
				$('.selected').children('.texto').css("font-family", font_family);
				$('.selected').children('.texto').css("font-size", font_size);
				$('.selected').children('.texto').css("color", font_color);
				$('.selected').children('.texto').css("z-index", font_zindex);
				$('.main_toolbox').show();
				$('#tipos option:eq(0)').prop('selected', true);
				$('#tipo_size option:eq(0)').prop('selected', true);
				$('.text_toolbox').hide();
			  }
	});
	
	
	$(".minibox" ).draggable({ containment: "#sandbox_box", scroll: false });
	$(".minibox").resizable({containment: "#sandbox_box"});
});

//Color Picker ----------------------------------------------------------------------
$('#colourpicker').colourPicker({
 	ico:    'img/color_picker.png', 
    title:    false
});


// Rotate slider --------------------------------------------------------------------
$( "#slider" ).slider({
  range: "max",
  min: 0,
  max: 360,
  value: 0,
  slide: function( event, ui ) {
	 var mov = ui.value; 
	  
	$( "#amount" ).val( ui.value );
	$(".rotate").rotate({animateTo:mov})		
  }
});







// Funcion para agregar imagenes al Meme ---------------------------------------------
$('#subir_IMG').click(function(){
	$('.uploadimage input[type=file]').click();	
});

$('.uploadimage input[type=file]').on('change', function() {
  var id_input = $(this).attr("id");
  ajaxFileUpload(id_input);
});

function ajaxFileUpload(id_input)
{
  var idinput = id_input;
  $("#loading")
  .ajaxStart(function(){
	$(this).show();
  })
  .ajaxComplete(function(){
	$(this).hide();
  });

  $.ajaxFileUpload
  (
	{
	  url:'doajaxfileupload.php',
	  secureuri:false,
	  fileElementId:idinput,
	  dataType: 'json',
	  data:{name:'logan', id:'id'},
	  success: function (data, status)
	  {
		if(typeof(data.error) != 'undefined')
		{
		  if(data.error != '')
		  {
			alert(data.error);
		  }else
		  {
			var d = new Date();
			var archivo = data.msg;
			var alto = data.alto;
			var ancho = data.ancho;
			var id = "subido-" + data.nombre + "-" + d.getTime();
				  $("div").removeClass("new_img");
			if (alto >= ancho) {
			  if(alto >300){
				ancho=(300*data.ancho)/data.alto;
				alto = 300;
			  }
			}else{
			  if(ancho>400){
				alto=(400*data.alto)/data.ancho;
				ancho = 400;
			  }
			}

			$("#sandbox_box").append("<div class='minibox new_img' style='width:"+ancho+"px;height:"+alto+"px; z-index:1'><div class='form'><img src='uploads/"+ archivo +"'></div></div>");

			var sgte_id = parseInt( $("#"+id_input).attr("rel") ) + 1;
			$("#upload"+$("#"+id_input).attr("rel")).remove();
			$("#upload").append('<input type="file" name="fileToUpload" id="upload'+sgte_id+'" rel="'+sgte_id+'" />');

			$('.uploadimage input[type=file]').on('change', function() {
			  var id_input = $(this).attr("id");
			  ajaxFileUpload(id_input);
			});

			//$(".uploadimage").append('<label>Añadir Imagen '+sgte_id+'</label><input type="file" name="fileToUpload" id="upload'+sgte_id+'" rel="'+sgte_id+'" />');

			/*$("#"+idinput).hide();
			var id_superior = $("#"+idinput).parent().attr('id');
			$("#"+id_superior).hide();
			var sgt_id = $("#"+id_superior).attr("rel");
			if (sgt_id < 4){
			  sgt_id= parseInt(sgt_id)+1;
			  $("#upload_"+sgt_id).fadeIn();
			}*/
			// Tamaño Default de la imagen
			/*var img_width = $(".new_img img").width();
			var img_height = $(".new_img img").height();
			
			$('.new_img').css("width", "200px")
			$('.new_img').css("height", "auto")*/

			
			$('.new_img img').css({"width":"100%","height":"100%"});
			$('.form').mousedown(function(){$('.form').removeClass('rotate');$('.minibox').removeClass('selected');$(this).addClass('rotate');$(this).parent('.minibox').addClass('selected');});
			$('.meme').mousedown(function(){$('#flipImg').show()});
			$('.minibox').click(function(){
				if(!$(this).children().hasClass('meme'))
				{$('#flipImg').hide()}
				});			
			$(".minibox").draggable({ containment: "#sandbox_box", scroll: false });
			$(".minibox").resizable({containment: "#sandbox_box"});
		  }
		}
	  },
	  error: function (data, status, e)
	  {
		alert(e);
	  }
	}
  )



  return false;


}



function hideToolText(){
	var obj = $("#editar_texto");
	obj.hide();	
}
function showToolText(){
	var obj = $("#editar_texto");
	obj.show();	
}

/* FUNCION EDITAR TEXTO */

$(document).ready(function(){
 $("body").on("click", ".texto",function(){
	 	console.log("text");
		showToolText();
 })

	
})
