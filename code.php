<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #gray;
            font-size: 17px;
        }
        .upload-info {
            background-color: #f2f2f2; 
            padding: 10px;
            border: 1px solid #ccc;
            margin: 10px;
            font-size: 16px;
            line-height: 1.5;
        }
        .file-list {
            list-style-type: none;
        }
        .file-list li {
            margin: 5px 0;
            font-size: 28px; 
        }
    </style>
</head>
<body>
<?php
if(isset($_POST['btnupload'])){
    if(empty($_FILES['file1'])){
        echo 'هیچ فایلی انتخاب نشده';
    }
    else{
          ! 1- نمایش نام فایل اپلود شده

          $filename=$_FILES['file1']['name'];
          echo $filename. "<br>";

          ! 2- نمایش حجم فایل اپلود شده   

          $filesize=$_FILES['file1']['size'];
          echo $filesize. "<br>";

          ! 3- نمایش نوع فایل اپلود شده

          $filetype=$_FILES['file1']['type'];
          echo $filetype. "<br>";

          ! 4- نمایش نام فایل در فایل های temp

          $filetemp=$_FILES['file1']['tmp_name'];
          echo $filetemp. "<br>";

          ! 5- تبدیل حجم فایل ها از بیت به کیلو بایت

          $filesize=floor($filesize/1024);
              echo $filesize."KB <br>"; 
        
          ! 6-  محدود کردن به نوع فایل آپلود شده

          if(($filetype=='image/png')||($filetype=='image/jpg')||($filetype=='image/bmp')||($filetype=='image/jpeg')){    
              echo"نوع فایل انتخابی  از نوع تصویر است <br>";
          }
          else{
              echo"نوع فایل انتخابی از نوع تصویر نیست <br>";
          }
    
          ! 7- محدود کردن حجم فایل اپلود شده

          if($filesize>2048){
              echo "حجم فایل بیش از 2 مگابایت است <br>";
          }
          else{
              echo"حجم فایل انتخابی کمتر از 2 مگابایت است <br>";
          }
    
          ! 8- ذخیره فایل اپلود شده در محیط سایت

          $path="files/".$filename;
          if(move_uploaded_file($filetemp,$path)){
              echo "فایل شما با موفیقیت آپلود شد <br>";            
          }
          else{
              echo "فایل شما اپلود نشد <br>";
          }
    
          ! 9- فانکشن fopen و fgets و fclose
        
          $file = fopen($filename, 'r');
          if ($file) {
                  while (!feof($file)) {
                  echo fgets($file);
              }
              fclose($file);
          }
        
          ! 10- خواندن محتوای فایل با استفاده از file_get_contents

          $fileContent = file_get_contents($path);
          echo "محتوای باز شده :<br>";
          echo nl2br(htmlspecialchars($fileContent)); 
          echo"<br>";

          ! 11- نوشتن محتوای جدید در فایل با استفاده از file_put_contents

          $newContent = "این متن جدید است و توسط PHP به فایل نوشته شده است.";
          file_put_contents("newfile.txt", $newContent);
          echo "محتوای جدید با موفقیت در فایل نوشته شد.";

          ! 12- نمایش فایل های موجود در پوشه  

          echo "<h2>لیست فایل‌های موجود در پوشه  files:</h2>";
          $fileList = glob('files/*');
          if ($fileList) {
              echo "<ul>";
              foreach ($fileList as $file) {
                  echo "<li>" . basename($file) . "</li>";
              }
              echo "</ul>";
          } 
          else {
              echo "هیچ فایلی در پوشه مورد نظر یافت نشد.";
          }
    
    } 
    }

?>
</body>
</html>
