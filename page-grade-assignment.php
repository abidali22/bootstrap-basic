<?php
get_template_part('lxp/functions');
lxp_login_check();
if ( !(isset($_GET['assignment']) && intval($_GET['assignment']) > 0) ) {
    wp_redirect(site_url("/calendar"));
}

$student_id = 0;
if ( (isset($_GET['student']) && intval($_GET['student']) > 0) ) {
  $student_id = intval($_GET['student']);
}

$assignment = lxp_get_assignment($_GET['assignment']);
$students = lxp_get_students($assignment->lxp_student_ids);
$trek = get_post($assignment->trek_id);
$trek_section = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}trek_sections WHERE id={$assignment->trek_section_id}");
$treks_src = get_stylesheet_directory_uri() . '/treks-src';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grade Assignment</title>
    <link href="<?php echo $treks_src; ?>/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/header-section.css" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/assignments.css" />
    <link rel="stylesheet" href="<?php echo $treks_src; ?>/style/newAssignment.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    
    <style type="text/css">
      .time-date-box {
        margin-left: 60px;
      }

      body {
        background-color: #f6f7fa !important;
      }
    </style>
  </head>

  <body>
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
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
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
                <?php get_template_part('trek/user-profile-block') ?>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Basic Container -->
    <section class="main-container" style=" margin-bottom: 0px;">
        <nav class="nav-section">
            <?php // get_template_part('trek/navigation') ?>
        </nav>
    </section>

    <!-- main secton -->
    <section class="main_assignment_section">
      <!-- back button -->
      <section class="assigmint_back_button">
        <a href="<?php echo site_url("calendar"); ?>">
          <span> <img src="<?php echo $treks_src; ?>/assets/img/back.svg" alt="" /> </span> Back
        </a>
      </section>

      <!-- heading section -->

      <section class="assig_heading">
        <h2>Grade Assignment</h2>

        <!-- student cat -->

        <div class="students-breadcrumb">
          <div class="interdependence-user">
            <img src="<?php echo $treks_src; ?>/assets/img/tr_main.png" alt="user" class="inter-user-img" />
            <h3 class="inter-user-name"><?php echo $trek->post_title; ?></h3>
          </div>
          <img src="<?php echo $treks_src; ?>/assets/img/bc_arrow_right.svg" alt="user" class="students-breadcrumb-arrow" />
          <div class="interdependence-tab">
            <?php
            if ($trek_section->title === 'Overview') {
                $segmentColor = "#979797";
            } else if ($trek_section->title === 'Recall') {
                $segmentColor = "#ca2738";
            } else if ($trek_section->title === 'Practice A') {
                $segmentColor = "#1fa5d4";
            } else if ($trek_section->title === 'Practice B') {
                $segmentColor = "#1fa5d4";
            } else if ($trek_section->title === 'Apply') {
                $segmentColor = "#9fc33b";
            }
            ?>
            <div class="inter-tab-polygon" style="background-color: <?php echo $segmentColor; ?>">
              <h4><?php echo $trek_section->title[0]; ?></h4>
            </div>
            <h3 class="inter-tab-polygon-name" style="color: <?php echo $segmentColor; ?>"><?php echo $trek_section->title; ?></h3>
          </div>
          <div class="time-date-box">
            <p class="date-time"><span id="assignment_day"><?php echo date("D", strtotime($assignment->start_date)); ?></span>, <span id="assignment_month"><?php echo date("F", strtotime($assignment->start_date)); ?></span> <span id="assignment_date"><?php echo date("d", strtotime($assignment->start_date)); ?></span>, <span id="assignment_date"><?php echo date("Y", strtotime($assignment->start_date)); ?></span></p>
            <p class="date-time" id="assignment_time_start"><?php echo date("h:i:s a", strtotime($assignment->start_time)); ?></p>
            <p class="date-time to-text">To</p>
            <p class="date-time" id="assignment_time_end"><?php echo date("h:i:s a", strtotime($assignment->end_time)); ?></p>
          </div>
          
        </div>
      </section>

      <!-- Table section -->
      <section class="student_assignment_tab">
        <!-- School nav tabs -->
        <nav class="assignment_tabs">
          <h2>Students</h2>
          <ul class="treks_ul" id="myTab" role="tablist">
            <?php foreach ($students as  $student) { ?>
              <li>
                <div
                  class="nav-link tab_btn <?php echo $student->ID == $student_id ? 'active' : ''; ?>"
                  id="two-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#two-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="two-tab-pane"
                  aria-selected="true"
                >
                  <img src="<?php echo $treks_src; ?>/assets/img/check-g.svg" alt="" class="check-g" />

                  <div class="student_abouts_tab tab_bg_w">
                    <div class="student_about">
                      <img src="<?php echo $treks_src; ?>/assets/img/profile-icon.png" class="student_user_img" alt="user" />
                      <div class="student_names">
                        <h4><?php echo $student->name; ?></h4>
                        <p><?php echo is_array(json_decode($student->grades)) ? implode(', ', json_decode($student->grades)) : ""; ?></p>
                      </div>
                    </div>
                    <div class="stu_tag">
                      <span class="student_label label_red"><?php echo $student->status; ?></span>
                      <img src="<?php echo $treks_src; ?>/assets/img/select-arrow-up.svg" alt="" />
                    </div>
                  </div>
                </div>
              </li>
            <?php } ?>
          </ul>
          <!-- 
          <ul class="treks_ul" id="myTab" role="tablist">
            <li>
              <div
                class="nav-link active tab_btn"
                id="one-tab"
                data-bs-toggle="tab"
                data-bs-target="#one-tab-pane"
                type="button"
                role="tab"
                aria-controls="one-tab-pane"
                aria-selected="true"
              >
                <img src="<?php echo $treks_src; ?>/assets/img/check-g.svg" alt="" class="check-g" />

                <div class="student_abouts_tab tab_bg_w">
                  <div class="student_about">
                    <img src="<?php echo $treks_src; ?>/assets/img/rec_tre_img3.svg" alt="" class="student_user_img" />
                    <div class="student_names">
                      <h4>Jane Cooper</h4>
                      <p>5th grade</p>
                    </div>
                  </div>
                  <div class="stu_tag">
                    <span class="student_label label_green">Completed</span>
                    <img src="<?php echo $treks_src; ?>/assets/img/select-arrow-up.svg" alt="" />
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div
                class="nav-link tab_btn"
                id="two-tab"
                data-bs-toggle="tab"
                data-bs-target="#two-tab-pane"
                type="button"
                role="tab"
                aria-controls="two-tab-pane"
                aria-selected="true"
              >
                <img src="<?php echo $treks_src; ?>/assets/img/check-g.svg" alt="" class="check-g" />

                <div class="student_abouts_tab tab_bg_w">
                  <div class="student_about">
                    <img src="<?php echo $treks_src; ?>/assets/img/rec_tre_img3.svg" alt="" class="student_user_img" />
                    <div class="student_names">
                      <h4>Jane Cooper</h4>
                      <p>5th grade</p>
                    </div>
                  </div>
                  <div class="stu_tag">
                    <span class="student_label label_green">Completed</span>
                    <img src="<?php echo $treks_src; ?>/assets/img/select-arrow-up.svg" alt="" />
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div
                class="nav-link tab_btn"
                id="three-tab"
                data-bs-toggle="tab"
                data-bs-target="#three-tab-pane"
                type="button"
                role="tab"
                aria-controls="three-tab-pane"
                aria-selected="true"
              >
                <img src="<?php echo $treks_src; ?>/assets/img/check-g.svg" alt="" class="check-g" />

                <div class="student_abouts_tab tab_bg_w">
                  <div class="student_about">
                    <img src="<?php echo $treks_src; ?>/assets/img/rec_tre_img3.svg" alt="" class="student_user_img" />
                    <div class="student_names">
                      <h4>Jane Cooper</h4>
                      <p>5th grade</p>
                    </div>
                  </div>
                  <div class="stu_tag">
                    <span class="student_label label_green">Completed</span>
                    <img src="<?php echo $treks_src; ?>/assets/img/select-arrow-up.svg" alt="" />
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div
                class="nav-link tab_btn"
                id="four-tab"
                data-bs-toggle="tab"
                data-bs-target="#four-tab-pane"
                type="button"
                role="tab"
                aria-controls="four-tab-pane"
                aria-selected="true"
              >
                <img src="<?php echo $treks_src; ?>/assets/img/check-g.svg" alt="" class="check-g" />

                <div class="student_abouts_tab tab_bg_w">
                  <div class="student_about">
                    <img src="<?php echo $treks_src; ?>/assets/img/rec_tre_img3.svg" alt="" class="student_user_img" />
                    <div class="student_names">
                      <h4>Jane Cooper</h4>
                      <p>5th grade</p>
                    </div>
                  </div>
                  <div class="stu_tag">
                    <span class="student_label label_green">Completed</span>
                    <img src="<?php echo $treks_src; ?>/assets/img/select-arrow-up.svg" alt="" />
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div
                class="nav-link tab_btn"
                id="five-tab"
                data-bs-toggle="tab"
                data-bs-target="#five-tab-pane"
                type="button"
                role="tab"
                aria-controls="five-tab-pane"
                aria-selected="true"
              >
                <img src="<?php echo $treks_src; ?>/assets/img/refresh-icon.svg" alt="" class="" />

                <div class="student_abouts_tab">
                  <div class="student_about">
                    <img src="<?php echo $treks_src; ?>/assets/img/rec_tre_img3.svg" alt="" class="student_user_img" />
                    <div class="student_names">
                      <h4>Jane Cooper</h4>
                      <p>5th grade</p>
                    </div>
                  </div>
                  <div class="stu_tag">
                    <span class="student_label label_red">In Progress</span>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div
                class="nav-link tab_btn"
                id="six-tab"
                data-bs-toggle="tab"
                data-bs-target="#six-tab-pane"
                type="button"
                role="tab"
                aria-controls="six-tab-pane"
                aria-selected="true"
              >
                <img src="<?php echo $treks_src; ?>/assets/img/refresh-icon.svg" alt="" class="" />

                <div class="student_abouts_tab">
                  <div class="student_about">
                    <img src="<?php echo $treks_src; ?>/assets/img/rec_tre_img3.svg" alt="" class="student_user_img" />
                    <div class="student_names">
                      <h4>Jane Cooper</h4>
                      <p>5th grade</p>
                    </div>
                  </div>
                  <div class="stu_tag">
                    <span class="student_label label_red">In Progress</span>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div
                class="nav-link tab_btn"
                id="six-tab"
                data-bs-toggle="tab"
                data-bs-target="#six-tab-pane"
                type="button"
                role="tab"
                aria-controls="six-tab-pane"
                aria-selected="true"
              >
                <img src="<?php echo $treks_src; ?>/assets/img/warning-icon.svg" alt="" class="" />

                <div class="student_abouts_tab tab_op">
                  <div class="student_about">
                    <img src="<?php echo $treks_src; ?>/assets/img/rec_tre_img3.svg" alt="" class="student_user_img" />
                    <div class="student_names">
                      <h4>Jane Cooper</h4>
                      <p>5th grade</p>
                    </div>
                  </div>
                  <div class="stu_tag">
                    <span class="student_label label_black">To Do</span>
                  </div>
                </div>
              </div>
            </li>
          </ul>
           -->
        </nav>
        <!-- End School nav tabs -->

        <!-- Tabs Table -->
        <?php 
          if ( isset($_GET['action']) && $_GET['action'] == 'grade' ) {
            $args = array(
              'posts_per_page'   => -1,
              'post_type'        => 'tl_lesson',
              'meta_query' => array(
                array(
                  'key'   => 'tl_course_id',
                  'value' =>  $trek->ID
                )
              )
            );
            $lessons = get_posts($args);
            var_dump($lessons); die();
            $digital_journal_link = null;
            foreach($lessons as $lesson){ if (trim($trek_section->title) === trim($lesson->post_title)) { $digital_journal_link = get_permalink($lesson->ID); }; }
            echo "Grade";
          } else {
            get_template_part("lxp/teacher-grade");            
          }
        ?>
        <!-- End Table -->
      </section>
    </section>

    <script
      src="https://code.jquery.com/jquery-3.6.3.js"
      integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
      crossorigin="anonymous"
    ></script>
    <script src="<?php echo $treks_src; ?>/js/Animated-Circular-Progress-Bar-with-jQuery-Canvas-Circle-Progress/dist/circle-progress.js"></script>
    <script src="<?php echo $treks_src; ?>/js/custom.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
      // function grade() redirect to grade page
      function grade(slide) {
        window.location.href = location.origin + location.pathname + "?assignment=<?php echo $_GET['assignment']; ?>&student=<?php echo $_GET['student']; ?>" + "&action=grade&slide=" + slide;
      }
    </script>    
  </body>
</html>