<?php
	include_once 'Dreamer.php';
	include_once 'dbObject.php';
	class Dream extends dbObject {
		protected $dreamer_id;
		protected $story;
	
		public function create(){
			return new self();
		}
		public function loadByID( $id ){
			$this->connect();
			$query = "SELECT * FROM `dreams` WHERE id={$id}";
			$result=$this->execute($query);
			if($result->num_rows == 1){
				$dream=$result->fetch_assoc();
				$this->id=$dream['id'];
				$this->created_on=$dream['created_on'];
				$this->updated_at=$dream['updated_at'];
				$this->story=$dream['story'];
				$this->dreamer_id=$dream['dreamer_id'];
			}else
				throw new Exception('Dream not found');
			$result->free();
			$this->disconnect();
		}

		public function loadByMagic(){
			if(session_status() != 2)
				session_start();
			if(isset($_SESSION['dreamer']))
				$this->dreamer_id=unserialize($_SESSION['dreamer'])->getID();

			if(isset($_POST['story']))
				$this->story=$_POST['story'];
		}
		function setDreamerID($dreamerID){
			$this->dreamer_id=$dreamerID;
		}
		function setStory($s){
			$this->story=$s;
		}
		function save(){
			if($this->existsInDb()){
				$this->connect();
				$query="UPDATE `dreams` SET  `story` =  '{$this->story}' WHERE  `id` ={$this->id};";
				if($this->execute($query))
					echo "Dream updated";
				$this->disconnect();
			} else{
				if (isset($this->story) && isset($this->dreamer_id)){
					$this->connect();
					$query = "INSERT INTO `dreams` (dreamer_id, story) VALUES ({$this->dreamer_id}, \"{$this->story}\")";
					if($this->execute($query))
						echo "Dream saved";
					$this->disconnect();
				} else{
					trigger_error("dreamer_id or story not set", E_USER_ERROR);
				}
			}

		}
		function existsInDb(){
			$out=False;
			if(isset($this->id)){
				$this->connect();
				$query="SELECT COUNT(*) FROM `dreams` where id={$this->id}";
				$result=$this->execute($query);
				$row=$result->fetch_array();
				if($row['COUNT(*)'] == 1)
					$out=True;
				$result->free();
				$this->disconnect();
			}
			return $out;
			
		}
		function preview($key){
			?>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><?php echo $this->created_on; ?></h3>
						<button value="<?php echo $key ?>"type="button" class="pull-right btn btn-danger btn-sm" id="delete">
							<span class="glyphicon glyphicon-trash"></span>
						</button>

					</div>
					<div class="panel-body">
						<textarea class="form-control" readonly><?php echo $this->story; ?></textarea>
					</div>
				</div>
			<?php
		}
		function del(){
			$this->connect();
			$query="DELETE FROM `dreams` WHERE `id`={$this->id}";
			if($this->execute($query)){
				$out = TRUE;
			}
			$this->disconnect();
			return $out;
		}
	}
?>
