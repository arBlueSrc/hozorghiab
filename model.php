<?php 
class model extends Database {

        private $_SELECT = "SELECT * FROM";
        private $_INSERT = "INSERT INTO ";
        
    function base64_to_jpeg($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' ); 

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );

        // clean up the file resource
        fclose( $ifp ); 

        return $output_file; 
	}
        

    public function update_place($array){
           parent::__construct();

           $sql = "UPDATE `begardim_place` SET `image1`=:image1 WHERE `id`=:id";
           $r = $this->_DB->prepare($sql);
            $r->execute($array);
           return  $r->execute($array);
    }

    public function select_place($id)
    {
        parent::__construct();
        $sql = "SELECT * FROM `begardim_place` WHERE `id` = $id";
        $r = $this->_DB->prepare($sql);
        $r->execute();
        return $r->fetchAll();
    }
    

    

    
    public function selectAllUser()
    {
        parent::__construct();
        $sql = $this->_SELECT . " begardim_place";
        $r = $this->_DB->prepare($sql);
        $r->execute();
        return $r->fetchAll();
    }
    public function delete_user ($username){
      parent::__construct();
      $sql =  "DELETE FROM `begardim_place` WHERE  username = '$username'";
      $r = $this->_DB->prepare($sql);
      return  $r->execute();
    }
    
    public function pagingUser($city , $count , $page){
        parent::__construct();
        $sql = "SELECT * FROM `begardim_place` WHERE city = $city LIMIT $count OFFSET $page";
        $r = $this->_DB->prepare($sql);
        $r->execute();
        return $r->fetchAll();
    }
    
     public function pagingComment($id_place , $count , $page){
        parent::__construct();
        $sql = "SELECT * FROM `begardim_comments` WHERE id_place = $id_place LIMIT $count OFFSET $page";
        $r = $this->_DB->prepare($sql);
        $r->execute(); 
        return $r->fetchAll();
    }

	public function saveCity($city,$score){

        parent::__construct();
        $sql = "INSERT INTO `final_project_score_list`(`city_name`, `score`) VALUES ('{$city}','{$score}')";
        $r = $this->_DB->prepare($sql);
        $r->execute(); 

		$sql = "SELECT * FROM `final_project_city_list` WHERE city_name = '{$city}'";
        $r = $this->_DB->prepare($sql);
    	$r->execute(); 

		$list = $r->fetchAll();

		if(count($list) == 0){
			$sql = "INSERT INTO `final_project_city_list`(`city_name`, `city_score`) VALUES ('{$city}','{$score}')";
			$r = $this->_DB->prepare($sql);
			$r->execute(); 
		}

		return "1";
    }

	public function cityList($city){
        parent::__construct();
        $sql = "SELECT * FROM `final_project_score_list` WHERE city_name = '{$city}'";
        $r = $this->_DB->prepare($sql);
        $r->execute(); 
        return $r->fetchAll();
    }

	//------------------------------
	//------------------------------
	//--------- vpn project --------
	//------------------------------
	//------------------------------

	public function select_user($email)
    {
        parent::__construct();
        $sql = "SELECT * FROM `users` WHERE `email` = '{$email}'";
        $r = $this->_DB->prepare($sql);
        $r->execute();
        return $r->fetchAll();
    }

	public function select_user_pass($email, $password)
    {
        parent::__construct();
        $sql = "SELECT * FROM `users` WHERE `email` = '{$email}' AND `password` = '{$password}'";
        $r = $this->_DB->prepare($sql);
        $r->execute();
        return $r->fetchAll();
    }

	public function insert_user($array)
	{
        parent::__construct();
        $sql = "INSERT INTO `users`(`email`, `password`) VALUES (:email,:password)";
        $r = $this->_DB->prepare($sql);
        return $r->execute($array);
    }

	public function increase_view_ads($array)
	{
        parent::__construct();
        $sql = "INSERT INTO `users`(`email`, `password`) VALUES (:email,:password)";
        $r = $this->_DB->prepare($sql);
        return $r->execute($array);
    }

	public function insert_view_ads($array)
	{
        parent::__construct();
        $sql = "INSERT INTO `user_ads_view`(`user_id`,`date`) VALUES (:user_id,:date)";
        $r = $this->_DB->prepare($sql);
        return $r->execute($array);
    }

	public function check_user_in_ads_table($user_id)
    {
        parent::__construct();
        $sql = "SELECT * FROM `user_ads_view` WHERE `user_id` = '{$user_id}' AND `consumed` = '0'";
        $r = $this->_DB->prepare($sql);
        $r->execute();
        return $r->fetchAll();
    }

	public function consume_ads_see($user_id, $time)
    {
        parent::__construct();
        $sql = "UPDATE `user_ads_view` SET `consumed`='1' WHERE `user_id`='{$user_id}' AND `consumed`='0' LIMIT '{$time}'";
        $r = $this->_DB->prepare($sql);
        $r->execute();
        return $r->fetchAll();
    }

	public function get_user_package_status($user_id)
    {
        parent::__construct();
        $sql = "SELECT * FROM `user_packages` ORDER BY 'id' DESC LIMIT 1 WHERE `user_id`='{$user_id}'";
        $r = $this->_DB->prepare($sql);
        $r->execute();
        return $r->fetchAll();
    }
}
?>