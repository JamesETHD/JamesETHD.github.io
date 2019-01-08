<!DOCTYPE html>
<html>
  <head>
    <title>Bums Rankings</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/main.css" />
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-info" id="navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item" id="home">
            <a class="navbar-brand" href="index.php">Bums Rankings</a>
          </li>
          <li class="nav-item" id="points">
            <a class="nav-link" href="givePoints.php">Points</a>
          </li>
          <li class="nav-item dropdown" id="managePlayers">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" role="button">Manage</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="addPlayer.php">Add Player</a>
                <a class="dropdown-item" href="setNicknames.php">Set Nicknames</a>
              </div>
          </li>
      </nav>
    </header>
