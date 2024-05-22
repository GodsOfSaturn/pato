<?php
session_start();
include('header.php');
include('navbar.php');
include('dbconn.php');
?>

<link rel="stylesheet" href="asts/styles.css">
<body class="body">
    <div class="container1">
        <div class="form-container login1">
            <form class="form1" action="authenticate.php" method="POST">
                <h1 class="log1">Forgot your password</h1>
                <?php if(isset($_SESSION['status'])): ?>
                    <p><?php echo $_SESSION['status']; ?></p>
                    <?php unset($_SESSION['status']); ?>
                <?php endif; ?>
                <p>Enter your email associated with your account</p>
                <input class="input1" type="email" placeholder="Email" name="email" required>
                <button class="button1" type="submit" name="forget_pass">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.clouds.min.js"></script>

    <script>
        VANTA.CLOUDS({
            el: ".body",
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
</body>
