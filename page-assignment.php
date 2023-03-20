<?php
get_template_part('trek/functions');
lxp_login_check();
$treks_src = get_stylesheet_directory_uri() . '/treks-src';
$userdata = get_userdata(get_current_user_id());

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Assignment</title>
    <link href="<?php echo $treks_src; ?>/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/header-section.css" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/adminInternalTeacherView.css" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/treksstyle.css" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/calendar.css" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/addNewTeacherModal.css" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/newAssignment.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>

    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="header-logo-search">
                    <!-- logo -->
                    <div class="header-logo">
                        <img src="<?php echo $treks_src; ?>/assets/img/header_logo.svg" alt="svg" />
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <div class="header-logo-search">
                        <!-- searching input -->
                        <div class="header-search">
                            <img src="<?php echo $treks_src; ?>/assets/img/header_search.svg" alt="svg" />
                            <input placeholder="Search" />
                        </div>
                    </div>
                </div>
                <div class="d-flex" role="search">
                    <div class="header-notification-user">
                        <!-- notification -->
                        <div class="header-notification">
                            <img src="<?php echo $treks_src; ?>/assets/img/header_bell-notification.svg" alt="svg" />
                        </div>
                        <!-- user detail & Image  -->
                        <div class="header-user">
                            <!-- User Avatar -->
                            <div class="user-avatar">
                                <img src="<?php echo $treks_src; ?>/assets/img/header_avatar.svg" alt="svg" />
                            </div>
                            <!-- User short detail -->
                            <div class="user-detail">
                                <span class="user-detail-name">Kristin Watson</span>
                                <span>Science teacher</span>
                            </div>
                            <!-- Arrow for open menu -->
                            <div class="user-options">
                                <img src="<?php echo $treks_src; ?>/assets/img/header_arrow open.svg" alt="svg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Assignment Section -->
    <section class="welcome-section assignment-section">
        <button class="back-btn">
            <img src="<?php echo $treks_src; ?>/assets/img/back.svg" alt="logo" />
            <p class="back-btn-text">Back</p>
        </button>

        <!-- Assignment Tabs -->
        <nav class="nav-section select-section">
            <ul class="treks_ul select-ul" id="myTab" role="tablist">
                <li>
                    <button class="select-link active" id="teachers-tab" data-bs-toggle="tab"
                        data-bs-target="#teachers-tab-pane" type="button" role="tab" aria-controls="teachers-tab-pane"
                        aria-selected="true">
                        <span class="select-num">1</span>
                        Select a space in your calendar
                    </button>
                </li>
                <li>
                    <button class="select-link" id="classes-tab" data-bs-toggle="tab" data-bs-target="#classes-tab-pane"
                        type="button" role="tab" aria-controls="classes-tab-pane" aria-selected="true">
                        <span class="select-num">2</span>
                        Select TREK or RPA segments
                    </button>
                </li>
                <li>
                    <button class="select-link" id="groups-tab" data-bs-toggle="tab" data-bs-target="#groups-tab-pane"
                        type="button" role="tab" aria-controls="groups-tab-pane" aria-selected="true">

                        <span class="select-num third-select-num">3</span>
                        Select Class and Students
                    </button>
                </li>
            </ul>
        </nav>
        <!-- End Assignment Tabs -->
    </section>

    <!-- Tab Details -->

    <div class="tab-content" id="myTabContent">
        <!-- 1st Tab -->
        <div class="tab-pane fade show active" id="teachers-tab-pane" role="tabpanel" aria-labelledby="teachers-tab"
            tabindex="0">

            <!-- New Assignment Day Week Month Buttons -->
            <section class="assignment-section new-assignment-section">
                <h3 class="new-assignment-heading">New Assignment</h3>
                <div class="button-box">
                    <button class="assignment-button day-button">Day</button>
                    <button class="assignment-button week-button active">Week</button>
                    <button class="assignment-button month-button">Month</button>
                </div>
            </section>
            <!-- Calendar Section -->
            <section class="new-assignment-section calendar-container">
                <section class="assignment-section calendar-section">
                    <p class="month-text month-date-text">February 19 - 25, 2023</p>
                    <div class="previous-last-box">
                        <img class="cursor-img" src="<?php echo $treks_src; ?>/assets/img/left-arrow.svg" alt="arrow" />
                        <p class="month-text">February</p>
                        <img class="cursor-img" src="<?php echo $treks_src; ?>/assets/img/right-arrow.svg" alt="arrow" />
                    </div>
                </section>
            </section>
        </div>
        <!-- 2nd Tab -->
        <div class="tab-pane fade show active2" id="classes-tab-pane" role="tabpanel" aria-labelledby="classes-tab"
            tabindex="1">

            <!-- New Assignment Calendar Section -->
            <section class="calendar-container select-assignment-section">

                <!-- New Assignment -->
                <div class="select-trek-box">
                    <h3 class="new-assignment-heading">New Assignment</h3>
                    <div class="select-calendar-box">
                        <h4 class="new-assignment-heading select-calendar-heading">Calendar</h4>
                        <div class="calendar-time-date">
                            <img src="<?php echo $treks_src; ?>/assets/img/clock-outline.svg" alt="logo" />
                            <div class="time-date-box days-box">
                                <div class="time-date-box">
                                    <p class="date-time">Thursday, February 23</p>
                                    <p class="date-time">09:00 am</p>
                                    <p class="date-time to-text">To</p>
                                    <p class="date-time">10:00 am</p>
                                </div>
                                <label class="to-text all-day-label">
                                    <input class="form-check-input" type="checkbox" />
                                    All day
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vertical Line -->
                <div class="tab-vertical-line"></div>

                <!-- Assign Content -->
                <div class="select-trek-box assign-content">
                    <h3 class="new-assignment-heading assign-heading">Assign Content</h3>
                    <p class="date-time assign-text">Select a content to assign</p>
                    <div class="search_box">
                        <label class="trek-label">TREK</label>
                        <div class="dropdown period-box">
                            <button class="input_dropdown dropdown-button" type="button" id="dropdownMenu2"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select a TREK
                                <img class="rotate-arrow" src="<?php echo $treks_src; ?>/assets/img/down-arrow.svg" alt="logo" />
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item dropdown-item2 dropdown-class">
                                    <div class="third-card-box">
                                        <img src="<?php echo $treks_src; ?>/assets/img/interdependence-logo.svg" alt="img" />
                                        <p class="interdependence-text">5.12A Interdependence</p>
                                    </div>
                                </button>
                                <button class="dropdown-item dropdown-item2 dropdown-class" type="button">
                                    <div class="third-card-box">
                                        <img src="<?php echo $treks_src; ?>/assets/img/unsplash-logo.svg" alt="img" />
                                        <p class="interdependence-text">5.7B Forces & Experimental Design</p>
                                    </div>
                                </button>
                                <button class="dropdown-item dropdown-item2 dropdown-class" type="button">
                                    <div class="third-card-box">
                                        <img src="<?php echo $treks_src; ?>/assets/img/unsplash-logo2.svg" alt="img" />
                                        <p class="interdependence-text">5.6A Physical Properties</p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="search_box">
                        <label class="trek-label">RPA segment</label>

                        <!-- Select a RPA segment -->
                        <div class="dropdown period-box">
                            <button class="input_dropdown dropdown-button second-drop-button" type="button"
                                id="dropdownMenu2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select a RPA segment
                                <img class="rotate-arrow" src="<?php echo $treks_src; ?>/assets/img/down-arrow.svg" alt="logo" />
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <!-- Recall Button-->
                                <button
                                    class="dropdown-item dropdown-item2 polygon-button recall-button dropdown-class">
                                    <!-- Recall -->
                                    <div class="tags-body select-tags-body-polygon recall-poly-body">
                                        <input class="form-check-input input-recall" type="checkbox" value=""
                                            id="Recall" />
                                        <div class="tags-body-polygon">
                                            <span>R</span>
                                        </div>
                                        <div class="tags-body-detail">
                                            <span>Recall</span>
                                        </div>
                                    </div>
                                </button>
                                <!-- Practice Button A -->
                                <button
                                    class="dropdown-item dropdown-item2 polygon-button practice-button dropdown-class">
                                    <!-- Practice A -->
                                    <div class="tags-body select-tags-body-polygon pa-poly-body">
                                        <input class="form-check-input input-practiceA" type="checkbox" value=""
                                            id="practiceA" />
                                        <div class="tags-body-polygon ">
                                            <span>P</span>
                                        </div>
                                        <div class="pa-body-detail">
                                            <span>Practice A</span>
                                        </div>
                                    </div>
                                </button>
                                <!-- Practice Button B -->
                                <button
                                    class="dropdown-item dropdown-item2 polygon-button practice-button dropdown-class">
                                    <!-- Practice B -->
                                    <div class="tags-body select-tags-body-polygon pa-poly-body">
                                        <input class="form-check-input input-practiceB" type="checkbox" value=""
                                            id="practiceB" />
                                        <div class="tags-body-polygon ">
                                            <span>P</span>
                                        </div>
                                        <div class="pa-body-detail">
                                            <span>Practice B</span>
                                        </div>
                                    </div>
                                </button>
                                <!-- Apply Button -->
                                <button class="dropdown-item dropdown-item2 polygon-button apply-button dropdown-class">
                                    <!-- Apply -->
                                    <div class="tags-body select-tags-body-polygon apply-poly-body">
                                        <input class="form-check-input input-apply" type="checkbox" value=""
                                            id="apply" />
                                        <div class="tags-body-polygon apply-body-polygon">
                                            <span>A</span>
                                        </div>
                                        <div class="pa-body-detail">
                                            <span>Apply</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Button Section -->
            <section class="calendar-container select-assignment-section btns-container">
                <div class="input_section">
                    <div class="btn_box profile_buttons">
                        <button class="btn profile_btn" type="button" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button class="btn profile_btn">Continue</button>
                    </div>
                </div>
            </section>
        </div>
        <!-- 3rd Tab -->
        <div class="tab-pane fade show" id="groups-tab-pane" role="tabpanel" aria-labelledby="groups-tab" tabindex="2">

            <!-- New Assignment -->
            <section class="calendar-container select-assignment-section third-tab-section">
                <!-- New Assignment Calendar -->
                <div class="select-trek-box">
                    <h3 class="new-assignment-heading">New Assignment</h3>
                    <div class="select-calendar-box third-tab-calendar-box">
                        <h4 class="new-assignment-heading select-calendar-heading">Calendar</h4>
                        <div class="calendar-time-date third-tab-date-time">
                            <img src="<?php echo $treks_src; ?>/assets/img/clock-outline.svg" alt="logo" />
                            <div class="time-date-box days-box">
                                <div class="time-date-box">
                                    <p class="date-time">Thursday, February 23</p>
                                    <p class="date-time">09:00 am</p>
                                    <p class="date-time to-text">To</p>
                                    <p class="date-time">10:00 am</p>
                                </div>
                                <label class="to-text all-day-label">
                                    <input class="form-check-input" type="checkbox" />
                                    All day
                                </label>
                            </div>
                        </div>
                        <!-- TREK -->
                        <h4 class="new-assignment-heading select-calendar-heading third-calendar-heading">TREK</h4>
                        <div class="third-trek-box">
                            <div class="third-card-box">
                                <img src="<?php echo $treks_src; ?>/assets/img/interdependence-logo.svg" alt="img" />
                                <p class="interdependence-text">5.12A Interdependence</p>
                            </div>
                            <img class="cursor-img" src="<?php echo $treks_src; ?>/assets/img/delete.svg" alt="img" />
                        </div>
                        <!-- horizontal line -->
                        <div class="horizontal-line"></div>
                        <!-- RPA Segment -->
                        <h4 class="new-assignment-heading select-calendar-heading">RPA Segment</h4>
                        <div class="third-trek-box recall-trek-box">
                            <!-- Recall -->
                            <div class="tags-body recall-poly-body">
                                <div class="tags-body-polygon">
                                    <span>R</span>
                                </div>
                                <div class="tags-body-detail">
                                    <span>Recall</span>
                                </div>
                            </div>
                            <img class="cursor-img" src="<?php echo $treks_src; ?>/assets/img/delete.svg" alt="img" />
                        </div>
                        <div class="third-trek-box practice-trek-box">
                            <!-- Practice A -->
                            <div class="tags-body pa-poly-body">
                                <div class="tags-body-polygon ">
                                    <span>P</span>
                                </div>
                                <div class="pa-body-detail">
                                    <span>Practice A</span>
                                </div>
                            </div>
                            <img class="cursor-img" src="<?php echo $treks_src; ?>/assets/img/delete.svg" alt="img" />
                        </div>
                        <!-- horizontal line -->
                        <div class="horizontal-line"></div>

                        <!-- Number of Students -->
                        <h4 class="new-assignment-heading select-calendar-heading">Students</h4>

                        <!-- Student Period and Grade-->
                        <div class="time-date-box days-box">
                            <div class="time-date-box">
                                <p class="date-time student-period">Science 3rd period</p>
                                <p class="date-time student-period">5th grade</p>
                                <p class="date-time student-period">8 students</p>
                            </div>
                        </div>

                        <!-- Select Student Profile logos -->
                        <div class="select-students-logos">
                            <img class="" src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                            <img class="student-logo" src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                            <img class="student-logo" src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                            <img class="student-logo" src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                            <img class="student-logo" src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                            <img class="student-logo" src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                            <img class="student-logo" src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                            <img class="student-logo" src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                        </div>
                    </div>
                </div>

                <!-- Vertical Line -->
                <div class="tab-vertical-line"></div>

                <!-- Assign Content -->
                <div class="select-trek-box assign-content">
                    <h3 class="new-assignment-heading assign-heading">Assign Content</h3>
                    <p class="date-time assign-text">What class would you like to assign to?
                    <div class="search_box">
                        <label class="trek-label">Class</label>
                        <div class="dropdown period-box">
                            <button class="input_dropdown dropdown-button" type="button" id="dropdownMenu2"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select a class
                                <img class="rotate-arrow" src="<?php echo $treks_src; ?>/assets/img/down-arrow.svg" alt="logo" />
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item dropdown-class">
                                    <p>Biology 3rd period</p>
                                </button>
                                <button class="dropdown-item dropdown-class" type="button">
                                    <p>Chemistry 4th period</p>
                                </button>
                                <button class="dropdown-item dropdown-class" type="button">
                                    <p>Science 3rd period</p>
                                </button>
                                <button class="dropdown-item dropdown-class" type="button">
                                    <p>Physics 4th period</p>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Select a class Period -->
                    <div class="search_box">
                        <label class="trek-label">Class</label>
                        <div class="dropdown period-box">
                            <button class="input_dropdown dropdown-button second-drop-button" type="button"
                                id="dropdownMenu2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Science 3rd period
                                <img class="rotate-arrow" src="<?php echo $treks_src; ?>/assets/img/down-arrow.svg" alt="logo" />
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <!-- Select All -->
                                <button class="dropdown-item dropdown-item2 practice-button">
                                    <!-- Select Student -->
                                    <div class="time-date-box class-student-box">
                                        <input class="form-check-input " type="checkbox" value="" id="checkbox" />
                                        <div class="tags-body-detail">
                                            <p class="select-all">Select All</p>
                                        </div>
                                    </div>
                                </button>
                                <div class="scroll-box">
                                    <!-- Student-->
                                    <button class="dropdown-item dropdown-item2 practice-button">
                                        <!-- Select Student -->
                                        <div class="time-date-box class-student-box">
                                            <input class="form-check-input" type="checkbox" value="" id="check" />
                                            <img src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                                            <div class="tags-body-detail">
                                                <p class="student-name">Gabriella Hawkins</p>
                                            </div>
                                        </div>
                                    </button>
                                    <!-- Student-->
                                    <button class="dropdown-item dropdown-item2 practice-button">
                                        <!-- Select Student -->
                                        <div class="time-date-box class-student-box">
                                            <input class="form-check-input" type="checkbox" value="" id="check" />
                                            <img src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                                            <div class="tags-body-detail">
                                                <p class="student-name">Gabriella Hawkins</p>
                                            </div>
                                        </div>
                                    </button>
                                    <!-- Student-->
                                    <button class="dropdown-item dropdown-item2 practice-button">
                                        <!-- Select Student -->
                                        <div class="time-date-box class-student-box">
                                            <input class="form-check-input" type="checkbox" value="" id="check" />
                                            <img src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                                            <div class="tags-body-detail">
                                                <p class="student-name">Gabriella Hawkins</p>
                                            </div>
                                        </div>
                                    </button>
                                    <!-- Student-->
                                    <button class="dropdown-item dropdown-item2 practice-button">
                                        <!-- Select Student -->
                                        <div class="time-date-box class-student-box">
                                            <input class="form-check-input" type="checkbox" value="" id="check" />
                                            <img src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                                            <div class="tags-body-detail">
                                                <p class="student-name">Gabriella Hawkins</p>
                                            </div>
                                        </div>
                                    </button>
                                    <!-- Student-->
                                    <button class="dropdown-item dropdown-item2 practice-button">
                                        <!-- Select Student -->
                                        <div class="time-date-box class-student-box">
                                            <input class="form-check-input" type="checkbox" value="" id="check" />
                                            <img src="<?php echo $treks_src; ?>/assets/img/class-student.svg" alt="logo" />
                                            <div class="tags-body-detail">
                                                <p class="student-name">Gabriella Hawkins</p>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Button Section -->
            <section class="calendar-container select-assignment-section btns-container">
                <div class="input_section">
                    <div class="btn_box profile_buttons">
                        <button class="btn profile_btn" type="button" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button class="btn profile_btn">Continue</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script
        src="<?php echo $treks_src; ?>/js/Animated-Circular-Progress-Bar-with-jQuery-Canvas-Circle-Progress/dist/circle-progress.js"></script>
    <script src="<?php echo $treks_src; ?>/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>