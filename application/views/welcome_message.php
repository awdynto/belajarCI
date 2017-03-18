<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
	<style type="text/css">
		body {
			margin-top: 50px;
			margin-left: 30px;
		}
	</style>
</head>
<body>
<?php echo $error;?>


<form id="form" action="<?php echo site_url('index.php/welcome/save');?>" enctype="multipart/form-data">
	<p>
		Nama : <br />
		<input type="text" name="nama" id="nama" />
	</p>
	<p>
		Tgl lahir : <br />
		<input type="text" name="tgl" id="tgl" />
	</p>
	<p>
		Email : <br />
		<input type="email" name="email" id="email" />
	</p>
	<p>
		Username : <br />
		<input type="text" name="username" id="username" />
	</p>
	<p>
		Password : <br />
		<input type="password" name="password" id="password"/>
	</p>
		<p>
		Re-password : <br />
		<input type="password" name="repassword" id="repassword"/>
	</p>
	<p>
		Deskripsi : <br />
		<textarea name="deskripsi" rows="4"></textarea>
	</p>
	<p>
		Foto : <br />
	<input type="file" name="berkas" />
	</p>
	<p>
		<input type="submit" value="simpan">
	</p>
</form>
<script src="<?php echo base_url('js/jquery.min.js');?>"></script> 
<script src="<?php echo base_url('js/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('js/additional-methods.js');?>"></script>
<script>
	$(document).ready(function() {
		//memanggil method validate dengan selector id form (form id = "form")
		$('#form').validate({
			//mendefinisikan aturan validasi
			/*
			 * required : tidak boleh kosong
			 * email : harus berupa alamat email yang benar/valid (ex: demo@gmail.com, demo@yahoo.com)
			 * username : harus unik dan belum pernah ada di database
			 * minlength : karakter tidak boleh kurang dari digit yang sudah ditentukan
			 */
			rules: {
	            nama: {
	                required: true 
	            },
	            tgl: {
	                required: true,
					indonesianDate:true
				},
	            email: {
	            	email: true,
	                required: true
	            },
	            username: {
	                required: true
	            		                
	            },
	            password: {
	                required: true,
	            	minlength: 8                
	            },
	            repassword: {
	            	minlength: 8,
	                required: true,
	            	equalTo: "#password"                
	            },              
	            deskripsi: {	            	
	                required: true,
	            	minlength: 100
	            }



	        },
	        // mengcustom pesan error validasi yang akan ditampilkan
	        messages: {
	        	nama: {
	                required: 'Nama harap diisi',
	            },
	            email: {
	                required: 'Email harap diisi',
	                email: 'Email harus valid'
	            },
	            username: {	            
	            	required: 'Username harap diisi',
	            },
	            deskripsi: {
	            	required: 'Deskripsi harap diisi',
	            	minlength: 'Pesan minimal harus 100 karakter'
	            },
	            repassword: {
	            	equalTo: 'Masukan password yang sama',
	            	required: 'Repassword harap diisi'
	            },
	            password:{
	            	required: 'password harap diisi',
	            	minlength: 'minimal 8 karakter huruf kapital dan angka'
	            },
	            tgl:{
	            	required: 'Tgl harap diisi',
	            }

	        },        
	        // Jika validasi berhasil atau sudah tidak error, maka script pada blok ini akan dieksekusi
	        submitHandler: function(form) {	           	  
	        	// memanggil method pada controller dengan ajax    
	            $.ajax({
	              url: $(form).attr("action"), //diambil dari action form
	              type: 'POST',	              
	              data: {},	              	           
	              //jika request ajax berhasil
	              success: function (response) {
	              	  var data = JSON.parse(response);	              	  
	                  if(data.status === true) {
	                  	//mereset form
	                    $('#form input,textarea').val('');
	                    //menampilkan pesan sukses yang didapat melalui request ajax ke server
	                    alert(data.message);

	                  } else {	          
	                    alert('Gagal mengirim data');
	                  }
	              },
	              //jika request ajax gagal
	              error: function() {
	                alert('Terjadi Kesalahan')
	              },	              
	            });
	        }
		});
	});



	$.validator.addMethod(
	"indonesianDate",
	function(value, element) {
		// put your own logic here, this is just a (crappy) example
		return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
	},
	"Tanggal salah, formatnya DD/MM/YYYY"
);



</script>
</body>
</html>
<!-- application/views/welcome_message.php -->