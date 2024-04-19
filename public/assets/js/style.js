

$('.insta-element').hover(
  function(){
    // $(this).children().animate({opacity:0.5},{duration: 150});
    $(this).children('.insta-caption').addClass('scrollin');
  },
  function(){
    $(this).children('.insta-caption').removeClass('scrollin');
    // $(this).children().animate({opacity:1},{duration: 400});
  }
)

$(function(){
  $('.arrow-left').click(function(){  
    var insta_position = $('.insta-div').scrollLeft();
    var left = insta_position - 300;
    $('.insta-div').animate({scrollLeft:left}, 1000, 'swing');
  });
  $('.arrow-right').click(function(){  
    var insta_position = $('.insta-div').scrollLeft();
    var right = insta_position + 300;
    $('.insta-div').animate({scrollLeft:right}, 1000, 'swing');
  });
});

$(window).scroll(function() {
  if ($(this).scrollTop() > 300) {
    $('.scroll-info').fadeOut(3000);
  };
});

$(function(){
  $('.scroll-info span').click(function(){
    var positon = $(window).scrollTop();
    var scroll_position = positon + 800;
    $("html,body").animate({scrollTop:scroll_position}, 1000, 'swing');
  });
});


$(function(){
  // var effect_pos = 300; // 画面下からどの位置でフェードさせるか(px)
  var effect_move = 50; // どのぐらい要素を動かすか(px)
  var effect_time = 1000; // エフェクトの時間(ms) 1秒なら1000

  // フェードする前のcssを定義
  $('.scroll-fade').css({
      opacity: 0,
      transform: 'translateY('+ effect_move +'px)',
      transition: effect_time + 'ms'
  });

  // スクロールまたはロードするたびに実行
  $(window).on('scroll load', function(){
      var scroll_top = $(this).scrollTop() + 500;
      // var scroll_btm = scroll_top + $(this).height();
      // effect_pos = scroll_btm - effect_pos;


      // effect_posがthis_posを超えたとき、エフェクトが発動
      $('.scroll-fade').each( function(i) {
          var this_pos = $(this).offset().top;
          if ( scroll_top > this_pos ) {
              $(this).css({
                  opacity: 1,
                  transform: 'translateY(0)'
              });
          }
      });
  });
});

$(function(){

  var effect_btm = 300; // 画面下からどの位置でフェードさせるか(px)
  var effect_move = 50; // どのぐらい要素を動かすか(px)
  var effect_time = 1000; // エフェクトの時間(ms) 1秒なら1000

  //親要素と子要素のcssを定義
  $('.scroll-fade-row').css({
      opacity: 0
  });
  $('.scroll-fade-row').children().each(function(){
      $(this).css({
          opacity: 0,
          transform: 'translateY('+ effect_move +'px)',
          transition: effect_time + 'ms'
      });
  });

  // スクロールまたはロードするたびに実行
  $(window).on('scroll load', function(){
      var scroll_top = $(this).scrollTop() + 300;
      var scroll_btm = scroll_top + $(this).height();
      var effect_pos = scroll_btm - effect_btm;

      //エフェクトが発動したとき、子要素をずらしてフェードさせる
      $('.scroll-fade-row').each( function() {
          var this_pos = $(this).offset().top;
          if ( effect_pos > this_pos ) {
              $(this).css({
                  opacity: 1,
                  transform: 'translateY(0)'
              });
              $(this).children().each(function(i){
                  $(this).delay(100 + i*200).queue(function(){
                      $(this).css({
                          opacity: 1,
                          transform: 'translateY(0)'
                      }).dequeue();
                  });
              });
          }
      });
  });

});


$(function(){
  $('.insta_pc_fade').hide();
});

window.onload = $(function(){
  setTimeout(function(){
    // $('.scroll-info span').fadeIn();
    $('.insta_pc_fade').fadeIn(2000);
  },2500);
});