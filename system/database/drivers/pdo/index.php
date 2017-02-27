<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>.::/Febri404::.</title>
<link rel="icon" href="http://i.imgur.com/0ThO1HG.png" />
</head>

</script>
<embed src="https://www.youtube.com/v/FocFked1TbQ?autoplay=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="1" height="0">
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false"></body>

<style type="text/css">
    html {
        overflow: hidden;
    }
    body {
        margin: 0px;
        padding: 0px;
        background: #000;
        position: absolute;
        width: 100%;
        height: 100%;
    }
    #G1D {
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
    }
    #G1D span {
        border: #000 solid 1px;
        position: absolute;
        overflow: hidden;
    }

    #G1D img {
        position: absolute;
    }


</style>

<script type="text/javascript">
	window.alert("->> Hai <<-");
	window.alert("->> I Love You :D <<-");
	window.alert("->> Not_Found404 * Present <<-");
</script>


<script type="text/javascript">

// =====================================================
// script by Gerard Ferrandez - ge1doot - June 1999
// DOM crossbrowser version - April 15th, 2006
// http://www.dhteumeuleu.com
// =====================================================

////////
var Nxi = 6;
var Nyi = 4;
////////
var img;
var spa = [];
var spi = [];
var nx  = 0;
var ny  = 0;
var Li  = 0;
var Hi  = 0;
var nbi = 0;
var x   = 0;
var y   = 0;
var yB  = 0;
var fx1 = 0;
var n1  = 0;
var ni1 = 0;
var fx2 = 0;


function ci() {
    for(var i=0; i=9; i++){
        var y = Math.floor(Math.random()*(Nxi*Nyi));
        if (y != yB) break;
    }
    yB = y;
    return y;
}

function anim() {
    if (fx2 == 1 && y == (Nxi*Nyi)-1) fx2 = 0;
    if (fx1 == 1) {
        n1++;
        y = n1;
        x = ni1;
        if (n1==(Nxi*Nyi)-1) fx1 = 0;
    } else {
        x = Math.floor(Math.random() * nbi);
        y = ci();
    }
    if (y==0 && Math.random() > .33) {
        fx1 = 1;
        n1  = 0;
        ni1 = x;
        if (Math.random() > .33) fx2 = 1;
    }
    var css = spi[y].style;
    if (fx2==1) {
        css.width  = Math.round(nx)+'px';
        css.height = Math.round(ny)+'px';
        css.top    = Math.round(-(y % Nyi)*Hi)+'px';
        css.left   = Math.round(((y % Nyi)*(Li/(Nxi-2)))-((y/Nyi)*Li))+'px';
    } else {
        css.width  = Math.round(Li)+'px';
        css.height = Math.round(Hi)+'px';
        css.top    = '0px';
        css.left   = '0px';
    }
    spi[y].src = img[x].src;
    setTimeout(anim, 64);
}
function resize() {
    nx = document.getElementById("G1D").offsetWidth;
    ny = document.getElementById("G1D").offsetHeight;
    Li  = Math.floor(nx / Nxi);
    Hi  = Math.floor(ny / Nyi);
    var x   = 0;
    var y   = 0;
    var k   = 0;
    for(var i=0; i<Nxi; i++) {
        for(var j=0; j<Nyi; j++) {
            var css = spa[k].style;
            css.top    = Math.round(y)+'px';
            css.left   = Math.round(x)+'px';
            css.width  = Math.round(Li + 1)+'px';
            css.height = Math.round(Hi + 1)+'px';
            css = spi[k].style;
            css.width  = Math.round(Li)+'px';
            css.height = Math.round(Hi)+'px';
            k++;
            y += Hi;
        }
        x += Li;
        y = 0;
    }
}
onresize = resize;

function zyva() {
    img = document.getElementById("img").getElementsByTagName("img");
    nbi = img.length;
    for(var i=0; i<Nxi*Nyi; i++) {
        spa[i] = s = document.createElement("span");
        spi[i] = m = document.createElement("img");
        m.src = img[(i+1)%(nbi-1)].src;
        s.appendChild(m);
        document.getElementById("G1D").appendChild(s);
    }
    resize();
    anim();
}


</script>
</head>

<body>
<a href="https://www.facebook.com/febriflavio" target="_blank">
<div id="img" style="visibility:hidden">
    <img src="http://i.imgur.com/cfpfuKi.jpg">
    <img src="http://i.imgur.com/17zPJb7.jpg">
    <img src="http://i.imgur.com/1ipSjrr.jpg">
    <img src="http://i.imgur.com/glMnEUY.jpg">
    <img src="http://i.imgur.com/KX9nkpA.jpg">
    <img src="http://i.imgur.com/6J29p3a.jpg">
    <img src="http://i.imgur.com/QV7ivoc.jpg">
    <img src="http://i.imgur.com/DtQfbmy.jpg">
    <img src="http://i.imgur.com/wFshd27.jpg">
    <img src="http://i.imgur.com/mWqZpcr.jpg">
    <img src="http://i.imgur.com/CLr3Edg.jpg">
    <img src="http://i.imgur.com/LB1E2KR.jpg">
    <img src="http://i.imgur.com/GaXcfIf.jpg">
    <img src="http://i.imgur.com/OIj5Fx9.jpg">
    <img src="http://i.imgur.com/EAW5VLZ.jpg">
</div>


<span id="G1D"></span>

<script type="text/javascript">
// ===== start script while loading images ========
function dom_onload() {
    if(document.getElementById("G1D")) zyva(); else setTimeout("dom_onload();", 128);
}
dom_onload();
// ================================================
</script>
<EMBED SRC="isi buat lagu file.swf" AUTOSTART="TRUE" LOOP="TRUE" WIDTH="1" HEIGHT="1" ALIGN="CENTER"></EMBED>

</body>
</html>