<?php
    require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Daftar</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/daftar.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Registrasi</h2>
		<p class="hint-text"></p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="firstname" id="firstname" placeholder="Nama Depan" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nama Belakang" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomer Telp" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> Saya Menerima <a href="#">Syarat</a> &amp; <a href="#">Ketentuan Privasi Yang Berlaku</a></label>
		</div>
		<div class="form-group">
            <button type="submit" id="register" name="create" class="btn btn-success btn-lg btn-block">Daftar Sekarang</button>
            <br>
            <div class="text-center">Sudah mempunyai akun? <a href="login.php">Sign in</a></div>
        </div>
    </form>
	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){
                
                var firstname   = $('#firstname').val();
                var lastname    = $('#lastname').val();
                var email       = $('#email').val();
                var telp        = $('#telp').val();
                var password    = $('#password').val();

                e.preventDefault();

                $.ajax({
					type: 'POST',
					url: 'process.php',
					data: {firstname: firstname,lastname: lastname,email: email,telp: telp,password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
                    error: function(data){
                    Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors whle saving the data.',
                                'type': 'error'
                                })
                    }
                });

               
            }else{
            
            }

            

            
        
        });

        
    });
</script>
</body>
</html>