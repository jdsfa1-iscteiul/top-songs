<!DOCTYPE html>
<html lang="en">
<head>
  <title>Top Songs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand" href="home">Play(my)List</a>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            </div>
            <ul class="nav navbar-nav navbar-right collapse navbar-collapse">
            <li><a href="home">This week</a></li>
            <li><a href="oneweekago">1 week ago</a></li>
            <li><a href="twoweeksago">2 weeks ago</a></li>
            <li><a href="threeweeksago">3 weeks ago</a></li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>
