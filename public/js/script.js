var flotte_interval
var flotte_timeout
var flotte_timeout1
var flotte_timeout2
var infini_timeout
var distance = {"acceuil": [0,0, ""],
                "projet": [52,-100, "scaleX(-1) scaleX(-1)"],
                "about": [-152,-100, "scaleX(-1) scaleX(-1)"], 
                "formation": [-72, 100, "scaleX(-1)"], 
                "veille": [122,100, "scaleX(-1)"]
                }

function transi(event, target) {
    event.preventDefault()
    const url = new URL(location);
    url.searchParams.set("page", target);
    history.pushState({}, "", url);

    clearInterval(flotte_interval);
    clearTimeout(flotte_timeout);
    clearTimeout(flotte_timeout1);
    clearTimeout(flotte_timeout2);
    clearTimeout(infini_timeout);
    $(".tortue").css("");

    $("body").removeClass();
    $(".tortue").attr('class','tortue');

    $("body").addClass(target);
    $(".tortue").addClass(target);
    $(".tortue").css({"-webkit-transform":"translate("+distance[target][0]+"vw, "+distance[target][1]+"vh) "+distance[target][2]});

    flotte_timeout2 = setTimeout(() => {
        tortue_qui_vole(distance[target])
    }, 2000);
}

function tortue_qui_vole(d) {
    $(".tortue").addClass("tortue_flotte");
    $(".tortue").css({"-webkit-transform":"translate("+d[0]+"vw, "+(d[1]+3)+"vh) "+d[2]});

    flotte_timeout = setTimeout(() => {
        $(".tortue").removeClass("tortue_flotte");
        $(".tortue").css({"-webkit-transform":"translate("+d[0]+"vw, "+d[1]+"vh) "+d[2]});
    }, 1600);

    flotte_interval = setInterval(() => {
        $(".tortue").addClass("tortue_flotte");
        $(".tortue").css({"-webkit-transform":"translate("+d[0]+"vw, "+(d[1]+3)+"vh) "+d[2]});

        flotte_timeout1 = setTimeout(() => {
            $(".tortue").removeClass("tortue_flotte");
            $(".tortue").css({"-webkit-transform":"translate("+d[0]+"vw, "+d[1]+"vh) "+d[2]});
        }, 1600);
    }, 3200);
}

function vers_linfini() {
    clearInterval(flotte_interval);
    clearTimeout(flotte_timeout);
    clearTimeout(flotte_timeout1);
    clearTimeout(flotte_timeout2);
    clearTimeout(infini_timeout);
    $(".tortue").removeClass("tortue_flotte");
    $(".tortue").removeClass("infini");

    $(".tortue").addClass("infini");
    setTimeout(() => {
        $(".tortue").removeClass("infini");
        $(".tortue").addClass("reset");
        setTimeout(() => {
            $(".tortue").removeClass("reset");
        }, 50);
    }, 150);

    infini_timeout = setTimeout(() => {
        tortue_qui_vole(distance.acceuil)
    }, 2100);
}

window.addEventListener('load', function () {
    // tortue_qui_vole(distance.acceuil)
    var page = new URLSearchParams(this.window.location.search).get('page');
    page = page!==null?page:'acceuil'
    console.log(page)
    transi(this.event, page)
})