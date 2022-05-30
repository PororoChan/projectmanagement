<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PM | Login</title>

    <!-- CSS Import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Additional CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/login/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/login/vendor.bundle.base.css') ?>">
    <link rel="icon" href="<?= base_url('public/assets/images/favicon.png') ?>" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="<?= base_url('public/assets/images/logo.svg') ?>" alt="logo">
                            </div>
                            <h4>Welcome back!</h4>
                            <h6 class="font-weight-light">Happy to see you again!</h6>
                            <form id="form-user" class="pt-3">
                                <div class="form-group">
                                    <label for="uname">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fas fa-user fs-6 text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="name" name="uname" class="form-control form-control-sm border-left-0" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-13" for="pass">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fas fa-lock fs-6 text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-sm border-left-0" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="my-3">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-semibold auth-form-btn" href="#">LOGIN</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="#" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-semibold text-center flex-grow align-self-end">Copyright &copy; 2021 All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?= base_url('public/assets/js/login/vendor.bundle.base.js') ?>"></script>

</html>