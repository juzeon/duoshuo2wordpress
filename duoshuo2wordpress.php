<?php
$json=file_get_contents('export.json');
$duoshuo=json_decode($json);
$sql='SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";'.PHP_EOL.'SET time_zone = "+00:00";'.PHP_EOL;
$xx=100;
$i=1;
foreach($duoshuo->posts as $posts){
	$comment_id=$i*$xx;
	$thread_id=$posts->thread_key;
	if(empty($thread_id)){
		continue;
	}
	$date=$posts->created_at;
	$date=strtotime($date);
	$date=date('Y-m-d H:i:s',$date);
	$ip=$posts->ip;
	$author=addslashes($posts->author_name);
	$email=$posts->author_email;
	$content=addslashes($posts->message);
	$url=addslashes($posts->author_url);
	$author_key=$posts->author_key;
	$sql.="insert into `wp_comments` 
	(`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`, `comment_mail_notify`) 
	values 
	($comment_id,$thread_id,'$author','$email','$url','$ip','$date','$date','$content',0,'1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:45.0) Gecko/20100101 Firefox/45.0','',0,$author_key,1);".PHP_EOL;
	
	$i++;
}
file_put_contents('d2w-'.time().'.sql', $sql);