<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : 'Quản lý phòng trọ'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

    </style>
</head>

<body>
    <main class="d-flex vh-100">

        <!-- Sidebar -->
        <nav class="col-2 bg-light">
            <div class="d-flex flex-column h-100 px-4">

                <div class="py-4">
                    <h5 class="text-center">
                        Trang quản trị
                    </h5>
                </div>

                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Tổng quan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/room/index">Quản lý phòng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tenant/index">Quản lý khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <a href="/?controller=logout" class="btn btn-danger mt-auto mb-4"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </div>
        </nav>

        <!-- Nội dung chính -->
        <div class=" col-10 p-3">
            <?= $content; ?>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>