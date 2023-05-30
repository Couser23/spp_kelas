<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Siswa | Pembayaran SPP</title>
</head>
<body>
    
 <div class="container">
    <div class="box">
    <form action="proses-login-siswa.php" method="post" autocomplete="off">
        <!------------------ Login Box --------------------->
        <div class="box-login" id="login">
            <div class="top-header">
                <h3>Hello, Student</h3>
                <small>Selamat Datang Di Pembayaran SPP.</small>
            </div>
            <div class="input-group">
                <div class="input-field">
                <input type="nisn" class="input-box" id="" name="nisn" required>
                    <label for="logNISN">NISN</label>
                </div>
                <div class="input-field">
                <input type="password" class="input-box" id="" name="password" required>
                    <label for="logNIS">Password</label>
                </div>
                <div class="input-field">
                    <input type="submit" class="input-submit" value="Login">
                </div>
                <div class="forgot">
                    <a href="index2.php">Login Sebagai Admin/Petugas</a>
                </div>
            </div>
        </div>
    </form>
        <!------------------ Script -------------------------->
    <script>
     var x = document.getElementById('login');
     var y = document.getElementById('register');
     var z = document.getElementById('btn');
 
     function login(){
        x.style.left = "27px";
        y.style.right = "-350px";
        z.style.left = "0px";
     }
     function register(){
        x.style.left = "-350px";
        y.style.right = "25px";
        z.style.left = "150px";
     }
   // view password codes
   
   
   function myLogPassword(){
    var a = document.getElementById('logPassword');
    var b = document.getElementById('eye');
    var c = document.getElementById('eye-slash');
    if(a.type === "password"){
        a.type = "text"
        b.style.opacity = "0";
        c.style.opacity = "1";
    }else{    
        a.type = "password"
        b.style.opacity = "1";
        c.style.opacity = "0";
    }
   }
   
   
   function myRegPassword(){
var d = document.getElementById('regPassword');
var b = document.getElementById("eye-2");
var c = document.getElementById("eye-slash-2");
if(d.type === "password"){
    d.type = "text"
    b.style.opacity = "0";
    c.style.opacity = "1";
}else{    
    d.type = "password"
    b.style.opacity = "1";
    c.style.opacity = "0";
}
}
</script>
</body>
</html>