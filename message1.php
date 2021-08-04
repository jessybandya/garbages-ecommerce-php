<?php
include('config.php');
session_start();
//var_dump($_SESSION);
$User2 = $_SESSION['id'];
$User = $_SESSION['username'];

require("config.php");
//$q = "SELECT * FROM clients as a INNER JOIN  chats as b  ON a.id= b.from_id AND a.id= b.to_id WHERE a.id=$_GET[id]";
//$r = mysqli_query($conn,$q);
//$a1 = mysqli_fetch_assoc($r);

$msg = "";
$text = '';
$errors = array('text' => '');
// If upload button is clicked ...
// When a POST is sent , $_GET womt work
if(isset($_GET['id']))
    extract($_GET);

//get messages and leave
if(isset($_GET['getmsgs'])){
    if(isset($id)){
            $msg_q ="SELECT chats.id as chatid, clients.id as id,  clients.first_name as fname, clients.image as img, chats.messages as msgs, chats.seen as seen, chats.created_at as datecreated 
    FROM chats 
    INNER JOIN clients ON chats.from_id = clients.id
    INNER JOIN clients as clients_to ON chats.to_id = clients_to.id
    WHERE (chats.to_id = $User2  And chats.from_id = $id)
    OR  (chats.to_id =  $id  And chats.from_id = $User2)
    ORDER BY chats.created_at ASC";
        $res = mysqli_query($conn, $msg_q);
        echo json_encode(mysqli_fetch_all($res, 3));

    }
    exit(0);
}



if (isset($_POST['send'])) {


    include('config.php');


    $id = mysqli_real_escape_string($conn, $_POST['send_to']);
    //make sql
    $sql = "SELECT * FROM clients WHERE id = $id";
    //get the query result
    $result = mysqli_query($conn, $sql);


    // fetch result in array format
    $car = mysqli_fetch_assoc($result);
    $car_id = $car['id'];


    $conn = mysqli_connect("localhost", "images", "images", "images");


    if (array_filter($errors)) {
        //  echo "error in the form";
    } else {
        $text = mysqli_real_escape_string($conn, $_POST['text']);
        $sql = "INSERT INTO chats(messages,from_id,to_id) VALUES ('$text','$User2','$car_id')";

        //create sql
        //save to db and check
        if (mysqli_query($conn, $sql)) {
            //success
            echo "{\"success\":true}";
            exit(0);

        } else {
            // echo "query error" . mysqli_error($db);
            echo "{\"success\":false}";
            exit(0);

        }




    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        .empty{
            visibility: visible;
        }
        .not-empty{
            visibility: collapse;
            transition: .4s;
        }
    </style>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/chat.css">
<link rel="stylesheet" type="text/css" href="css/profileview.css">
<style type="text/css">
    //Todo make the form fixed to the bottom
    //Todo Enhance the look of .chat

    html{
        font-size: calc(1em + 1vh);
      }
    .chat{
        display: flex;
        border-radius: 5px;
        margin: 10px 5px;
    }
    .side-right{
        margin-left:700px ;
       background-color: white;
        width: 800px;

        flex-direction: row-reverse;

    }
    .side-left{
        flex-direction: row;
        background-color: yellow;
color: black;
        width: 800px;
        margin-left:50px ;

    }

    .profile_pic{
        border-radius: 50%;
        width: 24px;
        height: 24px;
        margin: 10px;
    }
</style>
<body>

<div class="chat-box">
    <?php
        if (isset($chats)){
            foreach ($chats as $chat){?>
        <div class="chat">
            <div class="name">

            </div>
            <div class="time"></div>
            <div class="msg">

            </div>
        </div>
        <?php } }else{ ?>
            <div class="empty"> No previous chats</div>
        <?php } ?>

</div>

<form action="message1.php" method="post" id ='typemsg'>
    <div class="card-footer">
        <div class="input-group">
            <div class="input-group-append">
    <input type="text" name="text" required>
    <?php if (isset($id)) { ?>
    <input type="hidden" name="send_to" value="<?php echo $id;?>">
    <?php  } ?>
    <p class="err text-danger"></p>
    <button type="submit" name="send">Send</button>
    </div>
        </div>
    </div>
</form>

<script>
    // Make the date readable
    const formatDate = date =>{
        let hours = '0' + date.getHours();
        let min =   '0' + date.getMinutes();

        return `${hours.slice(-2)}:${min.slice(-2)}`
    }

    // String -template literal for the message
    const html = function (msg) {
        // this is the msg
        return `<div class="chat d-flex side-${msg['side']}">
        <img src='${msg['img']}' alt='Pic' class='profile_pic'/>
        <div>
        <div class="name">
                ${msg['firstname']}
            </div>
            <div class="msg">
                ${msg['text']}
            </div>
<div class="time">
                ${formatDate(msg['timesent'])}
            </div>
</div>
        </div>`;
    }
    //Send msgs in the bg without reloading
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

    async function getMsgs(url, data = {}) {
        // Default options are marked with *
        // This wont work in all browsers, for compatibility use Ajax ama axios
        const response = await fetch(url, {
            method: 'GET', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            // headers: {

            //   'Content-Type': 'application/x-www-form-urlencoded'
            // },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer' // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        });
        return response.json(); // parses JSON response into native JavaScript objects
    }

</script>
<script>
    function main() {
        const senderName = "<?php /*Name of sender goes here*/ ?>";
        const receiverName = "<?php /*Name of recipient goes here*/ ?>";
        const form = document.querySelector('#typemsg');
        const input = document.querySelector("input[name='text']");
        const chatbox = document.querySelector('.chat-box');
        const empty = document.querySelector('.empty');
        const err = document.querySelector('.err');
        const sent_to = "<?php echo $id;?>";
        let msg_ids = [];
        form.addEventListener('submit', function(ev){
            ev.preventDefault();
            const time = new Date();
            const text = input.value;
            if(/^.{1,300}$/.test(text)){ // text must be between 1 - 300letters


                let  fd = new FormData();
                err.innerHTML = ``;
                input.value = ''; //Empty the input
                fd.append('text', text);
                fd.append('date', new Date());
                fd.append('send', '')
                fd.append('send_to', sent_to);

                postData('http://localhost/garbages/message1.php',fd)
                // TODO rename whenyou deploy this script

            }else{
                err.innerHTML = `Your messga might be invalid`;
            }


        });
        setInterval(async function () {
            let messages = await getMsgs('http://localhost/garbages/message1.php?id='+sent_to+"&getmsgs");
            // Todo, remove duplicates
            if(typeof messages == 'object'){
                for (let i = 1; i < messages.length; i++) {
                    if(msg_ids.includes(messages[i]['chatid'])){


                    }else{
                        const msg = messages[i]['msgs'];
                        const date = new Date(messages[i]['datecreated']);

                        const name = messages[i]['fname'];
                        const side = messages[i]['id'] == sent_to ? 'left' : 'right';
                        const pic = messages[i]['img'];
                        console.log(messages[i]['id'])
                        let message = {}
                        message['firstname'] = name;
                        message['timesent'] = date;
                        message['text'] = msg;
                        message['side'] = side;
                        message['img'] = pic;

                        const htm = html(message);
                        chatbox.insertAdjacentHTML("beforeend", htm);
                        chatbox.scrollTop = chatbox.scrollHeight;
                        msg_ids.push(messages[i]['chatid'])
                        empty.classList.add('not-empty');
                        empty.classList.remove('empty')
                    }
                }
            }

            // Todo, create a Queue/Array to hold the messages from the sever
            // Todo, Render the messeges
        }, 2000)


    }

    window.onload = main;
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>