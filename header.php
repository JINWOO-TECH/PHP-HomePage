<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nanum+Brush+Script&display=swap" rel="stylesheet"> 
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
        <div id="top">
             <a href="index.php"><img src="./img/Logo.png">
	<h1 class="title" algin="center">My Homepage</h1></a>
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <br>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보 수정</a></li>
                <li> | </li>
                <li><a href="member_delete_form.php">회원탈퇴</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li class="menu"><a href="index.php">HOME</a></li>

                <li class="menu"><a href="#">쪽지</a>
		<ul>
			<li><a class="submenu" href="message_box.php?mode=rv">수신 쪽지함</a></li>
			<li><a class="submenu" href="message_box.php?mode=send">발신 쪽지함</a></li>
			<li><a class="submenu" href="message_form.php">쪽지 쓰기</a></li>
		</ul>		
		</li> 

              <li class="menu"><a href="#">게시판</a>
		<ul>
			<li><a class="submenu" href="board_list.php">목록보기 </a></li>
			<li><a class="submenu" href="board_form.php">글 쓰기 </a></li>
		</ul>		
		</li> 				
	                              
                <li class="menu"><a href="board_list.php">메뉴</a></li>
                <li class="menu"><a href="board2_list.php">메뉴</a></li>
            </ul>
        </div>











