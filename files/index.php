<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            margin: 0;
        }
        form {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px; 
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 15px 30px; 
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px; 
        }
        .custom-file-input {
            display: none;
        }
        .custom-file-label {
            background-color: #007BFF;
            color: #fff;
            padding: 15px 30px; 
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px; 
        }
        .selected-file {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form method="POST" action="code.php" enctype="multipart/form-data">
        <label>انتخاب فایل :</label>
        <label for="file-input" class="custom-file-label">انتخاب فایل</label>
        <input type="file" name="file1" id="file-input" class="custom-file-input">
        <div class="selected-file" id="selected-file"></div>
        <br>
        <input type="submit" value="ارسال" name="btnupload">
    </form>

    <script>
        document.getElementById("file-input").addEventListener("change", function() {
            const selectedFile = this.files[0];
            if (selectedFile) {
                document.getElementById("selected-file").innerText = selectedFile.name;
            } else {
                document.getElementById("selected-file").innerText = "";
            }
        });
    </script>
</body>
</html>



