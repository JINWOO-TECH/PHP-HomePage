﻿<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];


	$upload_dir = './data/';

	$upfile_name	 = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type     = $_FILES["upfile"]["type"];
	$upfile_size     = $_FILES["upfile"]["size"];
	$upfile_error    = $_FILES["upfile"]["error"];

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;      
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size  > 1000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
	else 
	{
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
	}

    	include "dbconn.php";

    if($upfile_name=="")
	{
    	$sql = "update board set subject='$subject', content='$content' ";
   	 $sql .= " where num=$num";
	}
     else
     {
	//수정 전 삭제
	$sql = "select * from board where num = $num";
   	$result = mysqli_query($con, $sql);
    	$row = mysqli_fetch_array($result);
	// 기존의 파일이 있을 경우
	$copied_name2 = $row["file_copied"];
	if ($copied_name2)
	{
		$file_path = "./data/".$copied_name2;
		unlink($file_path);
	}
              //수정 
    	$sql = "update board set subject='$subject', content='$content', ";
	$sql .= " file_name='$upfile_name', file_type='$upfile_type', file_copied='$copied_file_name'";
   	$sql .= " where num=$num";		
     }

    	mysqli_query($con, $sql);

    	mysqli_close($con);     

   	 echo "
	      	<script>
	          	location.href = 'board_list.php?page=$page';
	      	</script>
	 	 ";
?>

   
