<?php
session_start();
var_dump($_SESSION);
$User= $_SESSION['username'];
$User1= $_SESSION['id'];
require("config.php");
// $q = "SELECT * FROM clients as a INNER JOIN  products as b  ON a.id= b.client_id WHERE a.id=$_GET[id]";
// $r = mysqli_query($conn,$q);
// $a1 = mysqli_fetch_assoc($r);
// // var_dump($a1);
// if(!empty($_POST)){
// 	echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
// }
if (isset($_POST['msg'])) {
	$sql = "SELECT * FROM clients WHERE id = $User1";
	$q = "INSERT * FROM clients as a INNER JOIN  products as b  ON a.id= b.client_id WHERE a.id=$_GET[id]";
	$r = mysqli_query($conn,$q);
	$a = mysqli_fetch_assoc($r);	
	$message = $_POST['msg'];
	$time = $_POST['time'];

	 // 	id 	from_id 	to_id 	messages 	created_at 	
	 $query = "INSERT INTO chats (`from_id`,`to_id`, `messages`, `created_at`) VALUES ('$username')";
	 echo $time . $msg;
	 // $result = mysqli_query($connection, $query);
	 // if($result){
	 //     echo "added";
// the above echo added for testing purposes from my first plan
}

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/chat.css">
    <link rel="stylesheet" type="text/css" href="css/profileview.css">
</head>
<body>

    <?php include('templates/header.php'); ?>
    <div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>Chat with Khalid</span>
									<p>1767 Messages</p>
								</div>
								<div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>
						<div class="card-body msg_card_body">

			
		
						</div>

						<form method="POST" action="" id='chat-screen' >
						<div class="card-footer">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<!-- <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span> -->
									<button type="submit">Send</button>
								</div>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
<form>
  	<input type="text" name="text">
  	<button type="submit" name="send">Send</button>
  </form>
    <?php include('templates/footer.php'); ?>
              
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<script type="text/javascript">
	const formatDate = date =>{
		let hours = '0' + date.getHours();
		let min =   '0' + date.getMinutes();

		return `${hours.slice(-2)}:${min.slice(-2)}`
	}
	//Template
	const getmsghtml = (msg, sender, time) =>{
		return `	<div class="d-flex justify-content-${sender} mb-4">
								<div class="img_cont_msg">
									<!-- <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"> -->
								</div>
								<div class="msg_cotainer">
									${msg}
									<span class="msg_time">${formatDate(time)}</span>
								</div>
							</div>`;
	};
	async function postData(url, data = {}) {
  		// Default options are marked with *
  		// This wont work in all browsers, for compatibility use Ajax ama axios
	  const response = await fetch(url, {
	    method: 'POST', // *GET, POST, PUT, DELETE, etc.
	    mode: 'cors', // no-cors, *cors, same-origin
	    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
	    credentials: 'same-origin', // include, *same-origin, omit
	    // headers: {
	    
	    //   'Content-Type': 'application/x-www-form-urlencoded'
	    // },
	    redirect: 'follow', // manual, *follow, error
	    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
	    body: data
	});
	  return response.json(); // parses JSON response into native JavaScript objects
}


</script>
<script type='text/javascript'>
	let form = document.querySelector('form#chat-screen');
	let inputMsg = document.querySelector('.type_msg');
	let chatBox = document.querySelector('.msg_card_body');
	let host  = window.location;	
	const url = 'http://localhost/cabbages/chats1.php'
	form.addEventListener('submit', ev =>{
		ev.preventDefault();
		let msg = inputMsg.value;
		console.log('submittting .....')
		//Fetch goes here
		//Update the screen with text from the user
		let html = getmsghtml(msg, 'end', new Date());
		chatBox.insertAdjacentHTML('beforeend', html);
		chatBox.scrollTop = chatBox.scrollHeight; //Scroll to the bottom
		let  fd = new FormData();
		fd.append('msg', msg);
		fd.append('date', new Date());
		const params =new URLSearchParams(fd);
		postData(url, fd);
		// Debbuuging time
		// Hebu log in kwa mozilla

	})

</script>
</body>
</html>