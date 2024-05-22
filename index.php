<?php 
$page_title = "Home Page";
include('header.php');
include('navbar.php');
?>

<link rel="stylesheet" href="asts/styles.css">
        <div class="container" id="container">
            <div class="form-container login">
                <form action="login_c.php" method="POST">
                    <h1 class="log">Login</h1>
                    <input type="email" placeholder="Email" name="email"    >
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="lpswd" id="lpswd">
                        <span class="toggle-password" onclick="togglePasswordVisibility('lpswd', this)">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                    <a href="forget_pass.php">Forgot Your Password?</a>
                    <button type="submit" name="login_now">Login</button>
                </form>
            </div>
            <div class="form-container register">
                <form action="reg_c.php" method="POST">
                    <h1>Register</h1>
                    <input type="text" placeholder="First Name" name="fname" pattern="[A- Za -z]+" title="Please enter letters only" required>
                    <input type="text" placeholder="Middle Name" name="mname" pattern="[A- Za -z]+" title="Please enter letters only" required>
                    <input type="text" placeholder="Surname" name="sname" pattern="[A- Za -z]+" title="Please enter letters only" required>
                    <input type="email" placeholder="Email" name="email">
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="pswd" id="pswd">
                        <span class="toggle-password" onclick="togglePasswordVisibility('pswd', this)">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Confirm Password" name="cpswd" id="cpswd">
                        <span class="toggle-password" onclick="togglePasswordVisibility('cpswd', this)">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                    <div id="confirm-password-feedback" style="display: none;">Passwords do not match</div>
                    <button type="submit" name="register">Sign In</button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Welcome Back!</h1>
                        <p>Enter your email and password to enter</p>
                        <p class="o">Don't have an account yet?</p>
                        <button class="hidden" id="login">Sign up!</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Hello, Friend!</h1>
                        <p class="p">Register with your personal details</p>
                        <p>Already have an account?</p>
                        <button class="hidden" id="register">Login</button>
                    </div>
                </div>
            </div>
        </div>
<script src="asts/script.js"></script>
<script>
function togglePasswordVisibility(fieldId, toggleButton) {
    var input = document.getElementById(fieldId);
    var icon = toggleButton.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function validatePasswords() {
    var password = document.getElementById('pwd').value;
    var confirmPassword = document.getElementById('cpwd').value;
    var feedback = document.getElementById('confirm-password-feedback');

    if (password !== confirmPassword) {
        feedback.style.display = 'block';
    } else {
        feedback.style.display = 'none';
    }
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.clouds.min.js"></script>

<script>
VANTA.CLOUDS({
  el: "#background",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 695.00,
  minWidth: 200.00,
  skyColor: 0x0,
  cloudColor: 0x48b2d1,
  cloudShadowColor: 0xa812cc,
  sunColor: 0x9612cf,
  sunGlareColor: 0xcd30ff,
  sunlightColor: 0xfe30ff
})
</script>
