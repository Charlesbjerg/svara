<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Svara | Project Sign-off</title>
    <style>
        *, *::after, *::before {
            box-sizing: border-box;
        }
        body {
            margin: 0;
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
            height: calc(100% - 200px);
            min-height: 500px;
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
    </style>
</head>
<body class="bg-gradient">
    <div class="container">
        <main class="main-panel">
            <div class="logo">
                <img src="/logo-wide.png" srcset="/logo-wide@2x.png 2x" alt="Svara Logo" />
            </div>
            <header class="header-branded">
                <h1 class="title">Project Requires Sign-off</h1>
                <p>The current phase for the project { projectName }, requires signing off before the project can continue. Please read the document below, then sign and submit this form. If you have any questions about your project, or what happens next, please direct them to your account manager.</p>
                <p></p>
            </header>
            <section class="message-panel">
                <h2 class="subtitle">Message Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ex nibh, lobortis nec luctus a, scelerisque sit amet purus. Duis non purus in felis congue laoreet et a enim. Nam a diam in eros porta pulvinar. Cras bibendum ex ultrices velit tincidunt luctus et sit amet risus. Donec consequat augue posuere erat facilisis, sed laoreet purus fringilla. Mauris id placerat magna.</p>
                <p>Mauris nunc metus, vestibulum vel arcu non, faucibus consectetur felis. Suspendisse bibendum odio ultrices, lobortis leo ac, porta tellus. Proin ultrices metus nec ante placerat, eget dictum sem rutrum. Cras consectetur, lorem ut pretium pretium, sapien augue maximus nulla, at malesuada felis tellus vel nisl. Quisque tempor purus et mauris hendrerit fringilla. Maecenas vulputate velit vitae odio blandit, id suscipit est volutpat. Donec eget augue id tellus ornare hendrerit ut eu augue. Cras dapibus arcu et risus viverra, sit amet sollicitudin augue blandit.</p>
                <p>Curabitur faucibus faucibus ligula, sed tempor ex posuere sed. Nulla facilisi. Pellentesque rhoncus quam ipsum. In hac habitasse platea dictumst. Donec quis sapien est. Fusce feugiat tincidunt diam, eu luctus libero tristique et. Pellentesque viverra, mauris ac efficitur lobortis, neque lorem sollicitudin orci, eu ullamcorper libero ex ac orci.</p>
            </section>
            <form action="{{ $submitUrl }}">
                <div class="form-item">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" />
                </div>
                <div class="form-item">
                    <label>Signature</label>
                    TODO: Add signature pad
                </div>
                <button class="btn btn-default">Sign-off Project Phase</button>
            </form>
        </main>
    </div>
</body>
</html>