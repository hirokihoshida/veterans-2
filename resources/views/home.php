<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Flat UI Login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Sans-serif;
            background: #2c3e50;
        }

        #wrap {
            margin: 0 auto 30px;
        }

        #regbar {
            height: 67px;
            background: #34495e;
        }

        #navthing {
            margin-left: 50px;
        }

        h2 {
            padding: 20px;
            color: #ecf0f1;
        }

        fieldset {
            border: none;
        }

        .login {
            position: relative;
            width: 350px;
            display: none;
        }

        .arrow-up {
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-bottom: 15px solid #ECF0F1;
            left: 10%;
            position: absolute;
            top: -10px;
        }

        .formholder {
            background: #ecf0f1;
            width: 350px;
            border-radius: 5px;
            padding-top: 5px;
        }
        .formholder input[type="email"], .formholder input[type="password"] {
            padding: 7px 5px;
            margin: 10px 0;
            width: 96%;
            display: block;
            font-size: 18px;
            border-radius: 5px;
            border: none;
            -webkit-transition: 0.3s linear;
            -moz-transition: 0.3s linear;
            -o-transition: 0.3s linear;
            transition: 0.3s linear;
        }
        .formholder input[type="email"]:focus, .formholder input[type="password"]:focus {
            outline: none;
            box-shadow: 0 0 1px 1px #1abc9c;
        }
        .formholder input[type="submit"] {
            background: #1abc9c;
            padding: 10px;
            font-size: 20px;
            display: block;
            width: 100%;
            border: none;
            color: #fff;
            border-radius: 5px;
        }
        .formholder input[type="submit"]:hover {
            background: #1bc6a4;
        }

        .randompad {
            padding: 10px;
        }

        .green {
            color: #1abc9c;
        }

        a {
            color: #ecf0f1;
            text-decoration: none;
        }
        a:hover {
            color: #1abc9c;
        }

    </style>

</head>

<body>
<div id="wrap">
    <div id="regbar">
        <div id="navthing">
            <h2><a href="#" id="loginform">Login</a> | <a href="#">Register</a></h2>
            <div class="login">
                <div class="arrow-up"></div>
                <div class="formholder">
                    <div class="randompad">
                        <fieldset>
                            <label name="email">Email</label>
                            <input type="email" value="example@example.com" />
                            <label name="password">Password</label>
                            <input type="password" />
                            <input type="submit" value="Login" />

                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>
