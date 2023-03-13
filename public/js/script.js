function switch_img(next_div, prec_div) {
    $(".show").removeClass("show");
    $(".menu #" + next_div + " .image-link a").show();

    setTimeout(() => {
        $(".focus").css("z-index", -1);
        $("#" + next_div).css("z-index", parseInt($(".focus").css('z-index')) + 3);

        $(".focus").removeClass("focus");
        $("#" + next_div).addClass("focus");
    }, 1200);

    setTimeout(() => {
        $(".menu #" + next_div + " .title p").addClass("show");
        $(".menu #" + next_div + " .image img").addClass("show");
        $(".menu #" + prec_div + " .image-link a").not($(".miel_slide").parent().parent()).hide();
    }, 800);
}

function init() {
    // console.log($(".menu").scrollTop());

    $(".show").not($(".miel_slide")).removeClass("show");

    if ($("#burger-toggle").is(":checked")) {
        // setTimeout(() => {
        //     $("#accueil").css("z-index", -2);
        // }, 300);
        $(".menu #start .image-link a").show();
    } else {
        // $(".menu #miel .image-link a").hide();
        // $(".menu #appiculteur .image-link a").hide();
        $(".menu .image-link a").not($(".miel_slide").parent().parent()).hide();

        // $(".menu").scrollTop(0);
        // $(".miel_slide").css("position", "fixed");
        // $(".miel_slide").css("left", "unset");

        $(".focus").css("z-index", -1);
        $("#start").css("z-index", 2);
    }

    if (parseInt($(".focus").css('z-index'))+1 >= parseInt($(".menu").css('z-index'))) {
        $(".menu").css("z-index", parseInt($(".focus").css('z-index')) + 3);
    }

    $(".focus").removeClass("focus");
    $("#start").addClass("focus");

    $(".menu #start .title p").addClass("show");
    $(".menu #start .image img").addClass("show");

}

function opa() {
    if ($('#burger-toggle').is(':checked')) {
        $(".miel_slide").css("opacity", 0.2);
    } else {
        $(".miel_slide").css("opacity", 1);
    }
}

function transi_rond(event, element) {
    var x = event.pageX;
    var y = event.pageY;

    $(".miel_slide").parent().parent().parent().css("overflow", "hidden");
    $(".menu .images .image-link").css("pointer-events", "auto");

    $(".miel_slide").addClass("show");

    $(".miel_slide").css("transform", "none");
    $(".miel_slide").css("opacity", 1);
    $(".miel_slide").css("position", "relative");
    $(".miel_slide").css("left", "50%");

    $(".miel_slide").removeClass("miel_slide");

    $(".titre_miel").addClass("cacher");
    $(".description").addClass("cacher_bas");
    $(".pancarte").addClass("cacher_pancarte");

    if ($(element).hasClass("btn_login")) {
        page_suivante = $("#login");
        page_precedente = $(".menu");

        $(".focus").css("z-index", -1);
        $("#start").css("z-index", parseInt($(".focus").css('z-index')) + 3);
        $(".focus").removeClass("focus");
        $("#login").addClass("focus")
    }
    else {
        page_suivante = $("#projet");
        page_precedente = $(".menu");

        $(".focus").css("z-index", -1);
        $("#start").css("z-index", parseInt($(".focus").css('z-index')) + 3);
        $(".focus").removeClass("focus");
        $("#projet").addClass("focus")
    }


    page_suivante.css('z-index', parseInt($(page_precedente).css('z-index')) + 1);
    page_suivante.css('clip-path', 'circle(0% at ' + x + 'px ' + y + 'px)');

    anime({
        targets: page_suivante,
        update: function (anim) {
            page_suivante.css('clip-path', 'circle(' + (anim.progress * 2) + '% at ' + x + 'px ' + y + 'px)');
        }
    });

    setTimeout(() => {
        $(".show").removeClass("show");

        $(".menu #start .title p").addClass("show");
        $(".menu #start .image-link a").show();
        $(".menu #start .image img").addClass("show");

        $("#burger-toggle").prop("checked", false);
    }, 400);
}


function miel_click(element) {
    $("body").click();
    
    console.log(window.innerWidth);

    if (window.innerWidth < 800) {

        var x = $(element).parent().offset().left - window.innerWidth*0.02;
        var y = $(element).parent().offset().top - window.innerHeight*0.05;
    } else {
        var x = $(element).parent().offset().left - window.innerWidth*0.05;
        // var y = $(element).parent().offset().top - window.innerHeight*0.15 + $(".menu").scrollTop();
        var y = $(element).parent().offset().top - window.innerHeight*0.15;
    }

    $(".menu #start .image-link a").hide();

    $(".miel_slide").css("transform", "none");
    $(".miel_slide").css("opacity", 1);
    $(".miel_slide").css("position", "relative");
    $(".miel_slide").css("left", "50%");

    if ($(".miel_slide").length == 0) {
        $(".miel_slide").parent().parent().parent().css("overflow", "hidden");
        // $(".miel_slide").parent().parent().parent().css("pointer-events", "auto");
        $(".menu .images .image-link .image::before").css("pointer-events", "auto");
        $(".miel_slide").removeClass("miel_slide");

        $(".show").removeClass("show");
        $(".menu .menu-nav-link span div").addClass("tej");

        $(element).children().children().addClass("show");

        setTimeout(() => {
            // setTimeout(() => {
            //     $(".menu").scrollTop(0);
            // }, 2000);

            $(element).children().children().attr("style", "transform: translate(-" + x.toString() + "px, -" + y.toString() + "px) !important");

            // $(element).children().children().css("bottom", "0%");

            // console.log("transform", "translate("+x.toString()+"px, "+y.toString()+"px)");
            $(element).children().children().addClass("miel_slide");
            $(element).parent().css("pointer-events", "none");

            $("#burger-toggle").prop("checked", false);
            init();
            $(".tej").removeClass("tej");

            $(element).parent().css("overflow", "visible");
            $(".menu").css("opacity", 1);
            
            var template = "#template_"+$(element).parent().parent().parent().attr("id"); 

            var page_suivante = $(template);
            var page_precedente = $(".menu");

            $(".focus").css("z-index", -1);
            $("#start").css("z-index", parseInt($(".focus").css('z-index')) + 3);
            $(".focus").removeClass("focus");
            $(template).addClass("focus");

            page_suivante.css('z-index', parseInt($(page_precedente).css('z-index')) - 1);
            page_suivante.css("opacity", 1);

            $(".miel_slide").css("z-index", parseInt($(page_precedente).css('z-index')));

        }, 800);

        setTimeout(() => {
            console.log($(element).parent().attr("id"));

            $("."+$(element).parent().attr("id")+" .cacher").removeClass("cacher");
            $("."+$(element).parent().attr("id")+" .cacher_bas").removeClass("cacher_bas");
            $("."+$(element).parent().attr("id")+" .cacher_pancarte").removeClass("cacher_pancarte");

            // $(".menu").scrollTop(0);
            var ini_y = $(element).parent().offset().top;

            // $(element).children().children().css({"position": "fixed",
            //                                         "left": "unset",
            //                                         "top": ini_y});  
    
        }, 1100);

    } else {
        $(".titre_miel").addClass("cacher");
        $(".description").addClass("cacher_bas");
        $(".pancarte").addClass("cacher_pancarte");

        setTimeout(() => {
            $(".miel_slide").parent().parent().parent().css("overflow", "hidden");
            $(".miel_slide").parent().parent().parent().css("pointer-events", "auto");
            $(".miel_slide").removeClass("miel_slide");

            $(".show").removeClass("show");
            $(".menu .menu-nav-link span div").addClass("tej");

            $(element).children().children().addClass("show");

            setTimeout(() => {
                // $(element).children().children().css({"position": "fixed",
                //                                         "left": "unset",
                //                                         "bottom": $(".menu").scrollTop()});  

                $(element).children().children().attr("style", "transform: translate(-" + x.toString() + "px, -" + y.toString() + "px) !important")

                // console.log("transform", "translate("+x.toString()+"px, "+y.toString()+"px)");
                $(element).children().children().addClass("miel_slide");
                $(element).parent().css("pointer-events", "none");

                $("#burger-toggle").prop("checked", false);
                init();
                $(".tej").removeClass("tej");

                $(element).parent().css("overflow", "visible");
                $(".menu").css("opacity", 1);

                var template = "#template_"+$(element).parent().parent().parent().attr("id"); 


                var page_suivante = $(template);
                var page_precedente = $(".menu");

                $(".focus").css("z-index", -1);
                $("#start").css("z-index", parseInt($(".focus").css('z-index')) + 3);
                $(".focus").removeClass("focus");
                $(template).addClass("focus");

                page_suivante.css('z-index', parseInt($(page_precedente).css('z-index')) - 1);
                page_suivante.css("opacity", 1);

                $(".miel_slide").css("z-index", parseInt($(page_precedente).css('z-index')));
            }, 750);
        }, 1180);

        setTimeout(() => {
            $("."+$(element).parent().attr("id")+" .cacher").removeClass("cacher");
            $("."+$(element).parent().attr("id")+" .cacher_bas").removeClass("cacher_bas");
            $("."+$(element).parent().attr("id")+" .cacher_pancarte").removeClass("cacher_pancarte");

            // $(".menu").scrollTop(0);
        }, 2200);
    }
}