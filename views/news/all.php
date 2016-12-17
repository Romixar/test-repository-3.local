<!doctype html>

<html lang="ru-RU">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
     <?php //print_r($items); exit;
    foreach($items as $item){ ?>
       
        <h2><?= $item -> title ?></h2>
        <div><?= $item -> author ?></div>
        
    <?php } ?>
    
  <script src="js/scripts.js"></script>
</body>
</html>