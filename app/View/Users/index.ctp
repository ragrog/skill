<?php
if (!empty($auth)) :
?>
	ログインユーザー
			<?= $auth['username']?>
	
	<a href="/users/view/<?=$auth['id']?>">
		マイページ
	</a>
<?php
else :
?>
	<a href="/users/login">
			ログイン
	</a>

<?php
endif;
?>

<h1>ユーザーリスト</h1>
<ul>
	<?php foreach($data as $value):?>
	<li>
		<a href="/users/view/<?=$value['User']['id']?>">
			<?= $value['User']['username']?>
		</a>
	</li>
	<?php endforeach;?>
</ul>
