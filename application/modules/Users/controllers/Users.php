<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class users extends MX_Controller
{

function __construct() {
parent::__construct();
		$this->load->library(array('session'));
	    $this->load->helper('date');
 		$this->load->helper('download');
		$this->load->helper('text');
		//modules
		$this->load->module('Home');
		$this->load->module('Users');
		$this->load->module('Admin');
		$this->load->module('Prm');
		$this->load->module('Outage');
		$this->load->module('Site');
}


function index(){
	echo 'Access Danied';
}

function userReg(){
	$regBtn = $this->input->post('regBtn',true);
	//$udata['name'] = $this->input->post('name',true);
	$udata['username'] = $this->input->post('email',true);
	$udata['email'] = $this->input->post('email',true);
	$udata['country'] = $this->input->post('country',true);
	$udata['sender'] = $this->input->post('senderid',true);
	$udata['phone'] = "255000000000";
	$udata['password'] = $this->input->post('password',true);
	$cpwrd = $this->input->post('cpassword',true);
	$udata['role'] = "Normal";
	//$udata['online'] = "0";
	//$udata['date'] = mdate('%Y-%m-%d');
	$udata['udate'] = mdate('%Y-%m-%d');

	//check user exsistance
	$userRes = $this->get_where_custom('email', $udata['email'] );
	if ($userRes->num_rows() > 0) {
		# code...
		echo "Barua pepe imekwisha tumika. Tafadhari tumia barua pepe nyingine.";
	} else {
	if ($cpwrd == $udata['password']) {
		# code...
		//$udata['password'] = password_hash($udata['password'], PASSWORD_DEFAULT);
		$udata['password'] = $udata['password'];
		$userexists = $this->get_where_custom('username', $udata['username']);
		if ($userexists->num_rows() < 1) {
			$this->_insert($udata);
			$data['usersres'] = $this->get('id');
			//read inserted data
			$user = $this->get_where_custom('email', $udata['email'])->row();
			$newdata = array('user_id' =>(int)$user->id,
								'user_name'=> (string)$user->username,
								'user_username'=> (string)$user->username,
								'user_pwrd'=> (string)$user->password,
								'user_date'=> (string)$user->udate,
								'user_role'=> (string)$user->role,
								'user_phone'=> (string)$user->phone,
								'user_email'=> (string)$user->email,
								'user_country'=> (string)$user->country,
								'user_senderid'=> (string)$user->sender,
								'user_bundle'=> (string)$user->bundle,
								'user_credit'=> (string)$user->credit,
								'user_img'=> "def.png",
								/*'user_online'=> (string)$userlogin->online,*/
								'logged_in'=> (bool)true
							);
			$this->session->set_userdata($newdata);
			//update online status
			//$onlinedata['online'] = 1;
			//$this->users->_update($user->id,$onlinedata);

			//REGISTER A PLOT ORDER
			//$this->plot->plotOrder();

			//redirect to plot account
			redirect('Home/loginservices');
			$data['color'] = "blue";
			$data['response'] =  "Registration completed. Please use your E-mail address and Password to login.";
			//echo "go";  //for ajax
			/*=================== EMAIL ======================*/
				/*$recepient = $this->session->userdata('user_email');
				$subject = "USAJILI UMEKAMILIKA";
				$message = 'Usajili umekamilika. Asante kwa kufungua akaunti na sisi, sasa unaweza kuchagua kiwanja na kufuatilia malipo yako katika akaunti yako. <br><br> <b style="color: blue;">Asante kwa kutuchagua, endelea kufurahia huduma zetu !</b>';
				$this->home->emailSender($recepient, $subject, $message);*/
			/*=================END EMAIL =====================*/

		} else {
			$data['color'] = "red";
			$data['response'] =  "Barua pepe uliyoingiza imekwisha tumika. Jaribu barua pepe nyingine.";
			echo $data['response'] ;
		}
	} else {
		$data['color'] = "red";
		$data['response']  = "Passwords does not match.";
		echo $data['response'] ;
	}
} //end exsistance


}


function manageUsers(){
	//buttons
	$regBtn = $this->input->post('regBtn',true);
	$editBtn = $this->input->post('editBtn',true);
	$modifyBtn = $this->input->post('modifyBtn',true);
	/*$acceptBtn = $this->input->post('acceptBtn',true);
	$rejectBtn = $this->input->post('rejectBtn',true);*/
	$deleteBtn = $this->input->post('deleteBtn',true);

	//get data from users table
	$data['usersres'] = $this->get('user_ID');
	

	if ($regBtn == "ok") {
		# code...
		$udata['fname'] = $this->input->post('fname',true);
		$udata['sname'] = $this->input->post('sname',true);
		$udata['lname'] = $this->input->post('lname',true);
		$udata['gender'] = $this->input->post('gender',true);
		$udata['username'] = $this->input->post('username',true);
		$udata['password'] = $this->input->post('password',true);
		$udata['role'] = $this->input->post('role',true);
		$udata['phone_number_cug'] = $this->input->post('phone1',true);
		$udata['phone_number_opt'] = $this->input->post('phone2',true);
		$udata['email'] = $this->input->post('email',true);
		$udata['Title'] = $this->input->post('title',true);
		$confPwrd = $this->input->post('password2',true);
		$userexists = $this->get_where_custom('username', $udata['username']);

		if ($confPwrd == $udata['password']) {
			# code...
			if (!($udata['role'] == "empty")) {
				# code...
				//check user exisistance
				if ($userexists->num_rows() < 1) {
					# code...
					/*iiregister user*/
					$this->_insert($udata);

					//get data from users table
					$data['usersres'] = $this->get('user_ID');
	
					if ($this->session->userdata('logged_in')) {
						$data['color'] = "";
						$data['err'] = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Registration Completed Successifully ! </div>';
						$data['middle_m'] = "Users";
						$data['middle_f'] = "manageUsers";
						if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
					} else {
						$this->load->view('Home/loginerr',$data);
					}
				} else {
					# code...
					//username exists

					//get data from users table
					$data['usersres'] = $this->get('user_ID');
	
					if ($this->session->userdata('logged_in')) {
						$data['color'] = "";
						$data['err'] = '<div class="alert alert-danger alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Registration Failed ! Username exists . Choose another username and Try Again. </div>';
						$data['middle_m'] = "Users";
						$data['middle_f'] = "manageUsers";
						if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
					} else {
						$this->load->view('Home/loginerr',$data);
					}
				}
				
				
			} else {
				# code...
				//Select appropriate user category

					//get data from users table
					$data['usersres'] = $this->get('user_ID');
	
				if ($this->session->userdata('logged_in')) {
					$data['color'] = "";
					$data['err'] = '<div class="alert alert-danger alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Registration Failed ! Please Select Correct User Category. </div>';
					$data['middle_m'] = "Users";
					$data['middle_f'] = "manageUsers";
					if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
				} else {
					$this->load->view('Home/loginerr',$data);
				}
			}
			
		} else {
			# code...
			//Passwords does not match

					//get data from users table
					$data['usersres'] = $this->get('user_ID');
	
			if ($this->session->userdata('logged_in')) {
				$data['color'] = "";
				$data['err'] = '<div class="alert alert-danger alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Registration Failed ! Passwords Does no Match. Try Again </div>';
				$data['middle_m'] = "Users";
				$data['middle_f'] = "manageUsers";
				if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
				//if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
			} else {
				$this->load->view('Home/loginerr',$data);
			}
		}
		

	} else if(!$editBtn == "") {
		# code...
		$id = $editBtn;
		$data['editres'] = $this->get_where($id);

		//get data from users table
		$data['usersres'] = $this->get('user_ID');
	
		if ($this->session->userdata('logged_in')) {
			$data['color'] = "";
			$data['err'] = '';
			$data['middle_m'] = "Users";
			$data['middle_f'] = "editProfile";
			if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
		} else {
			$this->load->view('Home/loginerr',$data);
		}

	}else if(!$modifyBtn == "") {
		# code...
		$id = $modifyBtn;


		$udata['fname'] = $this->input->post('fname',true);
		$udata['sname'] = $this->input->post('sname',true);
		$udata['lname'] = $this->input->post('lname',true);
		$udata['gender'] = $this->input->post('gender',true);
		$udata['username'] = $this->input->post('username',true);
		$udata['password'] = $this->input->post('password',true);
		$udata['role'] = $this->input->post('role',true);
		$udata['phone_number_cug'] = $this->input->post('phone1',true);
		$udata['phone_number_opt'] = $this->input->post('phone2',true);
		$udata['email'] = $this->input->post('email',true);
		$udata['Title'] = $this->input->post('title',true);
		$confPwrd = $this->input->post('password2',true);
		$userexists = $this->get_where_custom('username', $udata['username']);

		if ($confPwrd == $udata['password']) {
			# code...
			if (!($udata['role'] == "empty")) {
				# code...
				//check user existance
					# code...
				if ($userexists->num_rows() < 1) {
					# code...
					/*Update user*/
					$this->_update($id, $udata);

					//get data from users table
					$data['usersres'] = $this->get('user_ID');
	
					if ($this->session->userdata('logged_in')) {
						$data['color'] = "";
						$data['err'] = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Credentials has been Modified Successifully ! </div>';
						$data['middle_m'] = "Users";
						$data['middle_f'] = "manageUsers";
						if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
					} else {
						$this->load->view('Home/loginerr',$data);
					}
				} else {
					# code...
					//username exists
						if (($udata['username'] == $this->get_where($id)->row()->username)) {
							/*Update user*/
							$this->_update($id, $udata);

							//get data from users table
							$data['usersres'] = $this->get('user_ID');
			
							if ($this->session->userdata('logged_in')) {
								$data['color'] = "";
								$data['err'] = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Credentials has been Modified Successifully ! </div>';
								$data['middle_m'] = "Users";
								$data['middle_f'] = "manageUsers";
								if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
							} else {
								$this->load->view('Home/loginerr',$data);
							}
						} else {

								//get data from users table
								$data['usersres'] = $this->get('user_ID');
				
							if ($this->session->userdata('logged_in')) {
								$data['color'] = "";
								$data['err'] = '<div class="alert alert-danger alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Update Failed ! Username exists . Choose another username and Try Again. </div>';
								$data['middle_m'] = "Users";
								$data['middle_f'] = "manageUsers";
								if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
							} else {
								$this->load->view('Home/loginerr',$data);
							}
						}
				} //end

			} else {
				# code...
				//Select appropriate user category

					//get data from users table
					$data['usersres'] = $this->get('user_ID');
	
				if ($this->session->userdata('logged_in')) {
					$data['color'] = "";
					$data['err'] = '<div class="alert alert-danger alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Update Failed ! Please Select Correct User Category. </div>';
					$data['middle_m'] = "Users";
					$data['middle_f'] = "manageUsers";
					if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
				} else {
					$this->load->view('Home/loginerr',$data);
				}
			}
			
		} else {
			# code...
			//Passwords does not match

			//get data from users table
			$data['usersres'] = $this->get('user_ID');
	
			if ($this->session->userdata('logged_in')) {
				$data['color'] = "";
				$data['err'] = '<div class="alert alert-danger alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> User Update Failed ! Passwords Does no Match. Try Again </div>';
				$data['middle_m'] = "Users";
				$data['middle_f'] = "manageUsers";
				if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
			} else {
				$this->load->view('Home/loginerr',$data);
			}
		}
		


	}else if(!$deleteBtn == "") {
		# code...
		$id = $deleteBtn;
		//delete user
		$this->_delete($id);

		//get data from users table
		$data['usersres'] = $this->get('user_ID');
	
		if ($this->session->userdata('logged_in')) {
			$data['color'] = "";
			$data['err'] = '';
			$data['middle_m'] = "Users";
			$data['middle_f'] = "manageUsers";
			if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
		} else {
			$this->load->view('Home/loginerr',$data);
		}

	} else {

		if ($this->session->userdata('logged_in')) {
			$data['color'] = "";
			$data['err'] = '';
			$data['middle_m'] = "Users";
			$data['middle_f'] = "manageUsers";
			if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
		} else {
			$this->load->view('Home/loginerr',$data);
		}

	}
	

}


function changePassword(){
	$id = $this->session->userdata('user_id');
	$data['userres'] = $this->get_where($id);
	$changeBtn = $this->input->post('changeBtn',true);

	$udata['password'] = $this->input->post('password',true);
	//$udata['udate'] = mdate('%Y-%m-%d %H:%i:%s');
	$confpwrd = $this->input->post('password2',true);
	$cpword = $this->input->post('cpword',true);

	if ($changeBtn == "ok") {
		# code...
		if ($cpword == $data['userres']->row()->password) {
		# code...
		if ($udata['password'] == $confpwrd) {
			# code...
			//update password
			$this->_update($id, $udata);

			if ($this->session->userdata('logged_in')) {
				$data['color'] = "";
				$data['err'] = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Info!</b> Password Has Been Changed Successifully ! Use new Password During Login</div>';
				$data['middle_m'] = "Users";
				$data['middle_f'] = "changePwrd";
				if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
			} else {
				$this->load->view('Home/loginerr',$data);
			}

		} else {
			# code...
			//password does not match
			if ($this->session->userdata('logged_in')) {
				$data['color'] = "";
				$data['err'] = '<div class="alert alert-danger alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> Password Change Failed ! Passwords Does no Match. Try Again </div>';
				$data['middle_m'] = "Users";
				$data['middle_f'] = "changePwrd";
				if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
			} else {
				$this->load->view('Home/loginerr',$data);
			}
		}
		
	} else {
		# code...
		//The current password is incorrect
		if ($this->session->userdata('logged_in')) {
				$data['color'] = "";
				$data['err'] = '<div class="alert alert-danger alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Alert!</b> Password Change Failed ! The Current Password is Incorrect. Try Again </div>';
				$data['middle_m'] = "Users";
				$data['middle_f'] = "changePwrd";
				if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
			} else {
				$this->load->view('Home/loginerr',$data);
			}
	}
	} else {
		# code...
		if ($this->session->userdata('logged_in')) {
				$data['color'] = "";
				$data['err'] = "";
				$data['middle_m'] = "Users";
				$data['middle_f'] = "changePwrd";
				if ($this->session->userdata('user_role') == "admin") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "office") { $this->load->view('Admin/index',$data); } else if ($this->session->userdata('user_role') == "fs") { $this->load->view('Home/index',$data); } else if ($this->session->userdata('user_role') == "ft") { $this->load->view('Home/index',$data); } else { $this->load->view('Home/index',$data); }
			} else {
				$this->load->view('Home/loginerr',$data);
			}
	}

}





/*================ end SIC ==============*/


//default codes

function get($order_by) {
$this->load->model('Mdl_users');
$query = $this->Mdl_users->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('Mdl_users');
$query = $this->Mdl_users->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('Mdl_users');
$query = $this->Mdl_users->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('Mdl_users');
$query = $this->Mdl_users->get_where_custom($col, $value);
return $query;
}

function _insert($data) {
$this->load->model('Mdl_users');
$this->Mdl_users->_insert($data);
}

function _update($id, $data) {
$this->load->model('Mdl_users');
$this->Mdl_users->_update($id, $data);
}

function _delete($id) {
$this->load->model('Mdl_users');
$this->Mdl_users->_delete($id);
}

function count_where($column, $value) {
$this->load->model('Mdl_users');
$count = $this->Mdl_users->count_where($column, $value);
return $count;
}

function count_all() {
$this->load->model('Mdl_users');
$count = $this->Mdl_users->count_all();
return $count;
}



function get_max() {
$this->load->model('Mdl_users');
$max_id = $this->Mdl_users->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('Mdl_users');
$query = $this->Mdl_users->_custom_query($mysql_query);
return $query;
}

}