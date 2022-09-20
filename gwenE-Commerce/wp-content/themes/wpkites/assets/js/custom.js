(function ($){

  // remove box on click 
    $("a").keypress(function() {
     this.blur();
     this.hideFocus = false;
     this.style.outline = null;
      });
      $("a").mousedown(function() {
           this.blur();
           this.hideFocus = true;
           this.style.outline = 'none';
      });
      
	  $.fn.counter = function() {
	    const $this = $(this),
	    numberFrom = parseInt($this.attr('data-from')),
	    numberTo = parseInt($this.attr('data-to')),
	    delta = numberTo - numberFrom,
	    deltaPositive = delta > 0 ? 1 : 0,
	    time = parseInt($this.attr('data-time')),
	    changeTime = 10;
	    
	    let currentNumber = numberFrom,
	    value = delta*changeTime/time;
	    var interval1;
	    const changeNumber = () => {
	      currentNumber += value;
	      //checks if currentNumber reached numberTo
	      (deltaPositive && currentNumber >= numberTo) || (!deltaPositive &&currentNumber<= numberTo) ? currentNumber=numberTo : currentNumber;
	      this.text(parseInt(currentNumber));
	      currentNumber == numberTo ? clearInterval(interval1) : currentNumber;  
	    }

	    interval1 = setInterval(changeNumber,changeTime);
	  }

    // remove # on URL
        $(".search-icon").click(function(e){
            e.preventDefault();
            console.log();
         });
        
	  jQuery(document).ready(function(){
   


        jQuery(function(){
      jQuery(".video-player").mb_YTPlayer();
    });

    jQuery('#video-play').click(function(event) {
      event.preventDefault();
      if (jQuery(this).hasClass('fa-play')) {
      jQuery('.video-player').playYTP();
      } else {
      jQuery('.video-player').pauseYTP();
      }
      jQuery(this).toggleClass('fa-play fa-pause');
      return false;
    });

    jQuery('#video-volume').click(function(event) {
      event.preventDefault();
      if (jQuery(this).hasClass('fa-volume-off')) {
      jQuery('.video-player').YTPUnmute();
      } else {
      jQuery('.video-player').YTPMute();
      }
      jQuery(this).toggleClass('fa-volume-off fa-volume-up');
      return false;
    });

	  jQuery('.count-up').counter();
	  
	  /*new WOW().init();*/
	  
	  setTimeout(function () {
	    jQuery('.count5').counter();
	  }, 3000);
	});

  //Sticky Header
       jQuery(window).bind('scroll', function () {
          if (jQuery(window).scrollTop() > 100)
          {
                jQuery('.header-sticky').addClass('stickymenu');
                jQuery('.header-sidebar').css('display','none');
          } else {
                jQuery('.header-sticky').removeClass('stickymenu');
                jQuery('.header-sidebar').css('display','');
          }
       });

         // scroll
  $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-up').fadeIn();
        } else {
            $('.scroll-up').fadeOut();
        }
    }); 

  
    $('a[href="#totop"]').click(function () {
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });

	}(jQuery));