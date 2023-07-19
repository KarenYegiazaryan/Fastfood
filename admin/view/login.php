
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ադմին - մուտք</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: 'Roboto', sans-serif;
            letter-spacing: 1px;
            background-image: url(../assets/img/back2.jpg);
            width: 100%;
            min-height: 800px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .parent{
            width: 100%;
            min-height: 700px; 
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .regDiv{
            border: 1px solid black;
            background-color: gray;
            width: 700px;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            border-radius: 15px;
        }
        input{
            width: 70%;
            height: 40px;
            border-radius: 15px;
            font-size: 17px;
        }
        .submit{
            cursor: pointer;
            width: 40%;
            height: 40px;
            background-color: black;
            font-size: 18px;
            color: white;
        }
        .message{
            color: #e21212;
        }
        .sign{
            font-size: 23px;
            color: black;
        }
        .log{
            color: black;
        }
        @media(max-width:725px){
            .regDiv{
                width: 400px;
            }
        }
        @media(max-width:410px){
            .regDiv{
                width: 300px;
            }
            .sign{
                font-size: 17px;
            }
            .submit{
                font-size: 15px;
            }
            .log{
                font-size: 14px;
            }
        }
        @media(max-width:305px){
            .regDiv{
                width: 200px;
            }
            @media(max-width:725px){
            .submit{
                width: 100px;
                font-size: 14px
            }
        }
        }
    </style>
</head>
<body>
    <div class="parent">
        <div class="regDiv">
            <p class="sign">Մուտք</p>
            <input type="email" class="email" name="email" placeholder="Էլ․ հասցե">
            <input type="text"  class="password" name="password" placeholder="Գաղտնաբառ">
            <p class="message"></p>
            <input type="submit" value="Մուտք գործել" class="submit" name="submit">        
            <a href="registration.php" class="log">Գրանցվել</a>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(function(){
            $(".submit").click(function(){
                $email = $(".email").val();
                $pass = $(".password").val();
                $.ajax({
                    url: "../controller/login_controller.php",
                    method: "post",
                    data: {
                        email: $email,
                        pass: $pass,
                        action: "submit"
                    },
                    success:function(resualt){
                        resualt = JSON.parse(resualt);
                        console.log(resualt);
                        if(resualt["status"] == "success"){
                            window.location.href = "../index.php";
                        }else if(resualt["status"] == "error"){
                            $(".message").html(resualt["message"]);
                        }
                    }
                })
            })
        })
    </script>
    
</body>
</html>

