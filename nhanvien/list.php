<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
    <div class="box">
    <div class="box-header">
    <h3 class="box-title">Danh sách nhân viên</h3>
    <div class="box-tools">
    <form class="form-inline" action="" method="post">
        <div class="input-group input-group-sm" style="width: 200px; margin-top:5px;">
        <input type="text" name="search" class="form-control" placeholder="Search">
        </div>
        <button style="margin-top:5px;" type="submit" name="tk" id="" class="btn btn-primary btn-sm">Tìm kiếm</button>
        </div>
    </form>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php if($i == 1  && $_POST['search'] != "" ){ ?>
    <p>Kết quả tím kiếm cho <strong><em><?php echo $_POST['search'] ?></em></strong> </p>
    <?php } ?>
        <table class="table table-bordered">
        <tbody>
        <tr>
            <th style="width: 10px">#</th>
            <th>Email</th>
            <th>Tên đầy đủ</th>
            <th style="width: 100px">Ảnh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Giới tính</th>
            <th >Quyền</th>
            <th style="width: 120px">
            <a href="<?= $ADMIN_URL?>nhanvien/add.php"
                class="btn btn-xs btn-success"
                >
                Thêm
            </a>
            </th>
        </tr>
        <?php foreach ($users as $u): ?>
            <tr>
            <td><?= $u['id']?></td>
            <td><?= $u['email']?></td>
            <td>
                <?= $u['fullname']?>
            </td>
            <td>
                <img src="<?= SITE_URL.$u['avatar'] ?>" width="50">
            </td>
            <td><?= $u['address']?></td>
            <td><?= $u['phone_number']?></td>
            <td><?= $u['gender'] ==1 ? "Nam": "Nữ"; ?></td>
            <td>
                <?php foreach (USER_ROLES as $key => $value): ?>
                <?php if ($value == $u['role']): ?>
                    <?= $key ?>
                <?php endif ?>
                <?php endforeach ?>
            </td>
            <td>
                <a href="<?= $ADMIN_URL?>nhanvien/edit.php?id=<?= $u['id']?>"
                class="btn btn-xs btn-primary"
                >
                Sửa
                </a>
                <a href="javascript:;"
                linkurl="<?= $ADMIN_URL?>nhanvien/remove.php?id=<?= $u['id']?>"
                class="btn btn-xs btn-danger btn-remove"
                >
                Xoá
                </a>
            </td>
            </tr>
        <?php endforeach ?>
        </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    </div>
</div>
</div>
</section>
    <!-- /.content -->