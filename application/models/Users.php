	<?php 
	/**
	* User model
	*/
	class Users extends MY_Model
	{
		function __construct()
		{	
			// send tablename and primary key to base model
			parent::__construct('users', 'user_id');
		}

		// insert user details in db
		function insert($data)
		{

			$sql = $this->conn_id->prepare("INSERT INTO users(name, email, mobileno, profilepic, passwd, hash_key) VALUES (?,?,?,?,?,?)");
			$sql->execute($data);
			// returns 1 if entry in table
			$affected_rows = $sql->rowCount();
			return $affected_rows;
		}

		// check whether user with email id and password exists or not
		function check($data)
		{
			$email = "'".$data['email']."'";
			$password = "'".$data['password']."'";
			$sql = $this->conn_id->query("select * from users where email = ".$email ." and passwd = ".$password);
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			if(!empty($r))
				return TRUE;
			else
				return FALSE;
		}

		// update path of user's profile pic
		function update_pic($value)
		{
			$value = "'".$value."'";
			// Todo: Where clause to include user_id
			$sql = $this->conn_id->query('select * from users ORDER BY user_id DESC LIMIT 1');
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			$sql = $this->conn_id->prepare("UPDATE users SET profilepic = ".$value." where user_id = ?");
			$sql->execute(array($r[0]['user_id']));
			$affected_rows = $sql->rowCount();
			return $affected_rows;
		}

		// Reset user password
		function reset_pass($email,$pass)
		{
			$statement = $this->conn_id->prepare("update users set passwd  = :pass_id where email = :email_id");
			return $statement->execute(array(':pass_id' => md5($pass),':email_id' => $email));
		}

		// Verify user by setting is_active to 1
		function verify_success($user_id)
		{
			$statement = $this->conn_id->prepare("update users set is_active = 1 where user_id = :user_id");
			return $statement->execute(array(':user_id' => $user_id));
		}

		// to check if user exists or not
		function userexist($field, $value)
		{
			$value = "'".$value."'";
			
			$sql = $this->conn_id->query("select * from users where ".$field." = ".$value );
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			if(!empty($r))
			{
				$sql = $this->conn_id->query("select name,hash_key from users where ".$field." = ".$value );
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
				return $r;
			}
			else
				return FALSE;
		}

		// check if user is_active for the corresponding hash-key
		function check_hash_key($hash_key)
		{
			$statement = $this->conn_id->prepare("select user_id,is_active from users where hash_key = :hash_key");
			$statement->execute(array(':hash_key' => $hash_key));
			$row = $statement->fetch();
			if (isset($row['user_id']))
			{
				if ( $row['is_active'] == 1 )
				{
					// Already a verified user
					return 1;
				}
				else
				{
					if ( $this->verify_success($row['user_id']) == TRUE )
					{
						// Now you are a verified user
						return 1;
					}
					else
					{
						// Still not verified
						return 0;
					}
				}
			}
			else
			{
				// Supplied hash key doesn't exist
				return 0;
			}
		}

		// get user details for the corresponding email id
		function getuser($email)
		{
			$email = "'".$email."'";
			$sql = $this->conn_id->query("select * from users where email = ".$email );
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			return $r;
		}

		// Update Profile Details
		function edit_details($data)
		{
			$user_id = $this->session->userdata['user_id'];
			$name = "'".$data['name']."'";
			$mobileno = "'".$data['mobileno']."'";
			$about = "'".$data['about']."'";
			$sql = $this->conn_id->prepare("UPDATE users SET name = ".$name." , mobileno = ".$mobileno." , about = ".$about." where user_id = ?");
			$sql->execute(array($user_id));
			return true;
		}
	}
?>