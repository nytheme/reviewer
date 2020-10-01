<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviewer</title>
  
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
  <header>
    <ul>
      <li><a <?php if($_SERVER['REQUEST_URI'] === '/index.php') {echo 'class="thisURI"';} ?> href="index.php">Home</a></li>
      <li><a <?php if($_SERVER['REQUEST_URI'] === '/input.php') {echo 'class="thisURI"';} ?> href="input.php">Registration</a></li>
      <li><a <?php if($_SERVER['REQUEST_URI'] === '/today.php') {echo 'class="thisURI"';} ?>href="today.php">Today's words</a></li>
      <li><a <?php if($_SERVER['REQUEST_URI'] === '/search.php') {echo 'class="thisURI"';} ?>href="search.php">Search</a></li>
    </ul>
  </header>