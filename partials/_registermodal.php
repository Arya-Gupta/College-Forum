<!-- Start of contents of register modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
            <div class="modal-body">
                <div class="container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Student</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Teacher</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- Start of student registration -->
                            <form class="my-3" action="/college-forum/partials/_register.php" method="post">
                                    <h5 style="font-size: 18px;">Fields marked with an asterisk (*) are compulsory</h5>
                                    <div class="mb-3">
                                        <label for="student_name" class="form-label">*Name</label>
                                        <input type="name" class="form-control" id="student_name" name="student_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="student_email" class="form-label">*Email address</label>
                                        <input type="email" class="form-control" id="student_email" aria-describedby="emailHelp" name="student_email">
                                        <div id="emailHelp" class="form-text">We'll be using this email id if you subscribe to the mailing list</div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Default select example" name="student_batch">
                                            <option selected value="">*Select your batch</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Default select example" name="student_stream">
                                            <option selected value="">*Select your stream</option>
                                            <option value="Computer Science">Computer Science</option>
                                            <option value="Information Technology (IT)">Information Technology (IT)</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="student_pw" class="form-label">*Password</label>
                                        <input type="password" class="form-control" id="student_pw" name="student_pw">
                                    </div>
                                    <div class="mb-3">
                                        <label for="student_cpw" class="form-label">*Confirm Password</label>
                                        <input type="password" class="form-control" id="student_cpw" name="student_cpw">
                                    </div>
                                    <div class="mb-3">
                                        <label for="student_picture" class="form-label">Choose a profile picture (optional)</label>
                                        <input class="form-control" type="file" id="student_picture" name="student_picture">
                                    </div>
                                    <!-- Hidden input indicating user is student -->
                                    <input type="hidden" id="identity" name="identity" value="student">
                                    <button type="submit" class="btn btn-success my-3">Register</button>
                            </form>
                            <!-- End of student registration -->
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Start of teacher registration -->
                            <form class="my-3" action="/college-forum/partials/_register.php" method="post">
                                <h5 style="font-size: 18px;">Fields marked with an asterisk (*) are compulsory</h5>
                                <div class="mb-3">
                                    <label for="teacher_name" class="form-label">*Name</label>
                                    <input type="name" class="form-control" id="teacher_name" name="teacher_name">
                                </div>
                                <div class="mb-3">
                                    <label for="teacher_email" class="form-label">*Email address</label>
                                    <input type="email" class="form-control" id="teacher_email" aria-describedby="emailHelp" name="teacher_email">
                                    <div id="emailHelp" class="form-text">We'll be using this email id if you subscribe to the mailing list</div>
                                </div>
                                <div class="mb-3">
                                    <label for="teacher_pw" class="form-label">*Password</label>
                                    <input type="password" class="form-control" id="teacher_pw" name="teacher_pw">
                                </div>
                                <div class="mb-3">
                                    <label for="teacher_cpw" class="form-label">*Confirm Password</label>
                                    <input type="password" class="form-control" id="teacher_cpw" name="teacher_cpw">
                                </div>
                                <div class="mb-3">
                                    <label for="teacher_picture" class="form-label">Choose a profile picture (optional)</label>
                                    <input class="form-control" type="file" id="teacher_picture" name="teacher_picture">
                                </div>
                                <!-- Hidden input indicating user is teacher -->
                                <input type="hidden" id="identity" name="identity" value="teacher">
                                <button type="submit" class="btn btn-success my-3">Register</button>
                            </form>
                            <!-- End of teacher registration -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of contents of register modal -->





