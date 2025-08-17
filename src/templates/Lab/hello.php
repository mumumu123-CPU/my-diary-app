<h1><?= h($message)?></h1>
<p>ルート→コントローラー→ビューの配線テスト実施中</p>

<?php
$name = 'Taro';
$name2 = compact('name');
print_r($name2);
?>