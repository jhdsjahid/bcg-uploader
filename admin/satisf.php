<?php
echo '
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<table style="height: 52px; margin-left: auto; margin-right: auto;" width="443">
<tbody>
<tr>
<a class="nav-tab" style="width: 99px; text-align: center; border:2px solid red;" href="options-general.php?page=main_settings&do=settings"><strong>Settings</strong></a>
<a class="nav-tab" style="width: 100px; text-align: center; border:2px solid red;" href="admin.php?page=bcg_settings&do=supports"><strong>Supports</strong></a>
<a class="nav-tab" style="width: 98px; text-align: center; border:2px solid red;" href="admin.php?page=bcg_settings&do=about"><strong>About-Us</strong></a>
<a class="nav-tab" style="width: 105px; text-align: center; border:2px solid red;" href="admin.php?page=bcg_settings&do=contact"><strong>Contact-Us</strong></a>
</tr>
</tbody>
</table>';
$locTag = $_GET['do'] ?? "";
if($locTag == 'supports'){
echo '<h1>Wellcome To Support Center</h1>';
}
else if($locTag == 'about'){
echo '<h1>About-Us</h1>';
}
else if($locTag == 'contact'){
echo '<h1>Contact Here</h1>';
}
else if($locTag == 'setttings'||'bcg_settings'){
echo '<h1>Wellcome Settings Again</h1>';
}
?>