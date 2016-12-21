<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Search Events</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/browser-main.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- have global variables as button names on nav bar-->
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="docs/examples/navbar-fixed-top">Fixed top <span class="sr-only">(current)</span></a></li>
            <li><a href="login-1.php">LogIn</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="jumbotron">

      <h1 id="hh">Search Events</h1>

      <div>

        <form action=<?php echo $SID["SELF"] ?> method="post" target="_self">
          <table>
            <tr>
              <td>
               <div>
                <label for="keyword">Keyword:</label>
                <input type="text" class="form-control" id="keyword" name="keyword" >
               </div>
              </td>
              <td>
               <div>
                <label for="category">Category:</label>
                <select type="text" class="form-control" id="category" name="category">
                  <?php echo $SID["CATEGORY"] ?>
                  </select>
               </div>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <label for="date-from">Date From:</label>
                  <input type="date" class="form-control" id="date-from" name="date_from">
                </div>
              </td>
              <td>
                <div>
                  <label for="date-to">Date To:</label>
                  <input type="date" class="form-control" id="date-to" name="date_to">
                </div>
              </td>
            </tr>
          </table>

          <input class="btn btn-lg btn-primary" type="submit"
                 id="search-btn" name="button" value="search">
        </form>
      </div>
    </div>
    </div>






    <?php global $SID; echo $SID["CONTENT"] ?>


    <!-- Bootstrap core JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/browser-main.js"></script>

  </body>
</html>
