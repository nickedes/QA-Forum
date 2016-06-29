	<?php 
	/**
	* 
	*/
	class Users extends MY_Model
	{

		// private $table_name = "users";
		function __construct()
		{	

			// parent::__construct($this->table_name);
			parent::__construct('users', 'user_id');
			$this->load->library('Connection');
		}

		function insert($data)
		{

			$sql = $this->conn_id->prepare("INSERT INTO users(name, email, mobileno, profilepic, passwd, hash_key) VALUES (?,?,?,?,?,?)");
			$sql->execute($data);
			$affected_rows = $sql->rowCount();
			/*
				returns 1 if entry in table
				else 0
			*/
			return $affected_rows;
		}

		function check($data)
		{
			$this->load->library('form_validation');
 
   			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
   			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
 

			$email = "'".$data['email']."'";
			$passwrd = "'".$data['password']."'";
			

			$sql = $this->conn_id->query("select * from users where email = ".$email ." and passwd= ".$passwrd);
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			
			if($this->form_validation->run() ==TRUE && !empty($r))
				return TRUE;
			else
				return FALSE;
			
		}

		function update($value)
		{
			$value = "'".$value."'";
			// Todo: Where clause to include user_id
			$sql = $this->conn_id->query('select * from users ORDER BY user_id DESC LIMIT 1');
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			// print_r($r[0]['user_id']);
			$sql = $this->conn_id->prepare("UPDATE users SET profilepic = ".$value." where user_id = ?");
			$sql->execute(array($r[0]['user_id']));
			$affected_rows = $sql->rowCount();
			echo $affected_rows;
			return $affected_rows;
		}

		function reset_pass($email,$pass)
		{
			$statement = $this->conn_id->prepare("update users set passwd  = :pass_id where email = :email_id");
			return $statement->execute(array(':pass_id' => md5($pass),':email_id' => $email));
		}

		function verify_success($user_id)
		{
			$statement = $this->conn_id->prepare("update users set is_active = 1 where user_id = :user_id");
			return $statement->execute(array(':user_id' => $user_id));
		}

		function userexist($email) //for forgot password
		{
			$email = "'".$email."'";
			
			$sql = $this->conn_id->query("select * from users where email = ".$email );
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			if(!empty($r))
				{
					$sql = $this->conn_id->query("select name,hash_key from users where email = ".$email );
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
		return $r;

				}
			else
				return FALSE;

		}



		function check_hash_key($hash_key)
		{
			$statement = $this->conn_id->prepare("select user_id,is_active from users where hash_key = :hash_key");
			$statement->execute(array(':hash_key' => $hash_key));
			$row = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator	
			if (isset($row['user_id']))
			{
				if ( $row['is_active'] == 1 )
				{
					echo "You are already a verified user.";
				}
				else
				{
					if ( $this->verify_success($row['user_id']) == TRUE )
					{
						echo "Now you are verified user.";
					}
					else
					{
						echo "Something went wrong man.";
					}
				}
			}
			else
			{
				echo "Looks like the key doesn't exist.";
			}
		}

		function getuser($email)
		{
				$email = "'".$email."'";
			
			$sql = $this->conn_id->query("select * from users where email = ".$email );
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
				return $r;
		}


		function getuserdetails($user_id)
		{
				$user_id = "'".$user_id."'";
			
			$sql = $this->conn_id->query("select * from users where user_id = ".$user_id );
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
				return $r;
		}

		function get_questions($user_id)
		{

			$user_id = "'".$user_id."'";
			
			$sql = $this->conn_id->query("select * from questions where user_id = ".$user_id );
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
				//return $r;
				return($r);

		}

		function get_answers($user_id)
		{

		
				$query = "SELECT * FROM questions as q ";
$query .= "INNER JOIN answers as a ON a.q_id=q.q_id  ";
$query .= "where a.user_id=".$user_id ;
$sql = $this->conn_id->prepare($query);
  $sql->execute();
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			//print_r($r);
return($r);

		}

		function get_tags($user_id)
		{

			$query = "SELECT f.user_id, f.tag_id, t.name FROM follows as f ";
$query .= "INNER JOIN tags AS t ON f.tag_id=t.tag_id ";
$sql = $this->conn_id->prepare($query);
  $sql->execute();

			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
				
return($r);
			/*$sql = $this->conn_id->query("select * from follows join tags  where user_id = ".$user_id);
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
				//return $r;
				return($r);*/

		}

		function edit_details($data)
		{
			////echo "haa aaya";
			//echo $this->session->userdata['email'];
			 $email = $this->session->userdata['email'];
			//print_r($data);
			$value = "'".$data['name']."'";
			$sql = $this->conn_id->prepare("UPDATE users SET name = ".$value." where email = ?");
			$sql->execute(array($email));

			$value = "'".$data['mobileno']."'";
			$sql = $this->conn_id->prepare("UPDATE users SET mobileno = ".$value." where email = ?");
			$sql->execute(array($email));

			$value = "'".$data['password']."'";
			$sql = $this->conn_id->prepare("UPDATE users SET password = ".$value." where email = ?");
			$sql->execute(array($email));

			$value = "'".$data['about']."'";
			$sql = $this->conn_id->prepare("UPDATE users SET about = ".$value." where email = ?");
			$sql->execute(array($email));
			echo "Profile Details Updated";
			
		}

		function get_Pic($id)
		{
			$sql = $this->conn_id->query('select profilepic from users where user_id ='.(int)$id);
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			// print_r($r[0]);
			return $r;
		}


		function questionpage($q_id)
		{
			echo "give question id ";
		}
	}
?>