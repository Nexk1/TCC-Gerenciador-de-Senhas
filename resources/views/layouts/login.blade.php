<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <!-- <script src="/js/index.js"></script> -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    

</head>
<body class="{{ $fundo }}">
    @yield('content')
    
</body>
</html>