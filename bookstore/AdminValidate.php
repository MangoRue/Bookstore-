<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>AdminValidate</title>
</head>
<style>
    body {
        background-color: #f2f2f2; /* Light gray background color */
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .box {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .form-box {
        width: 300px;
    }

    .message {
        font-size: 18px;
        margin: 20px 0;
    }

    .btn {
        background-color: #ff0000; /* Red button background color */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #cc0000; /* Darker red on hover */
    }
</style>

<body>
    <div class="container">
        <div class="box form-box">
            <div class="message">
                <p>Waiting for administrator permission.</p>
            </div>
            <a href="index.php"><button class="btn">Go Back</button></a>
        </div>
    </div>
</body>

</html>
