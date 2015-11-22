/*
 * upload de arquivos via
 * ajax FormData
 *
 */

 function upload( dados ){

    var id = $( dados.id_file );
    var form_data = false;

    var reader, load_files;

    if( !window.FormData ){
        return false;
    }

    form_data = new FormData();

    id.change(function(){

      var files = this.files;
      var mens = $( dados.mens );

      load_files = 0;

      mens.html('Processando...');

      for( var i=0; i < files.length; i++ ){

          reader = new FileReader();
          reader.onprogress = load_doc;

          load_files = reader.readAsBinaryString(files[i]);

          while( load_files < 100 ){
              load_files = reader.readAsBinaryString(files[i]);
          }

          form_data.append('files[]', files[i]);
      }

      mens.html('Enviando...');

      $.ajax({
         url: dados.url,
         type: 'POST',
         data: form_data,
         processData: false,
         contentType: false,
         success: function( e ){
             mens.html('Arquivos enviado com sucesso!');
             refresh_docs( dados.refresh, dados.html, dados.obj_action );
         }
      });

    });

 }


 function load_doc( evt){

     if( evt.lengthComputable ){
         var percentual = Math.round( (evt.loaded / evt.total) * 100);
     }

 }

 function click_doc( dados ){

     var classe = $( dados.classe );
     var atributo, pai;

     if( typeof(dados.input_type) != 'undefined' ){
         $(dados.check).attr('type', dados.input_type);
     }

     classe.click(function(){

         atributo = $(this).attr('data-check');
         atributo = document.getElementById( atributo.replace('#', '') );

         pai = $(this).parent();

         if( atributo.checked ){

             atributo.checked = false;
             pai.removeClass('active');

             apli_input( dados.input, dados.check);

             return false;
         }

         pai.addClass('active');
         atributo.checked = true;

         apli_input(dados.input, dados.check);

     });

     return false;
 }


 function apli_input( id_input, cls_imgs ){

     var id = $(id_input);
     var cls = $( cls_imgs );
     var valores = '';

     for( var i=0; i < cls.length; i++ ){

        if( !$(cls_imgs + ':eq('+ i +')').is(':checked') ){
            $(cls_imgs + ':eq('+ i +')').parent().removeClass('active');
            continue;
        }

        valores += $(cls_imgs + ':eq(' + i + ')').val() + ',';
     }

     valores = valores.substr(0, valores.length - 1);
     id.val(valores);
 }


 function refresh_docs( url, html, obj ){

     $.ajax({
        url: url,
        data: '',
        type: 'POST',
        success: function(data){
            $(obj.input).val('');
            $(html).html(data);
            click_doc(obj);
        }
     });
 }
