<?php

include '../model/connect.php';

	$dba->exec('TRUNCATE TABLE matching');


	$q = "SELECT interests.user_id,interests.title,user.address
		  FROM interests,user";//Get all Interests
	$res1 = $dba->query($q);

	foreach ($res1 as $item1) {
		$now_id = $item1['user_id'];
		$now_title = $item1['title'];
		$now_address = $item1['address'];
		//echo $now_id." , ".$now_title." , ".$now_address."<br>";



		//Compare each user with all of them
		$q2 = "SELECT interests.user_id,interests.title,user.address
				FROM interests,user
				WHERE interests.title LIKE '$now_title%' AND
					  user.address LIKE '$now_address%' ";
		$res2 = $dba->query($q2);
		foreach ($res2 as $item2) {
			$matched_id = $item2['user_id'];
			$matched_interest = $item2['title'];
			//echo '<br><br>';
			///echo $matched_id." , ",$matched_interest.'<br>';

			$q3 = "INSERT INTO matching  (user_id, matched_user_id,user_interest, matched_user_interest)
									  VALUES ('$now_id','$matched_id','$now_title','$matched_interest')";
			echo $q3.'<br>';
			$res3 = $dba->query($q3);
			$dba->exec("DELETE FROM matching WHERE user_id=matched_user_id");
		}
	}




