<?php
// session_start();
// include ("../config/config.php");	
class Select extends DataBase //برای ارث بری استفاده می شود extends&&&  نام کلاس والد می باشدDataBase
{
	private $_SELECT  = "SELECT * FROM ";

	public function CheckPost($w)
	{
		$Return1 = htmlspecialchars($w);
		$Return2 = stripslashes($Return1);
		$Return3 = htmlentities($Return2); //xss حفاظت در برابر حملات 
		$Return4 = strip_tags($Return3); //xss حفاظت در برابر حملات 
		$Return5 = trim($Return4);
		return $Return5;
	}

	function HashPassword($value)
	{
		return md5($value);
	}



	public function classes($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();

		$sql = $this->_SELECT . " `classes`";//در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}

	public function userClasses($course_id)
	{
		parent::__construct();

		$sql = "SELECT * FROM `classes` WHERE `parent_course`=".$course_id;
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}

	public function userCourses($user_id)
	{
		parent::__construct();

		$sql = "SELECT * FROM `courses` WHERE `parent_user`=".$user_id;
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}


	public function userCoursesAdmin($user_id)
	{
		parent::__construct();

		$sql = "SELECT courses.id,courses.name,courses.parent_user FROM `courses` INNER JOIN assign_course_to_admin ON courses.id = assign_course_to_admin.course_id WHERE assign_course_to_admin.user_id = ".$user_id;
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getUserType($user_id)
	{
		parent::__construct();

		$sql = "SELECT * FROM `users` WHERE `id`=".$user_id." LIMIT 1";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}

	
	public function checkUsersPresent($student_id, $class_id, $DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();

		$sql = $this->_SELECT . " `present_list`";

		$sql .= " WHERE `student_id`=" . $student_id . " AND `class_id`=" . $class_id . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند


		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}




	function limit_word($string, $limit)
	{
		$words = explode(" ", $string);
		$output = implode(" ", array_splice($words, 0, $limit));
		return $output;
	}
	public function ConverterDate($StrToTime)
	{
		$new = strtotime("now");
		$old = $StrToTime;
		$conut = intval($new - $old);
		if ($conut < 60) {
			echo $conut . " ثانیه قبل";
		}
		if ($conut > 60 && $conut < 3600) {
			$t = $this->FA_Number(floor(($conut / 60)));
			echo $t . " دقیقه قبل";
		}
		if ($conut > 3600 && $conut < 86400) {
			$t = $this->FA_Number(floor(($conut / 60) / 60));
			echo $t . " ساعت قبل";
		}
		if ($conut > 86400 && $conut < 2592000) {
			$t = $this->FA_Number(floor((($conut / 60) / 60) / 24));
			echo $t . " روز قبل";
		}
		if ($conut > 2592000 && $conut < 31104000) {
			$t = $this->FA_Number(floor(((($conut / 60) / 60) / 24) / 12));
			echo $t . " ماه قبل";
		}
		if ($conut > 31104000) {
			echo " سال گذشته";
		}
		if ($conut > (31104000 * 2)) {
			echo " دو سال گذشته";
		}
	}
	function FA_Number($num)
	{
		$eng = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		$per = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
		return str_replace($eng, $per, $num);
	}
	public function ConvertNumber($number)
	{

		$ones = array("", "یک", 'دو&nbsp;', "سه", "چهار", "پنج", "شش", "هفت", "هشت", "نه", "ده", "یازده", "دوازده", "سیزده", "چهارده", "پانزده", "شانزده", "هفده", "هجده", "نونزده");
		$tens = array("", "", "بیست", "سی", "چهل", "پنجاه", "شصت", "هفتاد", "هشتاد", "نود");
		$tows = array("", "صد", "دویست", "سیصد", "چهار صد", "پانصد", "ششصد", "هفتصد", "هشت صد", "نه صد");


		if (($number < 0) || ($number > 999999999)) {
			throw new Exception("Number is out of range");
		}
		$Gn = floor($number / 1000000);
		/* Millions (giga) */
		$number -= $Gn * 1000000;
		$kn = floor($number / 1000);
		/* Thousands (kilo) */
		$number -= $kn * 1000;
		$Hn = floor($number / 100);
		/* Hundreds (hecto) */
		$number -= $Hn * 100;
		$Dn = floor($number / 10);
		/* Tens (deca) */
		$n = $number % 10;
		/* Ones */
		$res = "";
		if ($Gn) {
			$res .= $this->ConvertNumber($Gn) .  " میلیون و ";
		}
		if ($kn) {
			$res .= (empty($res) ? "" : " ") . $this->ConvertNumber($kn) . " هزار و";
		}
		if ($Hn) {
			$res .= (empty($res) ? "" : " ") . $tows[$Hn] . " و ";
		}
		if ($Dn || $n) {
			if (!empty($res)) {
				$res .= "";
			}
			if ($Dn < 2) {
				$res .= $ones[$Dn * 10 + $n];
			} else {
				$res .= $tens[$Dn];
				if ($n) {
					$res .= " و " . $ones[$n];
				}
			}
		}
		if (empty($res)) {
			$res = "صفر";
		}
		$res = rtrim($res, " و");
		return $res;
	}
	public function InsertContectUs($array)
	{
		parent::__construct();
		$sql = "INSERT INTO `tiket` (`email`, `date`, `txt`,`lang`) VALUES (:email, :date, :txt,:lang);";
		$r = $this->_DB->prepare($sql);
		return 	 $r->execute($array);
		$r->errorInfo();
	}
	public function InsertUser($array)
	{
		parent::__construct();
		$sql = "INSERT INTO `user` (`email`, `password`, `d`, `m`, `y`, `gender`,`name`) VALUES (:email, :password, :d, :m, :y, :gender,:name);";
		$r = $this->_DB->prepare($sql);
		return 	  $r->execute($array);
		$r->errorInfo();
	}
	public function CountUserEmail($array)
	{
		parent::__construct();
		$sql = $this->_SELECT . " `user` WHERE `email`=:email";
		$r = $this->_DB->prepare($sql);
		$r->execute($array);
		return 	$r->rowCount();
		$r->errorInfo();
	}

	public function ChangeName($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `changename` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Location($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `location` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Death($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `death` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Need($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `need` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Partnership($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `partnership` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Week($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `week` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function AbsentStatus($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `absent_status` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Estekhare($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `abjad_istikharah` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Marriage($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `marriage_result` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function HeadBook($w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `headbook` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function Abjad($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `abjad` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	function check_login_admin($u, $p)
	{
		parent::__construct();
		$sql =  $this->_SELECT . " users WHERE email=:u AND password=:p AND (user_type=2 OR user_type=1)";
		$r = $this->_DB->prepare($sql);
		$r->bindValue(':u', $u);
		$r->bindValue(':p', $p);
		$result = $r->execute();
		$c = $r->rowCount();
		if ($c === 1) {
			foreach ($r->fetchAll() as $row);
			$_SESSION['admin_log_true'] = true;
			$_SESSION['admin_log_name'] = $row['name'];
			$_SESSION['admin_log_email'] = $row['email'];
			$_SESSION['admin_log_id'] = $row['id'];

			if($row['user_type'] == 1){
				return 1;
			}else{
				return 2;
			}
		} else return 0;
	}


	function logout()
	{
		parent::__construct();

		$_SESSION['admin_log_true'] = false;
		$_SESSION['admin_log_name'] = "";
		$_SESSION['admin_log_email'] = "";
		$_SESSION['admin_log_id'] = "";
	}


	function Get_percent($percent, $price)
	{
		$percent = 100 - $percent;
		return round(($percent / 100) * $price, 2);
	}

	function GetRealIp()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else
			$ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}


	public function Show($text)
	{
		return  strip_tags(htmlspecialchars_decode(html_entity_decode($text)));
		// 		return  htmlspecialchars_decode(htmlentities($text));
	}

	public function ProductRandom($start = 0, $w = '')
	{
		parent::__construct();
		$sql = "SELECT * FROM `product` ORDER BY RAND()  LIMIT 5 ";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}


	public function Users($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();

		$sql = $this->_SELECT . " `users`";
		if ($w != '') {
			$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}


	// واکشی اطلاعات جدول اخبار
	public function News($DESC = '', $start = '0', $end = '10', $w = '', $orderBy = 'id')
	{
		parent::__construct();
		//$id='id';
		$sql = $this->_SELECT . " `news`";
		if ($w != '') {
			$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		if ($end == '#') {
			$sql .= " ORDER BY `$orderBy` " . $DESC . " LIMIT " . $start . "," . $end . "";
		} else
			$sql .= " ORDER BY `$orderBy` " . $DESC . " LIMIT " . $start . "," . $end . "";

		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	// واکشی اطلاعات جدول اخبار
	public function NewsCount()
	{
		parent::__construct();
		//$id='id';
		$sql = $this->_SELECT . " `news` WHERE `ac`='1' AND `state`='1' ";

		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->rowCount();
	}

	public function Cat1news($DESC = 'desc', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `cat1news`";
		if ($w != '') {
			//	$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Cat2news($DESC = 'desc', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `cat2news`";
		if ($w != '') {
			//	$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Cat3news($DESC = 'desc', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `cat3news`";
		if ($w != '') {
			//	$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Cat4news($DESC = 'desc', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `cat4news`";
		if ($w != '') {
			//	$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}



	public function Baner($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `baner`";
		if ($w != '') {
			$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	//(poll) واکشی جدول نظرسنجی
	public function Poll($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `poll`";
		if ($w != '') {
			$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}


	public function Menu($level = 0)
	{
		parent::__construct();
		$sql = $this->_SELECT . " `menu` WHERE parent_id='" . $level . "' ORDER by sort ASC";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		foreach ($r->fetchAll() as $row) {
			$name = $row['name'];
			$id = $row['id'];
			$link = $row['link'];
			echo '<li><a href="' . $link . '" style="font-family:byekan;font-size:14px"><b>' . $name . '</b></a>';

			$sql1 = $this->_SELECT . " `menu` WHERE parent_id='" . $id . "'  ";
			$r1 = $this->_DB->prepare($sql1);
			$r1->execute();
			$count = $r1->rowCount();
			if ($count > 0) {
				echo '<ul  class="sub-menu">';
				$this->menu($id);
				echo '</ul>';
			}
			echo '</li>';
		}
	}


	public function User($user_id)
	{
		parent::__construct();

		$sql = "SELECT * FROM `user_payment` WHERE `user_id`=$user_id";


		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}


	public function diffBtwTimesAsPerType($start, $end, $returnType = 3)
	{
		$seconds_diff = $start - $end;
		if ($returnType == 1) {
			return $seconds_diff / 60; //minutes
		} else if ($returnType == 2) {
			return $seconds_diff / 3600; //hours
		} else {
			return $seconds_diff / 3600 / 24; //days
		}
	}


	private function check_post($w)
	{
		$Return1 = htmlspecialchars($w);
		$Return2 = stripslashes($Return1);
		$Return3 = htmlentities($Return2); //xss حفاظت در برابر حملات 
		$Return4 = strip_tags($Return3); //xss حفاظت در برابر حملات 
		$Return5 = trim($Return4);
		return $Return5;
	}

	public function checkLogin($u, $p)
	{

		$un = $this->check_post($u);
		$pw = $this->check_post($p);
		$pw = $this->HashPassword($pw);
		$id = $this->check_login_api($un, $pw);
		if ($id != -1) {

			return  $id;
		} else {
			return "fail";
		}
	}

	protected function check_login_api($u, $p)
	{
		parent::__construct();
		$sql = $this->_SELECT . " `users` WHERE email=:u AND password=:p";
		$r = $this->_DB->prepare($sql);
		$r->bindValue(':u', $u);
		$r->bindValue(':p', $p);
		$r->execute();
		$c = $r->rowCount();
		if ($c == 1) {
			foreach ($r->fetchAll() as $row);

			return $row['id'];
		} else return -1;
	}
}
////////////////////////////////////////////////////   query builder   ////////////////////////////////////////////////////////


class ent extends DataBase
{

	private function check_post($w)
	{
		$Return1 = htmlspecialchars($w);
		$Return2 = stripslashes($Return1);
		$Return3 = htmlentities($Return2); //xss حفاظت در برابر حملات 
		$Return4 = strip_tags($Return3); //xss حفاظت در برابر حملات 
		$Return5 = trim($Return4);
		return $Return5;
	}


	public function Create($a)
	{
		$sql = "INSERT INTO " . $a['table'] . "(";
		unset($a["table"]);
		$keys = array_keys($a);
		foreach ($keys as $colu) {
			$sql = $sql . $colu . ",";
		}
		$sql = substr($sql, 0, -1);
		$sql = $sql . ") VALUES (";
		foreach ($a as $val) {
			$sql = $sql . $val . ",";
		}
		$sql = substr($sql, 0, -1);
		$sql = $sql . ")";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r;
	}

	public function Read($a, $w = '')
	{
		if (isset($a['colu'])) {
			$sql = "SELECT " . $a['colu'] . " FROM " . $a['table'];
		} else {
			$sql = "SELECT * FROM " . $a['table'];
		}
		if ($w != '') {
			$w = $this->check_post($w);
			$sql = $sql . " WHERE " . $w;
		}
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function Update($a, $w = '')
	{
		$w = $this->check_post($w);
		$sql = " UPDATE " . $a['table'] . " SET ";
		unset($a["table"]);
		$keys = array_keys($a);
		foreach ($keys as $colu) {
			$sql = $sql . $colu . " = " . $a[$colu] . " ,";
		}
		$sql = substr($sql, 0, -1);

		$sql = $sql . " WHERE " . $w;
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}


	public function Delete($a)
	{
		$sql = " DELETE FROM " . $a['table'];
		unset($a["table"]);
		$sql = $sql . " WHERE ";
		foreach ($a as $colu => $val) {
			$sql = $sql . $colu . " = " . $val . " AND ";
		}
		$sql = substr($sql, 0, -5);

		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
}

class query_builder extends DataBase
{

	private function check_post($w)
	{
		$Return1 = htmlspecialchars($w);
		$Return2 = stripslashes($Return1);
		$Return3 = htmlentities($Return2); //xss حفاظت در برابر حملات 
		$Return4 = strip_tags($Return3); //xss حفاظت در برابر حملات 
		$Return5 = trim($Return4);
		return $Return5;
	}


	public function Create($data)
	{
		$sql = "INSERT INTO " . $data['table'];
		unset($data["table"]);
		$colus = "(";
		$values = "(";
		$execute_array = [];
		foreach ($data as $key => $val) {
			$colus = $colus . $key . ",";
			$values = $values . ":" . $key . ",";
			$execute_array[":" . $key] = $this->check_post($val);
		}
		$colus = substr($colus, 0, -1);
		$colus = $colus . ")";
		$values = substr($values, 0, -1);
		$values = $values . ")";
		$sql = $sql . $colus . " VALUES " . $values;

		$r = $this->_DB->prepare($sql);
		$r->execute($execute_array);
		// print_r($r->errorInfo());
		return "true";
	}



	public function Read(array $data, array $where = [], $order = [], $limit = null, $ofset = null)
	{
		$oprators = [
			"<" => "<",
			">" => ">",
			"<=" => ">=",
			"=" => "=",
			"!=" => "!=",
			"a" => "ASC",
			"d" => " DESC",
		];
		if (isset($data['colu'])) {
			$sql = "SELECT " . $data['colu'] . " FROM " . $data['table'];
		} else {
			$sql = "SELECT * FROM " . $data['table'];
		}
		if ($where) {
			$sql = $sql . " WHERE ";
			$execute_array = [];
			foreach ($where as $key => $val) {
				$sql = $sql . $key . $oprators[$val[1]] . " :" . $key . " AND ";
				$execute_array[":" . $key] = $this->check_post($val[0]);
			}
			$sql = substr($sql, 0, -5);
		}
		if ($order) {
			$sql = $sql . " ORDER BY ";
			foreach ($order as $key => $val) {
				$sql = $sql . $key . " " . $oprators[$val] . " ,";
			}
			$sql = substr($sql, 0, -1);
		}
		if ($limit) {
			$sql = $sql . " LIMIT " . $limit;
		}
		if ($ofset) {
			$sql = $sql . " OFFSET " . $limit;
		}
		// 		print_r($sql);
		if (isset($execute_array)) {
			$r = $this->_DB->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$r->execute($execute_array);
		} else {
			$r = $this->_DB->prepare($sql);
			$r->execute();
		}
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}



	public function Update($data, $where = [])
	{
		$sql = " UPDATE " . $data['table'] . " SET ";
		unset($data["table"]);

		$execute_array = [];
		foreach ($data as $key => $val) {
			$sql = $sql . $key . " = :" . $key . ",";
			$execute_array[":" . $key] = $this->check_post($val);
		}
		$sql = substr($sql, 0, -1);
		if ($where) {
			$oprators = [
				"<" => "<",
				">" => ">",
				"<=" => ">=",
				"=" => "=",
				"!=" => "!=",
			];
			$sql = $sql . " WHERE ";
			foreach ($where as $key => $val) {
				$sql = $sql . $key . $oprators[$val[1]] . " :w" . $key . " AND ";

				$execute_array[":w" . $key] = $this->check_post($val[0]);
			}
			$sql = substr($sql, 0, -5);
		}
		$r = $this->_DB->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		return $r->execute($execute_array);
	}


	public function check_update()
	{
		parent::__construct();

		$sql = "SELECT * FROM `forceUpdate` LIMIT 1";


		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}
}
