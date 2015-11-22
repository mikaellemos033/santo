$(document).ready(function(){

      $('.parallax').parallax();
      $("#myToggle").sideNav();

      $('input#input_text, textarea#textarea1').characterCounter();
      $('select').material_select();

      $('.modal-trigger').leanModal();
      bannerBody();

      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });

      tab('.tab_img', 'active');
});


function bannerBody(){
    var bg = ['background_1.jpg', 'background_2.jpg', 'background_3.jpg', 'background.jpg'];
    var random = Math.floor( Math.random() * 3);

    $('body').attr('style', 'background-image: url("/webroot/img/' + bg[random] + '");    ' );
}

function tab( dados, act ){

    var btn_click = $(dados);

    btn_click.click(function(){

        $( '.' + $(this).attr('data-child')).hide();
        $($(this).attr('href')).show();

        btn_click.removeClass(act);
        $(this).addClass(act);

        return false;
    });
}