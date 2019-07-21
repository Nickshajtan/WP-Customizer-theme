$(document).ready(function() {
   $('.tab-content div.tab-pane:first').addClass('active in'); //Tabs
    /*Menu mobile*/
   $(function() {
    $('.navbar-toggle').on('click', function() {
      $(this).closest('button').toggleClass('menu_state_open');
      $(this).closest('button').attr('menu_state_open',"ky"); 
      $('.navbar-collapse').toggleClass('menu_state_open');
      $('.navbar-collapse').attr('menu_state_open',"ky");   
      $('.navbar .col-xs-pull-8').toggleClass('menu_open');    
      $('.navbar .col-xs-pull-8').css({
            'position': 'absolute',
            'left': 157,
            'top': 50  
      });   
    });
  }); 
   /* $(function(){
        $().timelinr({
            orientation: 'horizontal',
            containerDiv: '#timeline',
            datesSelectedClass: 'selected',
            datesSpeed: 'slow',
            issuesDiv : '#issues',
            issuesSelectedClass: 'selected',
            issuesSpeed: 'slow',
            issuesTransparency: 0.2,
            issuesTransparencySpeed: 500,
            prevButton: '#prev',
            nextButton: '#next',
            arrowKeys: 'false',
            startAt: 1,
            autoPlay: 'true',
            autoPlayDirection: 'forward',
            autoPlayPause: 2000,
            startAt: 4 })
    });*/
    
 $(function(){   
    $('.dot:nth-child(1)').click(function(){
  $('.inside').animate({
    'width' : '20%'
  }, 500);
});
$('.dot:nth-child(2)').click(function(){
  $('.inside').animate({
    'width' : '40%'
  }, 500);
});
$('.dot:nth-child(3)').click(function(){
  $('.inside').animate({
    'width' : '60%'
  }, 500);
});
$('.dot:nth-child(4)').click(function(){
  $('.inside').animate({
    'width' : '80%'
  }, 500);
});
if ($('#switch1').not(':checked')){
  $('.modal').wrap('<div class="mask"></div>')
    $('.mask').click(function(){
      $(this).fadeOut(300);
      $('.mask article').animate({
        'top' : '-100%'
      }, 300)
    });

    $('.dot').click(function(){
      var modal = $(this).attr('id');
      $('.mask').has('article.' + modal).fadeIn(300);
      $('.mask article.' + modal).fadeIn(0).animate({
        'top' : '10%'
      }, 300);
    });
}
$("#switch1").click(function(){
  if ($('#switch1').is(':checked')){
    $('.modal').unwrap('<div class="mask"></div>');
    $('.modal').hide();
    $('.modal').addClass('nobox');
    $('.dot').click(function(){
    var modal = $(this).attr('id');
    $('article.nobox').hide()
    $('article.nobox.' + modal).fadeIn(200)
	});
  } else {
    $('article').removeClass("nobox");
    $('.modal').wrap('<div class="mask"></div>')
    $('.mask').click(function(){
      $(this).fadeOut(300);
      $('.mask article').animate({
        'top' : '-100%'
      }, 300)
    });

    $('.dot').click(function(){
      var modal = $(this).attr('id');
      $('.mask').has('article.' + modal).fadeIn(300);
      $('.mask article.' + modal).fadeIn(0).animate({
        'top' : '10%'
      }, 300);
    });
  }
});
    
 });
});

