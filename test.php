<?php
header("content-type:text/html;charset=utf-8");
$linkSQL = new PDO("mysql:host=localhost; dbname=tttt; charset=utf8", "root", "123");
$result = $linkSQL->query("select email from tttt where id=1");
$rs = $result->fetch(PDO::FETCH_ASSOC);
?>
<?php
// if ((isset($_POST['email']))) {
//     $email=$rs['email'];

//     $updata = "update tttt set email=? where email=?";
//     $stmt = $linkSQL->prepare($updata);
//     $stmt->bindPARAM(1, $_POST['email'], PDO::PARAM_STR);
//     $stmt->bindPARAM(2, $email, PDO::PARAM_STR);
//     $updata = $stmt->execute();
//     if ($updata) {
//         echo "<script>alert('完成修改')</script>";
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php if ((isset($_POST['email']))) {
    echo $_POST['email'];
}
?>

<body>
    <form action="test2.php" method="post">
        <input type="text" name="email" id="" value="<?php echo $rs['email']?>">
        <input type="submit" value="送出">
    </form>
</body>

</html>
<?php
$today = '2013-04-19';
//年
echo date("Y-m-d", strtotime($today . "+3 year"));
//月
echo date("Y-m-d", strtotime($today . "-1 month"));
//週
echo date("Y-m-d", strtotime($today . "+10 week"));
//日
echo date("Y-m-d", strtotime($today . "+10 day"));
//時
echo date("Y-m-d", strtotime($today . "+2 hour"));
//分
echo date("Y-m-d", strtotime($today . "+20 minute"));
//秒
echo date("Y-m-d", strtotime($today . "+5 seconds"));
?>