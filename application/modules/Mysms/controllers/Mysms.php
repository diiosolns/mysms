<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mysms extends MX_Controller
{

function __construct() {
parent::__construct();
		$this->load->helper('date');
		$this->load->helper('download');
		$this->load->helper('text');
		$this->load->library('pagination');
		//modules
		$this->load->module('Home');
		$this->load->module('Users');
		$this->load->module('Admin');
		$this->load->module('Mysms');
		$this->load->module('Mauzo');
		$this->load->module('Matumizi');
}


function index(){

	$data['loginErr']="";
	$data['middle_m']="Mysms";
	//$data['middle_f']="dashboard";
	if ($this->session->userdata('user_role') == "admin") {  $data['middle_f']="dashboard_a";  } else if ($this->session->userdata('user_role') == "admin2") {    $data['middle_f']="dashboard_a2";    } else if ($this->session->userdata('user_role') == "Normal") {    $data['middle_f']="dashboard";  } else {   $data['middle_f']="dashboard";   }

	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}


function smsSenderForm(){

	$data['loginErr']="";
	$data['msg']="";
	$data['color']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="smsSenderForm";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function sendSMS() {
	$senderBtn = $this->input->post('senderBtn', true);
	$groupname = $this->input->post('groupname', true);
	$userid = $this->session->userdata('user_id');
	$senderid = $this->input->post('senderid', true);
	$sms = $this->input->post('sms', true);
	$include_name = $this->input->post('include_name', true);
	$user =  $this->mysms->get_where_custom1('sms_user', 'id', $this->session->userdata('user_id'));
	$this->session->set_userdata('user_bundle', $user->row()->bundle);
	$this->session->set_userdata('user_credit', $user->row()->credit);
	//Get gatetails
	$gateway = $this->mysms->get_where_custom1('sms_gateway', 'company', "NEXT SMS");
	//$url = $gateway->row()->base_url.'/test/text/single';
	$url = $gateway->row()->base_url.'/text/single';
	$login = $gateway->row()->api_key;
	//end Get gatetails

	//count num sms
	$nmsms = ceil(strlen($sms) / 153);
	
	//get recipients list
	if ($groupname == "all") {
		$phone_res = $this->Mdl_mysms->get_where_custom1('sms_recipient', 'userid', $this->session->userdata('user_id'));
	} else {
		$phone_res = $this->Mdl_mysms->get_where_custom2('sms_recipient', 'groupname', $groupname, 'userid', $this->session->userdata('user_id'));
	}
	$to = '';
	foreach ($phone_res->result() as $res){ $to = $to.'"'.$res->phone.'",';}
	$to = '['.trim($to,',').']';

	$smsBundle = $user->row()->bundle;
	$smsCredit = $user->row()->credit;
	if ($smsBundle > 0) {
		$unitCost = $smsCredit/ $smsBundle;
	} else {$unitCost = 0; }

	if (!$senderBtn == "") {
		if ((($phone_res->num_rows()*$nmsms) < $smsBundle)) {
			# code...
		        $senderid = $senderid;
		        $message = $sms;
				//count num sms
				$nmsms = ceil(strlen($message) / 153);
		        //send sms
		        //$res = "";
		        $res = $this->smsSender($senderid, $to, $message, $login, $url);
		        //end send sms
		        $sdata['sender'] = $senderid;
		        $sdata['recipient'] = $to;
		        $sdata['sms'] = $message;
		        $sdata['numsms'] = $nmsms;
		        $sdata['response'] = "OK";
		        $sdata['fullResponse'] = $res;
		        $sdata['userid'] = $userid;
		        $sdata['udate'] = mdate('%d/%m/%Y');
		        $this->_insert_tb('sms_logs', $sdata);

			//$data['msg']="An SMS has been sent to all recipients (".$phone_res->num_rows().") successifully !";
			$data['msg']='<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-info-circle"></i> Done!</h4> An SMS has been sent to all recipients ('.$phone_res->num_rows().') successifully ! </div>';
			$data['color']="blue";
			$smsRemained = $smsBundle - ($phone_res->num_rows()*$nmsms);
			$creditRemained = $smsRemained*$unitCost;
			$this->session->set_userdata('user_bundle', $smsRemained);
			$this->session->set_userdata('user_credit', $creditRemained);
			//update user table
			$udata['bundle'] = $smsRemained;
			$udata['credit'] = $creditRemained;
			$this->mysms->_update_tb('sms_user', $userid, $udata);
		} else {
			//$data['msg']="You do not have enough balance to send this SMS .";
			$data['msg']='<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-info-circle"></i> Failed!</h4> You do not have enough balance to send this SMS . </div>';
			$data['color']="red";
		}

	} else {
		$data['msg']="";
		$data['color']="";
	}

	$data['loginErr']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="smsSenderForm";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function sendSMS_OLD() {
	$senderBtn = $this->input->post('senderBtn', true);
	$groupname = $this->input->post('groupname', true);
	$userid = $this->session->userdata('user_id');
	$senderid = $this->input->post('senderid', true);
	$sms = $this->input->post('sms', true);
	$include_name = $this->input->post('include_name', true);
	$user =  $this->mysms->get_where_custom1('sms_user', 'id', $this->session->userdata('user_id'));
	$this->session->set_userdata('user_bundle', $user->row()->bundle);
	$this->session->set_userdata('user_credit', $user->row()->credit);
	 
	//count num sms
	$nmsms = ceil(strlen($sms) / 153);
	
	//get recipients list
	if ($groupname == "all") {
		$allRecipients = $this->mysms->get_where_custom1('sms_recipient', 'userid', $this->session->userdata('user_id'));
	} else {
		$allRecipients = $this->mysms->get_where_custom2('sms_recipient', 'groupname', $groupname, 'userid', $this->session->userdata('user_id'));
	}
	
	$smsBundle = $user->row()->bundle;
	$smsCredit = $user->row()->credit;
	if ($smsBundle > 0) {
		$unitCost = $smsCredit/ $smsBundle;
	} else {$unitCost = 0; }

	if (!$senderBtn == "") {
		if ((($allRecipients->num_rows()*$nmsms) < $smsBundle)) {
			# code...
			foreach ($allRecipients->result() as $recipient){
		        # code...
		        $senderid = $senderid;
		        $to = $recipient->phone;
		        $login = "";
		        if ($include_name) {
					    $message = "Habari ".$recipient->name.", ".$sms;
					     /*$message = "Habari ".$recipient->name.": \n".$sms;*/
					} else { $message = $sms; }
				/*echo $message;
				echo "<br>"; echo "<br>";*/
				//count num sms
				$nmsms = ceil(strlen($message) / 153);
		        
		        //echo "<br>"; echo $sms ;echo "<br>"; echo $senderid ;
		        $res = $this->smsSender($senderid, $to, $message, $login);
		        $sdata['sender'] = $senderid;
		        $sdata['recipient'] = $to;
		        $sdata['sms'] = $message;
		        $sdata['numsms'] = $nmsms;
		        $sdata['response'] = "OK";
		        $sdata['fullResponse'] = $res;
		        $sdata['userid'] = $userid;
		        $sdata['udate'] = mdate('%d/%m/%Y');
		        $this->_insert_tb('sms_logs', $sdata);
		    }
			$data['msg']="An SMS has been sent to all recipients (".$allRecipients->num_rows().") successifully !";
			$data['color']="blue";
			$smsRemained = $smsBundle - ($allRecipients->num_rows()*$nmsms);
			$creditRemained = $smsRemained*$unitCost;
			$this->session->set_userdata('user_bundle', $smsRemained);
			$this->session->set_userdata('user_credit', $creditRemained);
			//update user table
			$udata['bundle'] = $smsRemained;
			$udata['credit'] = $creditRemained;
			$this->mysms->_update_tb('sms_user', $userid, $udata);
		} else {
			# code...
			$availableSMS = $smsBundle;
			foreach ($allRecipients->result() as $recipient){
		        # code...
		        if ($smsBundle > 0) {
		        	$senderid = $senderid;
			        $to = $recipient->phone;
			       /* $message = $message;*/
			        $login = "";
			        if ($include_name) {
			        	$message = "Habari ".$recipient->name.", ".$sms;
			        	/*$message = "Habari ".$recipient->name.": \n".$sms;*/
			        } else { $message = $sms; }
			        //count num sms
					$nmsms = ceil(strlen($message) / 153);
			        //echo "<br>"; echo $sms ;echo "<br>"; echo $senderid ;
			        $res = $this->smsSender($senderid, $to, $message, $login);
			        //$res = "";
			        $sdata['sender'] = $senderid;
			        $sdata['recipient'] = $to;
			        $sdata['sms'] = $message;
			        $sdata['numsms'] = $nmsms;
			        $sdata['response'] = "OK";
			        $sdata['fullResponse'] = $res;
			        $sdata['userid'] = $userid;
			        $sdata['udate'] = mdate('%d/%m/%Y');
			        $this->_insert_tb('sms_logs', $sdata);
			        //$smsBundle = $smsBundle - 1;
			        $smsBundle = $smsBundle - $nmsms;
		        }
		    }
			$data['msg']="An SMS has been sent to few recipients (".$availableSMS.") successifully. Your bundle was not enough! !";
			$data['color']="red";
			$smsRemained = 0;
			$creditRemained = $smsRemained*$unitCost;
			$this->session->set_userdata('user_bundle', $smsRemained);
			$this->session->set_userdata('user_credit', $creditRemained);
			//update user table
			$udata['bundle'] = $smsRemained;
			$udata['credit'] = $creditRemained;
			$this->mysms->_update_tb('sms_user', $userid, $udata);
		}
		
		
	} else {
		$data['msg']="";
		$data['color']="";
	}

	$data['loginErr']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="smsSenderForm";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}


function senderIDRegistrationForm(){
	$data['loginErr']="";
	$data['msg']="";
	$data['color']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="senderIDRegistrationForm";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function senderIDRegSubmit(){
	$userid = $this->session->userdata('user_id');
	$sdata['userid'] = $userid;
	$sdata['senderid'] = $this->input->post('senderid', true);
	$sdata['status'] = "Pending";
	$sdata['notes'] = "";
	$sdata['requester'] = $this->input->post('requester', true);
	$sdata['name'] = $this->input->post('name', true);
	$sdata['location'] = $this->input->post('location', true);
	$sdata['title'] = $this->input->post('title', true);
	$sdata['address'] = $this->input->post('address', true);
	//$sdata['logo'] = $this->input->post('logo', true);
	$sdata['owner'] = $this->input->post('owner', true);
	$sdata['url'] = $this->input->post('url', true);
	$sdata['sms'] = $this->input->post('sms', true);
	$rdata['date'] = mdate('%Y-%m-%d');
	$rdata['udate'] = mdate('%Y-%m-%d');
	//upload logo
		$new_name = $sdata['senderid'];
		$config['upload_path']           = './uploads/senderid/logo/';
		$config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
		$config['max_size']             = 6048;
		$config['max_width']            = 6464;
		$config['max_height']           = 6464;
		$config['file_name'] = $new_name;
		$field_name = "logo";
		$this->load->library('upload',$config);
		$this->upload->do_upload($field_name);
		$data = array('upload_data' => $this->upload->data());
		$logo_name = $data['upload_data']['file_name'];
		$data['error'] = $this->upload->display_errors();
		if (!($data['error'] == "")) {
			$sdata['logo'] = "def.png";
		} else {$sdata['logo'] = $logo_name; }		
	//end logo upload
	//insert into DB
	$this->_insert_tb('sms_senderid', $sdata);

	$data['loginErr']="";
	$data['msg']='<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-info-circle"></i> Done!</h4> Sender ID Registration request has been submitted. Waiting for approval. </div>';
	$data['color']="blue";
	$data['middle_m']="Mysms";
	$data['middle_f']="senderIDRegistrationForm";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}


function addRecipient(){
	$data['loginErr']="";
	$data['msg']="";
	$data['color']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="addRecipient";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function submitRecipient() {
	$recipientBtn = $this->input->post('recipientBtn', true);
	$userid = $this->session->userdata('user_id');

	if (!$recipientBtn == "") {
		# code...
		$rdata['userid'] = $userid;
		$rdata['upid'] = mdate('%Y%m%d%H%i%s');
		$rdata['name'] = $this->input->post('name', true);
		$rdata['groupname'] = $this->input->post('groupname', true);
		$rdata['phone'] = $this->input->post('phone', true);
		$rdata['date'] = mdate('%d/%m/%Y');
		$this->mysms->_insert_tb('sms_recipient',$rdata);
		$data['msg']="The contact has been saved successifully !";
		$data['color']="blue";
	} else {
		# code...
		$data['msg']="";
		$data['color']="";
	}
	
	$data['loginErr']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="addRecipient";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function manageGroups() {
	$viewBtn = $this->input->post('viewBtn', true);
	$downBtn = $this->input->post('downBtn', true);
	$deleteBtn = $this->input->post('deleteBtn', true);
	$userid = $this->session->userdata('user_id');
	$data['groupRes'] = $this->get_col_where2('sms_recipient', 'groupname', 'userid', $this->session->userdata('user_id'));

	if (!$viewBtn == "") {
		# code...
		$group = $viewBtn;
		$this->session->set_userdata('groupname', $group);
		redirect('Mysms/manageRecipient');
		
		$data['msg']="!";
		$data['color']="blue";
	} elseif (!$deleteBtn == "") {
		# code...
		$group = $deleteBtn;
		$this->_delete_where_tb('sms_recipient', 'groupname', $group);

		$data['groupRes'] = $this->get_col_where2('sms_recipient', 'groupname', 'userid', $this->session->userdata('user_id'));
		$data['msg']="INFO: All recipients in a respective group have been deleted!";
		$data['color']="blue";
	} elseif (!$downBtn == "") {
		# code...
		$group = $downBtn;
		$this->session->set_userdata('groupname', $group);
		$phoneRes = $this->mysms->get_where_custom2('sms_recipient', 'groupname', $group, 'userid', $this->session->userdata('user_id'));
		//download all ...............
		$this->downPhoneExcel($phoneRes);

		$data['msg']="!";
		$data['color']="blue";
	} else {
		# code...
		$data['msg']="";
		$data['color']="";
	}
	
	$data['loginErr']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="manageGroups";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function manageRecipient(){
	$groupname = $this->session->userdata('groupname');
	//$data['recipientRes'] = $this->mysms->get_where_custom1('sms_recipient', 'userid', $this->session->userdata('user_id'));
	$data['allRespRes'] = $this->mysms->get_where_custom2('sms_recipient', 'groupname', $groupname, 'userid', $this->session->userdata('user_id'));
	$deleteBtn = $this->input->post('deleteBtn', true);
	$editBtn = $this->input->post('editBtn', true);
	$modifyBtn = $this->input->post('modifyBtn', true);

	//for pagination
   	$limit_per_page = 30;
   	//$start_index = 0;
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $limit = $limit_per_page;
   	//if (($start_index > 0)) {	$start_index = $start_index - 1 ; 	}
   	$start_index = ($start_index > 0) ? ($start_index - 1) : $start_index ;
    $offset = ($start_index * $limit_per_page);
   //end for pagination

    $data['recipientRes'] = $this->get_where_custom2_limit('sms_recipient', 'groupname', $groupname, 'userid', $this->session->userdata('user_id'), $limit, $offset);

	if (!$deleteBtn == "") {
		$id = $deleteBtn;
		$this->_delete_tb('sms_recipient', $id);
		$data['msg']="Record has been deleted completely. ";
		$data['color']="blue";
		//$data['recipientRes'] = $this->mysms->get_where_custom1('sms_recipient', 'userid', $this->session->userdata('user_id'));
		$data['recipientRes'] = $this->get_where_custom2_limit('sms_recipient', 'groupname', $groupname, 'userid', $this->session->userdata('user_id'), $limit, $offset);
	} else if (!$editBtn == "") {
		$data['msg']="";
		$data['color']="";
	} else if (!$modifyBtn == "") {
		$data['msg']="";
		$data['color']="";
	} else {
		$data['msg']="";
		$data['color']="";
	}
	$data['loginErr']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="manageRecipient";

	//pagination
		$total_records = $data['allRespRes']->num_rows();
        if ($total_records > 0)  {
        	 // get current page records
            $data["collegeRes"] = $data['recipientRes'];
            $config['base_url'] = base_url() . 'Mysms/manageRecipient/';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            // custom paging configuration
            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination ">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span >';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span>';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<span>';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = '<<';
            $config['prev_tag_open'] = '<span>';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<a style="background-color: #10C4EF; border-radius: 50%;"><b>';
            $config['cur_tag_close'] = '</b></a>';
 
            $config['num_tag_open'] = '<span >';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);
                 //
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
	//end paggination


	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function smsLogs(){
	$data['allLogsRes'] = $this->mysms->get_where_custom1('sms_logs', 'userid', $this->session->userdata('user_id'));
	//$data['smsRes'] = $this->mysms->get_where_custom1('sms_logs', 'userid', $this->session->userdata('user_id'));
	$deleteBtn = $this->input->post('deleteBtn', true);
	$data['loginErr']="";
	//for pagination
   	$limit_per_page = 30;
   	//$start_index = 0;
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $limit = $limit_per_page;
   	//if (($start_index > 0)) {	$start_index = $start_index - 1 ; 	}
   	$start_index = ($start_index > 0) ? ($start_index - 1) : $start_index ;
    $offset = ($start_index * $limit_per_page);
   //end for pagination

    $data['smsRes'] = $this->get_where_custom_limit('sms_logs', 'userid', $this->session->userdata('user_id'), $limit, $offset);

	if (!$deleteBtn == "") {
		$id = $deleteBtn;
		$this->_delete_tb('sms_logs', $id);
		$data['msg']="Record has been deleted completely. ";
		$data['color']="blue";
		//$data['smsRes'] = $this->mysms->get_where_custom1('sms_logs', 'userid', $this->session->userdata('user_id'));
		$data['smsRes'] = $this->get_where_custom_limit('sms_logs', 'userid', $this->session->userdata('user_id'), $limit, $offset);
	} else {
		$data['msg']="";
		$data['color']="";
	}
	
	$data['middle_m']="Mysms";
	$data['middle_f']="smsLogs";

	//pagination
		$total_records = $data['allLogsRes']->num_rows();
        if ($total_records > 0)  {
        	 // get current page records
            $data["collegeRes"] = $data['smsRes'] ;
            $config['base_url'] = base_url() . 'Mysms/smsLogs/';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            // custom paging configuration
            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination ">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span >';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span>';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<span>';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = '<<';
            $config['prev_tag_open'] = '<span>';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<a style="background-color: #10C4EF; border-radius: 50%;"><b>';
            $config['cur_tag_close'] = '</b></a>';
 
            $config['num_tag_open'] = '<span >';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);
                 //
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
	//end paggination

	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function smsSchedule(){
	$deleteBtn = $this->input->post('deleteBtn', true);
	$saveBtn = $this->input->post('saveBtn', true);
	$editBtn = $this->input->post('editBtn', true);
	$modifyBtn = $this->input->post('modifyBtn', true);
	$sendBtn = $this->input->post('sendBtn', true);
	$data['allRespRes'] = $this->mysms->get_where_custom2('sms_smstxt', 'status', "Saved", 'userid', $this->session->userdata('user_id'));
	//$data{'smsRes'} = $this->mysms->get_where_custom2('sms_smstxt', 'status', "Saved", 'userid', $this->session->userdata('user_id'));
	//for pagination
   	$limit_per_page = 30;
   	//$start_index = 0;
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $limit = $limit_per_page;
   	//if (($start_index > 0)) {	$start_index = $start_index - 1 ; 	}
   	$start_index = ($start_index > 0) ? ($start_index - 1) : $start_index ;
    $offset = ($start_index * $limit_per_page);
   //end for pagination

    $data['smsRes'] = $this->get_where_custom2_limit('sms_smstxt', 'status', "Saved", 'userid', $this->session->userdata('user_id'), $limit, $offset);

	if (!$saveBtn == "") {
		# code...
		$sdata['userid'] =  $this->session->userdata('user_id');
		$sdata['sms'] =  $this->input->post('sms', true);
		$sdata['numsms'] =   ceil(strlen($sdata['sms']) / 153);
		$sdata['date'] =  mdate('%Y/%m/%d');
		//save sms
		$this->_insert_tb('sms_smstxt', $sdata);

		$data['msg']="An SMS has been saved successifully !";
		$data['color']="blue";
		//$data{'smsRes'} = $this->mysms->get_where_custom2('sms_smstxt', 'status', "Saved", 'userid', $this->session->userdata('user_id'));
		$data['smsRes'] = $this->get_where_custom2_limit('sms_smstxt', 'status', "Saved", 'userid', $this->session->userdata('user_id'), $limit, $offset);
		$data['middle_m']="Mysms";
		$data['middle_f']="smsSchedule";
	} elseif (!$sendBtn == "") {
		# code...
		$id = $sendBtn;
		$data['msg']="";
		$data['color']="";
		$data['smsRes'] = $this->mysms->get_where_custom2('sms_smstxt', 'id', $id, 'userid', $this->session->userdata('user_id'));
		//$data['smsRes'] = $this->get_where_custom2_limit('sms_smstxt', 'status', "Saved", 'userid', $this->session->userdata('user_id'), $limit, $offset);
		$data['middle_m']="Mysms";
		$data['middle_f']="smsSenderForm2";
	} else if (!$editBtn == "") {
		# code...
		$id = $editBtn;
		$data['msg']="";
		$data['color']="";
		$data['middle_m']="Mysms";
		$data['middle_f']="smsSchedule";
	} else if (!$modifyBtn == "") {
		# code...
		$id = $modifyBtn;
	} else if (!$deleteBtn == "") {
		# code...
		$id = $deleteBtn;
		$sdata['status'] = "Deleted";
		$sdata['date'] = mdate('%Y/%m/%d');
		$this->_update_tb('sms_smstxt', $id, $sdata);
		$data['msg']="An SMS has been deleted successifully !";
		$data['color']="blue";
		//$data{'smsRes'} = $this->mysms->get_where_custom2('sms_smstxt', 'status', "Saved", 'userid', $this->session->userdata('user_id'));
		$data['smsRes'] = $this->get_where_custom2_limit('sms_smstxt', 'status', "Saved", 'userid', $this->session->userdata('user_id'), $limit, $offset);
		$data['middle_m']="Mysms";
		$data['middle_f']="smsSchedule";
	} else {
		# code...
		$data['msg']="";
		$data['color']="";
		$data['middle_m']="Mysms";
		$data['middle_f']="smsSchedule";
	}

	//pagination
		$total_records = $data['allRespRes']->num_rows();
        if ($total_records > 0)  {
        	 // get current page records
            $data["collegeRes"] = $data['smsRes'] ;
            $config['base_url'] = base_url() . 'Mysms/smsSchedule/';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            // custom paging configuration
            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination ">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span >';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span>';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<span>';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = '<<';
            $config['prev_tag_open'] = '<span>';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<a style="background-color: #10C4EF; border-radius: 50%;"><b>';
            $config['cur_tag_close'] = '</b></a>';
 
            $config['num_tag_open'] = '<span >';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);
                 //
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
	//end paggination
	
	$data['loginErr']="";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}


function buyCredit(){
	$data['loginErr']="";
	$data['msg']="";
	$data['color']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="buyCredit";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function smsPricing(){
	$data['priceRes'] = $this->mysms->get_tb('sms_pricing', 'id');
	$data['loginErr']="";
	$data['msg']="";
	$data['color']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="smsPricing";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function smsInvoice(){
	$data['loginErr']="";
	$data['msg']="";
	$data['color']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="smsInvoice";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}

function smsOffers(){
	$data['loginErr']="";
	$data['msg']="";
	$data['color']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="smsOffers";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}


function myAccount(){
	$changeBtn = $this->input->post('changeBtn', true);
	$pwrd1 = $this->input->post('pwrd1', true);
	$pwrd2 = $this->input->post('pwrd2', true);
	$cpwrd2 = $this->input->post('cpwrd2', true);
	$data['loginErr']="";
	if (!$changeBtn  == "") {
		# code...
		if ($pwrd1 == $this->session->userdata('user_pwrd')) {
			# code...
			if ($pwrd2 == $cpwrd2) {
				# code...
				$udata['password'] = $pwrd2;
				$this->_update_tb('sms_user', $this->session->userdata('user_id'), $udata);
				$data['msg']="Your password has been changed successifully.";
				$data['color']="blue";
			} else {
				$data['msg']="Passwords does not match. Try again";
				$data['color']="red";
			}
		} else {
			$data['msg']="Invalid current password. Try again";
			$data['color']="red";
		}

	} else {
		$data['msg']="";
	    $data['color']="";
	}
	
	$data['middle_m']="Mysms";
	$data['middle_f']="myAccount";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}


function search(){
	$data['loginErr']="";
	$data['msg']="";
	$data['color']="";
	$data['middle_m']="Mysms";
	$data['middle_f']="search";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}
}


function privacy(){
	$data['msg'] = "";
	$data['color']="";
	//redirect('Home/welcome');
	$this->load->view('privacy',$data);
}

function terms(){
	$data['msg'] = "";
	$data['color']="";
	//redirect('Home/welcome');
	$this->load->view('terms',$data);
}

function recipientsUp(){
	$uploadBtn = $this->input->post('uploadBtn', true);
	$downBtn =  $this->input->post('downBtn', true);

	if (!$uploadBtn == "") {
		# code... upload excel file
		/*$res = $this->get_tb('sms_recipient', 'id');
		if ($res->num_rows() > 0) {
			# code...
			$upID = ($res->row()->upid + 1);
		} else {
			$upID =1;
		}*/
		$upID = mdate('%Y%m%d%H%i%s');
		
		$this->uploadExcel($upID);
		$data['msg'] = "Upload Completed";
		$data['color'] = "blue";
		//$this->load->view('recipientsup',$data);
	} else if (!$downBtn == "") {
		//download sample file
		$data['msg'] = "";
		$data['color'] = "";
		$url = base_url('uploads/mysms/recipients_sample.xlsx');
		$path=base_url($url);
		$data = file_get_contents($path); // Read the file's contents
		$name = "recipients_sample.xlsx";
		force_download($name, $data);

	} else {
		# code...
		$data['msg'] = "";
		$data['color'] = "";
	}

		$data['middle_m']="Mysms";
		$data['middle_f']="addRecipient";
		if ($this->session->userdata('logged_in')) {
			if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
		} else {$this->load->view('Home/login',$data);}
	
	
}


private function uploadExcel($upID){
  //load excel library
  $this->load->library('excel');
     $configUpload['upload_path'] = './uploads/mysms/';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('excelFile'); 
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
         $file_name = $upload_data['file_name']; //uploded file name
     $extension=$upload_data['file_ext'];    // uploded file extension
     $data['uperr'] = $this->upload->display_errors();
     //prepare for upload
     $objReader= PHPExcel_IOFactory::createReader('Excel2007'); // For excel 2007     
         //Set to read only
         $objReader->setReadDataOnly(true);       
        //Load excel file
     	 $objPHPExcel=$objReader->load('./uploads/mysms/'.$file_name);    
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Number of rows avalable in excel        
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);   

         //loop btn data
         for($i=2; $i<=$totalrows; $i++){ 
              $A = $objWorksheet->getCellByColumnAndRow(0 ,$i)->getValue(); 
              $B = $objWorksheet->getCellByColumnAndRow(1 ,$i)->getValue(); 
              $C = $upID ;
              $D = mdate('%Y/%m/%d');
              $E = $this->session->userdata('user_id');
              $F = $objWorksheet->getCellByColumnAndRow(2 ,$i)->getValue(); 
              //$D = $objWorksheet->getCellByColumnAndRow(2 ,$i)->getValue(); if (!$C == "") { $C = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($C)); }
               
              $sViewData[] = array('name' => $A ,'phone' => $B , 'upid' => $C, 'date' => $D, 'userid' => $E,  'groupname' => $F );
              $sdata = array('name' => $A ,'phone' => $B , 'upid' => $C , 'date' => $D, 'userid' => $E,  'groupname' => $F );
        
        //insert po data into proj_po table
        if ( (!$A == "") && (!$B == "") && (!$C == "") ) {
          # code...
          $this->_insert_tb('sms_recipient', $sdata);
        }
        
      }
     unlink('././uploads/mysms/'.$file_name); //File Deleted After uploading in database .                   

  return $sViewData;
}


/*========================== USER MANAGEMENT (ADMIN) ==================*/
function manageUsers() {
	$data['allUsersRes'] = $this->get_tb('sms_user', 'id');

	//for pagination
   	$limit_per_page = 30;
   	//$start_index = 0;
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $limit = $limit_per_page;
   	//if (($start_index > 0)) {	$start_index = $start_index - 1 ; 	}
   	$start_index = ($start_index > 0) ? ($start_index - 1) : $start_index ;
    $offset = ($start_index * $limit_per_page);
   //end for pagination

    $data['sysusersRes'] = $this->get_with_limit_tb('sms_user', $limit, $offset, 'id');

	

		$data['msg'] = "";
		$data['color'] = "";

	$data['middle_m']="Mysms";
	$data['middle_f']="manageUsers";

	//pagination
		$total_records = $data['allUsersRes']->num_rows();
        if ($total_records > 0)  {
        	 // get current page records
            $data["collegeRes"] = $data['sysusersRes'];
            $config['base_url'] = base_url() . 'Mysms/manageUsers/';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            // custom paging configuration
            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination ">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span >';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span>';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<span>';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = '<<';
            $config['prev_tag_open'] = '<span>';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<a style="background-color: #10C4EF; border-radius: 50%;"><b>';
            $config['cur_tag_close'] = '</b></a>';
 
            $config['num_tag_open'] = '<span >';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);
                 //
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
	//end paggination

	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}

}

function manageCodes() {
	//$data['codesRes'] = $this->get_tb('sms_bundle', 'id');
	$data['codesRes'] = $this->get_where_custom1('sms_bundle', 'status', 'Available');

		$data['msg'] = "";
		$data['color'] = "";

	$data['middle_m']="Mysms";
	$data['middle_f']="manageCodes";
	if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('user_role') == "admin") {  $this->load->view('Mysms/index_a',$data);   } else if ($this->session->userdata('user_role') == "admin2") {    $this->load->view('Mysms/index_a2',$data);    } else if ($this->session->userdata('user_role') == "Normal") {    $this->load->view('Mysms/index',$data);    } else {    $this->load->view('Mysms/index',$data);    }
	} else {$this->load->view('Home/login',$data);}

}


//DOWNLOAD site ORDERS MULT EXCLE SHEETS
function downPhoneExcel($dbres){
//load our new PHPExcel library
$this->load->library('excel');  
//Dashboard (sheet 1)
$this->excel->setActiveSheetIndex(0);
//ORDERS SHEET
$group = $this->session->userdata('groupname');
$h1 = "SMS RECIPIENTS (".$group.")";
$h2 = "(Confidential Information)";
// Results (sheet 2)
/*$this->excel->createSheet();
$this->excel->setActiveSheetIndex(1);*/
//Format second sheet
$this->excel->getActiveSheet()->setTitle('recipients');
$this->excel->getActiveSheet()->getStyle('A1:C1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('F4B083');
$this->excel->getActiveSheet()->getStyle('A2:C2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('F4B083');
$this->excel->getActiveSheet()->setCellValue('A1', strtoupper($h1));
$this->excel->getActiveSheet()->setCellValue('A2', strtoupper($h2));
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$this->excel->getActiveSheet()->getStyle('A4:C4')->getFont()->setBold(true);
$this->excel->getActiveSheet()->mergeCells('A1:C1');
$this->excel->getActiveSheet()->mergeCells('A2:C2');
$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

//set aligment to center for that merged cell (A1 to D1)
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//set sheet title
$this->excel->getActiveSheet()->getStyle('A4:C4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF5733');
  
$this->excel->getActiveSheet()->setCellValue('A4', 'FULL NAME');
$this->excel->getActiveSheet()->setCellValue('B4', 'PHONE NUMBER');
$this->excel->getActiveSheet()->setCellValue('C4', 'GROUP');

//Print data from db
$count = 5;
$index = 1;
foreach ($dbres->result() as $row){ 
                                  
  $this->excel->getActiveSheet()->setCellValue('A'.$count, $row->name);
  $this->excel->getActiveSheet()->setCellValue('B'.$count, $row->phone );
  $this->excel->getActiveSheet()->setCellValue('C'.$count, $row->groupname );
  
$count++;
$index ++;
}


$filename='recipients.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
            
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');

}
/*=========================== END USER MANAGEMENT (ADMIN) ================*/

/*==================== SMS SENDER================*/
public function smsSender($senderid, $to, $message, $login, $url){
    $send='{  
      "from":"'.$senderid.'",
      "to":'.$to.',
      "text":"'.$message.'"
    }';

    $sms = curl_init($url);
    curl_setopt( $sms, CURLOPT_POST, 1);
    curl_setopt( $sms, CURLOPT_POSTFIELDS, $send);
    curl_setopt( $sms, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $sms, CURLOPT_HTTPHEADER,array (
    'Authorization: '.$login.'',
    'Content-Type: application/json',
    'accept: application/json',
    ));
    curl_setopt( $sms, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($sms);
    return $response;
    //echo $response;
}

public function smsSender_OLD($senderid, $to, $message, $login){
 //MakaziC:makazi@123 (TWFrYXppQzptYWthemlAMTIz)
    //Malikita16:malikita16@123 (TWFsaWtpdGExNjptYWxpa2l0YTE2QDEyMw==)
  # code...
  $phone=$to;
  $textSMS=$message;
  $makaziCpwrd = 'TWFrYXppQzptYWthemlAMTIz';
  $malikita16pwrd = 'TWFsaWtpdGExNjptYWxpa2l0YTE2QDEyMw==';

  if ($this->session->userdata('user_email') == "info.makaziconsult@gmail.com") {
  	# code...
  	$login = $makaziCpwrd;
  } else {
    $login = $malikita16pwrd;
  }
  
    $url='api.infobip.com/sms/1/text/single';

    $send='{  
      "from":"'.$senderid.'",
      "to":"'.$phone.'",
      "text":"'.$textSMS.'"
    }';

    $sms = curl_init($url);
    curl_setopt( $sms, CURLOPT_POST, 1);
    curl_setopt( $sms, CURLOPT_POSTFIELDS, $send);
    curl_setopt( $sms, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $sms, CURLOPT_HTTPHEADER,array (
    'Authorization: Basic '.$login.'',
    'Content-Type: application/json',
    'accept: application/json',
    ));
    curl_setopt( $sms, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($sms);
    return $response;
    //echo $response;
    /*http://localhost/diioLab/Mysms/smsSender/DIIO/255784670270/This%20is%20a%20test%20sms*/
    /*{"messages":[{"to":"255784670270","status":{"groupId":1,"groupName":"PENDING","id":7,"name":"PENDING_ENROUTE","description":"Message sent to next instance"},"smsCount":1,"messageId":"2349309575151630631"}]}*/

    //TEST URLS
    //https://api.infobip.com/sms/1/text/query?username=MakaziC&password=makazi@123&to=255784670270,255752194092&text=Testing MakaziConst Sender
     //https://api.infobip.com/sms/1/text/query?username=Malikita16&password=malikita16@123&to=255784670270,255752194092&text=Testing SAFARFITNES Sender
  
}
/*==================== END SMS SENDER================*/


/*==================== EMAIL SENDER================*/
function emailSender($recepient, $subject, $message){
        $snet=false;
        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'sic.info17@gmail.com', // change it to yours
          'smtp_pass' => 'System.123', // change it to yours
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );

          $message = $message;
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('sic.info17@gmail.com','SIC'); // change it to yours
          $this->email->to($recepient);// change it to yours
          $this->email->subject($subject);
          $this->email->message($message);
        if($this->email->send()){
            $sent=true;
            return $sent;
         }
         else{
            show_error($this->email->print_debugger());
        }
}

/*==================== END EMAIL SENDER================*/












/*================== BLK SMS ===================*/



//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function get($order_by) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where($id);
return $query;
}

function get_where_email($email) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where_email($email);
return $query;
}
function get_all($tb) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_all($tb);
return $query;
}


function get_col_where($tb, $col) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_col_where($tb, $col);
return $query;
}


function get_col_where2($tb, $col, $col1, $val1) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_col_where2($tb, $col, $col1, $val1);
return $query;
}

function get_col_where3($tb, $col, $col1, $val1, $col2, $val2) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_col_where3($tb, $col, $col1, $val1, $col2, $val2);
return $query;
}


function get_where_custom($col, $value) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where_custom($col, $value);
return $query;
}

function get_where_custom1($tb, $col1, $value1) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where_custom1($tb, $col1, $value1);
return $query;
}

function get_where_custom2($tb, $col1, $value1, $col2, $value2) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where_custom2($tb, $col1, $value1, $col2, $value2);
return $query;
}

function get_where_custom3($tb, $col1, $value1, $col2, $value2, $col3, $value3) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where_custom3($tb, $col1, $value1, $col2, $value2, $col3, $value3) ;
return $query;
}

function get_where_custom4($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where_custom4($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4) ;
return $query;
}


function _insert($data) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_insert($data);
}

function _update($id, $data) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_update($id, $data);
}

function _update2($tb, $col, $value, $data) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_update2($tb, $col, $value, $data);
}

function _delete($id) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_delete($id);
}

function count_where($column, $value) {
$this->load->model('Mdl_mysms');
$count = $this->Mdl_mysms->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('Mdl_mysms');
$max_id = $this->Mdl_mysms->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->_custom_query($mysql_query);
return $query;
}


//CODES
function getcode($order_by) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->getcode($order_by);
return $query;
}

function getcode_where($col,$code) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->getcode_where($col,$code);
return $query;
}

function getcode_wherenot($col,$code) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->getcode_wherenot($col,$code);
return $query;
}

function _insertcode($data) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_insertcode($data);
}

function _updatecode($col,$code, $data){
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_updatecode($col,$code, $data);
}



/*=============  pagination =============*/
function get_with_limit_tb($tb, $limit, $offset, $order_by) {
	$this->load->model('Mdl_mysms');
	$query = $this->Mdl_mysms->get_with_limit_tb($tb, $limit, $offset, $order_by) ;
	return $query;
}
function get_where_custom_limit($tb, $col, $value, $limit, $offset) {
	$this->load->model('Mdl_mysms');
	$query = $this->Mdl_mysms->get_where_custom_limit($tb, $col, $value, $limit, $offset);
	return $query;
}
function get_where_custom2_limit($tb, $col1, $value1, $col2, $value2, $limit, $offset) {
	$this->load->model('Mdl_mysms');
	$query = $this->Mdl_mysms->get_where_custom2_limit($tb, $col1, $value1, $col2, $value2, $limit, $offset);
	return $query;
}
function get_where_custom3_limit($tb, $col1, $value1, $col2, $value2, $col3, $value3, $limit, $offset) {
	$this->load->model('Mdl_mysms');
	$query = $this->Mdl_mysms->get_where_custom3_limit($tb, $col1, $value1, $col2, $value2, $col3, $value3, $limit, $offset) ;
	return $query;
}

function get_where_custom4_limit($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4, $limit, $offset) {
	$this->load->model('Mdl_mysms');
	$query = $this->Mdl_mysms->get_where_custom4_limit($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4, $limit, $offset) ;
	return $query;
}

function get_where_custom5_limit($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4, $col5, $value5, $limit, $offset) {
	$this->load->model('Mdl_mysms');
	$query = $this->Mdl_mysms->get_where_custom5_limit($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4, $col5, $value5, $limit, $offset) ;
	return $query;
}
/*==============end pagnation ==============*/


//xxxxxxxxxxxxxxxxxxxxxxx MULT TABLE XXXXXXXXXXXXXXXX
function get_tb($tb, $order_by) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_tb($tb, $order_by);
return $query;
}

function _insert_tb($tb,$data) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_insert_tb($tb,$data);
}

function _update_tb($tb, $id, $data) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_update_tb($tb,$id, $data);
}   

function _delete_tb($tb, $id) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_delete_tb($tb, $id);
}

function _delete_where_tb($tb, $col, $val) {
$this->load->model('Mdl_mysms');
$this->Mdl_mysms->_delete_where_tb($tb, $col, $val);
}

function get_where_tb($tb, $id) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where_tb($tb, $id);
return $query;
}

function get_where_custom_tb($tb, $col, $value) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->get_where_custom_tb($tb, $col, $value);
return $query;
}

function count_all_tb($tb) {
$this->load->model('Mdl_mysms');
$query = $this->Mdl_mysms->count_all_tb($tb);
return $query;
}


}