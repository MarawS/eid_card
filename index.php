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
    <div class="row text-end mt-4 me-2">
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
    <form action="gen_image.php" method="post" enctype="multipart/form-data" id="photoform" name="photoform">
      <div class="row text-center">
        <div class="col-6 col-sm-4 col-lg-2 col-md-3">
          <div class="select_box">
            <select class="form-select" aria-label="Default select example" name="selectphoto" id="selectphoto">
              <option value="hilinky">اختر تصميم</option>
              <option value="wetaan">وتان</option>
              <option value="hilinky">هاي لينكي</option>
              <option value="pofy">بوفاي</option>
              <option value="lifeline">لايف لاين</option>
            </select>
          </div>
          <input type="hidden" id="inputpathphoto" name="inputpathphoto" value="">
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
        <div
          class="row text-center text-sm-center text-lg-center text-md-center justify-content-center justify-content-md-center justify-content-sm-center justify-content-lg-center">
          <div class="col-2 col-sm-3 col-lg-3 col-md-3">
          </div>
          <div class="col-9 col-sm-6 col-lg-6 col-md-6">

            <div class="card text-center">
              <center>
                <img class="card-img-top" src="./bootstrap/images/cards/hilinky.jpeg" alt="" id="defultphoto"
                  name="defultphoto">
              </center>
            </div>
          </div>
          <div class="col-1 col-sm-3 col-lg-3 col-md-3">
          </div>
        </div>
        <br>
        <div class="row text-center text-sm-center">
          <div class="col-2 col-sm-3 col-lg-4 col-md-4">

          </div>
          <div class="col-8 col-sm-6 col-lg-4 col-md-4">
            <input class="form-control input-name" type="text" name="writename" id="writename" placeholder="اكتب اسمك هنا">
          </div>
          <div class="col-2 col-sm-3 col-lg-4 col-md-4">

          </div>
        </div>
        <br>
        <div class="row text-center text-sm-center ">
          <div class="col-2 col-sm-3 col-lg-4 col-md-4">
          </div>
          <div class="col-8 col-sm-6 col-lg-4 col-md-4">
            <button class="btn btn-light download-btn px-5" type="submit" id="savephoto">احفظ الصورة</button>
          </div>
          <div class="col-2 col-sm-3 col-lg-4 col-md-4">
          </div>
        </div>
    </form>
  </div>
  <br>
  <!-- <hr style="border-top: 1px solid black !important;"> -->
  <div class="footer-row row text-center mx-2 pt-3">
    <div class="col-4 col-sm-4 col-lg-4 col-md-4 pt-3">
      <p>Hi.linky@wetaan.com</p>
    </div>
    <div class="col-4 col-sm-4 col-lg-4 col-md-4 pt-3">
      <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
        <img class="Social-icons" src="./bootstrap/images/logos/linkedin.svg" alt="">
        <img class="Social-icons" src="./bootstrap/images/logos/x.svg" alt="">
        <img class="Social-icons" src="./bootstrap/images/logos/instagram.svg" alt="">
      </a>
    </div>
    <div class="col-4 col-sm-4 col-lg-4 col-md-4 pb-1">
      <img class="footer-logo" src="./bootstrap/images/logos/hilinky_logo.svg" alt="">
    </div>
  </div>
  </div>
</body>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('review').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default form submission

    // Serialize form data
    let form = document.getElementById('cards_form');
    var formData = new FormData(form);
    let form = "";

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
<script>
  
  let inputpathphoto = document.getElementById('inputpathphoto').value;
  inputpathphoto = "./bootstrap/images/cards/hilinky.jpeg";
  document.getElementById('selectphoto').addEventListener('change', function (event) {
    let selected = document.getElementById('selectphoto').value;
    let imageobject = { hilinky: './bootstrap/images/cards/hilinky.jpeg', wetaan: './bootstrap/images/cards/wetaan.jpeg', pofy: './bootstrap/images/cards/pofy.jpeg', lifeline: './bootstrap/images/cards/lifeline.jpeg' };
    // alert(imageobject[selected]);
    let imageelement = document.getElementById('defultphoto');
    imageelement.src = imageobject[selected];
    inputpathphoto = imageobject[selected];
    alert(inputpathphoto)

  })

</script>

</html>