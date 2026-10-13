<?php
require_once __DIR__.'/../includes/admin_ui.php';
$edit=null;
if(isset($_GET['edit'])){$q=$pdo->prepare("SELECT * FROM students WHERE id=?");$q->execute([(int)$_GET['edit']]);$edit=$q->fetch();}
if($_SERVER['REQUEST_METHOD']==='POST'){
 verify_csrf($_POST['csrf']??'');
 $id=(int)($_POST['id']??0);
 $data=[trim($_POST['admission_number']),trim($_POST['first_name']),trim($_POST['last_name']),trim($_POST['email']),$_POST['status']];
 if($id){$s=$pdo->prepare("UPDATE students SET admission_number=?,first_name=?,last_name=?,email=?,status=? WHERE id=?");$s->execute([...$data,$id]);audit($pdo,'update','Updated student #'.$id);go('students.php','Student updated successfully');}
 $s=$pdo->prepare("INSERT INTO students(admission_number,first_name,last_name,email,status) VALUES(?,?,?,?,?)");$s->execute($data);audit($pdo,'create','Created student');go('students.php','Student added successfully');
}
if(isset($_GET['delete'])){$id=(int)$_GET['delete'];$pdo->prepare("UPDATE students SET status='Inactive' WHERE id=?")->execute([$id]);audit($pdo,'delete','Deactivated student #'.$id);go('students.php','Student deactivated');}
$rows=$pdo->query("SELECT id,admission_number,first_name,last_name,email,status FROM students ORDER BY id DESC")->fetchAll();
admin_layout('Students','Manage student records with create, view, edit and deactivate actions.');
echo '<div class="actions"><button class="btn" data-modal="studentModal">＋ Add Student</button></div></div>'; flash();
echo '<div class="card"><div class="toolbar"><div class="toolbar-left"><input class="search" data-search="#studentsTable" placeholder="Search admission no., name or email"></div><div class="toolbar-right"><span class="muted">'.count($rows).' records</span></div></div>';
if(!$rows){echo '<div class="empty">No students yet. Click <b>Add Student</b> to create the first record.</div>';}else{
echo '<div class="table-wrap"><table class="table" id="studentsTable"><thead><tr><th>Admission</th><th>Student</th><th>Email</th><th>Status</th><th>Actions</th></tr></thead><tbody>';
foreach($rows as $r){$full=trim($r['first_name'].' '.$r['last_name']);$badge=$r['status']==='Active'?'success':'danger';echo '<tr><td>'.e($r['admission_number']).'</td><td><b>'.e($full).'</b></td><td>'.e($r['email']??'').'</td><td><span class="badge '.$badge.'">'.e($r['status']).'</span></td><td class="actions-cell"><a class="btn light small" href="?edit='.$r['id'].'">Edit</a><a class="btn danger small" data-confirm="Deactivate this student?" href="?delete='.$r['id'].'">Deactivate</a></td></tr>';}
echo '</tbody></table></div></div>';}
echo '<div class="modal" id="studentModal"><div class="modal-box"><div class="modal-head"><h2>'.($edit?'Edit Student':'Add Student').'</h2><button class="close">×</button></div><form class="form" method="post"><input type="hidden" name="csrf" value="'.e(csrf_token()).'"><input type="hidden" name="id" value="'.e((string)($edit['id']??0)).'"><div class="form-grid"><label>Admission Number<input name="admission_number" required value="'.e($edit['admission_number']??'').'"></label><label>First Name<input name="first_name" required value="'.e($edit['first_name']??'').'"></label><label>Last Name<input name="last_name" value="'.e($edit['last_name']??'').'"></label><label>Email<input type="email" name="email" value="'.e($edit['email']??'').'"></label><label>Status<select name="status"><option>Active</option><option'.(($edit['status']??'')==='Inactive'?' selected':'').'>Inactive</option><option'.(($edit['status']??'')==='Transferred'?' selected':'').'>Transferred</option><option'.(($edit['status']??'')==='Graduated'?' selected':'').'>Graduated</option></select></label></div><div class="form-actions"><button type="button" class="btn light close">Cancel</button><button class="btn">'.($edit?'Update Student':'Save Student').'</button></div></form></div></div>';
if($edit) echo '<script>document.getElementById("studentModal").classList.add("show")</script>';
admin_end();