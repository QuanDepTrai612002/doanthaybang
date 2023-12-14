<div class="container mt-2 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 roun        ded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <?php include ROOT.'/include/message.php'?>
                <div class="card-body">
                    <form action="index.php?ac=handleLogin" method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="inputUserName" type="email"
                                placeholder="Email" />
                            <label for="inputUserName">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="password" id="inputPassword" type="password"
                                placeholder="Password" />
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <input type="submit" value="Login" class="btn btn-primary w-100" />
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="index.php?ac=register">Need an account? Sign up!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>