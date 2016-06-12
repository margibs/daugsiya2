 $(document).ready(function(){
    // Twitter
    window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
      t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.async = true;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);

    t._e = [];
    t.ready = function(f) {
      t._e.push(f);
    };

    return t;
    }(document, "script", "twitter-wjs"));


    // SHARRE
      $('#demo1').sharrre({
      share: {        
        facebook: true,
        twitter: true
      },
      buttons: {
        googlePlus: {size: 'tall', annotation:'bubble'},
        facebook: {layout: 'box_count'},
        twitter: {count: 'vertical', via: '_JulienH'}
      },
      // hover: function(api, options){
      //   $(api.element).find('.buttons').show();
      // },
      // hide: function(api, options){
      //   $(api.element).find('.buttons').hide();
      // },
      enableTracking: true
    });

    // Fixed DIV
        $(window).scroll(function(e) {                
          var scroller_anchor = $(".scroller_anchor").offset().top;               
          if ($(this).scrollTop() >= scroller_anchor && $('.scroller').css('position') != 'fixed') 
          {    // Change the CSS of the scroller to hilight it and fix it at the top of the screen.
              $('.scroller').css({                              
                  'position': 'fixed',
                  'top': '45px'                                     
              });
              $('.fbBig').css({
                  'display' : 'none'
              })
              $('.fbSmall').css({
                  'display' : 'block'
              })
              // Changing the height of the scroller anchor to that of scroller so that there is no change in the overall height of the page.
              $('.scroller_anchor').css('height', '50px');
          } 
          else if ($(this).scrollTop() < scroller_anchor && $('.scroller').css('position') != 'relative') 
          {    // If the user has scrolled back to the location above the scroller anchor place it back into the content.
              
              // Change the height of the scroller anchor to 0 and now we will be adding the scroller back to the content.
              $('.scroller_anchor').css('height', '0px');
              
              // Change the CSS and put it back to its original position.
              $('.scroller').css({                          
                  'position': 'relative',
                  'top': '0'                   
              });
              $('.fbBig').css({
                  'display' : 'block'
              })
              $('.fbSmall').css({
                  'display' : 'none'
              })
          }
      });

});      