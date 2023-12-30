<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container row">
        <form action="insertdata.php" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ma Nganh</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="txtMaNganh">
            </div>
            <button name="btnSearch" type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <?php
    include("hoso.php");

    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">manganh</th>
                <th scope="col">matohop</th>
                <th scope="col">diem</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['btnSearch'])) {
                if ($_POST['txtMaNganh'] != "") {
                    $ds = DiemNganhHoc::GetAll($_POST['txtMaNganh']);
                    indanhsach($ds);
                }
            }
            function indanhsach($ds)
            {
                $i = 0;
                foreach ($ds as $item) {
                    echo $i;
                    $i++;
                    ?>
                    <tr>
                        <td>
                            <?php echo $item->manganh ?>
                        </td>
                        <td>
                            <?php echo $item->matohop ?>
                        </td>
                        <td>
                            <?php echo $item->diem ?>
                        </td>
                        <td>
                            <a href="dshoso.php?action=1&mahoso=<?php echo $item->manganh ?>">Edit</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>