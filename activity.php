<head>
    <title>Users / Activity </title>


    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <?php
require_once("navbar.php");
?>
</head>

<body>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Activity Manegment</li>
                    <li class="breadcrumb-item active">Add Activity</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">


                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Joining Pro.</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Team
                                        Visit</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Customer Visit</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Product Sale</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Camp Visit</button>
                                </li>

                            </ul>

                            <div class="tab-content pt-2">
                                <!-- joining Pro. section -->
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                    <div class="card col-md-8 m-auto">
                                        <div class="card-body">
                                            <h5 class="card-title">Joining Program</h5>

                                            <!-- Joining pro Form -->
                                            <form class="row g-3">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="custoname"
                                                        placeholder="Customer Name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="refername"
                                                        placeholder="Reference Member">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="customobile"
                                                        placeholder="Customer Mobile">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" class="form-control" id="custoemail"
                                                        placeholder="Customer Email">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="cusadds"
                                                        placeholder="Address" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <select id="joinsta" class="form-select">
                                                        <option selected disabled>Join Status</option>
                                                        <option>Join</option>
                                                        <option>Not Join</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <select id="follosta" class="form-select">
                                                        <option selected disabled>Follow Up</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="cusremark"
                                                        placeholder="*Remarks If any"></textarea>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="To" class="form-label">To</label>
                                                    <input type="time" class="form-control" id="timeto" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="From" class="form-label">From</label>
                                                    <input type="time" class="form-control" id="timefrom" required>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                </div>
                                            </form><!-- End Joining pro Form -->

                                        </div>
                                    </div>

                                </div>

                                <!-- team visit section -->
                                <div class="tab-pane fade profile-overview" id="profile-edit">

                                    <!-- team visit Form -->
                                    <div class="card col-md-8 m-auto">
                                        <div class="card-body">
                                            <h5 class="card-title">Team Contact</h5>
                                            <form class="row g-3">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="custoname"
                                                        placeholder="Member Name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="refername"
                                                        placeholder="Member Address">
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="joinsta" class="form-select">
                                                        <option selected disabled>Contact Type</option>
                                                        <option>Self visit</option>
                                                        <option>By Call</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="customobile"
                                                        placeholder="Partner Name (if any)">
                                                </div>

                                                <div class="row g-3">
                                                    <legend class="col-form-label col-sm-2 pt-0">Reason For Contact
                                                    </legend>
                                                    <div class="col">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="gridCheck1">
                                                            <label class="form-check-label" for="gridCheck1">
                                                                Normally FollowUp
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="gridCheck2">
                                                            <label class="form-check-label" for="gridCheck2">
                                                                For Product
                                                            </label>
                                                        </div>

                                                    </div>

                                                    <div class="col">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="gridCheck1">
                                                            <label class="form-check-label" for="gridCheck1">
                                                                For Customer
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="gridCheck2">
                                                            <label class="form-check-label" for="gridCheck2">
                                                                Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="cusremark"
                                                        placeholder="*Remarks If any"></textarea>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="To" class="form-label">To</label>
                                                    <input type="time" class="form-control" id="timeto" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="From" class="form-label">From</label>
                                                    <input type="time" class="form-control" id="timefrom" required>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                </div>
                                            </form>
                                            <!-- End team visit Form -->
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify"
                                                        checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <div style="position:fixed;bottom:0;width:100%;">
      <?php 
require_once ("footer.php");
?>
</div>

</body>

</html>