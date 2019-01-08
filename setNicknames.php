<?php
  include "header.php";
  include "includes/dbconn.inc.php";

  if(isset($_GET['nickname']) && isset($_GET['id'])){
    $nickname = $_GET['nickname'];
    $id = $_GET['id'];
    $sql = "UPDATE players
            SET playerNickname = '$nickname'
            WHERE playerID = '$id'";
    $conn->query($sql);
  }
?>

<section class="container">
  <div class="jumbotron">
    <h1 class="centre">Set Nicknames</h1>

<?php
  $sql = "SELECT *
          FROM players";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    echo('<div class="row">
      <div class="col-2 col-sm-3 col-md-4"></div>
      <div class="col-4 col-sm-3">' . $row['playerNickname'] . '</div>
      <a class="col-2" href="setNicknames.php?id=' . $row['playerID'] . '">Change</a>
    </div>');
  }
?>
    <form class="row" method="GET">
      <input type="text" class="col-sm-8 col-md-9 col-lg-10 form-control centre" name="nickname" placeholder="Nickname">
      <input type="text" name="id" placeholder="id" value="<?php echo $_GET['id']; ?>" hidden>
      <button type="submit" class="col-sm-4 col-md-3 col-lg-2 btn btn-primary">Search</button>
    </form>
  </div>
</section>

<?php
  include "footer.php";
?>

<script>
  $("#managePlayers").addClass("active");
</script>
