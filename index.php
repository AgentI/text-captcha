<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>captcha test</title>
		<style type="text/css">
			input {
				display: block;
			}
		</style>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
		<script type="text/javascript" src="jquery.textCaptcha.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				$('#testform').textCaptcha({
					type: 'number', // type can be text, number or random
					method: 'add', //
					length: 4 //Length can be any number, somewhere between 4 and 6 would probably be best
				});
				
				$.validator.addMethod("captchaCheck",
					function() {
						return $('#testform').textCaptchaCheck();
					},
					"Captcha value does not match");
				
				$("#testform").validate({
					rules: {
						captcha_user: {
							required: true,
							captchaCheck: true
						}
					}
				});
			});
		</script>
	</head>

	<body>
		<p class="captcha_type"></p>
		<form method="post" id="testform" action="functions.php">
			<input type="submit" value="check" id="form_submit" />
		</form>
	</body>
</html>