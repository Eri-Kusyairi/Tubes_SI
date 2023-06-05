<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
</head>
<body>
<div class="center">
    <h1>Login</h1>
    <form method="post" action="{{ route('tbPengguna.login') }}">
        @csrf <!-- Add CSRF protection -->
        <div class="txt_field">
            <input type="text" name="username" class="form-control" required>
            <label>Username</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" class="form-control" required>
            <label>Password</label>
        </div>
        <div class="pass">Forgot Password</div>
        <input type="submit" value="Login" class="btn btn-primary">
        <div class="signup_link">
            Not a Member? <a href="#" onclick="showRegisterPopup()">Signup</a>
        </div>
        @if(session('loginError')) <!-- Display error message if login fails -->
        <div class="alert alert-danger">
            {{ session('loginError') }}
        </div>
        @endif
    </form>
</div>

<!-- Register Popup -->
<div id="registerPopup" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="btn-close" onclick="hideRegisterPopup()"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tbPengguna.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function showRegisterPopup() {
        document.getElementById("registerPopup").style.display = "block";
    }

    function hideRegisterPopup() {
        document.getElementById("registerPopup").style.display = "none";
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>