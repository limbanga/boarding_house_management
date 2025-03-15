<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm khách hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Thêm khách hàng</h2>
        <form id="addTenantForm">
            <div class="mb-3">
                <label class="form-label">Tên khách hàng</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm khách hàng</button>
        </form>
        <div id="message" class="mt-3"></div>
    </div>

    <script>
        $(document).ready(function() {
            $("#addTenantForm").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/tenant/store",
                    data: $(this).serialize(),
                    success: function(response) {
                        $("#message").html('<div class="alert alert-success">Thêm thành công!</div>');
                        $("#addTenantForm")[0].reset();
                    },
                    error: function() {
                        $("#message").html('<div class="alert alert-danger">Lỗi! Không thể thêm khách hàng.</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
