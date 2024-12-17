<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user defined function</title>
</head>
<body>
    <h1>ทดสอบการสร้างฟังชั้นที่สร้างโดยผู้พัณนาโปรแกรม</h1>
    <?php
        $name = "นาย ยศวริศ อาจนนท์ลา";
        Hello($name);

//---------------------------------------------------------------------------
echo "<h3>ทดสอบการใช้ Function</h3>";
$a = 5;
$b = 6;
$c = sum($a,$b);
echo "$a + $b = $c <br>";
echo "<h3>ทดสอบการใช้ Function แบบมีพารามิเตอร์เป็น Reference</h3>";
$num = 2;
echo "Before ===> \$num = $num";
echo "<hr>";
add_5($num);
echo "After ===> \$num = $num";
echo "<hr>";
echo "<h3>ทดสอบการใช้ function แบบมีพารามิเตอร์หลายตัว</h3>";
$summaryNumber = summaryNumber(1,2,3,4,5,6,7,8,9);
echo "ผลรวมของ (1,2,3,4,5,6,7,8,9) = $summaryNumber";
echo "<hr>";

//---------------------------------------------------------------------------
        bye();

        function summaryNumber(...$x){
            $sum=0;
            foreach($x as $value){
                return $sum;
            }
        }


        function add_5(&$value){
            $value+=5;
        }


        function Hello($yourname){
            echo "<h3>ผู้พัณนาโปรแกรม</h3>";
            echo "<h3>".$yourname."</h3>";
            echo "<hr>";
        }




        function sum($x,$y){
            $z = $x+$y;
            return $z;
        }


        
        function bye(){
            echo "<hr>";
            echo "<h4>หลักสูตรวิทยาศาสตร์บัณทิต สาขาเทคโนโลยีสารสนเทศ</h4>";
            echo "<h4>สาขาวิชาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</h4>";
            echo "<hr>";
        }
    ?>
</body>
</html>