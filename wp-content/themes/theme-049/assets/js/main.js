(function($) {

  $(document).ready(function(){

      $('.navbar-toggler').click(function(e){
        e.preventDefault();
        $('.mobile_menu').show();
      }); 

      $('.center').slick({
        arrows: true,
        centerMode: true,
        infinite: true,
        slidesToShow: 1,
        speed: 500,
        dots: false,
        adaptiveHeight: true
      });

      $(".search_icon").click(function () {
        $(".search_open").slideToggle('fast');
        });

      $(".search_todo_in").click(function () {
          $(".ver-todo-inner").fadeOut('fast');
          $(".search_open").slideToggle('fast');
      });

      $("#ver-todo").click(function () {
        $('body').addClass('noscroll');
        $(".ver-todo-inner").slideToggle('fast');
      });

      $(".todo_close").click(function () {
        $(".ver-todo-inner").slideToggle('fast');
        $('body').removeClass('noscroll');
      });

      $(".search_close").click(function () {
        $(".search_open").slideToggle('fast');
        });

      $(".mm_search").click(function () {
        $(".mobile_menu").fadeOut('fast');
        $(".search_open").slideToggle('fast');
        });

        $('.admeme_inner').slick({
      arrows: true,
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $(".tag_icon").on('click',function() {
      $( ".social_share" ).css('width','0');
      $( this ).next( ".social_share" ).css('width','100%');
    });

    $(".close_share").on('click',function() {
      $( this ).parent( ".social_share" ).css('width','0');
    });

    $(".item").each(function() {
      var item = $(this); 
      var image = item.children('img').attr('src');
      $(item).find('.description p').append('<a href="' + image + '" data-featherlight="image">View Larger</a>');
    }); 

  });

  var $container;

  // init Masonry
  $(window).load( function() {

      $container = $('#container').masonry({
        itemSelector: ".item",
        columnWidth: ".grid-sizer",
        gutter: ".gutter-sizer",
        percentPosition: true  
      });

    $container.imagesLoaded().progress( function() {
        $container.masonry('layout');
    });
  
  });

  $('.load-more').click(function(e) {
    e.preventDefault();
    var load_more = $(this);
    var type = load_more.data('type');
    var object = load_more.data('object');
    var page = load_more.data('page');
    var pages = load_more.data('pages');
    var count = load_more.data('count');
    $.ajax({
      type: 'POST',
      dataType: 'html',
      url: ajaxurl,
      data: { 
          'action': 'project049_load_posts',
          'page': page,
          'count': count,
          'type': type,
          'object': object
      },
      success: function(data){
          $('.articulados_page').find('.container').find('.row').append(data);                
          page++;
          load_more.data('page', page);
          if(page > pages) {
            load_more.hide();
          }
      }
    });     
  });

  $('.load-more-json').click(function(e) {
    e.preventDefault();
    var load_more = $(this);
    var type = load_more.data('type');
    var object = load_more.data('object');
    var page = load_more.data('page');
    var pages = load_more.data('pages');
    var count = load_more.data('count');
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: ajaxurl,
      data: { 
          'action': 'project049_load_posts_json',
          'page': page,
          'count': count,
          'type': type,
          'object': object
      },
      success: function(data){
          for(i=0;i<data.length;i++) {
            var div_item = $('<div>');
            div_item.addClass('item');
            var link_tag = $('<a>');
            link_tag.attr('href',data[i]['permalink']);
            var img_tag = $('<img>');
            img_tag.attr('src',data[i]['thumbnail']);
            link_tag.append(img_tag);
            div_item.append(link_tag);
            $('.articulados_page').find('.container').find('.row-memes').append(div_item);                
            $container.masonry('appended',div_item);
          }
          page++;
          load_more.data('page', page);
          if(page > pages) {
            load_more.hide();
          }
      }
    }); 
  });

  $('.copy-link').click(function(e) {
    e.preventDefault();
    var target = document.getElementById('single-link');
    target.focus();
    target.setSelectionRange(0, target.value.length);    
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }   
    if(succeed) {
      $(this).text('Link copiado!');
    } 
  });


})(jQuery);
