<?php
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
			if($this->dbc!=NULL)
				$this->dbc->ping();
			else{
				include_once 'db.php';
				$this->dbc=connectToDb($rem, $schemaREM);
			}
		}	
		protected function disconnect(){
			if($this->dbc!=NULL){
				$this->dbc->close();
				$this->dbc==NULL;
			}
		}
		protected function isConnected(){
			$out=False;
			if(get_class($this->dbc) == 'mysqli' && $this->dbc->thread_id != NULL){
				$out=True;
			}
			return $out;
		}
		protected function execute($q){
			return $this->dbc->query($q);
		}
		protected function E($plaintext){
			include_once 'db.php';
			return encrypt($plaintext, getREMKey());
		}
	}
?>
