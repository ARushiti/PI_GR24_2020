<?php 

	include('config/db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM trips WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: indexi.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM trips WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$trip = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('header.php'); ?>

	<div class="container center">
		<?php if($trip): ?>
			<h4><?php echo $trip['country']; ?></h4>
			<p>Created by <?php echo $trip['email']; ?></p>
			<p><?php echo date($trip['created_at']); ?></p>
			<h5>cities:</h5>
			<p><?php echo $trip['cities']; ?></p>
			<!-- DELETE FORM -->
			<form action="detalis.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $trip['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

		<?php else: ?>
			<h5>No such trip exists.</h5>
		<?php endif ?>
	</div>

	<?php include('footer.php'); ?>

</html>
