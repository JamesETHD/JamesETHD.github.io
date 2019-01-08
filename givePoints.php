<?php
  include "header.php";
  include "includes/dbconn.inc.php";

  if(isset($_GET['player'])){
    $player = $_GET['player'];
    $sql = "INSERT INTO game(playerID)
            VALUES ($player)";
    $conn->query($sql);
  }
  if(isset($_GET['reset'])){
    $sql = "DELETE FROM game";
    $conn->query($sql);
    $sql = "ALTER TABLE game
            AUTO_INCREMENT=1";
    $conn->query($sql);
  }
  if(isset($_GET['update'])){
    $sql = "UPDATE players p,game g
            SET p.playerPoints = p.playerPoints + g.points
            WHERE p.playerID = g.playerID";
    $conn->query($sql);

    $sql = "DELETE FROM game";
    $conn->query($sql);
    $sql = "ALTER TABLE game
            AUTO_INCREMENT=1";
    $conn->query($sql);
  }
?>

<section class="container">
  <div class="jumbotron">
    <h1 class="centre">Game</h1>
    <br>

    <div class="row">
      <div class="col-2 col-sm-3 col-md-4"></div>
      <h5 class="col-4 col-sm-3">Player</h5>
      <h5 class="col-3">Points</h5>
    </div>
<?php
  $sql = "SELECT *
          FROM players
          ORDER BY playerName";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    $playerID = $row['playerID'];
    echo('<div class="row">
            <div class="col-2 col-sm-3 col-md-4"></div>
            <div class="col-4 col-sm-3">' . $row['playerNickname'] . '</div>');
    $sql = "SELECT playerID
            FROM players
            WHERE playerID NOT IN (SELECT playerID FROM game)
            AND playerID = '$playerID'";
    $ID = $conn->query($sql);
    if($ID->num_rows == 0){
      $sql = "SELECT points FROM game
              WHERE playerID = '$playerID'";
      $points = $conn->query($sql);
      $pointsRow = $points->fetch_assoc();
      echo('<a class="col-3">Already Out' . ' - ' . $pointsRow['points'] . '</a>
        </div>');
    } else{
      echo('<a class="col-3" href="givePoints.php?player=' . $row['playerID'] . '">Out</a>
        </div>');
    }
  }
?>
      <br>
      <div class="row">
        <div class="col-sm-2 col-md-3 col-lg-4 d-none d-sm-block"></div>
        <a class="col-8 col-sm-5 col-md-4 col-lg-3 btn btn-info" href="givePoints.php?update=True">Update Rankings</a>
        <a class="col-4 col-sm-3 col-lg-2 btn btn-info" href="givePoints.php?reset=True">Reset</a>
      </div>

  </div>
</section>

<?php
  include "footer.php";
?>

<script>
  $("#points").addClass("active");
</script>
