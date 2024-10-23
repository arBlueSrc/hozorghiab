<?php
//include ("../object/jdf.php");

class Conter extends DataBase
{
	private $m1 = 0;
	private $m2 = 0;
	private $m3 = 0;
	private $m4 = 0;
	private $m5 = 0;
	private $m6 = 0;
	private $m7 = 0;
	private $m8 = 0;
	private $m9 = 0;
	private $m10 = 0;
	private $m11 = 0;
	private $m12 = 0;
	private $_SELECT  = "SELECT * FROM ";
	
	
         //نمایش تعداد کاراکترهای مشخص از متن	
	function get_excerpt($text, $numb = 200)
        {
            if (mb_strlen($text) > $numb)
            {
            $text = strip_tags($text);       
  	    $text = substr($text, 0, $numb);
            $text = mb_substr($text, 0, mb_strrpos($text, " "));
            $etc = "...";
            $text = $text . $etc;
            }
          return $text;
        }
        //اضافه کردن به تعداد like در جدول comments
	public function AddLike($id)
	{
			parent::_construct();
			$sql = $this->_SELECT."`comments` WHERE `id`='".$id."'";
			$r = $this->_DB->prepare($sql);
			$r->execute();
			foreach ($r->fetchAll()as $rows)
			$like = $rows['like'] + 1;
			$add = "UPDATE `comments` set `like`='".$like."' WHERE `id`='".$id."'";
			$r = $this->_DB->prepare($Add);
			$r->execute();			
	}
	//واکشی عکس های مربوط به خبر خاص
	public function FetchImg($cat)
	{
			parent::__construct();
			$sql = $this->_SELECT." `news` WHERE `news`.`cat`='".$cat."'";
			$r = $this->_DB->prepare($sql);
			$r->execute();
			foreach ($r->fetchAll() as $row)
			$r1->execute();
			return $r1;			
	}
	// تبدیل زمان به دقیقه و ساعت و روز و ماه و سال
	public function ConverterDate($StrToTime)
	{		
			$new = strtotime("now");			
			$old = $StrToTime;			
			$conut = ($new-$old);		
			if($conut < 60)
				echo $conut." ثانیه قبل";
			if($conut > 60 && $conut < 3600)
				echo (floor($conut/60))." دقیقه قبل";
			if($conut > 3600 && $conut < 86400)
				echo (floor($conut/60)/60)." ساعت قبل";
			if($conut > 86400 && $conut < 2592000)
				echo (floor(($conut/60)/60)/24)." روز قبل";
			if($conut > 2592000 && $conut < 31104000)
				echo (floor((($conut/60)/60)/24)/12)." ماه قبل";
			if($conut > 31104000)
				echo " سال گذشته";
			if($conut > (31104000*2))
				echo "دو سال گذشته";				
	}
	//با هر کلیک یکی به count در news اضافه گردد.
	public function AddCount($id)
	{		
			parent::__construct();
			$sql = $this->_SELECT." `news` WHERE `id`='".$id."'";			
			$r = $this->_DB->prepare($sql);
			$r->execute();
			foreach ($r->fetchAll() as $row)
			$count = $row['count'] + 1;
			$add = "UPDATE `news` SET `count` = '".$count."' WHERE `id`='".$id."'";
			$r1 = $this->_DB->prepare($add);
			$r1->execute();	
	}
	// تعداد نظرات
	public function CountComment()
	{		
			parent::__construct();
			$sql = $this->_SELECT." `comment`";			
			$r = $this->_DB->prepare($sql);
			$r->execute();
			return $r->rowCount();	
	}
	// کل اخبار
	public function CountNews()
	{		
			parent::__construct();
			$sql = $this->_SELECT." `news`";			
			$r = $this->_DB->prepare($sql);
			$r->execute();
			return $r->rowCount();	
	}
	
	public function CountProduct()
	{		
			parent::__construct();
			$sql = $this->_SELECT." `product`";			
			$r = $this->_DB->prepare($sql);
			$r->execute();
			return $r->rowCount();	
	}
	
	//کل اخبار امروز(بررسی شود)
	public function CountNewsDay()
	{	   $datenow = strtotime("now");
			parent::__construct();
			$sql = $this->_SELECT." `news` WHERE `date`='".$datenow."'";			
			$r = $this->_DB->prepare($sql);
			$r->execute();
			return $r->rowCount();	
	}
	// تعداد خبرنگار
	public function CountUsers()
	{		
			parent::__construct();
			$sql = $this->_SELECT." `users`";			
			$r = $this->_DB->prepare($sql);
			$r->execute();
			return $r->rowCount();	
	}
	
	public function Month()
	{	
			date_default_timezone_set("Asia/Tehran");
			 $start = strtotime("March 20, 2016");
			 $now = strtotime("now");
		     $m = 2592000;
			parent::__construct();
			if($start < $now && $now < $start+$m+86400 )
			{ 
			
				$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m1 = $row['m1'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m1` = '".$m1."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			if($start+$m < $now && $now < $start + ($m*2) +86400 )
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m2 = $row['m2'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m2` = '".$m2."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start + ($m*2) < $now && $now < $start + ($m*3)+86400 )
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m3 = $row['m3'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m3` = '".$m3."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start + ($m*3) < $now && $now < $start + ($m*4)+86400 )
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m4= $row['m4'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m4` = '".$m4."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start + ($m*4) < $now && $now < $start + ($m*5)+86400 )
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m5= $row['m5'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m5` = '".$m5."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start + ($m*5) < $now && $now < $start + ($m*6)+86400 )
			{
				$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m6= $row['m6'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m6` = '".$m6."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start + ($m*6)< $now && $now < $start + ($m*7) )
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m7= $row['m7'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m7` = '".$m7."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start + ($m*7) < $now && $now < $start + ($m*8))
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m8= $row['m8'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m8` = '".$m8."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start+ ($m*8)< $now && $now < $start + ($m*9))
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m9 = $row['m9'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m9` = '".$m9."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start + ($m*9) < $now && $now < $start + ($m*10) )
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m10= $row['m10'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m10` = '".$m10."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			
			}
			if($start + ($m*10) < $now && $now < $start + ($m*11) )
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m11= $row['m11'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m11` = '".$m11."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
			if($start + ($m*11)< $now && $now< $start + ($m*12)-86400 )
			{
			$sql = $this->_SELECT." `conter_month` WHERE `id`='1' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $m12= $row['m12'] + 1 ;			
				$up ="UPDATE `conter_month` SET `m12` = '".$m12."' WHERE `conter_month`.`id` = 1;";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();
			}
	}
	//نمایش  آمار بازدید در هر ماه
	public function CountMonth($value)
	{
				parent::__construct();
				$sql = $this->_SELECT." `conter_month` WHERE `id`='1'";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				{
					$sum = ($row['m1'] + $row['m2'] +$row['m3']+$row['m4']+$row['m5']+$row['m6']+$row['m7']+$row['m8']+$row['m9']+$row['m10']+$row['m11']+$row['m12']);
					
				}
				return  floor(($row['m'.$value]/$sum)*100);
		}
	// بدست اوردن اطلاعات امروز با تقسیم بندی 6 ساعته
	public function Today()
	{		
			date_default_timezone_set("Asia/Tehran");
			$start = strtotime("today");
			$now = strtotime("now");
			$a = 14400;
			$date = jdate('Y-n-j');
			parent::__construct();			
			$rch = $this->_DB->prepare("SELECT * FROM `today` WHERE `today`.`date`='".$date."'");
			$rch->execute();
			if($rch->rowCount() == 0){
				$rch1 = $this->_DB->prepare("INSERT INTO `today` (`date`) VALUES ( '".$date."'); ");
				$rch1->execute();}					
			if($start < $now && $now < $start+$a )
			{ 			
				$sql = $this->_SELECT." `today` WHERE `today`.`date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $a1 = $row['a1'] + 1 ;					
					$up ="UPDATE `today` SET `a1` = '".$a1."' WHERE `today`.`date`='".$date."' ;";
					$r1 = $this->_DB->prepare($up);
					$r1->execute();					
			}			
			if($start+($a*1 ) < $now && $now < $start+($a*2 ))
			{ 			
				$sql = $this->_SELECT." `today` WHERE `today`.`date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $a2 = $row['a2'] + 1 ;			
				$up ="UPDATE `today` SET `a2` = '".$a2."' WHERE `today`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			if($start+($a*2 ) < $now && $now < $start+($a*3 ))
			{ 			
				$sql = $this->_SELECT." `today` WHERE `today`.`date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $a3 = $row['a3'] + 1 ;			
				$up ="UPDATE `today` SET `a3` = '".$a3."' WHERE `today`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			if($start+($a*3 ) < $now && $now < $start+($a*4 ))
			{ 			
				$sql = $this->_SELECT." `today` WHERE `today`.`date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $a4 = $row['a4'] + 1 ;			
				$up ="UPDATE `today` SET `a4` = '".$a4."' WHERE `today`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			if($start+($a*4 ) < $now && $now < $start+($a*5 ))
			{ 			
				$sql = $this->_SELECT." `today` WHERE `today`.`date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $a5 = $row['a5'] + 1 ;			
				$up ="UPDATE `today` SET `a5` = '".$a5."' WHERE `today`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			if($start+($a*5 ) < $now && $now < $start+($a*6 ))
			{ 			
				$sql = $this->_SELECT." `today` WHERE `today`.`date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $a6 = $row['a6'] + 1 ;			
				$up ="UPDATE `today` SET `a6` = '".$a6."' WHERE `today`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}		
	}
	// نمایش اطلاعات امروز
	public function CountToday($value)
	{
				parent::__construct();
				
				$date = jdate('Y-n-j');				
				$sql = $this->_SELECT." `today` WHERE `date`='".$date."'";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row);	
				if($value==7)
				{
					return $sum = $row['a1']+$row['a2']+$row['a3']+$row['a4']+$row['a5']+$row['a6'];
				}
				else
				{
					return  $row['a'.$value];
				}
	}
	//نمایش امار روزانه ماه جاری
	public function Daily()
	{		
			parent::__construct();
			date_default_timezone_set("Asia/Tehran");
			$start = strtotime("today");
			$now = strtotime("now");
			$d = 86400;
			$date = jdate('Y-n');
			$curent_month = jdate('j');
				
			$rch = $this->_DB->prepare("SELECT * FROM `daily` WHERE `daily`.`date`='".$date."'");
			$rch->execute();
			if($rch->rowCount() == 0)
			{
				$rch1 = $this->_DB->prepare("INSERT INTO `daily` (`date`) VALUES ( '".$date."'); ");
				$rch1->execute();
			}	
									
			if($curent_month == 1)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d1 = $row['d1'] + 1 ;			
				$up ="UPDATE `daily` SET `d1` = '".$d1."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 2)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d2 = $row['d2'] + 1 ;			
				$up ="UPDATE `daily` SET `d2` = '".$d2."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 3)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d3 = $row['d3'] + 1 ;			
				$up ="UPDATE `daily` SET `d3` = '".$d3."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 4)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d4 = $row['d4'] + 1 ;			
				$up ="UPDATE `daily` SET `d4` = '".$d4."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 5)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d5 = $row['d5'] + 1 ;			
				$up ="UPDATE `daily` SET `d5` = '".$d5."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 6)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d6 = $row['d6'] + 1 ;			
				$up ="UPDATE `daily` SET `d6` = '".$d6."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 7)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d7 = $row['d7'] + 1 ;			
				$up ="UPDATE `daily` SET `d7` = '".$d7."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 8)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d8 = $row['d8'] + 1 ;			
				$up ="UPDATE `daily` SET `d8` = '".$d8."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 9)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d9 = $row['d9'] + 1 ;			
				$up ="UPDATE `daily` SET `d9` = '".$d9."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 10)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d10 = $row['d10'] + 1 ;			
				$up ="UPDATE `daily` SET `d10` = '".$d10."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 11)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d11 = $row['d11'] + 1 ;			
				$up ="UPDATE `daily` SET `d11` = '".$d11."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 12)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d12 = $row['d12'] + 1 ;			
				$up ="UPDATE `daily` SET `d12` = '".$d12."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 13)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d13 = $row['d13'] + 1 ;			
				$up ="UPDATE `daily` SET `d13` = '".$d13."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 14)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d14 = $row['d14'] + 1 ;			
				$up ="UPDATE `daily` SET `d14` = '".$d14."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 15)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d15 = $row['d15'] + 1 ;			
				$up ="UPDATE `daily` SET `d15` = '".$d15."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			if($curent_month == 16)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d16 = $row['d16'] + 1 ;			
				$up ="UPDATE `daily` SET `d16` = '".$d16."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 17)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d17 = $row['d17'] + 1 ;			
				$up ="UPDATE `daily` SET `d17` = '".$d17."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 18)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d18 = $row['d18'] + 1 ;			
				$up ="UPDATE `daily` SET `d18` = '".$d18."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 19)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d19= $row['d19'] + 1 ;			
				$up ="UPDATE `daily` SET `d19` = '".$d19."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 20)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d20 = $row['d20'] + 1 ;			
				$up ="UPDATE `daily` SET `d20` = '".$d20."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 21)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d21 = $row['d21'] + 1 ;			
				$up ="UPDATE `daily` SET `d21` = '".$d2."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 22)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d22 = $row['d22'] + 1 ;			
				$up ="UPDATE `daily` SET `d22` = '".$d22."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 23)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d23 = $row['d23'] + 1 ;			
				$up ="UPDATE `daily` SET `d23` = '".$d23."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 24)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d24 = $row['d24'] + 1 ;			
				$up ="UPDATE `daily` SET `d24` = '".$d24."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 25)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d25 = $row['d25'] + 1 ;			
				$up ="UPDATE `daily` SET `d25` = '".$d25."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			if($curent_month == 26)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d26 = $row['d26'] + 1 ;			
				$up ="UPDATE `daily` SET `d26` = '".$d26."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 27)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d27 = $row['d27'] + 1 ;			
				$up ="UPDATE `daily` SET `d27` = '".$d27."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 28)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d28 = $row['d28'] + 1 ;			
				$up ="UPDATE `daily` SET `d28` = '".$d28."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 29)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d29 = $row['d29'] + 1 ;			
				$up ="UPDATE `daily` SET `d29` = '".$d29."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 30)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d30 = $row['d30'] + 1 ;			
				$up ="UPDATE `daily` SET `d30` = '".$d30."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}
			
			if($curent_month == 31)
			{ 			
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."' ";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row)
				 $d31= $row['d31'] + 1 ;			
				$up ="UPDATE `daily` SET `d31` = '".$d31."' WHERE `daily`.`date`='".$date."';";
				$r1 = $this->_DB->prepare($up);
				$r1->execute();	
			}			
	}
		// مقدار 32 بعنوان پارامتر ارسال شود .. امار بازدید این ماه تا به امروز
	public function CountDaily($value)
	{
				parent::__construct();
				$date = jdate('Y-n');
				$sql = $this->_SELECT." `daily` WHERE `date`='".$date."'";
				$r = $this->_DB->prepare($sql);
				$r->execute();
				foreach($r->fetchAll() as $row);	
				if($value==32)
				{
					return $sum = $row['d1']+$row['d2']+$row['d3']+$row['d4']+$row['d5']+$row['d6']+$row['d7']+$row['d8']+$row['d9']+$row['d10']+$row['d11']+$row['d12']+$row['d13']+$row['d14']+$row['d15']+$row['d16']+$row['d17']+$row['d18']+$row['d19']+$row['d20']+$row['d21']+$row['d22']+$row['d23']+$row['d24']+$row['d25']+$row['d26']+$row['d27']+$row['d28']+$row['d29']+$row['d30']+$row['d31'];
				}
				else
				{
					return  $row['d'.$value];
				}
	}
	
		// نمایش کاربران انلاین
	public function CountOnline()
	{
			parent::__construct();
			$ip = $_SERVER['REMOTE_ADDR'];
			$date = strtotime("now");							
			 $sql_on = $this->_SELECT." `online` WHERE ip = '".$ip."'";
			 $r = $this->_DB->prepare($sql_on);
			 $r->execute();
				if($r->rowCount() == 0){
					$sql_on_in = "INSERT INTO `online` (`ip`,`time_on`) VALUES ('".$ip."','".$date."')";
					$r1 = $this->_DB->prepare($sql_on_in);
					$r1->execute();	
				}					
				$sql_on2 = "SELECT * FROM `online`";
				$r2 = $this->_DB->prepare($sql_on2);
				$r2->execute();
				foreach($r->fetchAll() as $online_file)
				{
					if($online_file['time_on'] <= strtotime("now") - 1200){
						$sql_del="DELETE FROM `online` WHERE `online`.`id` = '".$online_file['id']."'";
						$r2 = $this->_DB->prepare($sql_del);
						$r2->execute();
					}
				}
		}
		
		// نمایش رتبه الکسا
		public function alexa_rank($url){
			$xml = simplexml_load_file("http://data.alexa.com/data?cli=10&url=".$url);
			if(isset($xml->SD)):
				return $xml->SD->REACH->attributes();
			endif;
		}			
		
}




// پیج رنک گوگل

class PageRank {
	function __construct($url) {
		$url = 'info:' . $url;
		$hash = '6' . $this->c($this->e($this->b($url)));
		$fetch = 'http://toolbarqueries.google.com/tbr?client=navclient-auto&ch=' . $hash . '&ie=UTF-8&oe=UTF-8&features=Rank&q=' . $url;
		if(function_exists('curl_init')) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $fetch);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$out = curl_exec($ch);
			curl_close($ch);
		} else {
			$out = file_get_contents($fetch);
		}
		$out = trim($out);
		if(strlen($out) > 0) {
			$this->pr = substr($out, 9);
		} else {
			$this->pr = -1;
		}
	}

	function b($hash) {
		$j = array();
		$length = strlen($hash);
        for($i = 0; $i < $length; $i++) {
        	$j[$i] = ord($hash[$i]);
        }
        return $j;
    }
	function c($l) {
		$l = ((($l / 7) << 2) | (($this->h($l, 13)) & 7));
		$j = array();
		$j[0] = $l;
		for($i = 1; $i < 20; $i++) {
			$j[$i] = $j[$i - 1] - 9;
		}
		$l = $this->e($this->g($j), 80);
		return $l;
	}
	function e($hash) {
		$r = 3862272608;
        $j = count($hash);
        $p = 2654435769;
        $o = 2654435769;
        $n = 3862272608;
        $l = 0;
        $m = $j;
        $q = array();
        while ($m >= 12) {
            $p += ($hash[$l] + ($hash[$l + 1] << 8) + ($hash[$l + 2] << 16) + ($hash[$l + 3] << 24));
            $o += ($hash[$l + 4] + ($hash[$l + 5] << 8) + ($hash[$l + 6] << 16) + ($hash[$l + 7] << 24));
            $n += ($hash[$l + 8] + ($hash[$l + 9] << 8) + ($hash[$l + 10] << 16) + ($hash[$l + 11] << 24));
            $q = $this->s($p, $o, $n);
            $p = $q[0];
            $o = $q[1];
            $n = $q[2];
            $l += 12;
            $m -= 12;
        }
        $n += $j;
        switch ($m) {
        case 11:
            $n += $hash[$l + 10] << 24;
        case 10:
            $n += $hash[$l + 9] << 16;
        case 9:
            $n += $hash[$l + 8] << 8;
        case 8:
            $o += $hash[$l + 7] << 24;
        case 7:
            $o += $hash[$l + 6] << 16;
        case 6:
            $o += $hash[$l + 5] << 8;
        case 5:
            $o += $hash[$l + 4];
        case 4:
            $p += $hash[$l + 3] << 24;
        case 3:
            $p += $hash[$l + 2] << 16;
        case 2:
            $p += $hash[$l + 1] << 8;
        case 1:
            $p += $hash[$l];
        }
        $q = $this->s($p, $o, $n);
        return ($q[2] < 0) ? (4294967296 + $q[2]) : $q[2];
	}
	function f($j, $i) {
        $k = 2147483648;
        if ($k & $j) {
            $j = $j >> 1;
            $j &= ~$k;
            $j |= 1073741824;
            $j = $j >> ($i - 1);
        } else {
            $j = $j >> $i;
        }
        return $j;
    }

    function g($j) {
    	$l = array();
    	$length = count($j);
    	for($k = 0; $k < $length; $k++) {
    	    for ($m = $k * 4; $m <= $k * 4 + 3; $m++) {
                $l[$m] = $j[$k] & 255;
                $j[$k] = $this->f($j[$k], 8);
            }
    	}
        return $l;
    }

    function h($j, $l) {
        $k = floor($j / $l);
        return ($j - $k * $l);
    }
	function s($t, $k, $u) {
		$t -= $k;
		$t -= $u;
		$t ^= ($this->f($u, 13));
		$k -= $u;
		$k -= $t;
		$k ^= ($t << 8);
		$u -= $t;
		$u -= $k;
		$u ^= ($this->f($k, 13));
		$t -= $k;
		$t -= $u;
		$t ^= ($this->f($u, 12));
		$k -= $u;
		$k -= $t;
		$k ^= ($t << 16);
		$u -= $t;
		$u -= $k;
		$u ^= ($this->f($k, 5));
		$t -= $k;
		$t -= $u;
		$t ^= ($this->f($u, 3));
		$k -= $u;
		$k -= $t;
		$k ^= ($t << 10);
		$u -= $t;
		$u -= $k;
		$u ^= ($this->f($k, 15));
		return array($t, $k, $u);
	}
}
?>