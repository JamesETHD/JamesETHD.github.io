<?php
  include "header.php";
  include "includes/dbconn.inc.php";

  if(isset($_GET['name'])){
    $player = $_GET['name'];
    $sql = "INSERT INTO players(playerName)
            VALUES ('$player')";
    $conn->query($sql);
  }
?>

<section class="container">
  <div class="jumbotron">
    <h1 class="centre">Add a Player</h1>

    <form class="row" method="GET">
      <input type="text" class="col-sm-8 col-md-9 col-lg-10 form-control centre" name="name" placeholder="Player Name">
      <button type="submit" class="col-sm-4 col-md-3 col-lg-2 btn btn-primary">Add</button>
    </form>

  </div>
</section>

<?php
  include "footer.php";
?>

<script>
  $("#managePlayers").addClass("active");
</script>
