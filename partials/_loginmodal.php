<!-- Start of contents of login modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
            <div class="modal-body">
                <div class="container">
                    <form class="my-3" action="/college-forum/partials/_login.php" method="post">
                        <div class="mb-3">
                            <label for="login_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="login_email" aria-describedby="emailHelp" name="login_email">
                        </div>
                        <div class="mb-3">
                            <label for="login_pw" class="form-label">Password</label>
                            <input type="password" class="form-control" id="login_pw" name="login_pw">
                        </div>
                        <button type="submit" class="btn btn-success my-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of contents of login modal -->