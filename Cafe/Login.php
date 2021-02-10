<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    <?php
        include("../Layout/estilos.php");
    ?>
     <link  rel="icon"   href="../assets/img/favicon.png" type="image/png" />

    <link rel="stylesheet" href="../css/nuevo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <script type='text/javascript'>
    
    var colours=new Array("#22b870", "#22b870", "#22b870", "#22b870", "#22b870"); 
    var bubbles=70; 
    var x=ox=400;
    var y=oy=300;
    var swide=800;
    var shigh=600;
    var sleft=sdown=0;
    var bubb=new Array();
    var bubbx=new Array();
    var bubby=new Array();
    var bubbs=new Array();

    window.onload=function() { if (document.getElementById) {
    var rats, div;
    for (var i=0; i<bubbles; i++) {
    rats=createDiv("3px", "3px");
    rats.style.visibility="hidden";

    div=createDiv("auto", "auto");
    rats.appendChild(div);
    div=div.style;
    div.top="1px";
    div.left="0px";
    div.bottom="1px";
    div.right="0px";
    div.borderLeft="1px solid "+colours[3];
    div.borderRight="1px solid "+colours[1];

    div=createDiv("auto", "auto");
    rats.appendChild(div);
    div=div.style;
    div.top="0px";
    div.left="1px";
    div.right="1px";
    div.bottom="0px"
    div.borderTop="1px solid "+colours[0];
    div.borderBottom="1px solid "+colours[2];

    div=createDiv("auto", "auto");
    rats.appendChild(div);
    div=div.style;
    div.left="1px";
    div.right="1px";
    div.bottom="1px";
    div.top="1px";
    div.backgroundColor=colours[4];
    if (navigator.appName=="Microsoft Internet Explorer") div.filter="alpha(opacity=50)";
    else div.opacity=0.5;
    document.body.appendChild(rats);
    bubb[i]=rats.style;
}
    set_scroll();
    set_width();
    bubble();
    }
}

    function bubble() {
    var c;
    if (x!=ox || y!=oy) {
    ox=x;
    oy=y;
    for (c=0; c<bubbles; c++) if (!bubby[c]) {
    bubb[c].left=(bubbx[c]=x)+"px";
    bubb[c].top=(bubby[c]=y)+"px";
    bubb[c].width="3px";
    bubb[c].height="3px"
    bubb[c].visibility="visible";
    bubbs[c]=3;
    break;
    }
}
    for (c=0; c<bubbles; c++) if (bubby[c]) update_bubb(c);
    setTimeout("bubble()", 40);
}

    function update_bubb(i) {
    if (bubby[i]) {
    bubby[i]-=bubbs[i]/2+i%2;
    bubbx[i]+=(i%5-2)/5;
    if (bubby[i]>sdown && bubbx[i]>0) {
    if (Math.random()<bubbs[i]/shigh*2 && bubbs[i]++<8) {
    bubb[i].width=bubbs[i]+"px";
    bubb[i].height=bubbs[i]+"px";
}
    bubb[i].top=bubby[i]+"px";
    bubb[i].left=bubbx[i]+"px";
}
    else {
    bubb[i].visibility="hidden";
    bubby[i]=0;
    return;
       }
    }
}

    document.onmousemove=mouse;
    function mouse(e) {
    set_scroll();
    y=(e)?e.pageY:event.y+sleft;
    x=(e)?e.pageX:event.x+sdown;
}

    window.onresize=set_width;
    function set_width() {
    var sw_min=999999;
    var sh_min=999999;
    if (document.documentElement && document.documentElement.clientWidth) {
    if (document.documentElement.clientWidth>0) sw_min=document.documentElement.clientWidth;
    if (document.documentElement.clientHeight>0) sh_min=document.documentElement.clientHeight;
}
    if (typeof(self.innerWidth)!="undefined" && self.innerWidth) {
    if (self.innerWidth>0 && self.innerWidth<sw_min) sw_min=self.innerWidth;
    if (self.innerHeight>0 && self.innerHeight<sh_min) sh_min=self.innerHeight;
}
    if (document.body.clientWidth) {
    if (document.body.clientWidth>0 && document.body.clientWidth<sw_min) sw_min=document.body.clientWidth;
    if (document.body.clientHeight>0 && document.body.clientHeight<sh_min) sh_min=document.body.clientHeight;
}
    if (sw_min==999999 || sh_min==999999) {
    sw_min=800;
    sh_min=600;
}
    swide=sw_min;
    shigh=sh_min;
}

    window.onscroll=set_scroll;
    function set_scroll() {
    if (typeof(self.pageYOffset)=="number") {
    sdown=self.pageYOffset;
    sleft=self.pageXOffset;
}
    else if (document.body.scrollTop || document.body.scrollLeft) {
    sdown=document.body.scrollTop;
    sleft=document.body.scrollLeft;
}
    else if (document.documentElement && (document.documentElement.scrollTop || document.documentElement.scrollLeft)) {
    sleft=document.documentElement.scrollLeft;
    sdown=document.documentElement.scrollTop;
}
    else {
    sdown=0;
    sleft=0;
}
}

    function createDiv(height, width) {
    var div=document.createElement("div");
    div.style.position="absolute";
    div.style.height=height;
    div.style.width=width;
    div.style.overflow="hidden";
    return (div);
}
</script>
</head>
<body>
<header>
	<h2>Industrias Cafetaleras</h2>
	<h1>Cuide su café</h1>
</header>
<br>
<div class="container">
        <form action="validarSesion.php" method="post">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card border-dark">
                        <h5 class="card-header bg-dark text-white text-center">Iniciar Sesión</h5>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="../Imagenes/portada.png" width="150" height="150"/>
                            </div>
                            <div class="form-group">
                                <label for="txtUsuario">Usuario</label>
                                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="txtPassword">Password</label>
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <input href="index.html" type="submit" class="btn btn-success btn-block" value="Iniciar Sesión" />

                            </div>
                            <div class="form-group">
                                <center>
                                    <a href="wfrmRegistrar.php" class="btn btn-outline-primary btn-block">Registrarse</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-md-2 col-lg-4"></div>
        </form>
    </div>
    <?php
        include("../Layout/scripts.php");
        if(isset($_GET["status"])){
            $status = $_GET['status'];  
            echo "<script type='text/javascript' >";
            if($status == 400){
                echo "swal('Cuidado','User incorrecto','warning');";
            }   
            if($status == 500){
                echo "swal('Cuidado','Error de sesión','error');";
            }    
            echo "</script>"; 
        }
    ?>

				<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
				<script src="assets/js/script.js"></script>
</body>
</html>