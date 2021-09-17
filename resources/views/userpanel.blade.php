<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Panel</title>
    <link rel="stylesheet" href="/css/app.css">
    <script
      src="https://kit.fontawesome.com/e3488c8060.js"
      crossorigin="anonymous"
    ></script>
    <link rel="shortcut icon" href="/images/ecellLogo.png" type="image/png">
</head>
<body>
    <div id="example" ></div>
</body>
<script>
    let user= {};
     user['name'] = "{{Auth::user()->name}}";
     user['email'] = "{{Auth::user()->email}}";
    user['instituteName'] = "{{Auth::user()->instituteName}}";
    user['points'] = "{{Auth::user()->points}}";
    user['user_id'] = "{{Auth::user()->user_id}}";
    user['mobile'] = "{{Auth::user()->mobile}}";
    // console.log(JSON.stringify(user));
    let example = document.getElementById("example");
    example.setAttribute("data-user",JSON.stringify(user));
</script>

<script src="/js/app.js"></script>
</html>
