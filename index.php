<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random img</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <main>
        <h1>Random images generator</h1>

        <form onsubmit="event.preventDefault(); setQuantity(this)" action="create-img.php" method="POST">
            <input class="quantity" type="hidden" name="quantity">
            <button class="btn-generate d-none" type="submit">Generate</button>
        </form>

        <div class="fileinput">
            <form action="save-img.php" class="save-images" method="POST" enctype="multipart/form-data">
                <input onchange="mySubmit()" class="upload fileinput__input" type="file" name="my_img[]" multiple id="file">
                <button class="submit-btn" type="submit" name="submit" value="submit">upload</button>
            </form>
            <div class="fileinput__face">
                <div onclick="clickInputFile()" class="fileinput__button"><i class="fa fa-upload"></i> Choose files...</div>
            </div>
        </div>
    </main>

    <script src="js/script.js"></script>
</body>

</html>