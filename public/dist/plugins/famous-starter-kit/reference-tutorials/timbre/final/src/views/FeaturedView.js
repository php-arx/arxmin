define(function(require, exports, module) {
    var View            = require('famous/core/View');
    var Surface         = require('famous/core/Surface');
    var Transform       = require('famous/core/Transform');
    var StateModifier   = require('famous/modifiers/StateModifier');
    var ImageSurface    = require('famous/surfaces/ImageSurface');

    function FeaturedView() {
        View.apply(this, arguments);

        createBacking.call(this);
        createNoteworthy.call(this);
        createStaffPicks.call(this);
    }

    FeaturedView.DEFAULT_OPTIONS = {
        angle: 0,
        xOffset: 15,
        fontSize: 22
    };

    var createBacking = function() {
        var backSurface = new ImageSurface({
            size: [320, 164],
            content : './img/band.png',
            properties : {
                pointerEvents : 'none'
            }
        });

        this.add(backSurface);
    };

    var createNoteworthy = function() {
        var surface = new Surface({
            size: [true, true],
            content: 'Noteworthy',
            properties: {
                color: 'black',
                fontSize: this.options.fontSize + 'px',
                textTransform: 'uppercase',
                pointerEvents : 'none'
            }
        });

        var modifier = new StateModifier({
            transform: Transform.thenMove(Transform.rotateZ(this.options.angle), [this.options.xOffset, 30, 0])
        });

        this.add(modifier).add(surface);
    };

    var createStaffPicks = function() {
        var surface = new Surface({
            size: [undefined, true],
            content: 'Timbrus staff picks',
            properties: {
                color: 'white',
                fontSize: this.options.fontSize + 'px',
                textTransform: 'uppercase',
                pointerEvents : 'none'
            }
        });

        var modifier = new StateModifier({
            transform: Transform.thenMove(Transform.rotateZ(this.options.angle), [this.options.xOffset, 67, 0])
        });

        this.add(modifier).add(surface);
    };

    FeaturedView.prototype = Object.create(View.prototype);
    FeaturedView.prototype.constructor = FeaturedView;

    module.exports = FeaturedView;
});
