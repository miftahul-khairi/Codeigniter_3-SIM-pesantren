<?php 
function cek_session(){
	$CI = &get_instance();
	$session = $CI->session->userdata('username');
	if(empty($session)){
		redirect('logins');
	}
}


?>