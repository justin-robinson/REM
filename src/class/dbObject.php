<?php
    include_once '../config.php';
	@include ROOT.'lib/db.php';
	
	class dbObject{
		protected $id;
		protected $created_on;
		protected $updated_at;
		public $dbc;

		function getID(){
			return $this->id;
		}
		function getCreatedOn(){
			return $this->created_on;
		}
		function getUpdatedAt(){
			return $this->updated_at;
		}
		function setID($id){
			$this->id=$id;
		}
		function setCreatedOn($c){
			$this->created_on=$c;
		}
		function setUpdatedOn($u){
			$this->updated_on=$u;
		}
		
		protected function connect(){
			$this->dbc=connectToDb();
		}	
		protected function disconnect(){
			$this->dbc->close();
		}
		protected function execute($q){
			return $this->dbc->query($q);
		}
		protected function E($plaintext){
			return encrypt($plaintext);
		}
	}
?>
