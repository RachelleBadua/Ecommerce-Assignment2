<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $data ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
	<div class="d-flex">

		<ul>
			<h1><a href="/Main/index">CliqueBait</a></h1>
			<li><a href='/User/index'>Login</a></li>
			<li><a href='/User/register'>register</a></li>
			<li><a href='/Profile/index'>User Profile</a></li>
			<li><a href='/Publication/create'>Make a Post</a></li>
			<li><a href='/Follow/index'>View following-Post</a></li>
		</ul>
	
	<div class="text-start">
	<?php
		if(isset($_GET['success'])){
			echo '<div class="alert alert-success">'.$_GET['success'].'</div>';
		}
		if(isset($_GET['error'])){
			echo '<div class="alert alert-danger">'.$_GET['error'].'</div>';
		}