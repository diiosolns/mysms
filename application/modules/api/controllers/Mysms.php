<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
 
class Mysms extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('date');
        $this->load->module('Admin');
        $this->load->model('Mdl_mysms');
        $this->load->model('Mdl_mauzo');
    }


public function index_get(){

  $this->response($this->db->get('sms_user')->result());
}


//USER INFORMATION.................
function users_get(){
    $table= 'sms_user';
        $users = $this->Mdl_mysms->get_users('id',$table)->result();
        if($users){
            $this->response($users, 200);
        }else{
            $this->response(NULL, 404);
        }
    }

function cpwrd_get() {
    $table = 'sms_user';
    $userid = $this->get('id');
    $username = $this->get('username');
    $pwrd = $this->get('pwrd');
    $date = mdate('%Y-%m-%d');
   
    $data = array('password'=>$pwrd); 
    $res = $this->Mdl_mysms->_update2($table, 'username', $username, $data);
    if($data){
        $this->response($data, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}

function login_get() {
    $table = 'sms_user';
    /*$userid = $this->get('id');*/
    $username = $this->get('username');
    $pwrd = $this->get('pwrd');
    $chckres = $this->Mdl_mysms->get_where_custom_tb($table, 'username', $username);
    if ($chckres->num_rows() > 0) {
        # code...
        if ($pwrd == $chckres->row()->password) {
            # code...
            //$feedback = $chckres->row()->id;
            $feedback = $chckres->result();
        } else {$feedback = "Failed";}
        
    } else {
        $feedback = "Failed";
    }
   
    if($feedback){
        $this->response($feedback, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}

function userreg_get() {
    $table = 'sms_user';
    /*$userid = $this->get('id');*/
    $country = $this->get('country');
    $sender = $this->get('sender');
    $username = $this->get('email');
    $email = $this->get('email');
    $phone = $this->get('phone');
    $pwrd = $this->get('pwrd');
    $date = mdate('%Y-%m-%d');
    $data = array('country'=>$country,'username'=>$username, 'sender'=>$sender, 'email'=>$email,  'phone'=>$phone,   'password'=>$pwrd, 'udate'=>$date); 
    $chckres = $this->Mdl_mysms->get_where_custom_tb($table, 'username', $username);
    if ($chckres->num_rows() > 0) {
        # code...
        $feedback = "Exist";
    } else {
        $res = $this->Mdl_mysms->_insert_tb($table, $data);
        $userres = $this->Mdl_mysms->get_where_custom_tb($table, 'username', $username);
        /*$feedback = "Done";*/
        $feedback = $userres->result();
    }
   
    if($feedback){
        $this->response($feedback, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}

function users_post(){
    //put logics here
}

function users_put(){
    //put logics here
}

function users_delete(){
    //put logics here
}

// END USER.........................

/*=======================OFLINE SMS AOI ===================*/
// $this->email->to('##########@vtext.com'); [number edited out]
function email2sms_get() {
    $recepient = $this->get('to');
    $subject = $this->get('subject');
    $message = $this->get('message');
    
    $feedback = $this->inforMail($recepient, $subject, $message);
   
    if($feedback){
        $this->response($feedback, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}
/*========================END OFFLINE SMS API ===============*/


//SMS SENDER ========================================================
//http://sms.diiolab.com/api/Mysms/smssender?senderid=senderid&userid=100&phoneArray=255784670270,255684544167,255752194092,&sms=Test_sende_by_app&bundle=10&count=1&udate=date
function smssender_get() {
    $table = 'sms_logs';
    $userid = $this->get('userid');
    $phoneArray = $this->get('phoneArray');
    $sms = $this->get('sms');
    $senderid = $this->get('senderid');
    $bundle = $this->get('bundle');
    $count = $this->get('count');
    $date = mdate('%d/%m/%Y');

    //(send an sms) call sms sending function
    $to = substr($phoneArray, 0, (strlen($phoneArray)-1));
    $message = $sms;
    $login  = "YES";
    //$feedback = $this->SMSnotification($senderid, $to, $message, $login);
    //$feedback = "OK";

    //update bundle
    $table2 = "sms_user";
    $bdata['bundle'] = $bundle;
    $bdata['udate'] = $date;
    $bdata['credit'] = 20;
    $this->Mdl_mysms->_update2( $table2, 'id', $userid, $bdata);
    
    //send & store SMS
    $myArr = explode(",", $to);
    for($i=0; $i<=sizeof($myArr)-1; $i++){ 
        $to2 = $myArr[$i];
        $response = "OK";
        $feedback = $this->SMSnotification($senderid, $to2, $message, $login); //send an sms
        $fullResponse = $feedback;
        $data = array('userid'=>$userid, 'sender'=>$senderid, 'sms'=>$sms, 'numsms'=>$count, 'recipient'=>$to2, 'response'=>$response,  'fullResponse'=>$fullResponse, 'udate'=>$date); 
        $res = $this->Mdl_mysms->_insert_tb($table, $data);
    }

    $feedback = "Done";
    if($feedback){
        $this->response($feedback, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}

//http://sms.diiolab.com/api/Mysms/websmssender?senderid=SENDERID&phoneArray=255784670270,255684544167,255752194092,&sms=Example text sms&userid=100&password=YourPassword
function websmssender_get() {
    $table = 'sms_logs';
    $userid = $this->get('userid');
    $pword = $this->get('password');
    $phoneArray = $this->get('phoneArray');
    $sms = $this->get('sms');
    $senderid = $this->get('senderid');
    $date = mdate('%d/%m/%Y');
    /*$bundle = $this->get('bundle');
    $count = $this->get('count');*/
    $user = $this->Mdl_mysms->get_where_custom_tb('sms_user', 'id', $userid);
    
    if ($user->num_rows() == 0) {
      # code...
      $feedback = "Failed! Incorrect userID or Password. Err ".$user->num_rows()."";
    } else {
      # code...
      if (!($user->row()->password == $pword)) {
        # code...
        $feedback = "Failed! Incorrect userID or Password. ";
      } else {
        # code...
        $bundle = $user->row()->bundle;
        $count =  ceil(strlen($sms) / 153);
        //(send an sms) call sms sending function
        //$to = substr($phoneArray, 0, (strlen($phoneArray)-1));
        $to = $phoneArray;
        $message = $sms;
        $login  = "YES";
        //$feedback = $this->SMSnotification($senderid, $to, $message, $login);
        //$feedback = "OK";
        
        //send & store SMS
        $myArr = explode(",", $to);
        $num2send = (sizeof($myArr) * $count);
        $newbundle = $bundle - $num2send;
        if ($num2send <= $bundle) {
          # code...//update bundle
          $table2 = "sms_user";
          $bdata['bundle'] = $newbundle;
          $bdata['udate'] = $date;
          $bdata['credit'] = $newbundle*0.01;
          $this->Mdl_mysms->_update2( $table2, 'id', $userid, $bdata);
          //============= end update ==========
          for($i=0; $i<=sizeof($myArr)-1; $i++){ 
              $to2 = $myArr[$i];
              $response = "OK";
              $feedback = $this->SMSnotification($senderid, $to2, $message, $login); //send an sms
              $fullResponse = $feedback;
              $data = array('userid'=>$userid, 'sender'=>$senderid, 'sms'=>$sms, 'numsms'=>$count, 'recipient'=>$to2, 'response'=>$response,  'fullResponse'=>$fullResponse, 'udate'=>$date); 
              $res = $this->Mdl_mysms->_insert_tb($table, $data);
          }
          $feedback = "Done. ".$num2send." SMS has been sent.";
        } else {
          # code...
          $feedback = "Failed! You do not have enough credit.";
        }
      } //==========end user login
      
    } // ===========end user exist check
    
    
    if($feedback){
        $this->response($feedback, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}
//END SMS SENDER ================================================

//EXCEL UPLOADER -----------------------
function excelup_get() {
    $table = 'sms_recipients';
    $upid = $this->get('upid');
    $date = mdate('%Y-%m-%d');
    //$data = array('userid'=>$userid, 'sender'=>$sender, 'sms'=>$sms, 'recipient'=>$to, 'udate'=>$date); 
    //$res = $this->Mdl_mysms->_insert_tb($table, $data);
   
    //call excel uploader
    $feedback = $this->uploadExcel($upid);
    
    //$feedback = "Done";
    if($feedback){
        $this->response($feedback, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}
//END SEXCEL UPLOAD ...................

// EXCEL DOWNLOAD.......................
function exceldown_get() {
    $table = 'sms_recipient';
    $upid = $this->get('upid');
    
    $res = $this->Mdl_mysms->get_where_custom_tb($table, 'upid', $upid);
     if ($res->num_rows() > 0) {
        $feedback = $res->result();;
    } else {
        $feedback = "Empty";
    }
   
    if($feedback){
        $this->response($feedback, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}
// END EXCEL DOWNLOAD...........................


// START CODE........................
function codedown_get() {
    $table = 'sms_bundle';
    $code = $this->get('code');
    
    $chckres = $this->Mdl_mysms->get_where_custom2($table, 'code', $code, 'status', 'Available');
    if ($chckres->num_rows() > 0) {
        # code...
        $data = array('status'=> "Used");
        $update = $this->Mdl_mysms->_update2($table, 'id', $chckres->row()->id, $data );
        $res = $chckres;
        $feedback = $res->result();;
    } else {
         $feedback = "Failed";
    }
   
    if($feedback){
        $this->response($feedback, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}
// END CODE...........................





















private function uploadExcel($upID){
  //load excel library
  $this->load->library('excel');
  $configUpload['upload_path'] = 'www.ehuduma.com/uploads/sms/';
    // $configUpload['upload_path'] = './uploads/sms/';
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
         $objPHPExcel=$objReader->load('./uploads/sms/'.$file_name);    
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Number of rows avalable in excel        
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);   

         //loop btn data
         for($i=2; $i<=$totalrows; $i++){ 
              $A = $objWorksheet->getCellByColumnAndRow(0 ,$i)->getValue(); 
              $B = $objWorksheet->getCellByColumnAndRow(1 ,$i)->getValue(); 
              $C = $upID ;
              $D = mdate('%Y-%m-%d %H:%i:%s');
              //$D = $objWorksheet->getCellByColumnAndRow(2 ,$i)->getValue(); if (!$C == "") { $C = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($C)); }
               
              $sViewData[] = array('name' => $A ,'phone' => $B , 'upid' => $C, 'date' => $D );
              $sdata = array('name' => $A ,'phone' => $B , 'upid' => $C , 'date' => $D );
        
        //insert po data into proj_po table
        if ( (!$A == "") && (!$B == "") && (!$C == "") ) {
          # code...
          $this->_insert_tb('sms_recipient', $sdata);
        }
        
      }
    // unlink('././uploads/sms/'.$file_name); //File Deleted After uploading in database .                
     unlink('www.ehuduma.com/uploads/sms/'.$file_name); //File Deleted After uploading in database .                      

  return $sViewData;
}


//NOTIFICATIONS.........................
//send the message for customer account notification
/*==================== SMS SENDER================*/
public function SMSnotification($senderid, $to, $message, $login){
 //MakaziC:makazi@123 (TWFrYXppQzptYWthemlAMTIz)
    //Malikita16:malikita16@123 (TWFsaWtpdGExNjptYWxpa2l0YTE2QDEyMw==)
  # code...
  $phone=$to;
  $textSMS=$message;
  $makaziCpwrd = 'TWFrYXppQzptYWthemlAMTIz';
  $malikita16pwrd = 'TWFsaWtpdGExNjptYWxpa2l0YTE2QDEyMw==';

  if ($senderid == "MakaziConst") {
    # code...
    $login = $makaziCpwrd;
  } else {
    //$login = $malikita16pwrd;
    $login = $makaziCpwrd;
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

//SENDING EMAILS****************
    function inforMail($recepient, $subject, $message){
        $snet=false;
       /* $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'manunuzi.diio@gmail.com', // change it to yours
          'smtp_pass' => 'manunuzi26', // change it to yours
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );*/

         $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'info.makaziconsult@gmail.com', // change it to yours
          'smtp_pass' => 'makazic@123', // change it to yours
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );

          $message = $message;
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
           $this->email->from('info.makaziconsult@gmail.com','Makazi Consult Ltd'); // change it to yours
          //$this->email->from('manunuzi.diio@gmail.com','Manunuzi'); // change it to yours
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

/*====================== END mySMS ====================*/
/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/






//PM (Answers  and Photos).........................
function pmans_get(){
    $table = 'preventivemaintenance';
    $res = $this->Mdl_mysms->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}

function pmphoto_get(){
    $table = 'pm_photo';
    $res = $this->Mdl_mysms->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}


function pmupans_get() {
    $table = 'preventivemaintenance';

    $accessCode = str_replace('$', '-', $this->get('accessCode'));
    $site_id = $this->get('site_id');
    $user_id = $this->get('user_id');
    //$date = str_replace('$', '-', $this->get('date'));
    $date = mdate('%Y-%m-%d');
    $list1 = str_replace('$', '#', $this->get('list1'));
    $list2 = str_replace('$', '#', $this->get('list2'));
    //$data = array('id' => $$this->post('id'), 'name' => $$this->post('name'), 'email' => $this->post('email'));
    $data = array('accessCode'=>$accessCode, 'site_id'=>$this->get('site_id'), 'user_id'=>$this->get('user_id'), 'date'=>$date, 'list1'=>$list1, 'list2'=>$list2); 
    $res = $this->Mdl_mysms->_insert_tb($table, $data);
    if($data){
        $this->response($data, 200);
    }else{
        $this->response(NULL, 404);
    }

         
}


function pma_post(){
    //put logics here
}

function pmphoto_post(){
    //put logics here
}

function pmupphoto_get() {
    $table = 'pm_photo';

    $accessCode = str_replace('$', '-', $this->get('accessCode'));
    $site_id = $this->get('site_id');
    $user_id = $this->get('user_id');
    $date = mdate('%Y-%m-%d');
    //photo names
    //$list1array = explode("/",$this->get('list1')); $list1 = $list1array[(sizeof($list1array) - 1)];
    $list1 = $this->get('list1');
    $list2 = $this->get('list2');
    $list3 = $this->get('list3');
    $list4 = $this->get('list4');
    $list5 = $this->get('list5');
    $list6 = $this->get('list6');
    $list7 = $this->get('list7');
    $list8 = $this->get('list8');
    $list9 = $this->get('list9');
    $list10 = $this->get('list10');
    $list11 = $this->get('list11');
    $list12 = $this->get('list12');
    $list13 = $this->get('list13');

    $data = array('accessCode'=>$accessCode, 'site_id'=>$this->get('site_id'), 'user_id'=>$this->get('user_id'), 'date'=>$date, 'list1'=>$list1, 'list2'=>$list2, 'list3'=>$list3, 'list4'=>$list4, 'list5'=>$list5, 'list6'=>$list6, 'list7'=>$list7, 'list8'=>$list8, 'list9'=>$list9, 'list10'=>$list10, 'list11'=>$list11, 'list12'=>$list12, 'list13'=>$list13); 
    $res = $this->Mdl_mysms->_insert_tb($table, $data);
    if($data){
        $this->response($data, 200);
    }else{
        $this->response(NULL, 404);
    }

         
}



//GS (Answers  and Photos).........................
function gsans_get(){
    $table = 'generatorservice';
   $res  = array('returned: '. $this->post('name'));
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}

function gsphoto_get(){
    $table = 'gs_photo';
    $res = $this->Mdl_mysms->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}

function gsupans_get() {
    $table = 'generatorservice';

    $accessCode = str_replace('$', '-', $this->get('accessCode'));
    $site_id = $this->get('site_id');
    $user_id = $this->get('user_id');
    //$date = str_replace('$', '-', $this->get('date'));
    $date = mdate('%Y-%m-%d');
    $list1 = str_replace('$', '#', $this->get('list1'));

    //$data = array('id' => $$this->post('id'), 'name' => $$this->post('name'), 'email' => $this->post('email'));
    $data = array('accessCode'=>$accessCode, 'site_id'=>$this->get('site_id'), 'user_id'=>$this->get('user_id'), 'date'=>$date, 'list1'=>$list1); 
    $res = $this->Mdl_mysms->_insert_tb($table, $data);
    if($data){
        $this->response($data, 200);
    }else{
        $this->response(NULL, 404);
    }

         
}

function gsupphoto_get() {
    $table = 'gs_photo';

    $accessCode = str_replace('$', '-', $this->get('accessCode'));
    $site_id = $this->get('site_id');
    $user_id = $this->get('user_id');
    $date = mdate('%Y-%m-%d');
    //photo names
    //$list1array = explode("/",$this->get('list1')); $list1 = $list1array[(sizeof($list1array) - 1)];
    $list1 = $this->get('list1');
    $list2 = $this->get('list2');
    $list3 = $this->get('list3');
    $list4 = $this->get('list4');
    $list5 = $this->get('list5');
    $list6 = $this->get('list6');
    $list7 = $this->get('list7');
    $list8 = $this->get('list8');
    $list9 = $this->get('list9');
    /*$list10 = $this->get('list10');
    $list11 = $this->get('list11');
    $list12 = $this->get('list12');
    $list12 = $this->get('list13');*/

    $data = array('accessCode'=>$accessCode, 'site_id'=>$this->get('site_id'), 'user_id'=>$this->get('user_id'), 'date'=>$date, 'list1'=>$list1, 'list2'=>$list2, 'list3'=>$list3, 'list4'=>$list4, 'list5'=>$list5, 'list6'=>$list6, 'list7'=>$list7, 'list8'=>$list8); 
    $res = $this->Mdl_mysms->_insert_tb($table, $data);
    if($data){
        $this->response($data, 200);
    }else{
        $this->response(NULL, 404);
    }

         
}


function gsupfile_get() {

        $this->response($_FILES);
    }



//ACCESS (Records).........................
function access_get(){
    $table = 'accesscodeall_pm';
    $res = $this->Mdl_mysms->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response("empty", 404);
    }
}


function sitelogin_get() {
    $table = 'accesscodeall_pm';
    //http://moriskakengi-001-site8.dtempurl.com/sic/api/sitelogin?accessCode=89u&site_id=989&user_id=2&log_in_time=78&type=uyu&cotegory=uyt&element=0opo&sub_element=8987&lotitude=0.878&longitude=98.09&status=open&date=today
    //localhost/sic/api/sitelogin?accessCode=89u&site_id=989&user_id=2&log_in_time=78&type=uyu&cotegory=uyt&element=0opo&sub_element=8987&lotitude=0.878&longitude=98.09&status=open&date=today

    //create access code
    $access_code_res = $this->Mdl_mysms->get_tb('accesscode', 'idnumber');
    $access_code = $access_code_res->row()->accessCode_number + 1;
    $cdata['accessCode_number'] = $access_code;
    $this->Mdl_mysms->_update2('accesscode', ' idnumber',  $access_code_res->row()->idnumber, $cdata);
    $accessCode =  "NTT40000-".str_pad( "$access_code", 6, "0", STR_PAD_LEFT );
    //end create accesscode

    $site_id = $this->get('site_id');
    $user_id = $this->get('user_id');
    //$log_in_time =  $this->get('log_in_time');
    $log_in_time = mdate('%Y-%m-%d %H:%i:%s');
    $type = $this->get('type');
    $cotegory = $this->get('cotegory');
    $element = $this->get('element');
    $sub_element = $this->get('sub_element');
    $lotitude = $this->get('lotitude');
    $longitude = $this->get('longitude');
    $status = $this->get('status');
    //$date = $this->get('date');
    $date = mdate('%Y-%m-%d');

    //$data = array('id' => $$this->post('id'), 'name' => $$this->post('name'), 'email' => $this->post('email'));
    $data =array('accessCode'=> $accessCode, 'site_id' => $this->get('site_id') ,'user_id' => $this->get('user_id') ,'log_in_time' =>  $log_in_time ,'type' => $this->get('type') ,'cotegory' => $this->get('cotegory') ,'element' => $this->get('element') ,'sub_element' => $this->get('sub_element') ,'lotitude' => $this->get('lotitude') ,'longitude' => $this->get('longitude') ,'status' => $this->get('status') ,'date' => $date ); 
    $res = $this->Mdl_mysms->_insert_tb($table, $data);
    if($data){
        $this->response($data, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}



function siteclosing_get() {
    $table = 'accesscodeall_pm';
//localhost/sic/api/siteclosing?allopen=yes&accessCode=NTT40000-000207&site_id=02&user_id=4&hybridtype=02&hybridstatus=02&luku_Balance=02&dgRunHour=02&mainspowerfrailer=02&batterydischarge=02&hightemperature=02&commondgalarm=02&generatorrunng=02&generatorlowfuel=02&rectifierType=02&moduleNo=02&noWorking=02&notWorking=02&loadCurrent=02&powerConfiguration=02&shelterStatus=02&autonomyBTS=02&autonomyTX=02&remarks=02&log_out_time=02&status=02&closingAgent=u7y
//"allopen="+allopen+"&accessCode="+accessCode+"&site_id="+site_id+"&user_id="+user_id+"&dg_fuel="+dg_fuel+"&hybridtype="+hybridtype+"&hybridstatus="+hybridstatus+"&luku_Balance="+luku_Balance+"&dgRunHour="+nHour+"&mainspowerfrailer="+mainspowerfrailer+"&batterydischarge="+batterydischarge+"&hightemperature="+hightemperature+"&commondgalarm="+commondgalarm+"&generatorrunng="+generatorrunng+"&generatorlowfuel="+generatorlowfuel+"&dgbatterystatus="+dgbatterystatus+"&rectifierType="+rectifierType+"&moduleNo="+moduleNo+"&noWorking="+noWorking+"&notWorking="+notWorking+"&loadCurrent="+loadCurrent+"&powerConfiguration="+powerConfiguration+"&shelterStatus="+shelterStatus+"&autonomyBTS="+autonomyBTS+"&autonomyTX="+autonomyTX+"&remarks="+remarks+"&log_out_time="+log_out_time+"&status="+status+"&closingAgent="+closingAgent
    $allopen = $this->get('allopen');
    $accessCode = $this->get('accessCode');
    $site_id  = $this->get('site_id');
    $user_id = $this->get('user_id');
    $closingAgent  = $this->Mdl_mysms->get_where_custom_tb('user_info', 'user_ID', $user_id)->row()->fname+" "+$this->Mdl_mysms->get_where_custom_tb('user_info', 'user_ID', $user_id)->row()->sname+" "+$this->Mdl_mysms->get_where_custom_tb('user_info', 'user_ID', $user_id)->row()->lname; //read name from users table


    if ($allopen == "yes") {
        # code...
        $data =array('dg_fuel' => $this->get('dg_fuel') ,'hybridtype' => $this->get('hybridtype') ,'hybridstatus' => $this->get('hybridstatus') ,'luku_Balance' => $this->get('luku_Balance') ,'dgRunHour' => $this->get('dgRunHour') ,'mainspowerfrailer' => $this->get('mainspowerfrailer') ,'batterydischarge' => $this->get('batterydischarge') ,'hightemperature' => $this->get('hightemperature') ,'commondgalarm' => $this->get('commondgalarm') ,'generatorrunng' => $this->get('generatorrunng') ,'generatorlowfuel' => $this->get('generatorlowfuel') ,'dgbatterystatus' => $this->get('dgbatterystatus'),  'rectifierType' => $this->get('rectifierType') ,'moduleNo' => $this->get('moduleNo') ,'noWorking' => $this->get('noWorking') ,'notWorking' => $this->get('notWorking') ,'loadCurrent' => $this->get('loadCurrent') ,'powerConfiguration' => $this->get('powerConfiguration') ,'shelterStatus' => $this->get('shelterStatus') ,'autonomyBTS' => $this->get('autonomyBTS') ,'autonomyTX' => $this->get('autonomyTX') ,'remarks' => $this->get('remarks') ,'log_out_time' => $this->get('log_out_time') ,'status' => $this->get('status') ,'closingAgent' => $closingAgent ); 
        $res = $this->Mdl_mysms->_update2( $table, 'site_id', $site_id, $data);
        if($data){
            $this->response($data, 200);
        }else{
            $this->response(NULL, 404);
        }
    } else if ($allopen == "no") {
        # code...
         $data =array('dg_fuel' => $this->get('dg_fuel') ,'hybridtype' => $this->get('hybridtype') ,'hybridstatus' => $this->get('hybridstatus') ,'luku_Balance' => $this->get('luku_Balance') ,'dgRunHour' => $this->get('dgRunHour') ,'mainspowerfrailer' => $this->get('mainspowerfrailer') ,'batterydischarge' => $this->get('batterydischarge') ,'hightemperature' => $this->get('hightemperature') ,'commondgalarm' => $this->get('commondgalarm') ,'generatorrunng' => $this->get('generatorrunng') ,'generatorlowfuel' => $this->get('generatorlowfuel') ,'dgbatterystatus' => $this->get('dgbatterystatus'),  'rectifierType' => $this->get('rectifierType') ,'moduleNo' => $this->get('moduleNo') ,'noWorking' => $this->get('noWorking') ,'notWorking' => $this->get('notWorking') ,'loadCurrent' => $this->get('loadCurrent') ,'powerConfiguration' => $this->get('powerConfiguration') ,'shelterStatus' => $this->get('shelterStatus') ,'autonomyBTS' => $this->get('autonomyBTS') ,'autonomyTX' => $this->get('autonomyTX') ,'remarks' => $this->get('remarks') ,'log_out_time' => $this->get('log_out_time') ,'status' => $this->get('status') ,'closingAgent' => $closingAgent ); 
        $res = $this->Mdl_mysms->_update2( $table, 'accessCode', $accessCode, $data);
        if($data){
            $this->response($data, 200);
        }else{
            $this->response(NULL, 404);
        }
    }
    
   
    
         
    



    /*
    dg_fuel 1
    hybridtype 2
    rectifierType 3
    moduleNo 4
    noWorking 5 
    loadCurrent 6
    autonomyBTS 7
    autonomyTX 8
    powerConfiguration 9
    dgbatterystatus                   ----10 not in d--
    shelterStatus 11        -----correct it----
    hybridstatus 12
    luku_Balance 13
    dgRunHour 14
    mainspowerfrailer 15
    batterydischarge 16
    generatorrunng 17
    generatorlowfuel 18
    hightemperature 19
    commondgalarm 20
    remarks 21
    
    
    notWorking  4-5
    log_out_time
    status
    closingAgent
    */



}

 
//REFUERING (Records).........................
function fuel_get(){
    $table = 'fuelrequest';
    $res = $this->Mdl_mysms->get_tb($table, 'reqID')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}


//SPARE (Records).........................
function spare_get(){
    $table = 'spare';
    $res = $this->Mdl_mysms->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}


//CALLOUT (Records).........................
function callout_get(){
    $table = 'callout';
    $res = $this->Mdl_mysms->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}


//SITE (Records).........................
function site_get(){
    $table = 'site';
    $res = $this->Mdl_mysms->get_tb($table, 'site_id')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}


//TESTING ONLY
function test_get() {

    $id = $this->get('id');
    $name = $this->get('name');
    $email = $this->get('email');
    //$data = array('id' => $$this->post('id'), 'name' => $$this->post('name'), 'email' => $this->post('email'));
        $data = array('id'=>$id, 'name'=>$name, 'email'=>$email); 
    if($data){
        $this->response($data, 200);
    }else{
        $this->response(NULL, 404);
    }

     //$this->response("yes", 200);

        /*if($data) {
            $this->response(array('status' => 'success'));

        }  else  {
            $this->response(array('status' => 'failed'));
        }*/
         
}



}
?>