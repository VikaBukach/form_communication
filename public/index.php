<?php

require_once '../Db.php';
require_once '../Controller.php';

try {
    $db = new Db();
    $controller = new Controller();
    $data = $db->getAll();

    $controller->runAction($_GET['action'] ?? '');
} catch (RuntimeException $exception) {
    echo "<pre>{$exception->getMessage()}</pre>";
    die;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <title>Contact form</title>

</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6">
            <h1>Форма зв`язку</h1>
            <form id="contactForm" action="?action=create" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Ваше імʼя</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Ваше імʼя">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Ваш телефон</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Ваш телефон">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Ваше повідомлення</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                <button class="btn btn-primary" type="submit" id="submit">Надіслати</button>
            </form>
        </div>
    </div>
</div>

<?php if (!empty($data)) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2">Імя</div>
            <div class="col-md-2">Телефон</div>
            <div class="col-md-2">Почта</div>
            <div class="col-md-6">Повідомлення</div>
        </div>

        <div id="messages-container">
            <?php foreach ($data as $datum): ?>
                <div class="row">
                    <div class="col-md-2"><?= $datum['name'] ?? 'not set' ?></div>
                    <div class="col-md-2"><?= $datum['phone'] ?? 'not set' ?></div>
                    <div class="col-md-2"><?= $datum['email'] ?? 'not set' ?></div>
                    <div class="col-md-6"><?= $datum['message'] ?? 'not set' ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
</body>
</html>