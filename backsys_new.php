<?php include('SQL_link.php'); ?>
<?php
$result = $linkSQL->query("select * from news");
?>
<?php
if (!isset($_SESSION['backsyslogin']) == "1") {
	echo "<script>alert('沒有權限，請登入管理帳號')</script>";
	$url = "backsys_index.php";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}
?>
<?php
if ((isset($_GET['news_id']))) {
	$delnews = $linkSQL->query("delete from news where news_id=" . $_GET['news_id']);
	if ($delnews) {
		$deleteGoTo = "backsys_new.php";
		header(sprintf("Location: %s", $deleteGoTo));
	}
}
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">

<head>
	<?php include('head_link.php'); ?>
	<title>工具借借-後台管理系統</title>
</head>

<body>
	<!-- 導覽列導入 -->
	<?php include('backsys_nav.php'); ?>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="box p-3 pb-5 mb-5 mt-7 rounded col-md-8 col-sm-12">
				<br>
				<a class="btn btn-primary btn-block" href="backsys_newadd.php" role="button">新增消息</a>
				<br>
				<div class="row align-items-center mt-3 mx-auto justify-content-center">
					<form action="" method="post">
						<table class="rwd-table table-hover table table-striped table-bordered table-sm">
							<thead class="thead-light">
								<tr>
									<th>日期：</th>
									<th>公告標題：</th>
									<th>公告內容：</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<?php while ($rs = $result->fetch(PDO::FETCH_ASSOC)) { ?>
								<tbody>
									<tr>
										<td data-th="日期："><?php echo $rs['news_time']; ?></td>
										<td data-th="公告標題："><?php echo $rs['news_title']; ?></td>
										<td data-th="公告內容："><?php echo mb_substr($rs['news_content'], 0, 13, "utf8") . "..." ?></td>
										<td>
											<a class="btn btn-secondary mx-auto td_ml" href="backsys_newfix.php?news_id=<?php echo $rs['news_id']; ?>">
												修改
											</a>
										</td>
										<td>
											<a class="btn btn-danger mx-auto td_ml" href="backsys_new.php?news_id=<?php echo $rs['news_id']; ?>" onclick="return confirm('使否確定要執行刪除動作？')">
												刪除
											</a>
										</td>
									</tr>
								</tbody>
							<?php } ?>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- footer導入 -->
	<?php include('backsys_footer.php'); ?>
</body>
<?php include('js_link.php'); ?>

</html>