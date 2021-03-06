<?php
define ('DBFILE',dirname(__FILE__).'/chunked_upload.db');
$user_id=SQLite3::escapeString($_GET['user_id']);
$token_id=SQLite3::escapeString($_GET['token_id']);
$entry_id=SQLite3::escapeString($_GET['entry_id']);
$partner_id=$_GET['partner_id'];
$upload_total_time=$_GET['upload_total_time'];
$concurrent_chunks=$_GET['concurrent_chunks'];
$total_chunks=$_GET['total_chunks'];
$chunk_size=$_GET['chunk_size'];
$file_size=$_GET['file_size'];
$filename=$_GET['filename'];
$remote_addr=$_SERVER['REMOTE_ADDR'];
$x_forwarded_for=$_SERVER['HTTP_X_FORWARDED_FOR'];
$last_status=SQLite3::escapeString($_GET['last_status']);

$db=new SQLite3(DBFILE) or die('Unable to connect to database '. DBFILE);
$query="insert into chunked_uploads values(NULL,'$user_id','$token_id','$entry_id',$partner_id,$upload_total_time,$concurrent_chunks,$total_chunks,$chunk_size,$file_size,'$filename','$x_forwarded_for','$remote_addr','$last_status',DATE())";
$db->exec($query);
if ($db->lastErrorCode()){
    $msg=json_encode('ERROR: #' . $db->lastErrorCode() . ' '.$db->lastErrorMsg().' :(');
    $db->close();
    // maybe email about this one?
    die ($msg);

}else{
    $msg="Thank you for uploading. Upload stats were logged.";
}

$db->close();
