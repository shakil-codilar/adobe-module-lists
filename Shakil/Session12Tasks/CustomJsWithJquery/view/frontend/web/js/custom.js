define(['jquery'],function () {
    jQuery(document).ready(function () {

        jQuery("#vendor").click(function () {
            var a = jQuery("input[id='num1']").val();
                var b = jQuery("input[id='num2']").val();
                a = parseInt(a);
                b = parseInt(b);
            jQuery("#result").val(a + b);
        });
    });
});



// define([
//     'jquery',
//     'jquery/ui'
// ], function ($) {
//     $.widget('mage.myCustomWidget', {
//         /**
//          * Widget initialization
//          * @private
//          */
//         _create: function () {
//                 this._bindSubmit();
//         },
//
//         _bindSubmit: function () {
//             var self = this;
//             this.element.on('submit', function(e) {
//                 e.preventDefault();
//                 alert('hi');
//             });
//         },
//     });
//     return $.mage.myCustomWidget;
// });



