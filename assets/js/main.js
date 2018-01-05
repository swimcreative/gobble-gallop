/**
 * Custom js for theme
 */
jQuery(function($) {

    'use strict';

    var GOBBLE = window.GOBBLE || {};

    /* =============================================================================
       GOBBLE SKIP LINK FOCUS FIX (from _s)
       ========================================================================== */

    GOBBLE.skipLinkFix = function() {
        var is_webkit = navigator.userAgent.toLowerCase().indexOf('webkit') > -1,
            is_opera = navigator.userAgent.toLowerCase().indexOf('opera') > -1,
            is_ie = navigator.userAgent.toLowerCase().indexOf('msie') > -1;

        if ((is_webkit || is_opera || is_ie) && document.getElementById && window.addEventListener) {
            window.addEventListener('hashchange', function() {
                var id = location.hash.substring(1),
                    element;

                if (!(/^[A-z0-9_-]+$/.test(id))) {
                    return;
                }

                element = document.getElementById(id);

                if (element) {
                    if (!(/^(?:a|select|input|button|textarea)$/i.test(element.tagName))) {
                        element.tabIndex = -1;
                    }

                    element.focus();
                }
            }, false);
        }
    };

    /* =============================================================================
     GOBBLE NAVIGATION
     ========================================================================== */

    GOBBLE.navigation = function() {
        var hamburger = $('.menu-toggle');
        var drawer = $('.site-navigation');

        hamburger.click(function() {
            $('body').toggleClass('lock');
            hamburger.toggleClass('closer');
            drawer.toggleClass('expanded').slideToggle(150);
            if (drawer.hasClass('expanded')) {
                hamburger.attr('aria-expanded', 'true');
            } else {
                hamburger.attr('aria-expanded', 'false');
            }
        });

        //default body padding for a fixed header
        function bodyPadding() {
            $('.fixed-header').css('padding-top',$('.site-header').height());
        }

        // jQuery to collapse the navbar on scroll
        function minimize() {
            if ($(".site-header").offset().top > 50) {
              //  $(".site-header").addClass("minimize");
              //  $('body').trigger('minimized');
            } else {
                //$(".site-header").removeClass("minimize");
            }
        }

        $(window).on('minimized', function() {
          //  console.log('worked');
        });

        $(window).scroll(minimize);
        $(window).resize(bodyPadding);
        bodyPadding();
        minimize();

    }

    /* =============================================================================
      GOBBLE WEBFONT
      ========================================================================== */

    GOBBLE.webfont = function() {
        try {
            Typekit.load({
                async: true
            });
        } catch (e) {}
    }

    /* =============================================================================
        GOBBLE WIDGETS
        ========================================================================== */

    GOBBLE.widgets = function() {

        //rss widget tweaks
        if ($('.widget_rss').length >= 1) {
            //truncate summary
            $('.rssSummary').each(function() {
                var summary = $(this).text(); //replace with your string.
                var maxLength = 70; // maximum number of characters to extract
                //trim the string to the maximum length
                var excerpt = summary.substr(0, maxLength);
                //re-trim if we are in the middle of a word
                excerpt = excerpt.substr(0, Math.min(excerpt.length, excerpt.lastIndexOf(' ')));
                //remove &nbsp;&nbsp; indenting
                excerpt = excerpt.replace(/\s\s+/g, ' ') + '&hellip;';
                $(this).html(excerpt);
            });
        }

        //add badges to category & archive counts
        if ($('.widget_archive, .widget_categories').length >= 1) {
            $('.widget_archive li, .widget_categories li').each(function() {
                var item = $(this).html();
                item = item.replace('(', '<small class="count">');
                item = item.replace(')', '</small>');
                $(this).html(item);
                //add posts
                if ($('.count', this).text() === '1') {
                    $('.count', this).append(' Post');
                } else {
                    //  console.log($('.count', this).text())
                    $('.count', this).append(' Posts');
                }
            });
        }

        //add badges to category & archive counts
        if ($('.widget_tag_cloud').length >= 1) {
            $('.widget_tag_cloud a').each(function() {
                var count = $(this).attr('title');
                count = count.replace(' topics', '');
                count = count.replace(' topic', '');
                $(this).append(' &nbsp;<span class="badge">' + count + '</span>');
            });
        }
    };

    /* =============================================================================
      GOBBLE FAUXWIDTH
      ========================================================================== */

    GOBBLE.fauxWidth = function() {

        var element = $('.tailor-section, .fauxwidth, .single .entry-header, .size-fullscreen, .comments-area');
        var offset;

        function fullwidth(el) {
          el.each(function(){
            offset = el.parent().offset();
            $(this).css({
                'width': '100vw',
  	            'margin-left': '-' + offset.left + 'px',
  	        });
          });
        } //fullwidth()

        //init
        if (element.length >= 1) {
          fullwidth(element);

	        $(window).resize(function() {
	            fullwidth(element);
	        });
				}

    }

    /* =============================================================================
     GOBBLE TAILOR
     ========================================================================== */

    GOBBLE.tailor = function() {
        var tailor = $('.tailor-element');
        if (tailor.length >= 1) {
          //remove default padding
          $('.content-area, .page.hentry, .entry-content').css({
            padding : 0,
            marginBottom: 0
          });
          //hide edit link
          $('.edit-link').hide();
        }
    }

    /* =============================================================================
    GOBBLE SMOOTH SCROLL
    ========================================================================== */

   GOBBLE.smoothScroll = function() {

     var header,
         headerHeight,
         currLink,
         refElement,
         headerLink,
         page,
         hash,
         anchor;

     page = $('html, body');
     header = $('.site-header');
     headerLink = header.find('.menu-item > a');
     anchor = $('a[href*="#"]').not('.top-link a');

     // animation
     function animateScroll(refElement) {
       headerHeight = header.height() - 1;
       if($(window).width() > 720) {
         if($(window).scrollTop() < 50) {
           $('.site-header').clone().appendTo( "body" ).css('z-index','-1000').css('transition','none').addClass('minimize cloned');
           var newHeight = $('.cloned').outerHeight();
           //console.log(newHeight);
           $('.cloned').remove();
         } else {
           newHeight = headerHeight;
         }
        } else {
          newHeight = 0;
       }
       page.animate({
       scrollTop: $(refElement).offset().top - newHeight
      }, 850,  'easeInOutQuint');
     }

     // click event on anchor tag
     anchor.on('click', function(e){
       // ignore redirecting links
       if(anchor.hasClass('redirect')) {
         // do nothing
       } else {

       e.preventDefault();
       currLink = $(this);
       refElement = $(currLink.attr("href"));
       // keep the focused/active class for a bit while it scrolls
       setTimeout(function(){ headerLink.blur(); }, 1000);
       if(page.find(refElement).length >= 1) {
         animateScroll(refElement);
       } else {
         return false;
         }
     } // endif redirect
     });

     // if arrived from other page
    hash = window.location.hash;
    if(hash && $('body').hasClass('home')) {
    if(page.find(hash).length >= 1) {
      animateScroll(hash);
     }
    }
    // anchor tags that redirect to homepage
    header.find(anchor).each(function() {
      var link = $(this).attr('href');
      if(page.find(link).length == 0) {
        $(this).attr("href", '/' +link ).addClass('redirect');
      }
     });
   }


    /* =============================================================================
     GOBBLE MENU HIGHLIGHT
     ========================================================================== */

    GOBBLE.menuHighlight = function(){

      var page = $('html, body');
      var header = $('.site-header');
      var classname = 'link-active'; // name of the active class
      var height = header.height();
      var link = header.find('.menu-item > a[href*="#"]');
      var scrollPos,
          currLink,
          refElement;

      function menuScroll(event){
        var scrollPos = $(document).scrollTop() + height;
        link.each(function () {

          // ignore redirecting links
          if(link.hasClass('redirect')) {
            // do nothing
          } else {

          currLink = $(this);
          refElement = $(currLink.attr("href"));
          // height of distance from top and of element combined
          if(page.find(refElement).length >= 1) {
          var fullHeight = refElement.position().top + refElement.outerHeight();
            if(refElement.position().top < scrollPos && scrollPos < fullHeight) {
              link.removeClass(classname);
              currLink.addClass(classname);
            } else {
              currLink.removeClass(classname);
              }
            }
          } // endif redirect
        });
       }

       $(document).on("scroll", menuScroll); // initiate scroll event

      }

      // CAROUSEL
       GOBBLE.carousel = function() {
         var carousel = $('.benefits-carousel');
         if (carousel.children('.item').length > 1) {
           carousel.flickity({
             // options
             cellAlign: 'center',
             contain: true,
             autoPlay: 6000,
             friction: 0.3,
             //wrapAround: true,
             adaptiveHeight: true,
           });
         }
       }

       GOBBLE.hero_carousel = function() {
         var carousel = $('#home-hero');
         if (carousel.children('.item').length > 1) {
           carousel.flickity({
             // options
             cellAlign: 'center',
             contain: true,
             autoPlay: 6000,
             friction: 0.3,
             //wrapAround: true,
             adaptiveHeight: true,
           });
         }
       }

/* =============================================================================
  HERO PARALAX EFFECTS
  ========================================================================== */

 GOBBLE.parallax = function() {

   // vertical parallax
   var scrolled = $(window).scrollTop();
   var threshold = .09;
   $('.hero-bg').css('transform', 'translateY(' + (scrolled * threshold) + 'px)');
 }

 /* =============================================================================
   FAQ
   ========================================================================== */

  GOBBLE.faq = function() {

    $('.page-id-64 .entry-content h4').on('click', function() {
      $('.page-id-64 .entry-content h4.faq-open').nextUntil('h4').slideUp(150);
      if($(this).hasClass('faq-open')) {
        $(this).siblings('p').slideUp();
        $(this).removeClass('faq-open');
      } else {
        $('.page-id-64 .entry-content h4').removeClass('faq-open');
        $(this).addClass('faq-open');
        $(this).nextUntil('h4').slideDown(150);
      }
    });

  }



    /* =============================================================================
        INIT
        ========================================================================== */
    $(document).ready(function() {
        GOBBLE.skipLinkFix();
        GOBBLE.navigation();
        //GOBBLE.menuHighlight();
      //  GOBBLE.smoothScroll();
        //GOBBLE.webfont();
        GOBBLE.widgets();
        GOBBLE.tailor(); //must run before fauxWidth
        GOBBLE.fauxWidth();
        GOBBLE.carousel();
        GOBBLE.hero_carousel();
        GOBBLE.parallax();
        GOBBLE.faq();
    });

    $(window).scroll(function() {
        GOBBLE.parallax();
    });

});
