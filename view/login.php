<html>
    <head>
        <title>CARE4U</title>
        <link rel="stylesheet" href="view/css/style.css">
        <style>
            body{
                display: grid;
                grid-template-rows: 30vh 1fr 30vh;
                background-color: #308980;
            }
            #form{
                width:50vw;
                margin:0 auto;
                text-align: left;
                grid-row: 2;
            }
            .input{
                display: grid;
                grid-template-columns: 30% 70%;
            }
            .input label{
                width: 20%;
            }
            .input input{
                width: 20rem;
                padding-top: 1vh;
            }
            @media only screen and (max-width: 500px) {
                #form{
                    width: 100vw;
                    margin:0 0;
                }
            }
        </style>
    </head>

    <body>
        <div id="form">
            <h1>LOGIN</h1>    
            
            <form action="" method="POST">
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter Email">
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter Password"><br>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
</html>