
jQuery(document).ready(function($){

        var panels = $('.accordion > dd').hide();
        $('.accordion > dt > a').click(function() {
          var $this = $(this);
          panels.slideUp();
          $this.parent().next().slideDown();
          return false;
        });
      });

      window.onload = function () {
      var Shuffle = window.Shuffle;
      var element = document.querySelector('.shuffle-container');

      var shuffleInstance = new Shuffle(element, {
        itemSelector: 'li'
      });


        $('.shuffle-filter li').on('click',function(e){
          e.preventDefault();
          $('.shuffle-filter li').removeClass('selected');
          $(this).addClass('selected');
          var keyword = $(this).attr('data-target');
          shuffleInstance.filter(keyword);
        });

      }

$(document).ready(function(){
  $('#showanim').click(function(){
    $('#coins1').stop().animate({opacity:0, top: 30},1000,"linear");
    $('#coins2').stop().animate({opacity:0, top: 30},1000,"linear");
    $('#coins3').stop().animate({opacity:0, top: 30},1000,"linear");
    $('#coins4').stop().animate({opacity:0, top: 30},1000,"linear");
    $('#coins5').stop().animate({opacity:0, top: 30},1000,"linear");
    $('#coins6').stop().animate({opacity:0, top: 30},1000,"linear");


      });
        });
