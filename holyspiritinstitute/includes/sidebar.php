<?php $role=$_SESSION['user']['role']??'';$p='../'; ?>
<aside class="sidebar">
<div class="side-brand">Holy Spirit Institute</div>
<a href="<?=$p.$role?>/dashboard.php">▦ <span>Dashboard</span></a>
<?php if($role==='admin'): ?>
<div class="sidebar-section">People</div>
<a href="<?=$p?>admin/students.php">👨‍🎓 <span>Students</span></a>
<a href="<?=$p?>admin/teachers.php">👩‍🏫 <span>Teachers</span></a>
<a href="<?=$p?>admin/parents.php">👪 <span>Parents</span></a>
<div class="sidebar-section">Academic</div>
<a href="<?=$p?>admin/classes.php">▣ <span>Classes & Divisions</span></a>
<a href="<?=$p?>admin/subjects.php">📚 <span>Subjects</span></a>
<a href="<?=$p?>admin/timetable.php">🗓 <span>Timetable</span></a>
<a href="<?=$p?>admin/attendance.php">✓ <span>Attendance</span></a>
<a href="<?=$p?>admin/assignments.php">📝 <span>Assignments</span></a>
<a href="<?=$p?>admin/materials.php">📎 <span>Study Materials</span></a>
<a href="<?=$p?>admin/exams.php">🎓 <span>Exams & Marks</span></a>
<div class="sidebar-section">Administration</div>
<a href="<?=$p?>admin/fees.php">₹ <span>Fees</span></a>
<a href="<?=$p?>admin/notices.php">🔔 <span>Notices</span></a>
<a href="<?=$p?>admin/events.php">📅 <span>Events</span></a>
<a href="<?=$p?>admin/reports.php">📊 <span>Reports</span></a>
<a href="<?=$p?>admin/settings.php">⚙ <span>Settings</span></a>
<?php elseif($role==='teacher'): ?>
<a href="<?=$p?>teacher/classes.php">My Classes</a><a href="<?=$p?>teacher/timetable.php">Timetable</a>
<a href="<?=$p?>teacher/attendance.php">Attendance</a><a href="<?=$p?>teacher/assignments.php">Assignments</a>
<a href="<?=$p?>teacher/materials.php">Study Materials</a><a href="<?=$p?>teacher/marks.php">Marks</a><a href="<?=$p?>teacher/messages.php">Messages</a>
<?php elseif($role==='student'): ?>
<a href="<?=$p?>student/attendance.php">Attendance</a><a href="<?=$p?>student/timetable.php">Timetable</a>
<a href="<?=$p?>student/assignments.php">Assignments</a><a href="<?=$p?>student/materials.php">Study Materials</a>
<a href="<?=$p?>student/exams.php">Exams</a><a href="<?=$p?>student/results.php">Results</a>
<?php elseif($role==='parent'): ?>
<a href="<?=$p?>parent/children.php">My Children</a><a href="<?=$p?>parent/attendance.php">Attendance</a>
<a href="<?=$p?>parent/assignments.php">Assignments</a><a href="<?=$p?>parent/results.php">Results</a>
<a href="<?=$p?>parent/fees.php">Fees</a><a href="<?=$p?>parent/notices.php">Notices</a>
<?php endif; ?>
<a href="<?=$p?>logout.php">↪ <span>Logout</span></a>
</aside>