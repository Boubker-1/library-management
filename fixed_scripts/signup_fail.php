<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fixed_scripts/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="title">
            <h2>Welcome to our Library Management System</h2>
            <p>If you're new, please Sign Up!<br>If you already registered, please Log In!</p>
        </div>
        <div class = "custom-card-width">
            <div class="card">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-info w-50 active" id="signup-toggle" onclick="toggleForm('signup')">Sign Up</button>
                    <button class="btn btn-outline-info w-50" id="login-toggle" onclick="toggleForm('login')">Log In</button>
                </div>
                <div class="card-body">
                    <div id="signup-form">
                        <!-- Sign Up Form -->
                        <div class="alert alert-danger" role="alert">Account already exists</div>
                        <form action="../fixed_scripts/signup_process.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </form>
                    </div>
                    <div id="login-form" style="display: none;">
                        <!-- Log In Form -->
                        <form action="../fixed_scripts/login_process.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                function toggleForm(formType) {
                    if (formType === 'signup') {
                        document.getElementById('signup-toggle').classList.add('active');
                        document.getElementById('login-toggle').classList.remove('active');
                        document.getElementById('signup-form').style.display = 'block';
                        document.getElementById('login-form').style.display = 'none';
                    } else {
                        document.getElementById('signup-toggle').classList.remove('active');
                        document.getElementById('login-toggle').classList.add('active');
                        document.getElementById('signup-form').style.display = 'none';
                        document.getElementById('login-form').style.display = 'block';
                    }
                }
            </script>
            <div class='made-by'>
                <span>Visit this project's GitHub repository </span>
                <a href='http://github.com/Boubker-1/library-management' target='_blank'><img src='../fixed_scripts/github_icon.png' alt='GitHub' class='github-icon'></a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
