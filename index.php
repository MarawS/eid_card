<?php

require_once './config.php';

$images = $config['cards'];

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo $config['favicon']; ?>">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <title>تهنئة عيد الفطر</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-4 col-sm-4 text-start">
                <img src="bootstrap/images/logos/pp_logo.svg" alt="" width="200">
            </div>
            <div class="col-4 col-sm-4">

            </div>
            <div class="col-4 col-sm-4 text-end">
                <img src="bootstrap/images/logos/2030_logo.png" alt="" width="150">
            </div>
        </div>
        <hr>
        <br>
        <h1 class="text-center title">اهلاً وسهلاً بكم</h1>
        <p class="text-center description">اختر البطاقة التي تناسبك</p>
        <br>
        <form action="gen_image.php" id="cards_form" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <?php foreach ($images as $image) { ?>
                    <div class="col-auto">

                        <div class="card-div">
                            <input class="check-colour" type="radio" name="image_selected" id="" value="<?php echo $image; ?>" required>
                            <img src="<?php echo $config['cards_dir'] . $image; ?>" alt="بطاقة تهنئة" class="border rounded" width="210">
                        </div>
                        <br>
                        <br>
                    </div>
                <?php } ?>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-2">

                </div>
                <div class="col-8">
                    <input type="text" name="emp_name" id="" placeholder="أكتب أسمك هنا..." class="form-control" required>
                    <br>
                    <!-- <button type="submit" class="btn btn-success btn-lg" id="generate_card">إنشاء البطاقة</button> -->
                    <button type="button" class="btn btn-success btn-lg button_card" id="review">معاينة</button>
                    <button type="submit" class="btn btn-success btn-lg button_card" id="download">تحميل</button>
                </div>
                <div class="col-2">

                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-4 col-sm-4">

                </div>
                <div class="col-4 col-sm-4">
                    <div id="imageContainer">
                        <!-- Image will be loaded dynamically here -->
                    </div>
                </div>
                <div class="col-4 col-sm-4">

                </div>
            </div>
        </form>
        <br>
    </div>
</body>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('review').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Serialize form data
        let form = document.getElementById('cards_form');
        var formData = new FormData(form);

        // Send AJAX request to generate the image
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'review_image.php', true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                // Create an img element for the image
                var img = document.createElement('img');
                img.width = 300;
                // Append a unique timestamp to the image URL
                var imageUrl = xhr.responseText + '?t=' + new Date().getTime();
                // Set the src attribute to load the generated image with the unique URL
                img.src = imageUrl;
                // Append the image to the image container
                document.getElementById('imageContainer').innerHTML = ''; // Clear previous image
                document.getElementById('imageContainer').appendChild(img);
                
            }
        };
        xhr.send(formData);
    });
</script>

</html>