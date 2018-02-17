<?php
ini_set('display_errors', '0');
$con=mysql_connect('localhost','maket1eb_mail','mail@123')or die('db noot connect');
mysql_select_db('maket1eb_mail',$con);


$date = date('Y-m-d H:i:s',strtotime('-72 hours')); 
echo $sql_str="select * from mail_ids where status='A' and mail_send_timestamp <= '".$date."' limit 1";
$sql=mysql_query($sql_str)or die(mysql_error());
	require_once 'class.phpmailer.php';

//	$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

while($row=mysql_fetch_assoc($sql))
{
	$mail = new PHPMailer(true);
	echo "<br>".$mail_to=$row['mail_id'];
	$name=$row['name'];
	if($name=='')
	{
		$nn=split('@',$mail_to);
		$name=$nn[0];
	}
	try {
		$mail->AddAddress($mail_to, $name);
		$mail->SetFrom('offers@maketriptofun.com', 'Offers');
		$mail->AddReplyTo('support@maketriptofun.com', 'Support');
		$mail->Subject = 'Your All Travel Solutions - Just A Click Away';
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
		$mail->MsgHTML(file_get_contents('examples/content1.html'));
		//$mail->AddAttachment('examples/images/phpmailer.png');      // attachment
		//$mail->AddAttachment('examples/images/phpmailer_mini.png'); // attachment
		$mail->Send();
		$send_qry="update mail_ids set mail_send_timestamp='".date('Y-m-d H:i:s')."' where id='".$row['id']."'";
		mysql_query($send_qry)or die(mysql_error('error in send update'));		
		} 
	catch (phpmailerException $e) {
  		echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} 
	catch (Exception $e) {
  		echo $e->getMessage(); //Boring error messages from anything else!
	}
}
/*$mail = new PHPMailer(true);

$mail_to='abhishekdeep5@gmail.com';
	$name='Abhishek';
	if($name=='')
	{
		$nn=split('@',$mail_to);
		$name=$nn[0];
	}
	try {
		$mail->AddAddress($mail_to, $name);
		$mail->SetFrom('offers@maketriptofun.com', 'Offers');
		$mail->AddReplyTo('support@maketriptofun.com', 'Support');
		$mail->Subject = 'Your All Travel Solutions - Just A Click Away';
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
		$mail->MsgHTML(file_get_contents('examples/content1.html'));
		//$mail->AddAttachment('examples/images/phpmailer.png');      // attachment
		//$mail->AddAttachment('examples/images/phpmailer_mini.png'); // attachment
		$mail->Send();
		//$send_qry="update mail_ids set mail_send_timestamp='".date('Y-m-d H:i:s')."' where id='".$row['id']."'";
		//mysql_query($send_qry)or die(mysql_error('error in send update'));		
		} 
	catch (phpmailerException $e) {
  		echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} 
	catch (Exception $e) {
  		echo $e->getMessage(); //Boring error messages from anything else!
	}*/
    ?>