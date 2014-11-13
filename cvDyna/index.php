<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Propositions de CV dynamiques et intéractifs</title>
<style>
#menu, #menu ul{
padding:0;
margin:0;
list-style:none;
text-align:center;
}
#menu li{
display:inline-block;
position:relative;
border-radius:8px 8px 0 0;
}
#menu ul li{
display:inherit;
border-radius:0;
}
#menu ul li:hover{
border-radius:0;
}
#menu ul li:last-child{
border-radius:0 0 8px 8px;
}
#menu ul{
position:absolute;
max-height:0;
left: 0;
right: 0;
overflow:hidden;
-moz-transition: .8s all .3s;
-webkit-transition: .8s all .3s;
transition: .8s all .3s;
}
#menu li:hover ul{
max-height:15em;
}
/* background des liens menus */
#menu li:first-child{
background-color: #65537A;
background-image:-webkit-linear-gradient(top, #65537A 0%, #2A2333 100%);
background-image:linear-gradient(to bottom, #65537A 0%, #2A2333 100%);
}
#menu li:nth-child(2){
background-color: #729EBF;
background-image: -webkit-linear-gradient(top, #729EBF 0%, #333A40 100%);
background-image:linear-gradient(to bottom, #729EBF 0%, #333A40 100%);
}
#menu li:nth-child(3){
background-color: #F6AD1A;
background-image:-webkit-linear-gradient(top, #F6AD1A 0%, #9F391A 100%);
background-image:linear-gradient(to bottom, #F6AD1A 0%, #9F391A 100%);
}
#menu li:last-child{
background-color: #CFFF6A;
background-image:-webkit-linear-gradient(top, #CFFF6A 0%, #677F35 100%);
background-image:linear-gradient(to bottom, #CFFF6A 0%, #677F35 100%);
}
/* background des liens sous menus */
#menu li:first-child li{
background:#2A2333;
}
#menu li:nth-child(2) li{
background:#333A40;
}
#menu li:nth-child(3) li{
background:#9F391A;
}
#menu li:last-child li{
background:#677F35;
}
/* background des liens menus et sous menus au survol */
#menu li:first-child:hover, #menu li:first-child li:hover{
background:#65537A;
}
#menu li:nth-child(2):hover, #menu li:nth-child(2) li:hover{
background:#729EBF;
}
#menu li:nth-child(3):hover, #menu li:nth-child(3) li:hover{
background:#F6AD1A;
}
#menu li:last-child:hover, #menu li:last-child li:hover{
background:#CFFF6A;
}
/* les a href */
#menu a{
text-decoration:none;
display:block;
padding:8px 32px;
color:#fff;
font-family:arial;
}
#menu ul a{
padding:8px 0;
}
#menu li:hover li a{
color:#fff;
text-transform:inherit;
}
#menu li:hover a, #menu li li:hover a{
color:#000;
}
</style>
<script type="text/javascript" src="../js/jquery-1.11.1.min.js" ></script>
<script type="text/javascript" src="../js/queue.js" ></script>
<script type="text/javascript" src="../js/d3.js" ></script>
<script>
	function init(){
		$("#menu li ul li").click(function() {
			 var li = $(this);
			 var url = li[0].textContent;
			 if(url)getSVG(url);
		});
	}
	
	function getSVG(url){
		queue()
			.defer(d3.xml, url, "image/svg+xml")
			.await(charge);
	}

	/*charge le premier svg
	merci à http://bl.ocks.org/KoGor/8162640
	*/
	function charge(error, xml){
	   	//Adding our svg file to HTML document
		var objXml = document.importNode(xml.documentElement, true);
		//récupère le div à remplir avec le svg
		var objDiv = document.getElementById('objSVG');
		//supprime tous les enfants de ce div
		while (objDiv.firstChild) {
		  objDiv.removeChild(objDiv.firstChild);
		}
		objDiv.appendChild(objXml);
	}	
</script>
</head>

<body onload="init();">
    <ul id="menu">
        <li><a href="#">Liste des CV</a>       
            <ul>
	<?php
    if($dossier = opendir('.')){	
        while(false !== ($fichier = readdir($dossier)))
        {
            if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
            {
                echo '<li><a href="#">'.$fichier.'</a</li>';
            }
        
        }
    }
    ?>
            </ul>
      </li>
    </ul>
    <div id="objSVG"></div>
</body>
</html>