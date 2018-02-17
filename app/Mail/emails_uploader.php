<?php  
$con=mysql_connect('localhost','maket1eb_mail','mail@123')or die('db noot connect');
mysql_select_db('maket1eb_mail',$con);
require_once 'reader.php'; 
$a=date('ymdhis');
if(($_POST) and ($_POST['save']=='Upload')) 
{ 
  	if ($_FILES["file"]["error"] > 0) 
    { 
  	  $code=$_FILES["file"]["error"]; 
    } 
  else 
    { 
	  move_uploaded_file($_FILES["file"]["tmp_name"], 
      "upload/".$a.$_FILES["file"]["name"]); 
     $file="upload/".$a.$_FILES["file"]["name"]; 
	 } 
$filename=$file; 
$prod=parseExcel($filename); 
//mysql_query("update current_cr_status set erp_bal=''");
 
$msg=""; 
$rej_str="";
for($i=1;$i<count($prod);$i++) 
{	 
	if($prod[$i][0]!="" &&  $prod[$i][1]!=""){ 
		$mail_id=$prod[$i][0]; 
		$name=$prod[$i][1]; 
		//echo "insert into mail_ids set mail_id='".$mail_id."', name='".$name."', status='A' ,insert_date ='".date('Y-m-d H:i:s')."'";
		$sql=mysql_query("insert into mail_ids set mail_id='".$mail_id."', name='".$name."', status='A' ,insert_date ='".date('Y-m-d H:i:s')."'"); 
		if($sql){
		}else{
			$rej_str.="<tr><td>".$mail_id."</td><td>".$name."</td></tr>";
		}
	} 
} 
 if($rej_str!=""){
	echo "<table><tr><td colspan=2 align='center' border='1'>Below Mail Ids are not updated as its  already uploaded </td></tr><tr><td>Email id</td><td>Name</td></tr>" ;
	echo $rej_str;
	echo "</table>";
 }
$f_msg="<br/>Selected File is uploaded"; 
echo "<center><b>Selected File is uploaded</b></center>"; 
exit; 
} 
function parseExcel($excel_file_name_with_path) 
{ 
	$data = new Spreadsheet_Excel_Reader(); 
	// Set output Encoding. 
	$data->setOutputEncoding('CP1251'); 
	$data->read($excel_file_name_with_path); 
 
	//$colname=array('id','name'); 
 
	for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) { 
		for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
		 
			$product[$i-1][$j-1]=$data->sheets[0]['cells'][$i][$j]; 
			$product[$i-1][$colname[$j-1]]=$data->sheets[0]['cells'][$i][$j]; 
		} 
	} 
	return $product; 
} 
 
?>
<html>
<head>
<title>Excel upload</title>
<link href="crm.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {
	font-size: 14px
}
-->
</style>
</head>
<body onLoad="" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!--<DIV STYLE="overflow: auto; width: 100%; height: 530px; padding:0px; margin: 0px"> --> 
<script type="text/javascript"> 
function chk_data(){ 
 
	if (document.upd.file.value=="") 
	{ 
		alert("Please select the file first"); 
		document.upd.file.focus; 
		return false; 
	} 
var error=false; 
var errorMsg="Sorry we can not complete your request.Following Information is missing: \n"; 
doc=document.product; 
if(error==false){ 
document.getElementById('save').disabled =false 
} 
else{ 
document.getElementById('save').disabled =true 
} 
if(error==true){ 
alert(errorMsg); 
return false; 
} 
if(error==false){ 
var r=confirm("Do You want to Process?"); 
} 
if(r==true){ 
hideThis("save"); 
return true; 
} 
if(r==false){ 
return false; 
} 
else{ 
hideThis("save"); 
return true; 
} 
} 
function hideThis(val){ 
if(val!="" ){ 
document.getElementById(val).style.display= 'none'; 
} 
} 
</script>
</head>
<table border="" width="100%" bordercolor="#000000" cellpadding="2" cellspacing="0">
  <form  name="upd" method="post" action="" enctype="multipart/form-data">
   
    <tr align="right" class="Table_body">
      <td class="style1" width="100%" ><p>&nbsp;</p>
        <div align="center">
          <p class="style2 style6"><strong>Upload EMAIL IDs(Email Id, Name)</strong></p>
          <p><? echo $_GET[$f_msg];?></p>
          <p>
            <input name="file" type="file" class="bgr1" id="file" size="50" >
            <input type="submit" class="style1" name="save"  id="save" value="Upload" onClick="return chk_data();">
          </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div></td>
    </tr>
  </form>
</table>
</body>
</html>