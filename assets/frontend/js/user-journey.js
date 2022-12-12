// gsap.registerPlugin(ScrollTrigger);
 var App = {
    drawsvg: function () {
        if($('#line-about').length){
            var $duration = $('#line-about').height();
            function pathPrepare ($el) {
                console.log($el);

                var lineLength = $el[0].getTotalLength();
                $el.css("stroke-dasharray", lineLength);
                $el.css("stroke-dashoffset", lineLength);
            }

            var $line1 = $("path#line1");
            var $line2 = $("path#line2");
            var $line3 = $("path#line3");
            var $line4 = $("path#line4");
            var $line5 = $("path#line5");
            var $line6 = $("path#line6");
            var $line7 = $("path#line7");
            var $line8 = $("path#line8");
            pathPrepare($line1);
            pathPrepare($line2);
            pathPrepare($line3);
            pathPrepare($line4);
            pathPrepare($line5);
            pathPrepare($line6);
            pathPrepare($line7);
            pathPrepare($line8);

            var controller = new ScrollMagic.Controller();

            var tween = new TimelineMax()
                .add(TweenMax.to($line1, 0.2, {strokeDashoffset: 0, ease:Linear.easeNone})) 
                .add(TweenMax.to($line2, 0.06, {strokeDashoffset: 0, ease:Linear.easeNone})) 
                .add(TweenMax.to($line3, 0.09, {strokeDashoffset: 0, ease:Linear.easeNone}))
                .add(TweenMax.to($line4, 0.1, {strokeDashoffset: 0, ease:Linear.easeNone}))
                .add(TweenMax.to($line5, 0.14, {strokeDashoffset: 0, ease:Linear.easeNone}))
                .add(TweenMax.to($line6, 0.1, {strokeDashoffset: 0, ease:Linear.easeNone}))
                .add(TweenMax.to($line7, 0.08, {strokeDashoffset: 0, ease:Linear.easeNone}))
                .add(TweenMax.to($line8, 0.2, {strokeDashoffset: 0, ease:Linear.easeNone}))
                .add(TweenMax.to("path", 1, {stroke: "#ffffff", ease:Linear.easeNone}), 0);    
                 
            var scene = new ScrollMagic.Scene({triggerElement: "#line-about",duration: $duration, tweenChanges: true,})
            .setTween(tween)
            .addTo(controller);
    }
},
};
jQuery(document).ready(function () {
App.drawsvg();
})