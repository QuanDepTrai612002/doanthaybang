<div class="container mt-2 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 roun        ded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Resgiter</h3>
                </div>
                <?php include ROOT.'/include/message.php'?>
                <div class="card-body">
                    <form action="index.php?ac=handleRegister" method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="firstName" id="inputUserName" type="text"
                                placeholder="First Name" />
                            <label for="inputUserName">First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="lastName" id="inputUserName" type="text"
                                placeholder="Last Name" />
                            <label for="inputUserName">Last Name</label>
                        </div>
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
                        <div class="form-floating mb-3">
                            <input class="form-control" name="password_Cf" id="inputPassword" type="password"
                                placeholder="Confirm Password" />
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <input type="submit" value="Create" class="btn btn-primary w-100" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>