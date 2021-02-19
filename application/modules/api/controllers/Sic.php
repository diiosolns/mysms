<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
 
class Sic extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('date');
        $this->load->module('Admin');
        $this->load->model('Mdl_sic');
        $this->load->model('Mdl_mauzo');
    }


public function index_get(){

  $this->response($this->db->get('sic_user')->result());
}


//USER INFORMATION.................
function users_get(){
    $table= 'sic_user';
        $users = $this->Mdl_sic->get_users('id',$table)->result();
        if($users){
            $this->response($users, 200);
        }else{
            $this->response(NULL, 404);
        }
    }

function cpwrd_get() {
    $table = 'sic_user';
    $userid = $this->get('id');
    $username = $this->get('username');
    $pwrd = $this->get('pwrd');
    $date = mdate('%Y-%m-%d');
   
    $data = array('password'=>$pwrd); 
    $res = $this->Mdl_sic->_update2($table, 'username', $username, $data);
    if($data){
        $this->response($data, 200);
    }else{
        $this->response(NULL, 404);
    }
         
}

function login_get() {
    $table = 'sic_user';
    /*$userid = $this->get('id');*/
    $username = $this->get('username');
    $pwrd = $this->get('pwrd');
    $chckres = $this->Mdl_sic->get_where_custom_tb($table, 'username', $username);
    if ($chckres->num_rows() > 0) {
        # code...
        if ($pwrd == $chckres->row()->password) {
            # code...
            $feedback = $chckres->row()->id;
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
    $table = 'sic_user';
    /*$userid = $this->get('id');*/
    $username = $this->get('username');
    $pwrd = $this->get('pwrd');
    $date = mdate('%Y-%m-%d');
    $data = array('username'=>$username, 'password'=>$pwrd, 'udate'=>$date); 
    $chckres = $this->Mdl_sic->get_where_custom_tb($table, 'username', $username);
    if ($chckres->num_rows() > 0) {
        # code...
        $feedback = "Exist";
    } else {
        $res = $this->Mdl_sic->_insert_tb($table, $data);
        $feedback = "Done";
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


// START CODE........................

function codedown_get() {
    $table = 'code';
    $code = $this->get('code');
    
    $chckres = $this->Mdl_sic->get_where_custom2($table, 'code', $code, 'status', 'Available');
    if ($chckres->num_rows() > 0) {
        # code...
        $data = array('status'=> "Used");
        $update = $this->Mdl_sic->_update2($table, 'id', $chckres->row()->id, $data );
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







//PM (Answers  and Photos).........................
function pmans_get(){
    $table = 'preventivemaintenance';
    $res = $this->Mdl_sic->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}

function pmphoto_get(){
    $table = 'pm_photo';
    $res = $this->Mdl_sic->get_tb($table, 'accessCode')->result();
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
    $res = $this->Mdl_sic->_insert_tb($table, $data);
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
    $res = $this->Mdl_sic->_insert_tb($table, $data);
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
    $res = $this->Mdl_sic->get_tb($table, 'accessCode')->result();
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
    $res = $this->Mdl_sic->_insert_tb($table, $data);
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
    $res = $this->Mdl_sic->_insert_tb($table, $data);
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
    $res = $this->Mdl_sic->get_tb($table, 'accessCode')->result();
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
    $access_code_res = $this->Mdl_sic->get_tb('accesscode', 'idnumber');
    $access_code = $access_code_res->row()->accessCode_number + 1;
    $cdata['accessCode_number'] = $access_code;
    $this->Mdl_sic->_update2('accesscode', ' idnumber',  $access_code_res->row()->idnumber, $cdata);
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
    $res = $this->Mdl_sic->_insert_tb($table, $data);
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
    $closingAgent  = $this->Mdl_sic->get_where_custom_tb('user_info', 'user_ID', $user_id)->row()->fname+" "+$this->Mdl_sic->get_where_custom_tb('user_info', 'user_ID', $user_id)->row()->sname+" "+$this->Mdl_sic->get_where_custom_tb('user_info', 'user_ID', $user_id)->row()->lname; //read name from users table


    if ($allopen == "yes") {
        # code...
        $data =array('dg_fuel' => $this->get('dg_fuel') ,'hybridtype' => $this->get('hybridtype') ,'hybridstatus' => $this->get('hybridstatus') ,'luku_Balance' => $this->get('luku_Balance') ,'dgRunHour' => $this->get('dgRunHour') ,'mainspowerfrailer' => $this->get('mainspowerfrailer') ,'batterydischarge' => $this->get('batterydischarge') ,'hightemperature' => $this->get('hightemperature') ,'commondgalarm' => $this->get('commondgalarm') ,'generatorrunng' => $this->get('generatorrunng') ,'generatorlowfuel' => $this->get('generatorlowfuel') ,'dgbatterystatus' => $this->get('dgbatterystatus'),  'rectifierType' => $this->get('rectifierType') ,'moduleNo' => $this->get('moduleNo') ,'noWorking' => $this->get('noWorking') ,'notWorking' => $this->get('notWorking') ,'loadCurrent' => $this->get('loadCurrent') ,'powerConfiguration' => $this->get('powerConfiguration') ,'shelterStatus' => $this->get('shelterStatus') ,'autonomyBTS' => $this->get('autonomyBTS') ,'autonomyTX' => $this->get('autonomyTX') ,'remarks' => $this->get('remarks') ,'log_out_time' => $this->get('log_out_time') ,'status' => $this->get('status') ,'closingAgent' => $closingAgent ); 
        $res = $this->Mdl_sic->_update2( $table, 'site_id', $site_id, $data);
        if($data){
            $this->response($data, 200);
        }else{
            $this->response(NULL, 404);
        }
    } else if ($allopen == "no") {
        # code...
         $data =array('dg_fuel' => $this->get('dg_fuel') ,'hybridtype' => $this->get('hybridtype') ,'hybridstatus' => $this->get('hybridstatus') ,'luku_Balance' => $this->get('luku_Balance') ,'dgRunHour' => $this->get('dgRunHour') ,'mainspowerfrailer' => $this->get('mainspowerfrailer') ,'batterydischarge' => $this->get('batterydischarge') ,'hightemperature' => $this->get('hightemperature') ,'commondgalarm' => $this->get('commondgalarm') ,'generatorrunng' => $this->get('generatorrunng') ,'generatorlowfuel' => $this->get('generatorlowfuel') ,'dgbatterystatus' => $this->get('dgbatterystatus'),  'rectifierType' => $this->get('rectifierType') ,'moduleNo' => $this->get('moduleNo') ,'noWorking' => $this->get('noWorking') ,'notWorking' => $this->get('notWorking') ,'loadCurrent' => $this->get('loadCurrent') ,'powerConfiguration' => $this->get('powerConfiguration') ,'shelterStatus' => $this->get('shelterStatus') ,'autonomyBTS' => $this->get('autonomyBTS') ,'autonomyTX' => $this->get('autonomyTX') ,'remarks' => $this->get('remarks') ,'log_out_time' => $this->get('log_out_time') ,'status' => $this->get('status') ,'closingAgent' => $closingAgent ); 
        $res = $this->Mdl_sic->_update2( $table, 'accessCode', $accessCode, $data);
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
    $res = $this->Mdl_sic->get_tb($table, 'reqID')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}


//SPARE (Records).........................
function spare_get(){
    $table = 'spare';
    $res = $this->Mdl_sic->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}


//CALLOUT (Records).........................
function callout_get(){
    $table = 'callout';
    $res = $this->Mdl_sic->get_tb($table, 'accessCode')->result();
    if($res){
        $this->response($res, 200);
    }else{
        $this->response(NULL, 404);
    }
}


//SITE (Records).........................
function site_get(){
    $table = 'site';
    $res = $this->Mdl_sic->get_tb($table, 'site_id')->result();
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