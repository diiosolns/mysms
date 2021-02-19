<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mauzo extends MX_Controller
{

function __construct() {
parent::__construct();
		$this->load->helper('date');
		$this->load->helper('download');
		$this->load->helper('text');
		//modules
		$this->load->module('Home');
		$this->load->module('Users');
		$this->load->module('Admin');
		$this->load->module('Mauzo');
		$this->load->module('Matumizi');
}



function index(){
	$data['msg'] = "";
	redirect('Home/welcome');
	//$this->load->view('Home/login',$data);
}



function privacy(){
	$data['msg'] = "";
	//redirect('Home/welcome');
	$this->load->view('privacy',$data);
}

function terms(){
	$data['msg'] = "";
	//redirect('Home/welcome');
	$this->load->view('terms',$data);
}









/*========================================== MATUMIZI ===================================*/











function uploadForm(){

	$data['middle_m']="Admin";
	$data['middle_f']="upload";
	$data['right_m']="Users";
	$data['right_f']="profile";
	if ($this ->session->userdata('logged_in') && ($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index',$data);
	} else if ($this ->session->userdata('logged_in') && !($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index2',$data);
	}
		
}

function get_work_data_from_post(){
	//new name for an image
	$new_name = ($this->showcase->get_max('image') +1)."";
	//upload images
		// first image
		$config['upload_path']          = './assets/uploads/images/1/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $config['file_name'] = $new_name;
        $field_name = "artImg";
        $this->load->library('upload',$config);
        $this->upload->do_upload($field_name);
        $data1 = array('upload_data1' => $this->upload->data());
        $artImage_name = $data1['upload_data1']['file_name'];
		$data['artimgsms']= $this->upload->display_errors();

		//second img
		$config2['upload_path']           = './assets/uploads/images/2/';
        $config2['allowed_types']        = 'gif|jpg|png';
        $config2['max_size']             = 1000;
        $config2['max_width']            = 1024;
        $config2['max_height']           = 1024;
        $config2['file_name'] = $new_name;
        $field_name2 = "img2";
       // if (isset($_FILES['image']['img2'])) {
        	# code...
        	 $this->upload->initialize($config2);
	        $this->upload->do_upload($field_name2);
	        $data2 = array('upload_data2' => $this->upload->data());
	        $artImage_name2 = $data2['upload_data2']['file_name'];
			//$data['artimgsms']= $this->upload->display_errors();

       // }
       
		//third img
		$config3['upload_path']           = './assets/uploads/images/3/';
        $config3['allowed_types']        = 'gif|jpg|png';
        $config3['max_size']             = 1000;
        $config3['max_width']            = 1024;
        $config3['max_height']           = 1024;
        $config3['file_name'] = $new_name;
        $field_name3 = "img3";
       // if (($this->input->post('img3') == $_FILES['img3'])) {
        	# code...
	        $this->upload->initialize($config3);
	        $this->upload->do_upload($field_name3);
	        $data3 = array('upload_data3' => $this->upload->data());
	        $artImage_name3 = $data3['upload_data3']['file_name'];
			//$data['artimgsms']= $this->upload->display_errors();
		//}

		//fourth img
		$config4['upload_path']           = './assets/uploads/images/4/';
        $config4['allowed_types']        = 'gif|jpg|png';
        $config4['max_size']             = 1000;
        $config4['max_width']            = 1024;
        $config4['max_height']           = 1024;
        $config4['file_name'] = $new_name;
        $field_name4 = "img4";
        //if (($this->input->post('img4') == $_FILES['img4'])) {
        	# code...
	        $this->upload->initialize($config4);
	        $this->upload->do_upload($field_name4);
	        $data4 = array('upload_data4' => $this->upload->data());
	        $artImage_name4 = $data4['upload_data4']['file_name'];
			//$data['artimgsms']= $this->upload->display_errors();
		//}


		# code...
		//collect data ands upload work and image
		$dbdata['heading']=$this->input->post('heading',true);
		$dbdata['category']=$this->input->post('cat',true);
		$dbdata['sub_category']=$this->input->post('subcat',true);
		$dbdata['description']=$this->input->post('imgdesc',true);
		$dbdata['image_name']= $artImage_name;
		$dbdata['owner'] = $this->session->userdata('user_id');
		//$dbdata['owner'] = 1;
		$dbdata['date'] = mdate('%m/%d/%Y');


	return $dbdata;
}


function uploadWork(){
	//new name for an image
	$new_name = ($this->showcase->get_max('image') +1)."";
	//upload images
		// first image
		$config['upload_path']          = './assets/uploads/images/1/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $config['file_name'] = $new_name;
        $field_name = "artImg";
        $this->load->library('upload',$config);
        $this->upload->do_upload($field_name);
        $data1 = array('upload_data1' => $this->upload->data());
        $artImage_name = $data1['upload_data1']['file_name'];
		$data['artimgsms']= $this->upload->display_errors();


		//second img
		$config2['upload_path']           = './assets/uploads/images/2/';
        $config2['allowed_types']        = 'gif|jpg|png';
        $config2['max_size']             = 1000;
        $config2['max_width']            = 1024;
        $config2['max_height']           = 1024;
        $config2['file_name'] = $new_name;
        $field_name2 = "img2";
       // if (isset($_FILES['image']['img2'])) {
        	# code...
        	 $this->upload->initialize($config2);
	        $this->upload->do_upload($field_name2);
	        $data2 = array('upload_data2' => $this->upload->data());
	        $artImage_name2 = $data2['upload_data2']['file_name'];
			//$data['artimgsms']= $this->upload->display_errors();

       // }
       
		//third img
		$config3['upload_path']           = './assets/uploads/images/3/';
        $config3['allowed_types']        = 'gif|jpg|png';
        $config3['max_size']             = 1000;
        $config3['max_width']            = 1024;
        $config3['max_height']           = 1024;
        $config3['file_name'] = $new_name;
        $field_name3 = "img3";
       // if (($this->input->post('img3') == $_FILES['img3'])) {
        	# code...
	        $this->upload->initialize($config3);
	        $this->upload->do_upload($field_name3);
	        $data3 = array('upload_data3' => $this->upload->data());
	        $artImage_name3 = $data3['upload_data3']['file_name'];
			//$data['artimgsms']= $this->upload->display_errors();
		//}
		//fourth img
		$config4['upload_path']           = './assets/uploads/images/4/';
        $config4['allowed_types']        = 'gif|jpg|png';
        $config4['max_size']             = 1000;
        $config4['max_width']            = 1024;
        $config4['max_height']           = 1024;
        $config4['file_name'] = $new_name;
        $field_name4 = "img4";
        //if (($this->input->post('img4') == $_FILES['img4'])) {
        	# code...
	        $this->upload->initialize($config4);
	        $this->upload->do_upload($field_name4);
	        $data4 = array('upload_data4' => $this->upload->data());
	        $artImage_name4 = $data4['upload_data4']['file_name'];
			//$data['artimgsms']= $this->upload->display_errors();
		//}



	if ($data['artimgsms'] == "") {
		# code...
		//collect data and upload work and image
		$dbdata['heading']=$this->input->post('heading',true);
		$dbdata['category']=$this->input->post('cat',true);
		$dbdata['sub_category']=$this->input->post('subcat',true);
		$dbdata['description']=$this->input->post('imgdesc',true);
		$dbdata['image_name']= $artImage_name;
		$dbdata['owner'] = $this->session->userdata('user_id');
		//$dbdata['owner'] = 1;
		$dbdata['date'] = mdate('%m/%d/%Y');
		$this->_insert_tb('image',$dbdata);
		//echo $this->_insert_tb('image',$dbdata);
		$data['middle_f']="successmsg";
	} else {
		# code...
		$data['middle_f']="failmsg";
	}
	

	$data['middle_m']="Admin";
	$data['right_m']="Users";
	$data['right_f']="profile";
	if ($this ->session->userdata('logged_in') && ($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index',$data);
	} else if ($this ->session->userdata('logged_in') && !($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index2',$data);
	}
}


function successFail(){
	$btn = $this->input->post('goBtn', true);

	if ($btn == "view") {
		# code...
		$this-> manageMyWorks();
	} else if ($btn == "upload") {
		# code...
		$this->uploadForm();
	}

	//$a = $this->uri->segment(3);
	//echo $a;
	
}

function manageMyWorks(){
	//get user images from db
	$id = $this->session->userData('user_id');
	$col = "owner";
	$tb = "image";
	$data['myWorks'] = $this->get_where_custom_tb($tb, $col,$id );

	if ($data['myWorks']->num_rows() == 0) {
		# code...
		$data['middle_f']="noData";
	} else {
		# code...
		$data['middle_f']="myWorks";
	}
	
	$data['middle_m']="Admin";
	$data['right_m']="Users";
	$data['right_f']="profile";
	if ($this ->session->userdata('logged_in') && ($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index',$data);
	} else if ($this ->session->userdata('logged_in') && !($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index2',$data);
		//echo $this->session->userdata('user_email');
	}

}

function manageWorks(){
	$editBtn = $this->input->post('editBtn',true);
	$delBtn = $this->input->post('deleteBtn',true);


	//get all user data
	//$id = 3;
	$id = $this->session->userdata('user_id');
	$data['userInfo'] = $this->get_where($id);

	$data['middle_m']="Admin";
	$data['middle_f']="myWorks";
	$data['right_m']="Users";
	$data['right_f']="profile";
	if ($this ->session->userdata('logged_in') && ($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index',$data);
	} else if ($this ->session->userdata('logged_in') && !($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index2',$data);
	}

}


function editMyWork(){
	$editBtn = $this->input->post('editBtn',true);
	$delBtn = $this->input->post('deleteBtn',true);
	$edit = $this->input->post('edit',true);
	
	//get all user data
	//$id = 3;
	$id = $editBtn;
	$tb = "image";
	$data['artInfo'] = $this->get_where_tb($tb, $id);

	if ($edit == "ok") {
		# code...
		$tb = "image";
		$id = $this->session->userdata('artid');
		$mydata = $this->get_work_data_from_post();
		$this->_update_tb($tb, $id, $mydata);
		$data['middle_f']="successmsg";

	} else if (!$delBtn == "") {
		# code...
		$id = $delBtn;
		$this->_delete_tb($tb, $id);
		//display works
		$this->manageMyWorks();

	} else{
		$this->session->set_userdata('artid',$editBtn);
		$data['middle_f']="editmywork";
	}
	

		$data['success_msg'] = "";
		$data['middle_m']="Admin";
		$data['right_m']="Users";
		$data['right_f']="profile";
		if ($this ->session->userdata('logged_in') && ($this ->session->userdata('user_role')=="admin")) {
			# code...
			$this->load->view('Admin/index',$data);
		} else if ($this ->session->userdata('logged_in') && !($this ->session->userdata('user_role')=="admin")) {
			# code...
			$this->load->view('Admin/index2',$data);
		}

}


function aboutus(){

		$data['middle_m']="Admin";
		$data['middle_f']="about";
		$data['right_m']="Users";
		$data['right_f']="profile";
		if ($this ->session->userdata('logged_in') && ($this ->session->userdata('user_role')=="admin")) {
		# code...
		$this->load->view('Admin/index',$data);
		} else if ($this ->session->userdata('logged_in') && !($this ->session->userdata('user_role')=="admin")) {
			# code...
			$this->load->view('Admin/index2',$data);
		}


}

function search(){
	$data['searchwrd'] = $this->input->post('keytxt',true);

		$data['middle_m']="Admin";
		$data['middle_f']="search";
		$data['right_m']="Users";
		$data['right_f']="profile";
		if ($this ->session->userdata('logged_in') && ($this ->session->userdata('user_role')=="admin")) {
			# code...
			$this->load->view('Admin/index',$data);
		} else if ($this ->session->userdata('logged_in') && !($this ->session->userdata('user_role')=="admin")) {
			# code...
			$this->load->view('Admin/index2',$data);
		}

}


function developer(){
		$data['middle_m']="Home";
		$data['middle_f']="developer";
		$data['right_m']="Users";
		$data['right_f']="profile";
		if ($this ->session->userdata('logged_in') && ($this ->session->userdata('user_role')=="admin")) {
			# code...
			$this->load->view('Admin/index',$data);
		} else if ($this ->session->userdata('logged_in') && !($this ->session->userdata('user_role')=="admin")) {
			# code...
			$this->load->view('Admin/index2',$data);
		}

}






























//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function adminHome(){
$isLoggedin=$this->session->userdata('logged_in');
if ($isLoggedin) {

	$col='no';
	$value='no';
	//$data['result']= $this->users->get_where_custom($col,$value);
	$data['result']= $this->users->get('id');

	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Admin";
		$data['right_file']="user_list";
		
		$this->load->view('Admin/index',$data);

//if not logged in
} else {
	redirect('Home/notLoggedin');
	}
}

function buyingUsers(){
	$col='buying';
	$value='yes';
	$data['result']= $this->users->get_where_custom($col,$value);
	//$data['result']= $this->users->get('id');

	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Admin";
		$data['right_file']="buying_list";
		
		$this->load->view('Admin/index',$data);
}

function uploadQns(){
	//put upload codes here
	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Upload";
		$data['right_file']="qnUpload_sheet";
		
		$this->load->view('Admin/index',$data);
}

function uploadNotes(){
	//put upload codes here
	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Upload";
		$data['right_file']="notesUpload_sheet";
		
		$this->load->view('Admin/index',$data);
}

//generate purchase, receipt and verification codes
function generateCode(){
	$this->load->helper('string');
	$string=$this->input->post('codestr',true);
	$btn=$this->input->post('select_btn',true);
	if ($btn=='code') {	
		for ($i=0; $i < 100 ; $i++) { 
		$pcode=random_string('alnum',6);
		$rcode=random_string('numeric',6);
		$vercode=random_string('nozero',4);

		//chech if available
		$pcodeInbd=$this->getcode_where('pcode',$pcode)->num_rows();
		$rcodeInbd=$this->getcode_where('rcode',$rcode)->num_rows();
		$vercodeInbd=$this->getcode_where('vercode',$vercode)->num_rows();
		if (($pcodeInbd==0)&&($pcodeInbd==0)&&($pcodeInbd==0)) {
			//insert codes to the database
			$data['pcode']=$pcode;
			$data['rcode']=$rcode;
			$data['vercode']=$vercode;
			$this->_insertcode($data);
		} 
	}
	//call home page
	$this->adminHome();
	} else {
		//call view
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Admin";
		$data['right_file']="create_code";
		$this->load->view('Admin/index',$data);
	}
	
}

function about(){
	//put upload codes here
	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Admin";
		$data['right_file']="about";
		
		$this->load->view('Admin/index',$data);
}


function examsView(){
	
	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Exam";
		$data['right_file']="pending";
		
		$this->load->view('Admin/index',$data);
}

function notesView(){
	
	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Notes";
		$data['right_file']="pending";
		
		$this->load->view('Admin/index',$data);
}

function schoolsView(){
	
	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Notes";
		$data['right_file']="pending";
		
		$this->load->view('Admin/index',$data);
}

function paymentsView(){
	
	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Payments";
		$data['right_file']="pending";
		
		$this->load->view('Admin/index',$data);
}

function goHome(){
	redirect('Home');
}


function allResults(){
	$tb = "result_tb";
	$data['nameRes'] = $this->get_col_where($tb, 'name');
	$data['classRes'] = $this->get_col_where($tb, 'class');
	$data['subRes'] = $this->get_col_where($tb, 'subject');
	$data['dateRes'] = $this->get_col_where($tb, 'date');

	$datestring = " %d / %m / %Y ";
	$data['date']=mdate($datestring);

	$name = $this->input->post('name',true);
	$class = $this->input->post('class',true);
	$sub = $this->input->post('sub',true);
	$day = $this->input->post('date',true);
	$filterBtn = $this->input->post('filterBtn',true);
	$saveBtn = $this->input->post('saveBtn',true);

	if ($filterBtn == "ok") {
		# code...
		if (($name=="all")&&($class=="all")&&($sub=="all")&&($day=="all")) {
				# code...
			$data['results'] = $this->get_all($tb);
			$data['heading'] = "ALL RESULTS";
				//$data['results'] = $this->get_where_custom2($tb, 'class', $class, 'name', $data['name']);
			}else if ((!($name=="all"))&&($class=="all")&&($sub=="all")&&($day=="all")) {
				$data['results'] = $this->get_where_custom1($tb, 'name', $name);
				$data['heading'] = $name." ALL RESULTS";
			}else if (($name=="all")&&(!($class=="all"))&&($sub=="all")&&($day=="all")) {
				$data['results'] = $this->get_where_custom1($tb, 'class', $class);
				$data['heading'] = $class." ALL RESULTS";
			}else if (($name=="all")&&($class=="all")&&(!($sub=="all"))&&($day=="all")) {
				$data['results'] = $this->get_where_custom1($tb, 'subject', $sub);
				$data['heading'] = $sub." ALL RESULTS";
			}else if (($name=="all")&&($class=="all")&&($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom1($tb, 'date', $day);
				$data['heading'] = $day." ALL RESULTS";
			}else if (!($name=="all")&&!($class=="all")&&($sub=="all")&&(($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'name', $name, 'class', $class);
				$data['heading'] = $name." ALL RESULTS";
			}else if (($name=="all")&&!($class=="all")&&!($sub=="all")&&(($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'subject', $sub, 'class', $class);
				$data['heading'] = $class." ".$sub." ALL DAYS RESULTS";
			}else if (($name=="all")&&($class=="all")&&!($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'subject', $sub, 'date', $day);
				$data['heading'] = $sub." ".$day."ALL CLASSES RESULTS";
			}else if (($name=="all")&&!($class=="all")&&($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'class', $class, 'date', $day);
				$data['heading'] = $class." ".$day." ALL SUBJECTS RESULTS";
			}else if (!($name=="all")&&($class=="all")&&!($sub=="all")&&(($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'name', $name, 'subject', $sub);
				$data['heading'] = $name." ".$sub."  RESULTS";
			}else if (!($name=="all")&&!($class=="all")&&!($sub=="all")&&(($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'name', $name, 'class', $class, 'subject', $sub);
				$data['heading'] = $name." ".$class." ".$sub."  RESULTS";
			}else if (($name=="all")&&!($class=="all")&&!($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'date', $day, 'class', $class, 'subject', $sub);
				$data['heading'] = $class." ".$sub." ".$day."  RESULTS";
			}else if (!($name=="all")&&!($class=="all")&&($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'name', $name, 'class', $class, 'date', $day);
				$data['heading'] = $name." ".$class." ".$day."  RESULTS";
			}else if (!($name=="all")&&($class=="all")&&!($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'name', $name, 'date', $day, 'subject', $sub);
				$data['heading'] = $name." ".$sub." ".$day."  RESULTS";
			}
			else if (!($name=="all")&&!($class=="all")&&!($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'name', $name, 'class', $class, 'subject', $sub, 'date', $day);
				$data['heading'] = $name." ".$class." ".$sub."  RESULTS";
			}
			else {
				$data['heading'] = "DATA NOT FOUND";
				$data['results'] = $this->get_where_custom1($tb, 'subject', "empty");
			}

		}else if ($filterBtn == "save") {
			# code...
			if (($name=="all")&&($class=="all")&&($sub=="all")&&($day=="all")) {
				# code...
			$data['results'] = $this->get_all($tb);
			$data['heading'] = "ALL RESULTS";
				//$data['results'] = $this->get_where_custom2($tb, 'class', $class, 'name', $data['name']);
			}else if ((!($name=="all"))&&($class=="all")&&($sub=="all")&&($day=="all")) {
				$data['results'] = $this->get_where_custom1($tb, 'name', $name);
				$data['heading'] = $name." ALL RESULTS";
			}else if (($name=="all")&&(!($class=="all"))&&($sub=="all")&&($day=="all")) {
				$data['results'] = $this->get_where_custom1($tb, 'class', $class);
				$data['heading'] = $class." ALL RESULTS";
			}else if (($name=="all")&&($class=="all")&&(!($sub=="all"))&&($day=="all")) {
				$data['results'] = $this->get_where_custom1($tb, 'subject', $sub);
				$data['heading'] = $sub." ALL RESULTS";
			}else if (($name=="all")&&($class=="all")&&($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom1($tb, 'date', $day);
				$data['heading'] = $day." ALL RESULTS";
			}else if (!($name=="all")&&!($class=="all")&&($sub=="all")&&(($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'name', $name, 'class', $class);
				$data['heading'] = $name." ALL RESULTS";
			}else if (($name=="all")&&!($class=="all")&&!($sub=="all")&&(($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'subject', $sub, 'class', $class);
				$data['heading'] = $class." ".$sub." ALL DAYS RESULTS";
			}else if (($name=="all")&&($class=="all")&&!($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'subject', $sub, 'date', $day);
				$data['heading'] = $sub." ".$day."ALL CLASSES RESULTS";
			}else if (($name=="all")&&!($class=="all")&&($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'class', $class, 'date', $day);
				$data['heading'] = $class." ".$day." ALL SUBJECTS RESULTS";
			}else if (!($name=="all")&&($class=="all")&&!($sub=="all")&&(($day=="all"))) {
				$data['results'] = $this->get_where_custom2($tb, 'name', $name, 'subject', $sub);
				$data['heading'] = $name." ".$sub."  RESULTS";
			}else if (!($name=="all")&&!($class=="all")&&!($sub=="all")&&(($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'name', $name, 'class', $class, 'subject', $sub);
				$data['heading'] = $name." ".$class." ".$sub."  RESULTS";
			}else if (($name=="all")&&!($class=="all")&&!($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'date', $day, 'class', $class, 'subject', $sub);
				$data['heading'] = $class." ".$sub." ".$day."  RESULTS";
			}else if (!($name=="all")&&!($class=="all")&&($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'name', $name, 'class', $class, 'date', $day);
				$data['heading'] = $name." ".$class." ".$day."  RESULTS";
			}else if (!($name=="all")&&($class=="all")&&!($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'name', $name, 'date', $day, 'subject', $sub);
				$data['heading'] = $name." ".$sub." ".$day."  RESULTS";
			}
			else if (!($name=="all")&&!($class=="all")&&!($sub=="all")&&(!($day=="all"))) {
				$data['results'] = $this->get_where_custom3($tb, 'name', $name, 'class', $class, 'subject', $sub, 'date', $day);
				$data['heading'] = $name." ".$class." ".$sub."  RESULTS";
			}
			else {
				$data['heading'] = "DATA NOT FOUND";
				$data['results'] = $this->get_where_custom1($tb, 'subject', "empty");
			}

			//download page
			$html=$this->load->view('all_results',$data,true);
	        $pdfFilePath = "exam_esults.pdf";
	        $this->load->library('m_pdf');
	        $this->m_pdf->pdf->WriteHTML($html);
	        $this->m_pdf->pdf->Output($pdfFilePath, "D");


		}else {
			//$data['results'] = $this->get_where_custom1($tb, 'class', $class, 'name', $data['name']);
			$data['results'] = $this->get_all($tb);
			$data['heading'] = "ALL RESULTS";
		}

//download the sheet
		if ($saveBtn == "ok") {
			# code...
			echo $data['heading'] ;
		}
	
	
	
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="res_widget";
		$data['right_module']="Admin";
		$data['right_file']="all_results";
		
		$this->load->view('Admin/index',$data);
}


function performanceGraphs(){

	$tb = "result_tb";
	$data['nameRes'] = $this->get_col_where($tb, 'name');
	$data['classRes'] = $this->get_col_where($tb, 'class');
	$data['subRes'] = $this->get_col_where($tb, 'subject');
	$data['dateRes'] = $this->get_col_where($tb, 'date');


	$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="res_widget";
		$data['right_module']="Admin";
		$data['right_file']="performance_graphs";
		
		$this->load->view('Admin/index',$data);
}


function userRoles(){
	 $data['usersRes']= $this->users->get('id');
	 $okBtn = $this->input->post('roleBtn',true);
	 $id = $this->input->post('id',true);
	 $role = $this->input->post('role',true);
	 $data['sms'] = "";

	 if ($okBtn == "ok") {
	 	# code...
	 	if (($id=='empty')||($role=='empty')) {
	 		# code...
	 		$data['sms'] = "Please select valid imputs. Try again.!";
	 	} else {
	 		# code...
	 		$userData['priority'] = $role;
	 		$this->users->_update($id, $userData);
	 		$data['sms'] = "User Role Changed successifully";
	 	}
	 	
	 }

	    $data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Admin";
		$data['right_file']="user_roles";
		
		$this->load->view('Admin/index',$data);

}

function examTime(){
	$okBtn = $this->input->post('timeBtn',true);
	$sub = $this->input->post('sub',true);
	$examNo = $this->input->post('examNo',true);
	$mins = $this->input->post('time',true);
	$tb = $sub."_mc_tb";
	$data['sms'] = "";

	 if ($okBtn == "ok") {
	 	# code...
	 	if (($sub=='empty')||($examNo=='empty')||($mins=='empty')) {
	 		# code...
	 		$data['sms'] = "Please Enter valid imputs. Try again.!";
	 	} else {
	 		# code...
	 		$tData['time'] = $mins;
	 		$col = 'testn';
	 		$this->_update2($tb, $col, $examNo, $tData);
	 		$data['sms'] = "Exam Time Changed successifully";
	 	}
	 	
	 }

	    $data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWidget";
		$data['right_module']="Admin";
		$data['right_file']="exam_time";
		
		$this->load->view('Admin/index',$data);

}























public function confirmPayment(){
	$button1=$this->input->post('conf');
	$button2=$this->input->post('deny');

	if (!($button1=="")) {
		//echo $button1;
		$pcode=$this->customerreceipt->get_pcode_where($button1) ;
		$receiptID=$pcode->row()->receiptID;
		//$time=mdate('%i%s');
		$c_ID=$pcode->row()->customerID;
		//$o_ID_int=intval(ellipsize($c_ID, strlen($c_ID)-5,0,""));
		
		//$verCode=$time+$o_ID_int;
		//get verification code from the code table
		$verCode=$this->getcode_wherenot('vercode',"empty")->row()->vercode;
			//update receipt code
					$code=$verCode;
					$data['vercode']="empty";
					$this->admin->_updatecode('vercode',$code, $data);
		//update verification code
		$data['vercode']=$verCode;
		$this->customerreceipt->_update($receiptID, $data);
		//send SMS
				$to=$this->customerphonenumber->get_where($c_ID)->row()->customerPhoneNo;
				$message="Mpendwa mteja, malipo yako yamepokelewa. Tafadhari ingiza namba ya malipo ifuatayo; ".$verCode." ili kujipatia risiti yako. Asante kwa kutumia huduma hii.!";
				$this->sysmessage->SMSnotification($to,$message);
						//echo $message.'<br>'.$to;
		$this->adminHome();

	} else if(!($button2=="")){
		$pcode=$this->customerreceipt->get_pcode_where($button2) ;
		$receiptID=$pcode->row()->receiptID;
		$verCode="REJECTED";
		$data['vercode']=$verCode;
		$this->customerreceipt->_update($receiptID, $data);
		$this->adminHome();

		//send SMS
				$to=$this->customerphonenumber->get_where($pcode->row()->customerID)->row()->customerPhoneNo;
				$message="Mpendwa mteja, kiasi cha pesa ulichotuma hakitoshelezi. Tafadhari hakiki bidhaa ulizochagua kisha rudia kutuma tena. Asante kwa kutumia huduma hii.!";
				$this->sysmessage->SMSnotification($to,$message);
						//echo $message.'<br>'.$to;
	}
	
}

function confirmTpoup(){
	$button1=$this->input->post('conf');
	$button2=$this->input->post('deny');
	//fetch displayed data from db
	$data['result']=$this->customeracc->get('customerID');
	$cPhoneInfo=$this->customerphonenumber->get_where($data['result']->row()->customerID);

	if (!($button1=="")) {
		$custID=$button1;
		//obtain ammount added *********
		$topupAmount=$this->input->post($custID,true);
		//update customer balance and ver code
		$adminRate=$data['result']->row()->adminrate;
		$cbalance['accBalance']=($data['result']->row()->accBalance)+$topupAmount;
		$cbalance['actualBalance']=$cbalance['accBalance']*(1-$adminRate);
		$this->customeracc->_update($custID,$cbalance);
		$vcode['vercode']=$this->getcode_wherenot('vercode',"empty")->row()->vercode;
		$this->customeracc->_update($custID,$vcode);
		//update dates
		$date['lastTopupDate']=mdate('%d/%m/%Y');
		$date['lastTopupTime']=mdate('%G%i');
		$this->customeracc->_update($custID,$date);

		//right file to displaysssss
		$data['right_file']="topUp";

		//send SMS
				$code=$this->customeracc->get_where($custID)->row()->vercode;
				$to=$this->customerphonenumber->get_where($custID)->row()->customerPhoneNo;
				$message="Mpendwa mteja, smartExam imepokea salio lako. Ingiza namba ifuatayo ili kuongeza salio katika akaunti yako; ".$code.".  Asante kwa kutumia huduma hii.!";
				$this->sysmessage->SMSnotification($to,$message);
				//$this->sysmessage->smssend();
						//echo $message.'<br>'.$to;
	

	} else {
		//display customer top up window
		$data['right_file']="topUp";
	}
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWedget";
		$data['right_module']="Admin";
		
		$this->load->view('Admin/index',$data);
}

function confirmBTrans(){
	$button1=$this->input->post('conf');
	$button2=$this->input->post('deny');
	//fetch displayed data from db
	$order_by="businessID";
	$status="pendding";
	$paid="done";
	$data['result']=$this->businessacc->get_unsent_where($order_by,$status,$paid);
	
	if (!($button1=="")) {
		$businessID=$button1;
		//update send status to "sent"
		$sent['sendStatus']="sent";
		$bid=$businessID;
		$status="pendding";
		$paid="done";
		$this->businessacc->_update_sent($bid, $status, $paid, $sent);
		
		//right file to displaysssss
		$data['right_file']="sendBMoney";

		//send SMS
				$oid=$this->owner->get_where($this->business->get_where($bid)->row()->ownerID)->row()->ownerID;
				$to=$this->owner->get_phone_where($oid)->row()->ownerPhoneNo;
				$message="Mpendwa mteja, smartExam imetuma pesa ya makusanyo ya siku katika akaunti yako. Tafadhari, hakiki kiasi kilichotumwa. Asante kwa kutumia huduma hii.!";
				//$this->sysmessage->SMSnotification($to,$message);
						//echo $message.'<br>'.$to;

	} else {
		//display customer top up window
		$data['right_file']="sendBMoney";
	}
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWedget";
		$data['right_module']="Admin";
		
		$this->load->view('Admin/index',$data);
}

function dailyReport(){

		$isLoggedin=$this->session->userdata('logged_in');
		if ($isLoggedin) {
			# code...
		//select by date
		//$data['dateres']=$this->businessacc->get('transactionDate');
		$data['dateres']=$this->businessacc->get_date('transactionDate');
		$btn=$this->input->post("dateIn",true);
		$save=$this->input->post("saveBtn",true);
		
		if ($btn=="datein") {
			//put date to session
			$today=$this->input->post("todayIn",true);
		}else{
			$today=mdate('%d/%m/%Y');
		}

		$data['date']=$today;
		$data['saleAmmount']=$this->businessacc->get_adminsum('transactionAmount',$today)->row()->transactionAmount;
		$data['taxAmmount']=$this->businessacc->get_adminsum('gvmttax',$today)->row()->gvmttax;
		$data['profitAmmount']=$this->businessacc->get_adminsum('bprofit',$today)->row()->bprofit;
		$data['adminAmmount']=$this->businessacc->get_adminsum('adminshare',$today)->row()->adminshare;

		//selecting transactions for business account table
		$data['result']=$this->businessacc->get_where_date($today);

		//calling the page
		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Businessreport";
		$data['left_file']="admin_daily_report_info";
		$data['right_module']="Businessreport";
		$data['right_file']="admin_daily_sale_report";
		$this->load->view('Admin/index',$data);

		//download the report
		if ($save=="save") {
			$today=$this->input->post("todayIn",true);
			$data['date']=$today;
			$data['saleAmmount']=$this->businessacc->get_adminsum('transactionAmount',$today)->row()->transactionAmount;
			$data['taxAmmount']=$this->businessacc->get_adminsum('gvmttax',$today)->row()->gvmttax;
			$data['profitAmmount']=$this->businessacc->get_adminsum('bprofit',$today)->row()->bprofit;
			$data['adminAmmount']=$this->businessacc->get_adminsum('adminshare',$today)->row()->adminshare;

			//selecting transactions for business account table
			$data['result']=$this->businessacc->get_where_date($today);

			//calling the page
			$data['module']="Admin";
			$data['view_file']="adminHome";
			$data['left_module']="Businessreport";
			$data['left_file']="admin_daily_report_info";
			$data['right_module']="Businessreport";
			$data['right_file']="admin_daily_sale_report";
			$this->load->view('Admin/index',$data);

			//download the report
			$html=$this->load->view('admin_daily_sale_report',$data,true);
	        $pdfFilePath = "admin_report.pdf";
	        $this->load->library('m_pdf');
	        $this->m_pdf->pdf->WriteHTML($html);
	        $this->m_pdf->pdf->Output($pdfFilePath, "D");

		}

		} else {
			redirect('Home/notLoggedin');
		}

	}
	

//edit tax information
	function editTaxInfo(){
		$editBtn=$this->input->post('edit',true);
		//obtain tax information
		$taxInfo=$this->tax->get('businessID');
		$data['gvmtTax']="";
		if ($editBtn=="ok") {
			//update tax information
			$data['right_file']="editTax_done";
		} else {
			$data['right_file']="editTax";
		}

		$data['module']="Admin";
		$data['view_file']="adminHome";
		$data['left_module']="Admin";
		$data['left_file']="adminWedget";
		$data['right_module']="Tax";
		
		
		$this->load->view('Admin/index',$data);
	}


function all_businessView(){

	$this->business->all_businessView();	
}

function shop_businessView(){

	$this->business->shop_businessView();	
}

function market_businessView(){
	
	$this->business->market_businessView();
}

function smarket_businessView(){
	
	$this->business->smarket_businessView();
}

function fuel_businessView(){
	
	$this->business->fuel_businessView();
}

function other_businessView(){
	
	$this->business->other_businessView();
}

function cView(){
	//testing audio
	$path=base_url('asset/ringtone/admin.MP3');
	echo $this->sysmessage->audioPlay($path);
	//$this->load->view('Sysmessage/audio');
	$this->adminHome();
	//testing message api
	//$from='francediio@gmail.com';
	//$to='mwemezif20@gmail.com';
	//$subject="WELOCOME NOTE:";
	//$text="You are now registered. Thank you..!";
	//$this->sysmessage->sendEmail($from,$to,$subject,$text);
	//$this->sysmessage->sendMail();
	//$n="35425";
	//$message="Umefanikiwa kulipia bidhaa ulizochagua. Namba ya risiti yako ni ".$n." Asante kwa kutumia huduma hii.!";
	//echo $message;
	//$to="255684544167";
	//$this->sysmessage->smssend();
	//$this->sysmessage->SMSnotification($to,$message);
	//echo $this->getcode_wherenot('rcode',"empty")->row()->rcode;

}

function bView(){
	$this->adminHome();
	
}

function generatedIncomeView(){
	$this->dailyReport();
	
}

function login(){
	$email=$this->input->post('aemail',true);
	$password=$this->input->post('apwrd',true);
	//getting password from db
	$admin_info=$this->get_where_email($email);
	if (!($admin_info->num_rows()==0)) {
		$db_email=$admin_info->row()->adminEmail;
		$db_pwrd=$admin_info->row()->adminPassword;
	
	

	if (($email==$db_email)&&($password==$db_pwrd)) {
		//create and  store session data
		$newdata = array('user_id' =>(int)$admin_info->row()->id,
							'adminEmail'=> (string)$admin_info->row()->adminEmail,
							'adminName'=> (string)$admin_info->row()->adminName,
							'adminSex'=> (string)$admin_info->row()->adminSex,
							'adminImg'=> (string)$admin_info->row()->adminImg,
							'logged_in'=> (bool)true
						);
		$this->session->set_userdata($newdata);
		//show admin home page
		//$data['module']="Admin";
		//$data['view_file']="adminHome";
		//$this->load->view('Admin/index',$data);
		$this->adminHome();

	} else {
		//$data['login_msg']="<h4 style='text-align:center; color:red'>An e-mail address or password is incorrect.!</h4>";
		$data['login_msg']=$password;
		$this->load->view('Admin/login',$data);
	}	

	}else{
		redirect('Admin/lock');
	}

}

function logout(){
	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			// user logout ok
			redirect('Admin');	
		} else {
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
		}
}

function register(){
	$register_btn=$this->input->post('register_btn',true);
	if (!($register_btn=='ok')) {
		$data['register_msg']="";
		$this->load->view('Admin/register',$data);
	} else {
		$adminData['adminfName']=$this->input->post('afname',true);
		$adminData['adminmName']=$this->input->post('amname',true);
		$adminData['adminsName']=$this->input->post('asname',true);
		$adminData['adminSex']=$this->input->post('asex',true);
		$adminData['adminEmail']=$this->input->post('aemail',true);
		$adminData['phoneNumber']=$this->input->post('phone',true);
		$adminData['sysTransactionNo']=$this->input->post('transNo',true);
		$adminData['adminPassword']=$this->input->post('apwrd',true);
		$pwdConf=$this->input->post('apwrdC',true);
		if ($adminData['adminPassword']==$pwdConf) {
			//register admin
			$this->_insert($adminData);
			//call success message
			$data['register_msg']="<h4 style='text-align:center; color:blue'>Registration complete.!</h4>";
			$this->load->view('Admin/register',$data);
		} else {
			$data['register_msg']="<h4 style='text-align:center; color:red'>Password does not match.!</h4>";
			$this->load->view('Admin/register',$data);
		}
	}
	
	
	

}

function lock(){
	$unlk_btn=$this->input->post('unlock_btn',true);
	$pword=$this->input->post('pwrd',true);

	if (($unlk_btn=='unlock')&&!($pword=="")) {
		//$pword=$this->input->post('pwrd',true);
		$db_pwrd=$this->get_where_email($this->session->userdata('adminEmail'))->row()->adminPassword;

		if (($pword==$db_pwrd)) {
			//show admin home page
			//$data['module']="Admin";
			//$data['view_file']="adminHome";
			//$this->load->view('Admin/index',$data);
			$this->adminHome();

		} else {
			//$data['unlock_msg']=$db_pwrd;
			$data['unlock_msg']="<h4 style='text-align:center; color:red'> Incorrect password.!</h4>";
			$this->load->view('Admin/lockscreen',$data);
		}
				
	} else {
		$data['unlock_msg']="";
		$this->load->view('Admin/lockscreen',$data);
	}
	
	
}


//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function get($order_by) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where($id);
return $query;
}

function get_where_email($email) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where_email($email);
return $query;
}
function get_all($tb) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_all($tb);
return $query;
}


function get_col_where($tb, $col) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_col_where($tb, $col);
return $query;
}


function get_where_custom($col, $value) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where_custom($col, $value);
return $query;
}

function get_where_custom1($tb, $col1, $value1) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where_custom1($tb, $col1, $value1);
return $query;
}

function get_where_custom2($tb, $col1, $value1, $col2, $value2) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where_custom2($tb, $col1, $value1, $col2, $value2);
return $query;
}

function get_where_custom3($tb, $col1, $value1, $col2, $value2, $col3, $value3) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where_custom3($tb, $col1, $value1, $col2, $value2, $col3, $value3) ;
return $query;
}

function get_where_custom4($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where_custom4($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4) ;
return $query;
}


function _insert($data) {
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_insert($data);
}

function _update($id, $data) {
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_update($id, $data);
}

function _update2($tb, $col, $value, $data) {
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_update2($tb, $col, $value, $data);
}

function _delete($id) {
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_delete($id);
}

function count_where($column, $value) {
$this->load->model('Mdl_mauzo');
$count = $this->Mdl_mauzo->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('Mdl_mauzo');
$max_id = $this->Mdl_mauzo->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->_custom_query($mysql_query);
return $query;
}


//CODES
function getcode($order_by) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->getcode($order_by);
return $query;
}

function getcode_where($col,$code) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->getcode_where($col,$code);
return $query;
}

function getcode_wherenot($col,$code) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->getcode_wherenot($col,$code);
return $query;
}

function _insertcode($data) {
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_insertcode($data);
}

function _updatecode($col,$code, $data){
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_updatecode($col,$code, $data);
}



//xxxxxxxxxxxxxxxxxxxxxxx MULT TABLE XXXXXXXXXXXXXXXX
function get_tb($tb, $order_by) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_tb($tb, $order_by);
return $query;
}

function _insert_tb($tb,$data) {
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_insert_tb($tb,$data);
}

function _update_tb($tb, $id, $data) {
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_update_tb($tb,$id, $data);
}   

function _delete_tb($tb, $id) {
$this->load->model('Mdl_mauzo');
$this->Mdl_mauzo->_delete_tb($tb, $id);
}

function get_where_tb($tb, $id) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where_tb($tb, $id);
return $query;
}

function get_where_custom_tb($tb, $col, $value) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->get_where_custom_tb($tb, $col, $value);
return $query;
}

function count_all_tb($tb) {
$this->load->model('Mdl_mauzo');
$query = $this->Mdl_mauzo->count_all_tb($tb);
return $query;
}


}