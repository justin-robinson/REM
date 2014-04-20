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
			$sql = "SELECT * FROM `dreams` WHERE id={$id};";
			$result=$this->execute($sql);
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
			@require_once ROOT.'lib/Session.php';
			
			$this->dreamer_id=get_dreamer()->getID();
			if(isset($_POST['story']))
				$this->story=$_POST['story'];
		}
		function setDreamerID($dreamerID){
			$this->dreamer_id=$dreamerID;
		}
		function setStory($s){
			$this->story=$s;
		}
		function getStory(){
			return $this->story;
		}
		function save(){
			$this->connect();
			$story = $this->dbc->real_escape_string($this->story);
			$message = "Dream ";
			if($this->existsInDb()){
				$sql="UPDATE `dreams` SET  `story` =  \"{$story}\" WHERE  `id` ={$this->id};";
				$message .= "updated";
			} else{
				if (isset($this->story) && isset($this->dreamer_id)){
					$sql = "INSERT INTO `dreams` (dreamer_id, story) VALUES ({$this->dreamer_id}, \"{$story}\");";
					$message .= "saved";
				} else{
					trigger_error("dreamer_id or story not set", E_USER_ERROR);
				}
			}
			if($this->execute($sql))
				echo $message;
			$this->disconnect();

		}
		private function existsInDb(){
			$out=False;
			if(isset($this->id)){
				$sql="SELECT COUNT(*) FROM `dreams` where id={$this->id};";
				$result=$this->execute($sql);
				$row=$result->fetch_array();
				if($row['COUNT(*)'] == 1)
					$out=True;
				$result->free();
			}
			return $out;
			
		}
		function preview($key){
			?>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><?php echo date('M j \'y', strtotime($this->created_on)); ?></h3>
						<button value="<?php echo $key ?>"type="button" class="pull-right btn btn-danger btn-sm" id="d<?php echo $key?>">
							<span class="glyphicon glyphicon-trash"></span>
						</button>

					</div>
					<div class="panel-body" id="b<?php echo $key?>">
						<textarea class="form-control" id="s<?php echo $key?>"readonly><?php echo $this->story; ?></textarea>
					</div>
				</div>
			<?php
		}
		function del(){
			$this->connect();
			//$sql="DELETE FROM `dreams` WHERE `id`={$this->id}";
			$sql="UPDATE `dreams` SET  `active` =  FALSE WHERE  `id` ={$this->id};";
			if($this->execute($sql)){
				$out = TRUE;
			}
			$this->disconnect();
			return $out;
		}
	}
?>
