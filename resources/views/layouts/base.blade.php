<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Svara</title>
    <style>
        *, *::after, *::before {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-size: 16px;
            font-family: "Lato", sans-serif;
            font-weight: 400;
        }

        .bg-gradient {
            background: linear-gradient(45deg, #8515db 0%, #d201fa 100%);
        }

        .container {
            max-width: 960px;
            width: 100%;
            margin: 0 auto;
            padding: 0 30px;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 230px;
            height: auto;
        }

        .main-panel {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 10%) 0px 4px 6px -1px, rgb(0 0 0 / 6%) 0px 2px 4px -1px;
            width: 100%;
            max-height: calc(100% - 200px);
            overflow-y: auto;
        }

        .title,
        .subtitle {
            font-size: 32px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            margin: 0 0 10px;
        }

        .subtitle {
            font-size: 26px;
        }

        .message-panel {
            padding: 20px 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 30px 0;
            max-height: 420px;
            overflow-y: auto;
            box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 15%);
        }

        .form-item {
            display: block;
            margin-bottom: 15px;
            position: relative;
        }

        .form-item label {
            display: block;
            margin-bottom: 10px;
        }

        .form-item textarea,
        .form-item input,
        .form-item select {
            border: 2px solid #ddd;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            width: 100%;
            outline: none;
            transition: 0.25s ease-in-out;
        }

        .form-item:hover input,
        .form-item:focus input,
        .form-item:active input {
            border: 2px solid #8515DB;
        }
        .sign-pad {
            box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 15%);
            border: 2px solid #ddd;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
        }
        .btn {
            padding: 10px 15px;
            border: 0;
            margin: 0;
            font-family: "Montserrat", sans-serif;
            font-size: 16px;
            cursor: pointer;
            transition: 0.33s ease-in-out;
            background: linear-gradient(45deg, #8515db 0%, #d201fa 100%);
            color: #fff;
            position: relative;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-gradient">
    @yield('content')
</body>
</html>