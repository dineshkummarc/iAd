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
        transform: null,
        rectAnimators : [
            function flipY(rect, delay) {
                rect.css({
                    '-webkit-transform'  : 'rotateY(270deg)',
                    '-webkit-transition' : '-webkit-transform 0.5s ' + delay + 's ease-in'
                });
            },
            function flipX(rect, delay) {
                rect.css({
                    '-webkit-transform'  : 'rotateX(270deg)',
                    '-webkit-transition' : '-webkit-transform 0.5s ' + delay + 's ease-in'
                });
            },
            function fallDown(rect, delay) {
                rect.css({
                    '-webkit-transform'  : 'translate(0, 640px)',
                    '-webkit-transition' : '-webkit-transform 0.5s ' + delay + 's ease-in'
                });
            },
            function explode(rect, delay) {
                var r = Math.random() * Math.PI * 2;
                var tx = Math.floor(Math.cos(r) * 640);
                var ty = Math.floor(Math.sin(r) * 640);
                
                rect.css({
                    '-webkit-transform'  : 'translate(' + tx + 'px, ' + ty + 'px)',
                    '-webkit-transition' : '-webkit-transform 0.5s ' + delay + 's ease-in'
                });
            }
        ],
        initialize : function() {
            if (RegExp(" AppleWebKit/").test(navigator.userAgent)) {
                Scene.transform = function (rect, opts) {
                    var delay = (0.3 + Math.random()/16) * opts.distance;
                    
                    
                    Scene.rectAnimators[opts.slide % Scene.rectAnimators.length](rect, delay);
                };
            } else {
                Scene.transform = function (rect, opts) {
                    var delay = ((0.3 + Math.random()/16) * opts.distance) * 1000,
                        func  = (opts.slide % 2) ? 'fadeOut' : 'slideUp';
                    
                    rect.delay(delay)[func]();
                };
            }
            
            for( i=0; i<Config.numberOfSlides; i++ ) {
                // construct slide object
                var slide = {
                    rects : [],
                    html  : $('<div class="slide" />')
                };
                
                // add it to the slides
                slides.push(slide);
                
                // make it visible
                $('#container').append(slide.html);

                // construct inner rectangles
                for( var x=0; x<Config.numberOfHorizontalRects; x++ ) {
                    slide.rects[x] = [];
                    for(var y=0; y<Config.numberOfVerticalRects; y++ ) {
                        var rect = $('<div />');
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
            for (var u = 0; u < Config.numberOfHorizontalRects; ++u) {
                for (var v = 0; v < Config.numberOfVerticalRects; ++v) {
                    Scene.transform(slides[slide].rects[u][v], {
                        x: x,
                        y: y,
                        slide: slide,
                        distance: Math.sqrt(Math.pow(Math.abs(x-u), 2) + Math.pow(Math.abs(y-v), 2))
                    });
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
