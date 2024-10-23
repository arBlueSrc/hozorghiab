<?php

use Select as GlobalSelect;

@session_start();
//include_once ("../../config/config.php");			
class Select extends DataBase //برای ارث بری استفاده می شود extends&&&  نام کلاس والد می باشدDataBase
{
	private $_SELECT  = "SELECT * FROM ";
	//limit word
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
	public function HeadBook($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `headbook` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function Purchase($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `user_payment` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function OneHeadBook($id = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `headbook` ";
		if ($id != '')
			$sql .= " WHERE `id`=" . $id . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function HeadBookMonth($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `headbook_day` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function HeadBookOnsor($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `headbook_onsor` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function WeeklyPrediction($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `weekly_prediction` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function OneWeeklyPrediction($id = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `weekly_prediction` ";
		if ($id != '')
			$sql .= " WHERE `id`=" . $id . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function AbjadIstikharah($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `abjad_istikharah` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Tiket($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `tiket` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function HandleMenu($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `main_menu` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Partnership($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `partnership` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Need($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `need` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Location($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `location` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Death($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `death` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function ChangeName($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `changename` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function AbsentStatus($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `absent_status` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Marriage($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `marriage` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function MarriageResult($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `marriage_result` ";
		if ($w != '')
			$sql .= " WHERE " . $w . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function cat_headbook($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `cat_headbook` ";
		if ($w != '')
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}
	public function Abjad_headbook($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
		$sql = $this->_SELECT . " `abjad` ";
		if ($w != '')
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
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

	function HashPassword($value)
	{
		return $hash = md5((base64_encode(md5($value . md5($value))) . "fg^%+_*/-555ghfs") . sha1("*/kj-+jkhk"));
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

	// public function check_code($u)
	// {			
	// 		$un = $this->check_post($u);	
	// 		if($this->check_name($un) == true)
	// 		{
	// 			return true;
	// 		}
	// 		else return false;		
	// }	


	public function loginAdmin($u, $p)
	{
		$un = $this->check_post($u);
		$pw = $this->check_post($p);
		$pw = $this->HashPassword($pw);
		if ($this->check_login_admin($un, $pw) == true) {
			return true;
		} else return false;
	}
	protected function check_login_admin($u, $p)
	{
		parent::__construct();
		$sql = $this->_SELECT . " `users` WHERE username=:u AND password=:p AND `ac`='100'  ";
		$r = $this->_DB->prepare($sql);
		$r->bindValue(':u', $u);
		$r->bindValue(':p', $p);
		$r->execute();
		$c = $r->rowCount();
		if ($c == 1) {
			foreach ($r->fetchAll() as $row);
			$_SESSION['log_true_admin'] = true;
			$_SESSION['name'] = $row['name'] . " " . $row['family'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id'] = $row['id'];
			return true;
		} else return false;
	}

	public function Show($text)
	{
		return  htmlspecialchars_decode(html_entity_decode($text));
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



	public function ForceUpdate($DESC = '', $start = 0, $end = 1, $w = '')
	{
		parent::__construct();

		$sql = $this->_SELECT . " `forceUpdate`";
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


	public function getAssignedUser($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();

		$sql = $this->_SELECT . " `assign_course_to_student`";
		if ($w != '') {
			$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";


		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}


	public function getAssignedUserToCourse($course_id = '', $DESC = 'DESC', $start = 0, $end = 300)
	{
		parent::__construct();

		$sql = $this->_SELECT . " `assign_course_to_student`";
		$sql .= " WHERE `parent_course`=" . $course_id; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";


		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function User($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();
        if(!isset($_SESSION))
        {
            session_start();ob_start();
        }

		$id = $_SESSION['admin_log_id'];

		$sql = $this->_SELECT . " `students`";
		if ($w != '') {
			$w = $this->check_post($w);
			$sql .= " WHERE " . $w . " AND `id`=" . $id . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		} else {
			$sql .= " WHERE `parent_user`=" . $id . "";
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function Admins($DESC = '', $start = 0, $end = 300, $w = '')
	{
		parent::__construct();
        if(!isset($_SESSION))
        {
            session_start();ob_start();
        }

		$id = $_SESSION['admin_log_id'];

		$sql = $this->_SELECT . " `users`";

		$sql .= " WHERE `user_type`= 2";

		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}



	public function classes($DESC = '', $start = 0, $end = 50, $w = '', $course_id = 2)
	{
		parent::__construct();

		if ($course_id == "") {
			$course_id = 0;
		}

		$sql = $this->_SELECT . " `classes`";
		$sql .= " WHERE `parent_course`=" . $course_id . "";
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function getClassCourse($class_id)
	{
		parent::__construct();
		$sql = "SELECT * FROM `classes` WHERE `id`=" . $class_id;
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function getAbsentUsers($course_id, $class_id)
	{
		parent::__construct();
		$sql = "SELECT * FROM `assign_course_to_student` INNER JOIN students ON students.id = assign_course_to_student.student WHERE course=" . $course_id . " AND `student` NOT IN (SELECT present_list.student_id FROM present_list WHERE present_list.class_id=" . $class_id . ")";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}


	public function courses($DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();

        if(!isset($_SESSION))
        {
            session_start();ob_start();
        }

		$id = $_SESSION['admin_log_id'];

		$sql = $this->_SELECT . " `courses`";
		if ($w != '') {
			$w = $this->check_post($w);
			$sql .= " WHERE " . $w . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		} else {
			$sql .= " WHERE `parent_user`=" . $id . "";
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function oneUser($id)
	{
		parent::__construct();

		$sql = "SELECT * FROM `students` WHERE `id`='" . $id . "'";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function getPresent($class_id)
	{
		parent::__construct();

		$sql = "SELECT * FROM `present_list` WHERE `class_id`='" . $class_id . "'";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}

	public function getPresentUsers($class_id)
	{
		parent::__construct();

		$sql = "SELECT students.id, students.name, students.family, students.national_code FROM `present_list`
			INNER JOIN students ON students.id = present_list.student_id
			WHERE class_id='" . $class_id . "'";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll();
	}


	public function existsInArray($entry, $array)
	{
		foreach ($array as $compare) {
			if ($compare['student_id'] == $entry['id']) {
				return true;
			}
			return false;
		}
	}



	public function checkUsersPresent($student_id, $class_id, $DESC = '', $start = 0, $end = 50, $w = '')
	{
		parent::__construct();

		$sql = $this->_SELECT . " `present_list`";
		if ($w != '') {
			$w = $this->check_post($w);
			$sql .= " WHERE `student_id`=" . $student_id . " AND `class_id`=" . $class_id . ""; //در صورتی که مخالف خالی بود به متغیر هم نام قبلی می چسباند
		}
		$sql .= " ORDER BY `id` " . $DESC . " LIMIT " . $start . "," . $end . "";
		$r = $this->_DB->prepare($sql);
		$r->execute();
		return $r->fetchAll(PDO::FETCH_ASSOC);
	}


	public function checkLogin($u, $p)
	{
		$un = $this->check_post($u);
		$pw = $this->check_post($p);
		$pw = $this->HashPassword($pw);
		$id = $this->check_login_api($un, $pw);
		if ($id != -1) {
			$r['result'] = $id;
		} else $r['result'] = "fail";
	}

	protected function check_login_api($u, $p)
	{
		parent::__construct();
		$sql = $this->_SELECT . " `users` WHERE username=:u AND password=:p AND `ac`='100'  ";
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
