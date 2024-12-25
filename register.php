<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Form Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            color: #4a90e2;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        .error {
            color: #e74c3c;
        }
        .submit-btn {
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #357ab9;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // define variables and set to empty values
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email = $gender = $comment = $website = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $website = test_input($_POST["website"]);
            $comment = test_input($_POST["comment"]);
            $gender = test_input($_POST["gender"]);
            
            if (empty($name)) {
                $nameErr = "กรุณาใส่ชื่อ";
            } else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "ใส่ชื่อไม่ถูกต้อง";
            }
            
            if (empty($email)) {
                $emailErr = "กรุณาใส่อีเมล";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "รูปแบบอีเมลไม่ถูกต้อง";
            }

            if (!empty($website) && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "URL ไม่ถูกต้อง";
            }

            if (empty($gender)) {
                $genderErr = "กรุณาเลือกเพศ";
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <h2>แบบฟอร์มตรวจสอบข้อมูลด้วย PHP</h2>
        <p><span class="error">* ช่องที่จำเป็นต้องกรอก</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>ชื่อ:</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
            <br><br>

            <label>อีเมล:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="error">* <?php echo $emailErr; ?></span>
            <br><br>

            <label>เว็บไซต์:</label>
            <input type="text" name="website" value="<?php echo $website; ?>">
            <span class="error"><?php echo $websiteErr; ?></span>
            <br><br>

            <label>ความคิดเห็น:</label>
            <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
            <br><br>

            <label>เพศ:</label>
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female"> หญิง
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male"> ชาย
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other"> อื่นๆ
            <span class="error">* <?php echo $genderErr; ?></span>
            <br><br>

            <input type="submit" name="submit" value="ส่ง" class="submit-btn">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$emailErr && !$genderErr && !$websiteErr) {
            echo "<h2>ข้อมูลที่กรอก:</h2>";
            echo htmlspecialchars($name) . "<br>";
            echo htmlspecialchars($email) . "<br>";
            echo htmlspecialchars($website) . "<br>";
            echo nl2br(htmlspecialchars($comment)) . "<br>";
            echo htmlspecialchars($gender) . "<br>";
        }
        ?>
    </div>
</body>
</html>
