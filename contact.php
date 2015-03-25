<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

	<section class="single-article">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	<?php 

	/*validation*/

	$error = '';


	if ( isset($_POST['vname']) ) {
		$vname = $_POST['vname'];
		if( $vname == '') {
			$name_error = "<span class='error-message'> (Required)</span>";
			$namegood = 'false';
		}else{
			$namegood = 'true';
		}
	}

	if ( isset($_POST['message']) ) {
		$message = $_POST['message'];
		if( $message == '') {
			$message_error = "<span class='error-message'> (Required)</span>";
			$messagegood = 'false';
		}else{
			$messagegood = 'true';
		}
	}

	function isValidEmail($email){
		$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
	    if (eregi($pattern, $email)){
			return true;
		}else {
			return false;
		}   
	}

	if ( isset($_POST['email']) ) {
		$email = $_POST['email'];
		if( $email == '') {
			$email_error = "<span class='error-message'> (Required)</span>";
			$emailgood = 'false';
		}else{
			if (isValidEmail($_POST['email'])){
				$emailgood = 'true';
	    	}else{
				$email_error = $error . "<span class='error-message'> (Valid Email Required )</span>";
				$emailgood = 'false';
			}
		}
	}


	if ( isset($_POST['vname']) ) {

	if( $emailgood == 'true' && $messagegood == 'true' && $namegood == 'true' ){
		$recipient = "info@senseslost.com";

		$subject = $vname . " has sent a message to Senses Lost";

		$userip = $_SERVER["REMOTE_ADDR"];

		$to = $recipient;
		$body =  "Name: " . $vname . "\n" . "Email: " . $email . "\n\n" .  $message . "\n\n" .  "IP Adress: " . $userip;
		$headers = 'From: ' . $email . "\r\n" .
	    'Reply-To: '. $email . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $body, $headers);

		echo"<script>window.location=\"/thank-you\"</script>";

		}
	} ?>


		<form id="contact-form" action="" method="post">
			<fieldset>
				<legend>Contact Form</legend>
				<label for="vname">Name <?php echo $name_error ?></label>
				<input type="text" name="vname" id="vname" value="<?php echo $_POST['vname'] ?>">

				<label for="email">Email <?php echo $email_error ?></label>
				<input type="email" name="email" id="email" value="<?php echo $_POST['email'] ?>">

				<label for="message">Message <?php echo $message_error ?></label>
				<textarea name="message" id="message" rows="15"><?php echo $_POST['message'] ?></textarea>

				<button type="submit" name="submit" id="submit">Send</button>
			</fieldset>
		</form>
	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
