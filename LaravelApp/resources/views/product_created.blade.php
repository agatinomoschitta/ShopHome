<?php 
use Illuminate\Support\Facades\Redis;
$title= Redis::get('product'); ?>
<html>
<head>
	<title>Prodotto inserito</title>
</head>
<body>
	Hai creato il prodotto {{ $title }}
</body>
</html>