
<?php

require_once("common/commande.php");
require_once("common/CommandLine.php");
require_once("common/config.php");
require_once("common/tools.php");
require_once("common/action.php");



$config = new Config("config/conf.cfg");
$email = $_POST['email'];
$cmd = new Commande(-1,$email , "", "SAVED");
$id = $cmd->save($config);


foreach ($_POST as $k=>$v) {
	if (preg_match("/cmd_qty.*/",$k)) {
		$item = str_replace('cmd_qty','',$k);
		$line = new CommandLine(-1, $id, $item, -1, -1, $v);
		$line->save($config);
		//echo "<div style='border:1px solid red;>".print_r($line,true)."</div>";
	}
}

$c = Commande::loadById($config,$id);
//var_dump($c);


	function getMessage($cmd) {
		$smarty = getSmarty();
		$smarty->assign('cmd',$cmd);
		$msg = $smarty->fetch('mail.tpl');
		return $msg;
	}


	$from_add = $config->getProperty('mail_from'); 
	$subject = "confirmation commande n° $id";
	$message = getMessage($c);
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";	
	$headers .= "Content-Type: text/html; charset='UTF-8'";
	
	if(mail($email,$subject,$message,$headers)) 
	{
		$msg = "Mail sent OK";
	} 
	else 
	{
 	   $msg = "Error sending email!";
	}


$a = new Action("CONFIRMATION",$c->getId());
$a->save($config);

$smarty = getSmarty();
		$smarty->assign('cmd',$c);
		$smarty->assign('action',$a);
		$smarty->assign('email',$email);
		$msg = $smarty->fetch('docommand.tpl');
		echo $msg;


?>
