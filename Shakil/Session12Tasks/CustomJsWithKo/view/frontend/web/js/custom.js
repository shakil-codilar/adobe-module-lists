define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';

    return Component.extend({
        initialize: function () {
            //initialize parent Component
            this._super();
            this.num1 = ko.observable(' ');
            this.num2 = ko.observable(' ');
        },

        qty: function () {
            this.result = ko.computed(function () {
                return Number(this.num1()) + Number(this.num2())
            }, this);
        }
    });
})

