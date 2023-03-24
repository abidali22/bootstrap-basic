<?php
get_template_part('trek/functions');
get_template_part('lxp/functions');
lxp_login_check();
$treks_src = get_stylesheet_directory_uri() . '/treks-src';
$userdata = get_userdata(get_current_user_id());
$trek_post = isset($_GET['trek']) && isset($_GET['segment']) ? get_post($_GET['trek']) : null;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>

    <style type="text/css">
        #back-btn {
            width: 80px;
        }
        .fc .fc-timegrid-slot {
            height: 3.5em !important;
        }
        .fc-event {
            cursor: pointer;
        }
        .lxp-event-title {
            font-family: var(--bs-body-font-family);
            margin-bottom: 0.1em !important;
            font-size: var(--bs-body-font-size);
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        .lxp-event-sub-title {
            font-family: var(--bs-body-font-family);
            margin-bottom: 0.1em !important;
            font-size: 0.7rem !important;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }

        .recall-segment-event-title,.recall-segment-event-sub-title { color: #ca2738; }
        .overview-segment-event-title,.overview-segment-event-sub-title { color: #4c4c4c; }
        .apply-segment-event-title,.apply-segment-event-sub-title { color: #6f8929; }
        .practice-a-segment-event-title,.practice-a-segment-event-sub-title { color: #167394; }
        .practice-b-segment-event-title,.practice-b-segment-event-sub-title { color: #167394; }

        .recall-event {
           background: #fae9eb !important;
           border-top: #fae9eb !important;
           border-right: #fae9eb !important;
           border-bottom: #fae9eb !important;
           border-left: 4px solid #ca2738 !important;
           border-radius: 0 !important;
           padding-left: 5px !important;
           padding-top: 5px !important;
        }
        .practice-a-event {
            background: #d2edf6 !important;
            border-top: #d2edf6 !important;
            border-right: #d2edf6 !important;
            border-bottom: #d2edf6 !important;
            border-left: 4px solid #1fa5d4 !important;
            border-radius: 0 !important;
            padding-left: 5px !important;
            padding-top: 5px !important;
        }
        .practice-b-event {
            background: #d2edf6 !important;
            border-top: #d2edf6 !important;
            border-right: #d2edf6 !important;
            border-bottom: #d2edf6 !important;
            border-left: 4px solid #1fa5d4 !important;
            border-radius: 0 !important;
            padding-left: 5px !important;
            padding-top: 5px !important;
        }
        
        .apply-event {
            background: #ecf3d8 !important;
            border-top: #ecf3d8 !important;
            border-right: #ecf3d8 !important;
            border-bottom: #ecf3d8 !important;
            border-left: 4px solid #9fc33b !important;
            border-radius: 0 !important;
            padding-left: 5px !important;
            padding-top: 5px !important;
        }

        .overview-event {
            background: #eaeaea !important;
            border-top: #eaeaea !important;
            border-right: #eaeaea !important;
            border-bottom: #eaeaea !important;
            border-left: 4px solid #979797 !important;
            border-radius: 0 !important;
            padding-left: 5px !important;
            padding-top: 5px !important;
        }

    </style>
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
                        <?php get_template_part('trek/user-profile-block'); ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Assignment Section -->
    <?php get_template_part('lxp/assignment-nav', 'assignment-nav'); ?>

    <!-- Tab Details -->

    <div class="tab-content" id="myTabContent">
        <!-- 1st Tab -->
        <?php get_template_part('lxp/assignment-tab-1', 'assignment-tab-1'); ?>
        <!-- 2nd Tab -->
        <?php get_template_part('lxp/assignment-tab-2', 'assignment-tab-2'); ?>
        <!-- 3rd Tab -->
        <?php get_template_part('lxp/assignment-tab-3', 'assignment-tab-3'); ?>
    </div>
    
</body>

</html>