/*
 *
 *  Método responsável por validar dados
 *  dos formulários
 *
 */


 function validForm( btn, ray ){

     $(btn).click(function(){

         for( var i=0; i < ray.length; i++ ){

             if( $('#' + ray[i]).val() == '' ){
                 alert( 'Preencha todos os campos obrigatórios' );
                 markInput(ray);
                 return false;
             }
         }

         return true;

     });
 }

 function markInput( ray ){
     for( var i=0; i < ray.length; i++ ){

         if( $('#' + ray[i]).val() != ''  ){
             $('#' + ray[i]).attr('style', 'border-bottom-color: green;');
             continue;
         }

         $('#' + ray[i]).attr('style', 'border-bottom-color: red');
     }
 }

