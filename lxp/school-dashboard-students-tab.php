<?php
global $treks_src;
$students = $args["students"];
?>
<div id="student-tab-content" class="tab-pane fade show active" role="tabpanel">
    <div class="add-teacher-box">
        <div class="search-filter-box">
            <input type="text" name="text" placeholder="Search..." />
            <div class="filter-box">
                <img src="<?php echo $treks_src; ?>/assets/img/filter-alt.svg" alt="filter logo" />
                <p class="filter-heading">Filter</p>
            </div>
        </div>
        <label for="import-student" class="primary-btn add-heading">
            Import Students (CSV)
        </label >
        <input type="file" id="import-student" hidden />
    </div>
    <div class="students-table">
        <table class="table">
            <thead>
                <tr>
                    <th class="">
                        <div class="th1">
                            Teacher
                            <img src="<?php echo $treks_src; ?>/assets/img/showing.svg" alt="logo" />
                        </div>
                    </th>
                    <th>
                        <div class="th1 th2">
                            Email
                            <img src="<?php echo $treks_src; ?>/assets/img/showing.svg" alt="logo" />
                        </div>
                    </th>
                    <th>
                        <div class="th1 th3">
                            Classes
                            <img src="<?php echo $treks_src; ?>/assets/img/showing.svg" alt="logo" />
                        </div>
                    </th>
                    <th>
                        <div class="th1 th4">
                            Grades
                            <img src="<?php echo $treks_src; ?>/assets/img/showing.svg" alt="logo" />
                        </div>
                    </th>
                    <th>
                        <div class="th1 th5">
                            ID
                            <img src="<?php echo $treks_src; ?>/assets/img/showing.svg" alt="logo" />
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($students as $student) {
                        $student_admin = get_userdata(get_post_meta($student->ID, 'lxp_student_admin_id', true));
                ?>
                    <tr>
                        <td class="user-box">
                            <div class="table-user">
                                <img src="<?php echo $treks_src; ?>/assets/img/profile-icon.png" alt="student" />
                                <div class="user-about">
                                    <h5><?php echo $student_admin->display_name?></h5>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="table-status"><?php echo $student_admin->user_email?></div>
                        </td>
                        <td>0</td>
                        <td class="grade">
                            <?php 
                                $student_grades = json_decode(get_post_meta($student->ID, 'grades', true));
                                $student_grades = $student_grades ? $student_grades : array();
                                foreach ($student_grades as $grade) {
                            ?>
                                <span><?php echo $grade; ?></span>
                            <?php        
                                }
                            ?>
                        </td>
                        <td><?php echo $student->ID ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="dropdown_btn" type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo $treks_src; ?>/assets/img/dots.svg" alt="logo" />
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" onclick="onStudentEdit(<?php echo $student->ID; ?>)">
                                        <img src="<?php echo $treks_src; ?>/assets/img/edit.svg" alt="logo" />
                                        Edit</button>
                                    <!-- <button class="dropdown-item" type="button">
                                        <img src="<?php // echo $treks_src; ?>/assets/img/delete.svg" alt="logo" />
                                        Delete</button> -->
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>