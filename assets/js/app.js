/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    isMobile = false,
    target,
    $slider,
    lastTarget = false,
    timeoutChangeTitle,
    $root = '/';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {});
            $(document).ready(function($) {
                $body = $('body');
                $header = $('header');
                $siteTitle = $('#site-title');
                $sectionTitle = $('#section-title');
                app.sizeSet();
                $(document).keyup(function(e) {
                    //esc
                    //if (e.keyCode === 27) app.goIndex();
                });
                $body.on('click', '[data-target="menu"]', function(event) {
                    event.preventDefault();
                    $header.toggleClass('menu-open');
                });
                $body.on('click', '[data-switch]', function(event) {
                    event.preventDefault();
                    $el = $(this);
                    target = $el.data('switch');
                    $('[data-switch], .navigation').removeClass('active');
                    $el.addClass('active');
                    $('.navigation.nav-' + target).addClass('active');
                });
                $(window).load(function() {
                    app.loadSlider();
                    app.loadPostsSliders();
                    $(".loader").fadeOut("fast", function() {
                        if (window.location.hash.substr(1).length < 1) {
                            setTimeout(app.getLastPost, 500);
                        }
                    });
                });
            });
        },
        sizeSet: function() {
            width = $(window).width();
            height = $(window).height();
            if (width <= 770 || Modernizr.touch) isMobile = true;
            if (isMobile) {
                if (width >= 770) {
                    //location.reload();
                    isMobile = false;
                }
            }
        },
        getLastPost: function() {
            if (typeof $slider.flkty != 'undefined') {
                $lastPostSectionIndex = $('.last-post').parents("section").index();
                $slider.flickity('select', $lastPostSectionIndex);
            }
        },
        changeTitle: function(newTitle, instant) {
            var delay = instant ? 0 : 1000;
            $header.removeClass('menu-open');
            $siteTitle.addClass('hidden');
            $sectionTitle.addClass('hidden');
            setTimeout(function() {
                window.clearTimeout(timeoutChangeTitle);
                timeoutChangeTitle = setTimeout(function() {
                    $sectionTitle.html(newTitle).removeClass('hidden');
                }, delay);
            }, 800);
        },
        loadSlider: function() {
            $slider = $('.sections-slider').flickity({
                cellSelector: 'section.blog-section',
                imagesLoaded: true,
                setGallerySize: false,
                percentPosition: false,
                accessibility: true,
                cellAlign: 'left',
                wrapAround: true,
                prevNextButtons: false,
                pageDots: false,
                draggable: true,
                dragThreshold: 40
            });
            $slider.flkty = $slider.data('flickity');
            if (typeof $slider.flkty != 'undefined') {
                $slider.count = $slider.flkty.slides.length;
                $slider.on('staticClick.flickity', function(event, pointer, cellElement, cellIndex) {
                    if (typeof cellIndex == 'number') {
                        $slider.flickity('selectCell', cellIndex);
                    }
                });
                $body.on('click', '[data-slider]', function(event) {
                    event.preventDefault();
                    $slider.flickity('selectCell', '#' + $(this).data('slider'));
                    $header.removeClass('visible');
                });
                var lastIndex;
                // Change section onLoad
                var hash = window.location.hash.substr(1);
                if ($slider.flkty && hash.length > 0) {
                    $slider.flickity('selectCell', '#' + hash);
                    var slide = $($slider.flkty.selectedElement).attr('id');
                    app.changeTitle($($slider.flkty.selectedElement).data("title"));
                    lastIndex = $slider.flkty.selectedIndex;
                    window.location.hash = slide;
                }
                $slider.on('select.flickity', function() {
                    slide = $($slider.flkty.selectedElement).attr('id');
                    if (typeof slide != 'undefined') {
                      window.location.hash = slide;
                    }
                    if (lastIndex != $slider.flkty.selectedIndex) {
                        app.changeTitle($($slider.flkty.selectedElement).data("title"));
                        lastIndex = $slider.flkty.selectedIndex;
                    }
                });
                //$slider.first('.slide').find('.lazyimg:not(".lazyloaded")').addClass('lazyload');
                // $slider.on('select.flickity', function() {
                //     if ($slider.flkty) {
                //         $selected = $($slider.flkty.selectedElement);
                //         $slider.idx = $slider.flkty.selectedIndex + 1;
                //         $imgN.text($slider.idx + '/' + $slider.count);
                //         // For lazysizes
                //         // var adjCellElems = $slider.flickity('getAdjacentCellElements', 2);
                //         // $(adjCellElems).find('.lazyimg:not(".lazyloaded")').addClass('lazyload');
                //     }
                // });
                // $slider.on('staticClick.flickity', function(event, pointer, cellElement, cellIndex) {
                //     if (!cellElement || !isMobile) {
                //         return;
                //     }
                //     if (!isMobile) {
                //       app.goNext($slider);
                //     }
                // });
            }
        },
        loadPostsSliders: function() {
          $('.post-content.content--images').flickity({
                cellSelector: '.cell',
                imagesLoaded: true,
                setGallerySize: false,
                percentPosition: false,
                accessibility: true,
                // cellAlign: 'left',
                wrapAround: false,
                contain: true,
                prevNextButtons: true,
                pageDots: false,
                draggable: false,
                // dragThreshold: 40
            });
            
        },
        goIndex: function() {},
        smoothState: function(container, target) {
            var options = {
                    anchors: '[data-target]',
                    loadingClass: 'is-loading',
                    //prefetch: true,
                    //cacheLength: 2,
                    onBefore: function($currentTarget, $container) {
                        //$container.addClass('is-loading');
                        lastTarget = target;
                        target = $currentTarget.data('target');
                    },
                    onStart: {
                        duration: 250, // Duration of our animation
                        render: function($container) {
                            // Add your CSS animation reversing class
                            $container.addClass('is-exiting');
                        }
                    },
                    onReady: {
                        duration: 0,
                        render: function($container, $newContent) {
                            // Remove your CSS animation reversing class
                            //$container.removeClass('is-loading');
                            // Inject the new content
                            target.html($newContent);
                        }
                    },
                    onAfter: function($container, $newContent) {
                        $container.removeClass('loading');
                    }
                },
                smoothState = $(container).smoothState(options).data('smoothState');
        }
    };
    app.init();
});