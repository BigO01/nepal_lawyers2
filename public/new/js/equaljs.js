// document$(document).ready(function(){
//
//     // Select and loop the container element of the elements you want to equalise
//     $('.ccontainer').each(function(){
//
//       // Cache the highest
//       var highestBox = 0;
//
//       // Select and loop the elements you want to equalise
//       $('.bdiv', this).each(function(){
//
//         // If this box is higher than the cached highest then store it
//         if($(this).height() > highestBox) {
//           highestBox = $(this).height();
//         }
//
//       });
//
//       // Set the height of all those children to whichever was highest
//       $('.bdiv',this).height(highestBox);
//
//     });
// 	$('.ccontainer').each(function(){
//
//       // Cache the highest
//       var highestBox = 0;
//
//       // Select and loop the elements you want to equalise
//       $('.ct', this).each(function(){
//
//         // If this box is higher than the cached highest then store it
//         if($(this).height() > highestBox) {
//           highestBox = $(this).height();
//         }
//
//       });
//
//       // Set the height of all those children to whichever was highest
//       $('.ct',this).height(highestBox);
//
//     });
//
// });

/*!
 * Simple jQuery Equal Heights
 *
 * Copyright (c) 2013 Matt Banks
 * Dual licensed under the MIT and GPL licenses.
 * Uses the same license as jQuery, see:
 * http://docs.jquery.com/License
 *
 * @version 1.5.1
 */
(function($) {

    $.fn.equalHeights = function() {
        var maxHeight = 0,
            $this = $(this);

        $this.each( function() {
            var height = $(this).innerHeight();

            if ( height > maxHeight ) { maxHeight = height; }
        });

        return $this.css('height', maxHeight);
    };

    // auto-initialize plugin
    $('[data-equal]').each(function(){
        var $this = $(this),
            target = $this.data('equal');
        $this.find(target).equalHeights();
    });

})(jQuery);