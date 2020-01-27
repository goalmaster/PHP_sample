<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ろくまる農園</title>
    </head>
    <body>
        <?php

        try
        {
            $staff_code = $_POST['code'];

            $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT FROM mst_staff WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->exective($data);
            $rec = fetch(PDO::FETCH_ASSOC);
            $staff_name = $rec['name'];

            $dbh = null;
        }
        catch(Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>

        スタッフ修正<br />
        <br />
        スタッフコード<br />
        <?php print $staff_code; ?>
        <br />
        <form method="post" action="staff_edit_check.php">
        スタッフ名<br />
        <input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>">
        <br />
        パスワードを入力してください。<br />
        <input type="password" name="pass" style="width:100px">
        <br />
        パスワードをもう1度入力してください。<br />
        <input type="password" name="pass2" style="width:100px">
        <br />
        <br />
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
        </from>

    </body>
</html>