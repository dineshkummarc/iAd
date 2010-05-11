var Config = {
    numberOfHorizontalRects : 5,
    numberOfVerticalRects : 7,
    rectSize : 64,
    numberOfSlides : 5
}

jQuery(function ($) {
    var slides = [];
    var rects = [];
    var x = 0, y = 0, i = 0;

    var Scene = {     
        ended : false,   
        initialize : function() {
            for( i=0; i<Config.numberOfSlides; i++ ) {
                // construct slide object
                var slide = {
                    rects : [],
                    html  : $('<div id="slide-' + i + '" class="slide-0"></div>')
                };
                
                // add it to the slides
                slides.push(slide);
                
                // make it visible
                $('#container').append(slide.html);

                // construct inner rectangles
                for( var x=0; x<Config.numberOfHorizontalRects; x++ ) {
                    slide.rects[x] = [];
                    for(var y=0; y<Config.numberOfVerticalRects; y++ ) {
                        var rect = $('<div id="rect-' + x + '-' + y + '" class="rect slide-' + i + '"></div>');
                        rect.css({
                            'left' : x*Config.rectSize + 'px',
                            'top'  : y*Config.rectSize + 'px',
                            'backgroundPosition' : (-x*Config.rectSize - (Config.numberOfSlides - i - 1)*320) + 'px ' + (-y*Config.rectSize) + 'px'
                        });
                        rect.data({
                            'slide'     : i,
                            'x'         : x,
                            'y'         : y,
                            'is-moving' : '0'
                        });
                        rect.click(function() {
                            $('#close').fadeIn('slow');
                            
                            var target = $(this);
                            var slide = target.data('slide');
                            var x     = target.data('x');
                            var y     = target.data('y');
         
                            Scene.rotateRect(slide, x, y);
                            return false;
                        });
                        
                        // last slide gets a clicktarget
                        if(i == 0) {
                            rect.click(function() {
                                window.setTimeout(function() {
                                    Scene.theEnd();
                                }, 2000);
                            });
                        }
                        
                        slide.rects[x][y] = rect;
                        
                        // make it visible
                        slide.html.append(rect);
                    }
                } /* end rect construction phase */
            } /* foreach slide */
        }, /* initialize */
        
        rotateRect : function(slide, x, y) {
            if(slide >= 0 && x >= 0 && x < Config.numberOfHorizontalRects && y >= 0 && y < Config.numberOfVerticalRects) {
                var rect = slides[slide].rects[x][y];
                if(rect.data('is-moving') == '0') {
                    rect.data('is-moving', '1');
                    
                    if(RegExp(" AppleWebKit/").test(navigator.userAgent)) {
                        rect.css({
                           '-webkit-transform'  : 'rotateY(270deg)',
                           '-webkit-transition' : '-webkit-transform 0.3s ease-in'
                        });
                    } else {
                        rect.fadeOut();
                    }
            
                    window.setTimeout(function() {
                        Scene.rotateRect(slide, x - 1  , y    );
                    }, 120);
                    window.setTimeout(function() {
                        Scene.rotateRect(slide, x + 1  , y    );
                    }, 150);
                    window.setTimeout(function() {
                        Scene.rotateRect(slide, x      , y - 1);
                    }, 200);
                    window.setTimeout(function() {
                        Scene.rotateRect(slide, x      , y + 1);
                    }, 220);
                }
            }
        },
        
        theEnd : function() {
            if(Scene.ended == false) {
                Scene.ended = true;
                
                if (typeof parent != 'undefined') {
                    parent.location = "http://facebook.com/9elements";
                } else {
                    document.location = "http://m.facebook.com/9elements";
                }
            }
        }
    };
    
    Scene.initialize();
    
    $('#close').click(function () {
        location.href = "iad.html";
    });
});
