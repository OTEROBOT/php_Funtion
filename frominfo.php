<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form - ชื่อจริงและชื่อเล่น</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .submit-btn {
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 20px;
        }
        .submit-btn:hover {
            background-color: #357ab9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>แบบฟอร์มกรอกชื่อ</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="realname">Real name:</label>
            <input type="text" id="realname" name="realname" placeholder="Real name">

            <label for="nickname">Nick name:</label>
            <input type="text" id="nickname" name="nickname" placeholder="Nick name">

            <input type="submit" name="submit" value="ส่งข้อมูล" class="submit-btn">
        </form>

        <?php
// ตั้งค่ารหัสตัวอักษรเป็น UTF-8
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $realname = htmlspecialchars($_POST['realname']);
    $nickname = htmlspecialchars($_POST['nickname']);

    // จัดเก็บข้อมูลในรูปแบบข้อความ
    $data = "Real name: $realname\nNick name: $nickname\n\n";

    // บันทึกข้อมูลลงไฟล์ student.txt
    file_put_contents('student.txt', $data, FILE_APPEND);

    // แสดงข้อความยืนยันว่าบันทึกข้อมูลสำเร็จ
    echo "<h3>ข้อมูลที่บันทึกไว้ในไฟล์:</h3>";

    // อ่านข้อมูลทั้งหมดจากไฟล์ student.txt
    $fileContent = file('student.txt'); // อ่านไฟล์ทีละบรรทัด (เก็บใน array)

    // วนลูปแสดงข้อมูลทีละบรรทัด
    foreach ($fileContent as $line) {
        echo "<p>" . htmlspecialchars($line) . "</p>";
    }
}
?>
    </div>
</body>
</html>
