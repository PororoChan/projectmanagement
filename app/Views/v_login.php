<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PM | Login</title>

    <!-- CSS Import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/9cc02ff3df.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Additional CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/login/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/login/vendor.bundle.base.css') ?>">
    <link rel="icon" href="<?= base_url('public/assets/images/logo.ico') ?>" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <h3>Welcome back!</h3>
                            <h5 class="font-14 font-weight-light">Happy to see you again!</h5>
                            <div id="warn" class="mt-3 mb-0">

                            </div>
                            <form id="form-log" method="POST" class="pt-3">
                                <div class="form-group">
                                    <label class="font-13" for="uname">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fas fa-user fs-6 text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="uname" name="uname" class="form-control form-control-sm border-left-0" style="font-size: 13px;" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-13" for="pass">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fas fa-key fs-6 text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="pass" id="pass" class="form-control form-control-sm border-left-0" style="font-size: 13px;" placeholder="Password">
                                    </div>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check d-flex justify-content-center">
                                        <input type="checkbox" style="width: 15px; height: 15px;"> <span class="text-dark font-13">&nbsp; Remember Me</span>
                                    </div>
                                </div>
                                <div class="my-3 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary w-25" style="height: 45px;" id="btn-login">Login</button>
                                </div>
                                <div class="text-center mt-5 font-14"> Don't have an account? <a href="#" class="text-primary">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex">
                        <p class="text-white font-weight-semibold fs-6 text-center flex-grow align-self-end">Copyright &copy; 2021 All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-login').on('click', function(ev) {
            ev.preventDefault();
            $('#btn-login').html("<i class='fas fa-spinner fa-spin-pulse text-white'></i>")

            var username = $('#uname').val();
            var password = $('#pass').val();
            var link = "<?= base_url('auth') ?>";
            var msg = '';

            setTimeout(() => {
                if (username != '' && password != '') {
                    $.ajax({
                        url: link,
                        type: 'post',
                        dataType: 'json',
                        data: {
                            uname: username,
                            passw: password,
                        },
                        success: function(res) {
                            if (res.success == 1) {
                                msg = "Login berhasil"
                                $('#warn').removeClass('alert alert-fill-danger');
                                $('#warn').addClass('alert alert-fill-success');
                                setTimeout(() => {
                                    window.location.href = "<?= base_url('boards') ?>"
                                }, 700);
                            } else {
                                msg = "Username atau Password salah"
                                $('#warn').addClass('alert alert-fill-danger');
                            }
                            $('#warn').html(msg);
                            $('#warn').show();
                            setTimeout(() => {
                                $('#btn-login').html("Login");
                            }, 500);
                        }
                    })
                } else {
                    msg = "Username dan Password dibutuhkan!";
                    $('#warn').addClass('alert alert-fill-danger');
                    $('#warn').html(msg);
                    $('#warn').show();
                    setTimeout(() => {
                        $('#btn-login').html("Login");
                    }, 500);
                }
            }, 500);
            $('#form-log')[0].reset();
            setTimeout(() => {
                $('#warn').fadeOut(800);
            }, 1000);
        })
    });
</script>

</html>