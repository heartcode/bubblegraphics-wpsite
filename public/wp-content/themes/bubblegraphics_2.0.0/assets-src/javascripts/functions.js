var addthis_config = {
  pubid: "ra-4f2ee75b0f31488d",
  services_compact: "twitter, google_plusone, facebook, linkedin",
  services_expanded: "twitter, google_plusone, facebook, linkedin",
  services_exclude: "print, gmail",
  ui_open_windows: true,
  data_track_addressbar: true
};

var spinner;

/*
 * Checks if the browser can handle touch events
 */
function isTouch() {
 var event, feature = false,
   support = function() { feature = true; },
   element = document.createElement('div');

 try {
   event = document.createEvent('TouchEvent'),
   event.initTouchEvent('touchstart', true, true, document.defaultView);
   element.addEventListener('touchstart', support, false);
   element.dispatchEvent(event);
 } catch(e) {
   feature = false;
 }
 return feature;

};
 
/*
* Checks if the browser supports the CSS3 'opacity' transform
*/
function animationSupport() {
 return 'opacity' in document.body.style;
};

/*
* Sets the html class to 'modern'
*/
(function() {
  /*
  if (animationSupport()) {
      document.getElementsByTagName("html")[0].setAttribute("class", "anim");
    }
  */
    
  if (!isTouch() && animationSupport()) {
    document.getElementsByTagName("html")[0].setAttribute("class", "modern anim");
  } else {
    document.getElementsByTagName("html")[0].setAttribute("class", "touch");
  }
})();

var scrollWindowTo = (function(){
var timer = 0, posTo = 0, scrollingSpeed = 0.1;

function scrollPosition() {
  if (typeof pageYOffset != "undefined") {
    return pageYOffset;
  } else {
    var body = document.body, doc = document.documentElement;
    doc = doc.clientHeight ? doc: body;
    return doc.scrollTop;
  }
};

function easeScrolling() {
  if(Math.round(Math.abs(currentPos - posTo)) > 0) {
    currentPos += (posTo - currentPos) * scrollingSpeed;
  } else {
    currentPos = posTo;
    window.clearInterval(timer);
  }
  window.scrollTo(0, currentPos);
};

return function (position, speed) {
    if (timer > 0) {
      window.clearInterval(timer);
    }
    posTo = typeof position === "number" ? Math.abs(position) : 0;
    scrollingSpeed = typeof speed === "number" && speed >= 0.1 ? speed : scrollingSpeed;
    currentPos = scrollPosition();
    timer = window.setInterval(easeScrolling, 16.7);
  };
}());

/*
* GA page view tracking
*/
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-19326313-11']);
_gaq.push(['_trackPageview']);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

/*
* Hides the URL bar on iPhone (only if the user is not scrolling already)
* Might be wise to call this into a window or DOM load event listener
*/
/mobile/i.test(navigator.userAgent) && !location.hash && setTimeout(function () {
  scrollWindowTo(0, 0.2);
}, 1000);

$(document).ready(function() {
  
  // To top of the Page button
  $(".page-top").click(function(event){
    scrollWindowTo(0, 0.2);
  });
  
  // Activates the Project menu item in the main menu
  if ($('#project-wrapper').length > 0) {
    $('#menu-main > li:eq(0)').addClass("current-menu-item");
  }
  
  if ($('#spinner').length > 0 && ($('.anim #project-thumbnails').length > 0 || $('.anim #project-images').length > 0)) {
    spinner = new CanvasLoader('spinner');
    spinner.setDiameter(21);
    spinner.setColor('#bbbbbb');
    spinner.setDensity(60);
    spinner.setRange(0.95);
    spinner.setSpeed(3);
  }
  
  var thumbsLoaded = 0, thumbsDisplayed = 0;
  function onThumbnailLoaded() {
    thumbsLoaded ++;
    if(thumbsLoaded == $('.anim .project-thumbnail').length) {
      window.setTimeout(function() { displayThumbnails(); }, 200);
    }
  };
  function displayThumbnail() {
    $('.anim #project-thumbnails > li:eq(' + thumbsDisplayed + ')').fadeTo('500', 1);
    thumbsDisplayed++;
  };
  function displayThumbnails() {
    // Hides and stops the CanvasLoader
    $('#spinner').fadeTo('300', 0, function(){
      spinner.hide();
      for(var i = 0; i < $('.anim .project-thumbnail').length; i++) {
        window.setTimeout(function() { displayThumbnail() }, i*150 + 200);
      }
    });
  };
  if($('.anim #project-thumbnails').length > 0) {
    $('#spinner').fadeTo('300', 1);
    spinner.show();
    $('.anim .project-thumbnail').one('load', function() {
      onThumbnailLoaded();
    }).each(function() {
      if(this.complete) $(this).load();
    });
  }
  
  // Sets the thumbnails' visibility for IE
  $('#project-thumbnails').css('visibility', 'visible');
  // Displaying the thumbnails straight away - no animation because of the weird image compression bug on some iPhones
  if ($('.touch #project-thumbnails').length > 0) {
    $('.touch #project-thumbnails > li').css('opacity', 1);
  }
  
  
  var imagesLoaded = 0, imagesDisplayed = 0;
  function onImageLoaded() {
    imagesLoaded ++;
    if(imagesLoaded == $('.anim .project-image').length) {
      window.setTimeout(function() { displayImages(); }, 400);
    }
  };
  function displayImage() {
    $('.anim .project-image:eq(' + imagesDisplayed + ')').fadeTo('500', 1);
    imagesDisplayed++;
  };
  function displayImages() {
    // Hides and stops the CanvasLoader
    $('#spinner').fadeTo('300', 0, function(){
      spinner.hide();
      for(var i = 0; i < $('.anim .project-image').length; i++) {
        window.setTimeout(function() { displayImage() }, i*150 + 200);
      }
    });
  };
  if($('.anim #project-images').length > 0) {
    $('#spinner').fadeTo('300', 1);
    spinner.show();
    $('.anim .project-image').one('load', function() {
      onImageLoaded();
    }).each(function() {
      if(this.complete) $(this).load();
    });
  }
  
  // Sets the wrappers visibility for IE
  $('#project-images').css('visibility', 'visible');
  // Displaying the images straight away - no animation because of the weird image compression bug on some iPhones
  if ($('.touch #project-images').length > 0) {
    $('.touch .project-image').css('opacity', 1);
  }
});