<?php 
    include('config/db_connect.php');
	$email = $country = $cities = '';
	$errors = array('email' => '', 'country' => '', 'cities' => '');

	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}

		// check country
		if(empty($_POST['country'])){
			$errors['country'] = 'A country is required';
		} else{
			$country = $_POST['country'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $country)){
				$errors['country'] = 'country must be letters and spaces only';
			}
		}

		// check cities
		if(empty($_POST['cities'])){
			$errors['cities'] = 'At least one city is required';
		} else{
			$cities = $_POST['cities'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $cities)){
				$errors['cities'] = 'Cities must be a comma separated list';
			}
		}

	if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$country = mysqli_real_escape_string($conn, $_POST['country']);
			$cities = mysqli_real_escape_string($conn, $_POST['cities']);

			// create sql
			$sql = "INSERT INTO trips(country,email,cities) VALUES('$country','$email','$cities')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: indexi.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

			
		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Where would you like to go?</h4>
		<h6 class="right"> write the place you want to travel...</h6>
		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Your Email</label>
			<input type="text" name="email">
			<label>Country</label>
			<input type="text" name="country">
			<label>City</label>			
			<input type="text" name="cities">
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('footer.php'); ?>

</html>
