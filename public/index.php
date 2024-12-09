<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/js/main.js">
    <title>Document</title>

</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6">
            <h1>Форма зв`язку</h1>
            <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Ваше імʼя</label>
                <input type="text" value="" class="form-control" id="name" placeholder="Ваше імʼя">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Ваш телефон</label>
                <input type="number" value="" class="form-control" id="phone" placeholder="Ваш телефон">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" value="" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Ваше повідомлення</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
                <button class="btn btn-primary" type="submit">Надіслати</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>