<?php
			$host="bridalregistrydb.cuchmmhwmgxv.ca-central-1.rds.amazonaws.com";
			$user="bowringgift98";
			$password="bcgr0up$";
			$db="bowringdb";
			$con = mysqli_connect($host,$user,$password,$db);
			if(!$con)
			{
			echo 'Not Connected To Server';
			}
			if(!mysqli_select_db($con,$db))
			{
			echo 'Database Not Selected';
			}
?>