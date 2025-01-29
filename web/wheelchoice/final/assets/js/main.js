(function ($) {
  "use strict";

  /*===========================================
    Table of contents
    01. On Load Function
    02. Preloader
    03. Mobile Menu Active
    04. Sticky fix
    05. Scroll To Top
    06. Set Background Image
    07. Popup Sidemenu
    08. Search Box Popup
    09. Hero Slider Active
    10. Magnific Popup
    11. Filter Menu
    12. Tab Indicator
    13. Form Steps
    14. Quantity Adder
    15. Woocommerce Toggle
    16. Shop Big Image Src Set
    17. Count Down
  =============================================*/


  /*---------- 01. On Load Function ----------*/
  $(window).on('load', function () {
    $('.preloader').fadeOut();
  });



  /*---------- 02. Preloader ----------*/
  if ($('.preloader').length > 0) {
    $('.preloaderCls').each(function () {
      $(this).on('click', function (e) {
        e.preventDefault();
        $('.preloader').css('display', 'none');
      })
    });
  };



  /*---------- 03. Mobile Menu Active ----------*/
  $.fn.vsmobilemenu = function (options) {
    var opt = $.extend({
      menuToggleBtn: '.vs-menu-toggle',
      bodyToggleClass: 'vs-body-visible',
      subMenuClass: 'vs-submenu',
      subMenuParent: 'vs-item-has-children',
      subMenuParentToggle: 'vs-active',
      meanExpandClass: 'vs-mean-expand',
      subMenuToggleClass: 'vs-open',
      toggleSpeed: 400,
    }, options);

    return this.each(function () {
      var menu = $(this); // Select menu

      // Menu Show & Hide
      function menuToggle() {
        menu.toggleClass(opt.bodyToggleClass);

        // collapse submenu on menu hide or show
        var subMenu = '.' + opt.subMenuClass;
        $(subMenu).each(function () {
          if ($(this).hasClass(opt.subMenuToggleClass)) {
            $(this).removeClass(opt.subMenuToggleClass);
            $(this).css('display', 'none')
            $(this).parent().removeClass(opt.subMenuParentToggle);
          };
        });
      };

      // Class Set Up for every submenu
      menu.find('li').each(function () {
        var submenu = $(this).find('ul');
        submenu.addClass(opt.subMenuClass);
        submenu.css('display', 'none');
        submenu.parent().addClass(opt.subMenuParent);
        submenu.prev('a').addClass(opt.meanExpandClass);
        submenu.next('a').addClass(opt.meanExpandClass);
      });

      // Toggle Submenu 
      function toggleDropDown($element) {
        if ($($element).next('ul').length > 0) {
          $($element).parent().toggleClass(opt.subMenuParentToggle);
          $($element).next('ul').slideToggle(opt.toggleSpeed);
          $($element).next('ul').toggleClass(opt.subMenuToggleClass);
          childSubMenu($element);
        } else if ($($element).prev('ul').length > 0) {
          $($element).parent().toggleClass(opt.subMenuParentToggle);
          $($element).prev('ul').slideToggle(opt.toggleSpeed);
          $($element).prev('ul').toggleClass(opt.subMenuToggleClass);
          childSubMenu($element);
        };
      };

      // Submenu toggle Button
      var expandToggler = '.' + opt.meanExpandClass;
      $(expandToggler).each(function () {
        $(this).on('click', function (e) {
          e.preventDefault();
          toggleDropDown(this);
        });
      });

      // Menu Show & Hide On Toggle Btn click
      $(opt.menuToggleBtn).each(function () {
        $(this).on('click', function () {
          menuToggle();
        })
      })

      // Hide Menu On out side click
      menu.on('click', function (e) {
        e.stopPropagation();
        menuToggle()
      })

      // Stop Hide full menu on menu click
      menu.find('div').on('click', function (e) {
        e.stopPropagation();
      });

    });
  };
  
  $('.vs-menu-wrapper').vsmobilemenu();





  /*---------- 04. Sticky fix ----------*/
  var lastScrollTop = '';
  var scrollToTopBtn = '.scrollToTop'

  function stickyMenu($targetMenu, $toggleClass, $parentClass) {
    var st = $(window).scrollTop();
    if ($(window).scrollTop() > 600) {      
      var height = $targetMenu.css('height');
      $targetMenu.parent().css('min-height', height).addClass($parentClass);
      
      if (st > lastScrollTop) {
        $targetMenu.removeClass($toggleClass);
      } else {
        $targetMenu.addClass($toggleClass);
      };
    } else {
      $targetMenu.parent().css('min-height', '').removeClass($parentClass);
      $targetMenu.removeClass($toggleClass);
    };
    lastScrollTop = st;
  };
  $(window).on("scroll", function () {
    stickyMenu($('.sticky-active'), "active", "will-sticky");
    if ($(this).scrollTop() > 500) {
      $(scrollToTopBtn).addClass('show');
    } else {
      $(scrollToTopBtn).removeClass('show');
    }
  });



  /*---------- 05. Scroll To Top ----------*/
  $(scrollToTopBtn).each(function(){
    $(this).on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, lastScrollTop / 3);
      return false;
    });
  })




  /*---------- 06.Set Background Image ----------*/
  if ($('[data-bg-src]').length > 0) {
    $('[data-bg-src]').each(function () {
      var src = $(this).attr('data-bg-src');
      $(this).css({
        'background-image': 'url(' + src + ')'
      });
    });
  };

  if ($('[data-bg-color]').length > 0) {
    $('[data-bg-color]').each(function () {
      var color = $(this).attr('data-bg-color');
      $(this).css({
        'background-color': color
      });
    });
  };





  /*---------- 07. Popup Sidemenu ----------*/
  function popupSideMenu($sideMenu, $sideMunuOpen, $sideMenuCls, $toggleCls) {
    // Sidebar Popup
    $($sideMunuOpen).on('click', function (e) {
      e.preventDefault();
      $($sideMenu).addClass($toggleCls);
    });
    $($sideMenu).on('click', function (e) {
      e.stopPropagation();
      $($sideMenu).removeClass($toggleCls)
    });
    var sideMenuChild = $sideMenu + ' > div';
    $(sideMenuChild).on('click', function (e) {
      e.stopPropagation();
      $($sideMenu).addClass($toggleCls)
    });
    $($sideMenuCls).on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $($sideMenu).removeClass($toggleCls);
    });
  };
  popupSideMenu('.sidemenu-wrapper', '.sideMenuToggler', '.sideMenuCls', 'show');





  /*---------- 08. Search Box Popup ----------*/
  function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {
    $($searchOpen).on('click', function (e) {
      e.preventDefault();
      $($searchBox).addClass($toggleCls);
    });
    $($searchBox).on('click', function (e) {
      e.stopPropagation();
      $($searchBox).removeClass($toggleCls);
    });
    $($searchBox).find('form').on('click', function (e) {
      e.stopPropagation();
      $($searchBox).addClass($toggleCls);
    });
    $($searchCls).on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $($searchBox).removeClass($toggleCls);
    });
  };
  popupSarchBox('.popup-search-box', '.searchBoxTggler', '.searchClose', 'show');





  /*----------- 09. Hero Slider Active ----------*/
  $('.vs-hero-carousel').each(function () {
    var vsHslide = $(this);

    // Get Data From Dom
    function d(data) {
      return vsHslide.data(data)
    }

    // Custom Style Set    
    vsHslide.on('sliderWillLoad', function (event, slider) {

      // Define Variable
      var respLayer = jQuery(this).find('.ls-responsive'),
        lsDesktop = 'ls-desktop',
        lsMobile = 'ls-mobile',
        lsTablet = 'ls-tablet',
        windowWid = jQuery(window).width(),
        mdDevice = 1025,
        smDevice = 768;

      // Set Style on each Layer
      respLayer.each(function () {
        var layer = jQuery(this);

        function lsd(data) {
          return (layer.data(data) == '') ? layer.data(null) : layer.data(data)
        }
        var respStyle = (windowWid < smDevice) ? ((lsd(lsMobile)) ? lsd(lsMobile) : lsd(lsTablet)) : ((windowWid < mdDevice) ? ((lsd(lsTablet)) ? lsd(lsTablet) : lsd(lsDesktop)) : lsd(lsDesktop)),
          mainStyle = (layer.attr('style') !== undefined) ? layer.attr('style') : ' ';
        layer.attr('style', mainStyle + respStyle);
      });

    });

    // Custom Arrow 
    vsHslide.find('[data-ls-go]').each(function () {
      $(this).on('click', function (e) {
        e.preventDefault();
        var target = $(this).data('ls-go');
        vsHslide.layerSlider(target)
      });
    });

    vsHslide.layerSlider({
      allowRestartOnResize: true,
      maxRatio: (d('maxratio') ? d('maxratio') : 1),
      type: (d('slidertype') ? d('slidertype') : 'responsive'),
      pauseOnHover: (d('pauseonhover') ? true : false),
      navPrevNext: (d('navprevnext') ? true : false),
      hoverPrevNext: (d('hoverprevnext') ? true : false),
      hoverBottomNav: (d('hoverbottomnav') ? true : false),
      navStartStop: (d('navstartstop') ? true : false),
      navButtons: (d('navbuttons') ? true : false),
      loop: ((d('loop') == false) ? false : true),
      autostart: (d('autostart') ? true : false),
      height: (d('height') ? d('height') : 1080),
      responsiveUnder: (d('responsiveunder') ? d('responsiveunder') : 1220),
      layersContainer: (d('container') ? d('container') : 1220),
      showCircleTimer: (d('showcircletimer') ? true : false),
      skinsPath: 'layerslider/skins/',
      thumbnailNavigation: ((d('thumbnailnavigation') == false) ? false : true)
    });
  });




  /*----------- 10. Magnific Popup ----------*/
  /* magnificPopup img view */
  $('.popup-image').magnificPopup({
    type: 'image',
    gallery: {
      enabled: true
    }
  });

  /* magnificPopup video view */
  $('.popup-video').magnificPopup({
    type: 'iframe'
  });



  /*----------- 11. Filter Menu ----------*/
  $('.filter-active').imagesLoaded(function () {
    var $filter = '.filter-active',
      $filterItem = '.filter-item',
      $filterMenu = '.filter-menu-active';

    if ($($filter).length > 0) {
      var $grid = $($filter).isotope({
        itemSelector: $filterItem,
        filter: '*',
        masonry: {
          // use outer width of grid-sizer for columnWidth
          columnWidth: $filterItem
        }
      });

      // filter items on button click
      $($filterMenu).on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
          filter: filterValue
        });
      });

      // Menu Active Class 
      $($filterMenu).on('click', 'button', function (event) {
        event.preventDefault();
        $(this).addClass('active');
        $(this).siblings('.active').removeClass('active');
      });
    };
  });




  /*----------- 12. Tab Indicator ----------*/
  $.fn.indicator = function () {
    var $menu = $(this),
      $linkBtn = $menu.find('a'),
      $btn = $menu.find('button');
    // Append indicator
    $menu.append('<span class="indicator"></span>');
    var $line = $menu.find('.indicator');
    // Check which type button is Available
    if ($linkBtn.length) {
      var $currentBtn = $linkBtn;
    } else if ($btn.length) {
      var $currentBtn = $btn
    }
    // On Click Button Class Remove
    $currentBtn.on('click', function (e) {
      e.preventDefault();
      $(this).addClass('active');
      $(this).siblings('.active').removeClass('active');
      linePos()
    })
    // Indicator Position
    function linePos() {
      var $btnActive = $menu.find('.active'),
        $height = $btnActive.css('height'),
        $width = $btnActive.css('width'),
        $top = $btnActive.position().top + 'px',
        $left = $btnActive.position().left + 'px';
      $line.css({
        top: $top,
        left: $left,
        width: $width,
        height: $height,
      })
    }

    // if ($menu.hasClass('vs-slider-tab')) {
    //   var linkslide = $menu.data('asnavfor');
    //   $(linkslide).on('afterChange', function (event, slick, currentSlide, nextSlide) {
    //     setTimeout(linePos, 10)
    //   });
    // }
    linePos()
  }

  // Call On Load
  if ($('.filter-menu').length) {
    $('.filter-menu').indicator();
  }

  if ($('.product-tab').length) {
    $('.product-tab').indicator();
  }


  /*----------- 13. Form Steps ----------*/
  $.fn.vsSteping = function () {
    $(this).each(function () {
      // Select All Elements
      var stepbox = $(this),
        stepsParent = '.steps-wrap',
        steps = '.steps',
        stepsDots = '.step-dots .dot',
        stPrevBtn = '.step-prev',
        stNextBtn = '.step-next',
        stSubmitBtn = '.step-submit',
        doneCls = 'complete',
        toggleCls = 'active',
        indexNo = 0;


      // find element Only Under the Activation  
      function s$(element) {
        return stepbox.find(element);
      }

      // Check All Step On Load and Get Index Number
      s$(steps).each(function () {
        var currentStep = $(this);
        if (currentStep.hasClass(toggleCls)) {
          // Execute And Get Index Number If have any Active Class
          indexNo = currentStep.index();
        } else if (currentStep.index() == indexNo) {
          // Execute And Get Index Number If no Active Class
          currentStep.addClass(toggleCls);
          indexNo = currentStep.index();
        }
      })

      // On Click Next Button
      s$(stNextBtn).on('click', function (event) {
        event.preventDefault();
        var nextStep = s$(steps).eq(indexNo).next(steps)
        if (nextStep.length) {
          indexNo = nextStep.index();
          activeStep();
        }
      });

      // On Click Prev Button
      s$(stPrevBtn).on('click', function (event) {
        event.preventDefault();
        var prevStep = s$(steps).eq(indexNo).prev(steps)
        if (prevStep.length) {
          indexNo = prevStep.index();
          activeStep();
        }
      });

      // On click Dots Get Index of this and Recall Function
      s$(stepsDots).on('click', function (event) {
        event.preventDefault();
        indexNo = $(this).index();
        activeStep();
      });

      // Active Step With Index Number
      function activeStep() {
        var stepNow = s$(steps).eq(indexNo);
        stepNow.addClass(toggleCls);
        stepNow.prevAll(steps).removeClass(toggleCls).addClass(doneCls);
        stepNow.nextAll(steps).removeClass(toggleCls).removeClass(doneCls);
        s$(stepsParent).css('height', stepNow.css('height'));
        // Prev Button Hide & show 
        (stepNow.prev(steps).length) ? s$(stPrevBtn).css('display', ''): s$(stPrevBtn).css('display', 'none');
        // Next Button Hide & show 
        (stepNow.next(steps).length) ? s$(stNextBtn).css('display', ''): s$(stNextBtn).css('display', 'none');
        // Submit Button Hide & show 
        (stepNow.next(steps).length) ? s$(stSubmitBtn).css('display', 'none'): s$(stSubmitBtn).css('display', '');
        activeDot();
      }
      activeStep();


      // Active Dots With Index Number
      function activeDot() {
        var dotNow = s$(stepsDots).eq(indexNo);
        dotNow.siblings().removeClass(toggleCls);
        dotNow.addClass(toggleCls);
      };

    });
  };

  if ($('.steps-active').length) {
    $('.steps-active').vsSteping()
  }




  /*---------- 14. Quantity Adder ----------*/
  $('.quantity-plus').each(function () {
    $(this).on('click', function (e) {
      e.preventDefault();
      var $qty = $(this).siblings(".qty-input");
      var currentVal = parseInt($qty.val());
      if (!isNaN(currentVal)) {
        $qty.val(currentVal + 1);
      }
    })
  });

  $('.quantity-minus').each(function () {
    $(this).on('click', function (e) {
      e.preventDefault();
      var $qty = $(this).siblings(".qty-input");
      var currentVal = parseInt($qty.val());
      if (!isNaN(currentVal) && currentVal > 1) {
        $qty.val(currentVal - 1);
      }
    });
  })



  /*----------- 15. Woocommerce Toggle ----------*/
  // Woocommerce Rating Toggle
  $('.rating-select .stars a').each(function () {
    $(this).on('click', function (e) {
      e.preventDefault();
      $(this).siblings().removeClass('active');
      $(this).parent().parent().addClass('selected');
      $(this).addClass('active');
    });
  })
  
  
  
  /*----------- 16. Shop Big Image Src Set ----------*/
  if ($('.product-thumb').length) {
    $('.product-thumb').each(function(){
      $(this).on('click', function(){
        var src = $(this).find('img').data('big-img');
        $('.img-fullsize img').attr('src', src);
        $('.img-fullsize .popup-image').attr('href', src);
      })
    })
  }




  /*---------- 17. Count Down ----------*/
  $.fn.countdown = function () {
    $(this).each(function () {
      var $counter = $(this),
        countDownDate = new Date($counter.data('offer-date')).getTime(), // Set the date we're counting down to
        dateWrapper = '<span class="number"></span>', // Wrapper Where Date Will Be Print
        exprireCls = 'expired';

      // Finding Function
      function s$(element) {
        return $counter.find(element);
      }

      // Prepend The Wrapper 
      s$('.day').prepend(dateWrapper);
      s$('.hour').prepend(dateWrapper);
      s$('.minute').prepend(dateWrapper);

      // Update the count down every 1 second
      var counter = setInterval(function () {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(counter);
          $counter.addClass(exprireCls);
          $counter.find('.message').css('display', 'block');
        } else {
          // Output the result in elements
          s$('.day .number').html(days + ' ')
          s$('.hour .number').html(hours + ' ')
          s$('.minute .number').html(minutes + ' ')
        }
      }, 1000);
    })
  }

  if ($('.offer-counter').length) {
    $('.offer-counter').countdown()
  }






  /*----------- 00. Color Plate  ----------*/
  function colorPlate (){
    var colorurl, bgcolor;
    $('.vs-color-plate button').each(function () {
      bgcolor = $(this).attr('data-color');
      $(this).css({
        'background-color': bgcolor
      });
      $(this).on('click', function () {
        colorurl = $(this).data('url');
        $('#themeColor').attr('href', colorurl)
      })
    });
    $('.togglebtn').on("click", function (e) {
      e.preventDefault()
      $('.vs-color-plate').toggleClass('open');
      return false;
    });
  }
  colorPlate()


  /*----------- 20. Right Click Disable ----------*/
  // window.addEventListener('contextmenu', function (e) {
  //   // do something here... 
  //   e.preventDefault();
  // }, false);


  /*----------- 21. Inspect Element Disable ----------*/
  // document.onkeydown = function (e) {
  //   if (event.keyCode == 123) {
  //     return false;
  //   }
  //   if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
  //     return false;
  //   }
  //   if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
  //     return false;
  //   }
  //   if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
  //     return false;
  //   }
  //   if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
  //     return false;
  //   }
  // }


})(jQuery);