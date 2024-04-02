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
    
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />
    <title>تهنئة عيد الفطر</title>
</head>

<body>
    
    <div class="eid-mubarak col col-xs-2 col-md-4 .col-lg-2 bg-light d-flex flex-row justify-content-center" style="background-color: #f9f8f5; width: 100%;">
      <div class="div">
        <div class="overlap">
          <div class="group ">
          <img class=" col col-xs-2 col-md-2 col-lg-2 position-absolute end-0 md-6 w-10" src="bootstrap\images\logos\hilinky_logo.svg"  />

          </div>
          <div class="col col-xs-2 col-md-2 col-lg-2">
          <p class="text-wrapper  ">
            كل عام وأنتم بخير، أعاده الله علينا وعليكم بالصحة والسعادة والسلام.<br />
            عيد فطر مبارك!
          </p></div>
          <img class="frame " src="bootstrap/images/bg/gray_frame.svg" />
          <img class="img" src="bootstrap/images/bg/blue_frame.svg" />
<div class="btn-group ">
    <button type="button" class="btn dropdown-toggle text-white fw-bold col col-xs-2 col-md-2 col-lg-2" style="font-family: Cairo; font-size: 18px; font-style: normal;  " data-bs-toggle="dropdown" aria-expanded="false">
      أختر تصميم
    </button>
    <ul class="dropdown-menu ">
      <li><a class="dropdown-item" href="#">Action 1</a></li>
      <li><a class="dropdown-item" href="#">Action 2</a></li>
      <li><a class="dropdown-item" href="#">Action 3</a></li>
    </ul>
</div>
          <div class="frame-wrapper ">
            <div class="frame-3 ">
              <p class="p ">
                انضم إلينا في فعاليتنا الخاصة حيث يمكنك كتابة اسمك على التصميم، وبعد ذلك ستتمكن من مشاركته مع الجميع!
              </p>
              <div class="frame-3">
                      
                          <img class="profile-photo" src="bootstrap/images/logos/wetaan.jpeg" />
                      
                      
                    
                     
                    
              </div>
              <div class="frame-5">
                <div class="div-wrapper"><div class="text-wrapper-4">اكتب اسمك هنا</div></div>
                <div class="frame-6"><div class="text-wrapper-5">احفظ الصورة</div></div>
              </div>
            </div>
          </div>
        </div>
        <img class="line" src="img/line-44.svg" />
        <div class="overlap-group-wrapper">
          <div class="overlap-group-2">
            <div class="group-2">
              <div class="frame-7">
                <img class="group-3" src="bootstrap\images\logos\hilinky_logo.svg" />
                
                <div class="text-wrapper-6">Hi.linky@wetaan.com</div>
              </div>
            </div>
            <img class="text-center" src="bootstrap/images/logos/linkedin.svg" />
            <img class="rounded" src="bootstrap/images/logos/x.svg" />
            <img class="rounded" src="bootstrap/images/logos/instagram.svg" />

          </div>
        </div>
        <img class="designed-by-karim-el" src="img/designed-by-karim-el-refai-nema-alnajjar.svg" />
        <img class="developed-by-marwa" src="img/developed-by-marwa-sulaiman-fai-almutairi.svg" />
      </div>
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