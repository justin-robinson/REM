<?php
	include_once 'Dream.php';
	include_once 'dbObject.php';
	class Dreamer extends dbObject{
		protected $name;
		protected $dreams;

		function __construct($name, $pwd) {
			$this->connect();
			$pwd=$this->E($pwd);
			$query = "SELECT * FROM `dreamers` WHERE name=\"{$name}\" AND pwd=\"{$pwd}\"";
			$result = $this->dbc->query($query);
			if($result->num_rows == 1){
				$user=$result->fetch_assoc();
				$this->id=$user['id'];
				$this->created_on=$user['created_on'];
				$this->updated_at=$user['updated_at'];
				$this->name=$user['name'];
			}
			else
				throw new Exception('Login failed');
			$result->free();
			$this->disconnect();
		}		

		function getName(){
			return ucfirst($this->name);
		}
		function getDreams(){
			$this->connect();
			$query = "SELECT * FROM `dreams` WHERE dreamer_id={$this->id}";
			$result=$this->execute($query);
			$this->disconnect();

			//parse sql result into array of dreams
			$this->dreams=[];
			while($row=$result->fetch_assoc()){
				$dream = new Dream();
				$dream->loadByMagic();
				$dream->setStory($row['story']);
				$dream->setCreatedOn($row['created_on']);
				$dream->setID($row['id']);
				array_push($this->dreams, $dream);
			}
			$result->free();
		}
		function getDream($n){
			return $this->dreams[$n];
		}
		function deleteDream($n){
			return $this->dreams[$n]->del();
		}
		function previewDreams(){
			foreach ( $this->dreams as $key=>$dream ){
				$dream->preview($key);
			}
		}
	}
?>
