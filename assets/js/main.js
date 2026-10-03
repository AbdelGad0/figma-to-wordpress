// Main JavaScript for Positively theme
// Handles mobile menu toggle and form validation

(function($) {
    'use strict';
    
    // DOM ready
    $(function() {
        
        // Mobile menu toggle
        var $menuToggle = $('.menu-toggle');
        var $menu = $('.menu');
        
        $menuToggle.on('click', function() {
            var expanded = $(this).attr('aria-expanded') === 'true' || false;
            $(this).attr('aria-expanded', !expanded);
            $menu.toggleClass('active');
        });
        
        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            var target = $($(this).attr('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 800);
            }
        });
        
        // Form validation
        $('.contact-form').on('submit', function(e) {
            var $form = $(this);
            var $required = $form.find('[required]');
            var isValid = true;
            
            $required.each(function() {
                if (!$(this).val().trim()) {
                    isValid = false;
                    $(this).addClass('error');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
        
        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                        }
                        observer.unobserve(img);
                    }
                });
            });
            
            $('img[data-src]').each(function() {
                observer.observe(this);
            });
        }
        
        // Animation on scroll
        var revealElements = $('.reveal');
        var elementVisible = function() {
            var windowTop = $(window).scrollTop();
            var windowHeight = $(window).height();
            var elementHeight = revealElements.outerHeight();
            var elementTop = revealElements.offset().top;
            
            if (elementTop < windowTop + windowHeight - elementHeight) {
                revealElements.addClass('revealed');
            }
        };
        
        $(window).on('scroll', elementVisible);
        elementVisible();
    });
    
})(jQuery);