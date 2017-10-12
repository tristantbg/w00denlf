/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    isMobile = false,
    target,
    $menuArrow,
    $slider,
    scrollers = [],
    iscrollers = [],
    lastTarget = false,
    timeoutChangeTitle,
    $root = '/woodenlife';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {});
            $(document).ready(function($) {
                $body = $('body');
                $header = $('header');
                $siteTitle = $('#site-title');
                $menuArrow = $('#menu-arrow');
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
                    $(".loader").fadeOut("fast", function() {});
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
        getLastPost: function(instant) {
            if (typeof $slider != 'undefined') {
                $lastPostSectionIndex = $('.last-post').parents("section").index();
                $slider.select($lastPostSectionIndex, true, instant);
                if (instant) {
                    setTimeout(function() {
                        app.changeTitle($($slider.selectedElement).data("title"));
                    }, 3000);
                }
            }
        },
        changeTitle: function(newTitle, instant) {
            if (newTitle) {
                var delay = instant ? 0 : 1000;
                $header.removeClass('menu-open');
                $siteTitle.addClass('hidden');
                $sectionTitle.addClass('hidden');
                setTimeout(function() {
                    window.clearTimeout(timeoutChangeTitle);
                    timeoutChangeTitle = setTimeout(function() {
                        $sectionTitle.html(newTitle).removeClass('hidden');
                    }, delay);
                }, 600);
            }
        },
        loadSlider: function() {
            var manySections = false;
            if ($('section.blog-section').length > 2) {
                manySections = true;
            }
            var sectionsSlider = document.querySelector('.sections-slider');
            $slider = new Flickity(sectionsSlider, {
                cellSelector: 'section.blog-section',
                imagesLoaded: false,
                setGallerySize: false,
                percentPosition: false,
                accessibility: true,
                cellAlign: 'left',
                wrapAround: true,
                prevNextButtons: false,
                pageDots: false,
                draggable: manySections,
                dragThreshold: 40
            });
            // $slider.flkty = $slider.data('flickity');
            if (typeof $slider != 'undefined') {
                var lastIndex = $slider.selectedIndex;
                var lastElement = $slider.selectedElement;
                $slider.count = $slider.slides.length;
                $slider.on('staticClick', function(event, pointer, cellElement, cellIndex) {
                    if (typeof cellIndex == 'number') {
                        $slider.selectCell(cellIndex);
                    }
                });
                $body.on('click', '[data-slider]', function(event) {
                    event.preventDefault();
                    target = '#' + $(this).data('slider');
                    $slider.selectCell(target);
                });
                // Change section onLoad
                var hash = window.location.hash.substr(1);
                if (hash.length < 1) {
                    // setTimeout(app.getLastPost(false), 2000);
                    // Instant mode
                    app.getLastPost(true);
                }
                if ($slider && hash.length > 0) {
                    $slider.selectCell('#' + hash, true, true);
                    var slide = $($slider.selectedElement).attr('id');
                    window.location.hash = slide;
                    setTimeout(function() {
                        app.changeTitle($($slider.selectedElement).data("title"));
                        setTimeout(function() {
                            $menuArrow.show();
                            app.updateScrollers();
                        }, 2000);
                    }, 3000);
                }
                $slider.on('select', function() {
                    slide = $($slider.selectedElement).attr('id');
                    console.log(slide);
                    if (typeof slide != 'undefined') {
                        window.location.hash = slide;
                    }
                    if (lastIndex != $slider.selectedIndex) {
                        $menuArrow.hide();
                        app.changeTitle($($slider.selectedElement).data("title"));
                        lastIndex = $slider.selectedIndex;
                        lastElement = $slider.selectedElement;
                        target = '#' + slide;
                        $.ajax({
                            url: $(target).data("url"),
                            cache: true
                        }).done(function(response) {
                            var posts = $(response).find(".blog-posts--inner").html();
                            $(target + ' .blog-posts--inner').append(posts);
                            app.updateScrollers();
                            setTimeout(function() {
                              $(".blog-section:not("+target+") .blog-posts--inner").empty();
                            }, 1000);
                        });
                    }
                });
                $slider.on('settle', function() {
                    setTimeout(function() {
                        $menuArrow.show();
                    }, 2000);
                });
                $("#blog-categories").addClass('loaded');
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
            $postsSliders = $('.post-content.content--images');
            $postsSliders.flickity({
                cellSelector: '.cell',
                imagesLoaded: true,
                setGallerySize: false,
                percentPosition: false,
                lazyLoad: 3,
                accessibility: false,
                // cellAlign: 'left',
                wrapAround: false,
                contain: true,
                prevNextButtons: true,
                pageDots: false,
                draggable: false,
                // dragThreshold: 40
            });
            scrollers = document.querySelectorAll(".blog-posts");
            if (scrollers.length > 0) {
                iscrollers = [];
                for (var i = scrollers.length - 1; i >= 0; i--) {
                    iscrollers[i] = new IScroll(scrollers[i], {
                        mouseWheel: true,
                        scrollbars: true
                    });
                }
            }
        },
        updateScrollers: function() {
            if (iscrollers.length > 0) {
                setTimeout(function() {
                    for (var i = iscrollers.length - 1; i >= 0; i--) {
                        iscrollers[i].refresh();
                    }
                }, 0);
            }
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