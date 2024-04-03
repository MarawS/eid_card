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
  <div class="container">
    <div class="row text-end mt-4">
      <div class="col-4 col-sm-4 col-lg-4 col-md-4">
      </div>
      <div class="col-4 col-sm-4 col-lg-4 col-md-4">
      </div>
      <div class="col-4 col-sm-4 col-lg-4 col-md-4">
        <img src="./bootstrap/images/logos/hilinky_logo.svg" alt="">
      </div>
    </div>
    <br>
    <br>
    <div class="heading">
      <h2>كل عام وأنتم بخير، أعاده الله علينا وعليكم بالصحة والسعادة والسلام.</h2>
      <h2>عيد فطر مبارك!</h2>
    </div>
    <br>
    <div class="row text-center">
      <div class="col-6 col-sm-4 col-lg-2 col-md-3">
        <div class="select_box">
          <select class="form-select" aria-label="Default select example">
            <option selected>اختر تصميم</option>
            <option value="1">وتان</option>
            <option value="2">هاي لينكي</option>
            <option value="3">بوفاي</option>
            <option value="4">لايف لاين</option>
          </select>
        </div>
      </div>
      <div class="col-3 col-sm-4 col-lg-5 col-md-3">

      </div>
      <div class="col-3 col-sm-4 col-lg-5 col-md-3">
      </div>
    </div>
    <br>
    <div class="frame py-5 px-2">

      <div class="heading">
        <h2>انضم إلينا في فعاليتنا الخاصة حيث يمكنك كتابة اسمك على التصميم، وبعد ذلك ستتمكن من مشاركته مع الجميع!
        </h2>
      </div>
      <br>
      <div class="row text-center">
        <div class="col-2 col-sm-2 col-lg-3 col-md-3">
        </div>
        <div class="col-8 col-sm-8 col-lg-6 col-md-6">
          <center>
            <div class="image">
              <img src="./bootstrap/images/cards/EidMubarak1.png" alt="">
            </div></center>
        </div>
        
        <div class="col-2 col-sm-2 col-lg-3 col-md-3">
        </div>
      </div>


    </div>

    <br>
  </div>
</body>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('review').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default form submission

    // Serialize form data
    let form = document.getElementById('cards_form');
    var formData = new FormData(form);

    // Send AJAX request to generate the image
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'review_image.php', true);
    xhr.onload = function () {
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