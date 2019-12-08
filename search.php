<form action="product_result.php" method="get">
    <div class="input-group">
        <div class="input-group-append">
            <select name="order_class">
                <?php
                $result2 = $linkSQL->query("select distinct order_class from orderdata");
                ?>
                <option selected value="order_class">選擇工具類別</option>
                <?php while ($rs2 = $result2->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $rs2['order_class']; ?>"><?php echo $rs2['order_class']; ?></option>
                <?php } ?>

            </select>
        </div>
        <input type="text" class="form-control" name="serch" aria-label="Text input with dropdown button shadow" placeholder="請輸入關鍵字">
        <input class="btn btn-outline-primary btn-primary shadow" type="submit" href="product_result.php" value="搜尋"></input>
    </div>
</form>