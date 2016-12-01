<?php
	include_once 'Dream.php';
	include_once 'dbObject.php';
	class Dreamer extends dbObject{
		protected $name;
		protected $dreams;
		protected $wordCount;
		protected $keywords;
		protected $latestID;
		protected $user_key;

		function loadByCredentials($name, $pwd) {
			$this->connect();
			$this->name=strtolower($name);
			$pwd = md5($pwd.$this->getUserKey());

			$this->pwd=Encrypt($pwd);
			$sql = "SELECT * FROM `dreamers` WHERE name=\"{$this->name}\" #AND pwd=\"{$this->pwd}\"";
			$result = $this->dbc->query($sql);
			if($result->num_rows == 1){
				$user=$result->fetch_assoc();
				$this->id=$user['id'];
				$this->created_on=$user['created_on'];
				$this->updated_at=$user['updated_at'];
				$this->name=$user['name'];
				$this->latestID = 0;
				$this->user_key = $user['user_key'];
				$this->dreams= [];
			}
			else{
				throw new Exception('Login failed');
			}
			$result->free();
			$this->disconnect();
		}

		function createNew($name, $pwd){
			$this->connect();
			$this->name = Encrypt(strtolower($name));
			$sql = "SELECT `name` from `dreamers` WHERE name=\"{$this->name}\"";
			if($this->dbc->query($sql)->num_rows == 0){
				include_once ROOT.'lib/keyGen.php';
				$this->user_key = uniqueKey();
				$this->pwd = Encrypt(md5($pwd.$this->user_key));
				$this->user_key = Encrypt($this->user_key);
				$sql = "INSERT INTO `dreamers` (`name`, `pwd`, `user_key`)
					VALUES ('{$this->name}', '{$this->pwd}', '{$this->user_key}')";
				$result=$this->dbc->query($sql);
			}else
				echo 'Name taken';
				//throw new Exception('Name taken');
			$this->disconnect();
			return $result;
		}

		function getName(){
			return ucfirst($this->name);
		}
		function getDreams(){
			$this->connect();
			$sql = "SELECT * FROM `dreams` WHERE `dreamer_id`={$this->id} AND `active` = TRUE AND `id`>{$this->latestID} ORDER BY `created_on` LIMIT 0,30";
			$result=$this->execute($sql);
			$this->disconnect();

			//parse sql result into array of dreams
			while($row=$result->fetch_assoc()){
				$dream = new Dream();
				$dream->loadByMagic();
				$dream->setStory($row['story']);
				$dream->setCreatedOn($row['created_on']);
				$dream->setID($row['id']);
				if($row['id'] >$this->latestID)
					$this->latestID = $row['id'];
				array_unshift($this->dreams, $dream);
			}
			$result->free();
			$this->parseKeywords();
		}
		function getDream($n){
			return $this->dreams[$n];
		}
		function setDream($n, $dream){
			$this->dreams[$n]=$dream;
		}
		function getKeywords(){
			return $this->keywords;
		}
		function deleteDream($n){
			require_once ROOT.'lib/Session.php';
			$out=$this->dreams[$n]->del();
			if($out){
				unset($this->dreams[$n]);
				save_dreamer($this);
			}
			return $out;
		}
		function previewDreams(){
			foreach ( $this->dreams as $key=>$dream ){
				$dream->preview($key);
			}
		}
		function parseKeywords(){
			$this->wordCount = [];
			foreach ($this->dreams as $dream){
				$story = $this->filter($dream->getStory());
				foreach ( $story as $word ){
                    $this->wordCount[$word] = array_key_exists($word, $this->wordCount)
						? $this->wordCount[$word] + 1
						: 1;
				}

			}
			arsort($this->wordCount);
			$this->keywords = array_slice($this->wordCount, 0, 10, true);
		}

		function filter($story){
			$filter = array(
				"a","about","all","am","an","and","around","as","at",
				"back","be","been","but",
				"could",
				"didn't","doing","don't","down",
				"face","for","from",
				"get","go","got",
				"had","have","he","her","him","his","home","house","how",
				"i","if","i'm","in","into","is","it",
				"just",
				"know",
				"like",
				"me","more","my",
				"not","now",
				"of","off","on","one","only","or","other","our","out","outside",
				"point",
				"right","room",
				"see","seemed","she","side","so","some","stuff",
				"tell","that","the","there","thing","think","this","to","top",
				"up","us",
				"was","we","were","what","where","while","with","work","would"
			);
			$story = preg_replace("/[!,?.)(]+|('s)/", "", $story);		//remove special characters
			$story = preg_replace("/[\s]+/", " ", $story);			//replace multispaces with single
			$story = preg_split("/\s/", $story, -1, PREG_SPLIT_NO_EMPTY);	//make array of words
			foreach ($story as $key=>$word){				//filter out non key-words
				$word = strtolower($word);
				if(($k = array_search($word, $filter)) !== false){
					unset($story[$key]);
				}
			}
			return $story;
		}
		function getUserKey(){
			$out = null;
			if ($this->user_key != null)
				$out = $this->user_key;
			else{
				$sql = "SELECT `user_key` FROM `dreamers` WHERE `name`=\"{$this->name}\"";
				$result = $this->dbc->query($sql);
				if($result->num_rows==1){
					$user = $result->fetch_array();
					$out = $user[0];
				}
			}
			return $out;
		}
	}
?>
