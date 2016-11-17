<h1>新規登録</h1>
<?php 
	echo $this->Form->create('User'); 
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->end('登録');
?>
