<?php
class Insert extends DataBase //برای ارث بری استفاده می شود extends&&&  نام کلاس والد می باشدDataBase
{
	private $_INSERT  = "INSERT INTO ";
	
	
	public function Noti($array)
	{		
		parent::__construct();
$sql = $this->_INSERT." `noti` (`id_user`,`email`, `sms`, `new_p`, `offer_week`, `offer_m`, `offer_year`, `not_p`)VALUES(:id_user, :email, :sms, :new_p, :offer_week, :offer_m, :offer_year, :not_p);";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);			
	}
	
	public function AddCatRecomended($array)
	{
		parent::__construct();
			$sql = $this->_INSERT." `cat_recomended`(`ip`,`id_cat1`) VALUES (:ip, :id_cat1) ";			
			$r = $this->_DB->prepare($sql); 
		 return $r->execute($array);$r->errorInfo();
	}
	public function RemoveProductInCart($id)
	{		
		parent::__construct();
		$sql = "DELETE FROM `addcard` WHERE `addcard`.`id` =:id ";			
		$r = $this->_DB->prepare($sql); 
		return $r->execute($id);			
	}
	public function RemoveAddress($id)
	{		
		parent::__construct();
		$sql = "DELETE FROM `users_adress` WHERE `users_adress`.`id` =:id ";			
		$r = $this->_DB->prepare($sql); 
		return $r->execute($id);			
	}
	public function LikeProduct($array)
	{		
		parent::__construct();
$sql = $this->_INSERT." `like_product` (`id_user`,`id_product`,`state`)VALUES(:id_user,:id_product,:state);";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);			
	}
	public function LikeProductUp($array)
	{		
		parent::__construct();
$sql = "UPDATE `like_product` SET `state`=:state WHERE `id_user`=:id_user AND `id_product`=:id_product";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);
		$r->errorInfo();			
	}	
	public function Update_Users_Password($array,$w)
	{		
			parent::__construct();
			$sql = "UPDATE `users` SET `password`=:password WHERE ".$w."  ";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);				
	}
	public function Update_Users_code($array,$w)
	{		
			parent::__construct();
			$sql = "UPDATE `users` SET ac_code1=:ac_code WHERE ".$w."  ";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);return 	$r->errorInfo();			
	}	
	
	public function CommentProduct($array)
	{		array(':jens'=>$jens,':kara'=>$kara,':tarh'=>$tarh,':arzesh'=>$arzesh,':kifit'=>$kifit,':id_product'=>$id_product,':id_user'=>$id_user,':title'=>$title,':mosbat'=>$mosbat,':msg'=>$msg,':state'=>$state,':ip'=>$ip,':date'=>$date);	
		parent::__construct();
		$sql = $this->_INSERT." `comment_product`( `id_user`, `jens`, `kara`, `tarh`, `arzesh`, `kifit`, `zaf`, `mosbat`, `date`, `id_product`, `title`, `msg`, `state`, `ip`) VALUES (:id_user, :jens, :kara, :tarh, :arzesh, :kifit, :zaf, :mosbat, :date, :id_product, :title, :msg, :state, :ip);";	
		$r = $this->_DB->prepare($sql); 
		return $r->execute($array);
		
				
	}
	public function InsertReferralCount($array)
	{
		parent::__construct();
			$sql = $this->_INSERT." `referral`( `url`, `date`, `count`, `d`, `m`, `y`, `h`, `min`, `ip`, `divice`) VALUES (:url, :date, :count, :d, :m, :y, :h, :min, :ip, :divice) ";			
			$r = $this->_DB->prepare($sql); 
		 return $r->execute($array);$r->errorInfo();
	}
	public function Orders($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `orders` (`id_user`, `id_product`, `number`, `price`, `date_create`, `date`, `code`, `authority`, `state`, `error`) VALUES (:id_user, :id_product, :number, :price, :date_create, :date, :code, :authority, :state, :error);";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
		return $r->errorInfo();
				
	}
	public function User($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `users` (`name`, `family`,`mobile`, `date_reg`, `username`, `password`, `ip`, `divice`, `state`,`email`,`ac_code`,`REFERER`) VALUES (:name, :family, :mobile, :date_reg, :username, :password, :ip, :divice, :state,:email,:ac_code,:REFERER);";			
		$r = $this->_DB->prepare($sql); 
		return $r->execute($array);
		$r->errorInfo();
				
	}
	
	public function AddUser($array)
	{
		parent::__construct();
			$sql = $this->_INSERT."  `users`( `name`, `mobile`, `province`, `city`, `code_posti`,`adress`,`ip`,`password`,`username`) VALUES (  :name, :mobile, :province, :city, :codeposti,:adress,:ip,:password,:mobile) ";			
			$r = $this->_DB->prepare($sql); 
		 return $r->execute($array);$r->errorInfo();
	}
	
	public function AddCard($array)
	{
		parent::__construct();
		$sql = $this->_INSERT."  `addcard`( `ip`, `id_user`, `id_product`, `token`, `time_login`,`number`) VALUES ( :ip, :id_user, :id_product, :token, :time_login,:number) ";	
		$r = $this->_DB->prepare($sql); 
		return  $r->execute($array); 
		$r->errorInfo();
	}
	public function AddAddress($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." `users_adress`( `id_user`, `name`, `address1`, `country`, `province`, `city`, `mobile`, `postcode`, `phone`, `date`, `setaddress`) VALUES (:id_user , :name, :address1, :country, :province,:city, :mobile, :postcode, :phone, :date, :setaddress);";			
		$r = $this->_DB->prepare($sql); 
		return $r->execute($array);
		$r->errorInfo();
	}
	
	public function Newsletter($array)
	{		
		parent::__construct();
			$sql = $this->_INSERT."  `newsletter` ( `email`) VALUES ( :email); ";			
			$r = $this->_DB->prepare($sql); 
		 $r->execute($array);
		return $r->errorInfo();		
	}
	
		public function Contact1($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT."  `contact` (`name`, `email`, `phone`, `subject`, `message`, `ip`,  `date`) VALUES (:name, :email, :phone, :subject, :message, :ip,  :date); ";			
			$r = $this->_DB->prepare($sql); 
		 $r->execute($array);return $r->errorInfo();
				
	}
	
public function UserGeneral($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT."  `user` (`name`, `email`, `mobile`, `adress`, `date`,  `id_product_user`,`ip`,`divice`) VALUES (:name, :email, :mobile, :adress, :date,  :id_product_user,:ip,:divice);";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
				
	}	
	
public function Insert_CheckOut($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT."  `checkout` (`id_product`, `ip`, `token`) VALUES (:id_product, :ip, :token); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
				
	}
	public function Select_CheckOut_id($array)
	{		
			parent::__construct();
			$sql = " SELECT * FROM `checkout` WHERE id=:id ";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return 	$r->fetchAll();
	}
	public function Select_CheckOut_ip($array)
	{		
			parent::__construct();
			$sql = " SELECT * FROM `checkout` WHERE ip=:ip AND id_product=:id_product";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return 	$r->fetchAll();	
	}
	public function Select_CheckOut_W($w)
	{		
			parent::__construct();
			$sql = " SELECT * FROM `checkout` WHERE ".$w;			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return 	$r->rowCount();	
	}
	public function Select_CheckOut_Count($array)
	{		
			parent::__construct();
			$sql = " SELECT * FROM `checkout` WHERE ip=:ip ";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return 	$r->rowCount();	
	}
	public function Update_CheckOut($array,$w)
	{		
			parent::__construct();
			$sql = "UPDATE `checkout` SET `num` =:num WHERE `checkout`.`id` =:id;";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return $r->errorinfo();
				
	}
	public function Insert_state($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `tbl_lr` (`id_leader`, `id_subset`, `state`) VALUES (:id_leader, :id_subset, :state); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
				
	}
	
	public function Tbl($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `tbl` (`name`, `id_user`, `parent_id`,`L`,`R`,`link`,`flag`) VALUES (:name, :id_user, :parent_id, :L, :R, :link, :flag); ";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return $r->errorinfo();
				
	}
	
	
	public function Update_Users($array,$w)
	{		
			parent::__construct();
			$sql = "UPDATE `users` SET ".$w." WHERE `users`.`id`=:id  ";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return $r->errorinfo();
				
	}
	
	public function Update_Tbl1($array)
	{		
			parent::__construct();
			$sql = "UPDATE `tbl` SET `axis`=:axis WHERE `tbl`.`parent_id`=:id and `tbl`.`id_user`=:id_user ";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return $r->errorinfo();
				
	}
	
	
	public function Tbl1($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `tbl` (`name`, `id_user`, `parent_id`) VALUES (:name, :id_user, :parent_id); ";			
			$r = $this->_DB->prepare($sql); 
			$r->execute($array);
			return $r->errorinfo();
				
	}
	
	
	
	public function Register($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `users` (`father`,`L`,`C`,`R`,`name`, `family`, `fname`, `bd`, `meli`, `mobile`, `email`, `adress`, `num_account`, `num_cart`, `code`, `code_posti`,  `username`, `password`, `id_porsant`,  `ip`, `date_reg`,`date_ac`, `divice`,`shaba`) VALUES (:father,:L,:C,:R,:name, :family, :fname, :bd, :meli, :mobile, :email,:adress, :num_account, :num_cart, :code, :code_posti,  :username, :password, :id_porsant,  :ip, :date_reg,:date_ac, :divice,:shaba) ";		
			$r = $this->_DB->prepare($sql); 
return 	$r->execute($array);
	// $r->errorInfo();
			
				
	}
	
	// واکشی اطلاعات جدول اخبار
	public function News($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `news` (`title`, `s_text`, `f_text`, `cat`,`img`, `resource`, `tag`, `keywords`,`label`,`state`,`date`, `e_date_news`, `mosahebeshavandeh`, `ac`) VALUES (:title,:s_text,:f_text,:cat,:img,:resource,:tag,:keywords,:label,:state,:date,:e_date_news,:mosahebeshavandeh,:ac); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
			//return $r->errorCode();
			
				
	}
	// واکشی اطلاعات جدول نظرات
    public function Baner($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `baner` (`img`, `title`, `url`, `ac`) VALUES (:img,:title,:url,:ac); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
				
	}
	// واکشی اطلاعات جدول نظرات
    public function Newslater($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `newsletteres` (`email`) VALUES (:email); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
				
	}
	public function Poll($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `poll` (`title`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `ac`) VALUES (:title,:q1,:q2,:q3,:q4,:q5,:q6,:q7,:q8,:q9,:q10,:ac); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
				
	}
	public function Img_link($array)
	{
			parent::__construct();
			$sql= $this->_INSERT." `img_link` (`img`, `title`, `url`, `position`, `ac`) VALUES (:img,:title,:url,:position,:ac); ";
			$r= $this->_DB->prepare($sql);
			return $r->execute($array);
	}
	public function About_me($array)
	{
			parent::__construct();
			$sql= $this->_INSERT." `about_me` (`description`,`ac`) VALUES (:description,:ac); ";
			$r= $this->_DB->prepare($sql);
			return $r->execute($array);
	}
	public function Text_links($array)
	{
			parent::__construct();
			$sql= $this->_INSERT." `text_links` (`title`, `url`, `ac`,`position`) VALUES (:title,:url,:ac,:position); ";
			$r= $this->_DB->prepare($sql);
			return $r->execute($array);
	}
	public function Contact($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `contact` (`name`, `email`, `message`, `ip`, `date`) VALUES (:name,:email,:message,:ip,:date); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
				
	}
	public function Comment($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `comment` (`msg`, `id_news`, `date_create`, `ip`) VALUES (:msg, :id_news, :date_create, :ip); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
				
	}
	public function Category($array)
	{
			parent::__construct();
			$sql= $this->_INSERT." `category` (`title`, `parent_id`, `ac`) VALUES (:title,:parent_id,:ac); ";
			$r= $this->_DB->prepare($sql);
			return $r->execute($array);
	}
	public function Message($array)
	{
			parent::__construct();
			$sql= $this->_INSERT." `message` (`name`, `phone`, `ac`) VALUES (:name,:phone,:ac); ";
			$r= $this->_DB->prepare($sql);
			return $r->execute($array);
	}

	public function Setting($array)
	{		
			parent::__construct();
			$sql = $this->_INSERT." `setting` (`columns`, `back_color`, `img`, `font_size`, `menu_text_color`, `menu_back_color`, `menu_hover_color`, `tedad_matlap`, `offline`, `ofl_message`, `site_name`, `list_size`, `news_size`, `email_rss`, `kh_mataleb`, `kh_link`, `Allowed_extensions`, `max_size`, `file_path`, `image_path`, `Allowed_img_extensions`, `ignore_extensions`, `noallow_mime`, `modify_pass`, `log_path`, `events_show`, `active_web`, `guide_server`, `setting_responsive`, `user_register_allow`, `active_newuser`, `system_error`, `language_error`, `catch`, `time_catch`, `retentive_catch`, `goolge_search`, `yahoo_search`, `msn_search`, `sky_searach`, `preamble_site`, `keywords_site`, `metatag_title`, `metatag_angel`, `ac`) VALUES (:columns,:back_color,:img,:font_size,:menu_text_color,:menu_back_color,:menu_hover_color,:tedad_matlap,:offline,:ofl_message,:site_name,:list_size,:news_size,:email_rss,:kh_mataleb,:kh_link,:Allowed_extensions,:max_size,:file_path,:image_path,:Allowed_img_extensions,:ignore_extensions,:noallow_mime,:modify_pass,:log_path,:events_show,:active_web,:guide_server,:setting_responsive,:user_register_allow,:active_newuser,:system_error,:language_error,:catch,:time_catch,:retentive_catch,:goolge_search,:yahoo_search,:msn_search,:sky_searach,:preamble_site,:keywords_site,:metatag_title,:metatag_angel,:ac); ";			
			$r = $this->_DB->prepare($sql); 
			return $r->execute($array);
				
	}
	public function Reporter($array)
	{
			parent::__construct();
			$sql= $this->_INSERT." `reporter` (`name`, `familly`, `birthday`, `birth_city`, `last_madrak`, `ids`, `idm`, `mazhab`, `jender`, `duty_state`, `tahol`, `childes`, `address`, `phone`, `mobile`, `email`, `pers_page`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`, `k11`,`k12`, `k13`, `k14`, `k15`, `k16`, `k17`, `k18`, `k19`, `k20`, `k21`, `t1`,`t2`, `t3`, `t4`, `t5`, `t6`, `t7`, `t8`, `t9`, `t10`, `t11`, `t12`, `reagent`, `n_reagent`, `reagent_phone`, `amoozesh_teyshode`, `other_craft`, `use_internet`, `salary`, `date_tahod`, `master_look`, `emza_date`, `ac`) VALUES (:name,:familly,:birthday,:birth_city,:last_madrak,:ids,:idm,:mazhab,:jender,:duty_state,:tahol,:childes,:address,:phone,:mobile,:email,:pers_page,:k1,:k2,:k3,:k4,:k5,:k6,:k7,:k8,:k9,:k10,:k11,:k12,:k13,:k14,:k15,:k16,:k17,:k18,:k19,:k20,:k21,:t1,:t2,:t3,:t4,:t5,:t6,:t7,:t8,:t9,:t10,:t11,:t12,:reagent,:n_reagent,:reagent_phone,:amoozesh_teyshode,:other_craft,:use_internet,:salary,:date_tahod,:master_look,:emza_date,:ac); ";
			$r= $this->_DB->prepare($sql);
			return $r->execute($array);
	}


}