<?php
if(isset($_POST['refresh'])){
   $game_selected = $_POST['game'];
   $start_date = $_POST['startdate'];
   $end_date = $_POST['enddate'];

   $_SESSION['game'] = $game_selected;
   $_SESSION['start_date'] = $start_date;
   $_SESSION['end_date'] = $end_date;
}
    include('db/chart-db.php');
?>

<!--select game for specific data-->
<div style="margin-top: 20px;" class="styled-select">
<form method="post" action="#" name="data">
  <select name="game" id="selectBoxId" style="margin-right: 10px;">
    <option value="1">RuneGuardian Android</option>
    <option value="2">RuneGuardian iOS</option>
  </select>
    Start Date: <input type="text" class="datepicker" name="startdate" value="<?php echo $_SESSION['start_date']; ?>" required>
    End Date: <input type="text" class="datepicker" name="enddate" value="<?php echo $_SESSION['end_date']; ?>" required>
  <input class="btn btn-success btn-xs" type="submit" name="refresh" value="Refresh" />
</form>
</div>

<script>
var option = "<?= $_SESSION['game']; ?>";
if (option != '') {
  document.getElementById('selectBoxId').selectedIndex = option-1;
}
</script>
