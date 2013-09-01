<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script> 

<script type="text/javascript" src="js/jquery.uitablefilter.js"></script></head>
<body>

<h1>
num&eacute;ro de commande :: {$cmd->getId()}
</h1>

{include file='recap.tpl' cmd=$cmd}
	
	<br>

Un mail va vous &ecirc;tre envoy&eacute;  à l'adresse {$email}<br>
Veuillez cliquer sur le lien de confirmation qu'il contient afin de valider d&eacute;finitivement la commande.

</body>

</html>