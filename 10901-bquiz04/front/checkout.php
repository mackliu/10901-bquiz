<h2 class="ct">填寫資料</h2>
<?php
$mem=$Mem->find(['acc'=>$_SESSION['mem']]);
?>
<form action="api/checkout.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp"><?=$_SESSION['mem'];?></td>
            <input type="hidden" name="acc" value="<?=$_SESSION['mem'];?>" >
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$mem['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$mem['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$mem['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$mem['tel'];?>"></td>
        </tr>
    </table>
    <table class="all">
        <tr class="tt ct">
            <td>編號</td>
            <td>商品名稱</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        <?php
        $total=0;
        foreach($_SESSION['cart'] as $id => $qt){
            $g=$Goods->find($id);
        ?>
        <tr class="pp">
            <td><?=$g['name'];?></td>
            <td><?=$g['no'];?></td>
            <td><?=$qt;?></td>
            <td><?=$g['price'];?></td>
            <td><?=$g['price']*$qt;?></td>
        </tr>
        <?php
        $total=$total+($g['price']*$qt);
        }
        ?>
        <tr class="tt ct">
            <td colspan="5">總價:<?=$total;?></td>
            <input type="hidden" name="total" value="<?=$total;?>">
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="確定送出">
        <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
    
    </div>
</form>