<?php
header('Content-Type: text/html; charset=utf-8');
include("config/config.php");
include("model/select.php");
$fetch = new Select;

function strrev_utf8($str) {
	return join("", array_reverse(
		preg_split("//u", $str)
	));
}

if(isset($_POST['contect_us_email']))
{
	$email = $fetch->CheckPost($_POST['contect_us_email']);
	$msg = $fetch->CheckPost($_POST['contect_us_msg']);
	$lang = $fetch->CheckPost($_POST['lang']);
	$date = date("Y-m-d H:i");
	$a = array(":email"=>$email, ":date"=>$date, ":txt"=>$msg,":lang"=>$lang);
	$fetch->InsertContectUs($a);
	return true;

}

if(isset($_POST['ChangeName-result-free']))
{
	$e = intval($_POST['ChangeName-result-free']);
	foreach($fetch->ChangeName("`code`='".$e."' ") as $row)
	{
		echo "<p>".$row['title']."</p>";
		echo "<p>".$row['txt']."</p>";
	}
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">Ok</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";
}
if(isset($_POST['Twin-result-free']))
{
	$e = $fetch->CheckPost($_POST['Twin-result-free']);

	$str = explode("-",$e);
	if($str[0] > 1000)
	{
		echo "شما نام همزاد ندارید";
	}
	else
		{
		$twin = '';
		foreach ($str as $e)
		{
			foreach ($fetch->Abjad("DESC", "0", "1", "`num`='" . $e . "' ") as $row) {
				$twin .= $row['title'];
			}
		}
		//$p = preg_split('//u', $twin, -1, PREG_SPLIT_NO_EMPTY);
		echo "نام همزاد جنی : ".strrev_utf8($twin)."وش";
			echo "<br>";echo "<br>";
		echo "نام همزاد ملکی : ".$twin."ائیل";
			echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";
		}
}
if(isset($_POST['Location-result-free']))
{
	$e = intval($_POST['Location-result-free']);
	foreach($fetch->Location("`code`='".$e."' ") as $row)
	{
		echo "<p>".$row['title']."</p>";
		echo "<p>".$row['txt']."</p>";
	}
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";
}
if(isset($_POST['Death-result-free']))
{
	$e = intval($_POST['Death-result-free']);
	foreach($fetch->Death("`code`='".$e."' ") as $row)
	{
		echo "<p>".$row['title']."</p>";
		echo "<p>".$row['txt']."</p>";
	}
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";}
if(isset($_POST['Need-result-free']))
{
	$e = intval($_POST['Need-result-free']);
	foreach($fetch->Need("`code`='".$e."' ") as $row)
	{
		echo "<p>".$row['title']."</p>";
		echo "<p>".$row['txt']."</p>";
	}
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";}
if(isset($_POST['Partnership-result-free']))
{
	$e = intval($_POST['Partnership-result-free']);
	foreach($fetch->Partnership("`code`='".$e."' ") as $row)
	{
		echo "<p>".$row['title']."</p>";
		echo "<p>".$row['txt']."</p>";
	}
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";}
if(isset($_POST['AbsentStatus-result-free']))
{
	$e = intval($_POST['AbsentStatus-result-free']);
	foreach($fetch->AbsentStatus("`code`='".$e."' ") as $row)
	{
		echo "<p>".$row['title']."</p>";
		echo "<p>".$row['txt']."</p>";
	}
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";}
if(isset($_POST['Estekhare-result-free']))
{
	$e = $_POST['Estekhare-result-free'];
	foreach($fetch->Estekhare("`title`='".$e."' ") as $row)
	{
		echo "<p>".$row['title']."</p>";
		echo "<p>".$row['txt']."</p>";
	}
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";}

if(isset($_POST['Marriage-result-free']))
{
    $e = intval($_POST['Marriage-result-free']);
    foreach($fetch->Marriage("`code`='".$e."' ") as $row)
    {
		echo "<p>".$row['txt']."</p>";
    }
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";}
if(isset($_POST['save-data-user-email']))
{
	$name="";
	$email = $fetch->CheckPost($_POST['save-data-user-email']);
	$pass = $fetch->CheckPost($_POST['save-data-user-password']);
	if(isset($_POST['name']))
	$name = $fetch->CheckPost($_POST['name']);
	else $name ="";
	$pass = $fetch->HashPassword($pass);
	$gender = intval($_POST['gender']);

	$day = intval($_POST['bd-day']);
	$m = intval($_POST['bd-m']);
	$y = intval($_POST['bd-y']);
	$c = array(":email"=>$email);
	if($fetch->CountUserEmail($c) == 0)
	{
		$a = array(":email"=>$email,":password"=>$pass,":d"=>$day,":m"=>$m,":y"=>$y,":gender"=>$gender,":name"=>$name);
	$r = $fetch->InsertUser($a);
		if($r == 1)
		{
			echo  true;
		}
		else echo  false;
	}
	else echo true;

}
if(isset($_POST['headbook-result-free']))
{
	$r = intval($_POST['headbook-result-free']);
	$gender = intval($_POST['gender']);
	$day = intval($_POST['day']);
	if($r != '')
	{
			foreach($fetch->HeadBook(" `code`='".$r."'  ") as $row)
			{
				if($gender === 1)
				{
					echo "<p style='text-align: center'>".$fetch->Show($row['title'])."</p>";
					echo "<p>".$fetch->Show($row['txt_men'])."</p>";
				}
				elseif($gender === 2) {
					echo "<p style='text-align: center'>".$fetch->Show($row['title'])."</p>";
					echo "<p>".$fetch->Show($row['txt_women'])."</p>";
				}
			}
	}else echo '';
	echo "<br><div style=\"width: 100%;height: 60px;float: right;/*! position: absolute; */\" >
             <button onclick=\"HiddenResultModal()\" class=\"golden-btn\">حسنا</button>
             <button class='golden-btn' id=\"paymentBTN\" style='width: 200px;' onclick='ShowModal(".$row['id'].")'>ادامه و پرداخت</button>
        </div><br><br>";}


if(isset($_POST['Abjad-calculation']))
{
	$abjad = array();
	$abjad = $_POST['Abjad-calculation'];
	if($abjad != '')
	{
		$num= 0;
		$p = preg_split('//u', $abjad, -1, PREG_SPLIT_NO_EMPTY);
		foreach($p as $s)
		{
			foreach($fetch->Abjad("DESC","0","40"," `title`='".$s."'  ") as $row)
			{		
				$num = intval($row['num'] + $num );
			}
		}
	}else echo $num='';	
	echo $num;
}




?>
