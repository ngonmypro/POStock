<?php @session_start();
	if($_POST['comp'] == 1){
    	include '../js/conn.php';

		$logpass = MD5($_POST['pass']);

    	$sql_login = 'SELECT * FROM user_tb WHERE UserName = "'.$_POST['user'].'"';
    	$result_login = mysql_query($sql_login) or die(mysql_error());

		$member = mysql_fetch_array($result_login);
		if($member['UserPass'] == $_POST['pass']){

			$_SESSION['ssUserID'] = $member['UserID'];
			$_SESSION['ssUserName'] = $member['UserFname'].' '.$member['UserLname'];
			$_SESSION['ssUserStatus'] = $member['UserStatus'];
			$_SESSION['ssUserBrah'] = 'YH';
			echo "Y";
		}elseif($member['UserPass'] == $logpass){

			$_SESSION['ssUserID'] = $member['UserID'];
			$_SESSION['ssUserName'] = $member['UserFname'].' '.$member['UserLname'];
			$_SESSION['ssUserStatus'] = $member['UserStatus'];
			$_SESSION['ssUserBrah'] = 'YH';
			echo "Y";
		}else {
			echo "<p class='test-danger'>username หรือ password ไม่ถูกต้อง</p>";
		}
	}elseif($_POST['comp'] == 2){
    	include '../js/connyc.php';

		$logpass = MD5($_POST['pass']);

    	$sql_login = 'SELECT * FROM user_tb WHERE UserName = "'.$_POST['user'].'"';
    	$result_login = mysql_query($sql_login) or die(mysql_error());

		$member = mysql_fetch_array($result_login);
		if($member['UserPass'] == $_POST['pass']){

			$_SESSION['ssUserID'] = $member['UserID'];
			$_SESSION['ssUserName'] = $member['UserFname'].' '.$member['UserLname'];
			$_SESSION['ssUserStatus'] = $member['UserStatus'];
			$_SESSION['ssUserBrah'] = 'YC';
			echo "Y";
		}elseif($member['UserPass'] == $logpass){

			$_SESSION['ssUserID'] = $member['UserID'];
			$_SESSION['ssUserName'] = $member['UserFname'].' '.$member['UserLname'];
			$_SESSION['ssUserStatus'] = $member['UserStatus'];
			$_SESSION['ssUserBrah'] = 'YC';
			echo "Y";
		}else {
			echo "<p class='test-danger'>username หรือ password ไม่ถูกต้อง</p>";
		}
	}elseif($_POST['comp'] == 3){
    	include '../js/connpt.php';

		$logpass = MD5($_POST['pass']);

    	$sql_login = 'SELECT * FROM user_tb WHERE UserName = "'.$_POST['user'].'"';
    	$result_login = mysql_query($sql_login) or die(mysql_error());

		$member = mysql_fetch_array($result_login);
		if($member['UserPass'] == $_POST['pass']){

			$_SESSION['ssUserID'] = $member['UserID'];
			$_SESSION['ssUserName'] = $member['UserFname'].' '.$member['UserLname'];
			$_SESSION['ssUserStatus'] = $member['UserStatus'];
			$_SESSION['ssUserBrah'] = 'PT';
			echo "Y";
		}elseif($member['UserPass'] == $logpass){

			$_SESSION['ssUserID'] = $member['UserID'];
			$_SESSION['ssUserName'] = $member['UserFname'].' '.$member['UserLname'];
			$_SESSION['ssUserStatus'] = $member['UserStatus'];
			$_SESSION['ssUserBrah'] = 'PT';
			echo "Y";
		}else {
			echo "<p class='test-danger'>username หรือ password ไม่ถูกต้อง</p>";
		}
	}
?>