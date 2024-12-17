<head>
    <!-- Link tới Bootstrap CSS từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv6nB0XfWDA9yMvXs8ftdOj6gSjhZmT9Fp+I4bjjS0mW9NCOF53uXYgdj34" crossorigin="anonymous">

    <style>
        /* Căn giữa toàn bộ nội dung */
        body {
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* Tùy chỉnh CSS cho bảng */
        .table-container {
            width: 100%;
            margin-top: 20px;
            display:flex;
            justify-content: center;
        }

        .table {
            font-size: 16px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
        }

        .thead-dark {
            background-color: #343a40;
            color: #fff;
        }

        .table-bordered {
            border: 1px solid #ddd;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 8px 15px;
            margin: 2px;
        }

        .btn-sm {
            font-size: 14px;
            padding: 5px 10px;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <h1 class="mb-4 text-center">Danh Sách Máy Tính</h1>
    <a href="{{ route('computer.create') }}" class="btn btn-primary mb-3 d-block mx-auto">Thêm Máy Tính</a>  <!-- Nút để thêm máy tính mới -->
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover mx-auto">
            <thead class="thead-dark">
                <tr>
                    <th>Tên Máy Tính</th>
                    <th>Model</th>
                    <th>Hệ Điều Hành</th>
                    <th>Vi xử lý</th>
                    <th>Bộ nhớ</th>
                    <th>Trạng thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($computers as $computer)
                    <tr>
                        <td>{{ $computer->computer_name }}</td>
                        <td>{{ $computer->model }}</td>
                        <td>{{ $computer->operating_system }}</td>
                        <td>{{ $computer->processor }}</td>
                        <td>{{ $computer->memory }} GB</td>
                        <td>{{ $computer->available ? 'Có sẵn' : 'Không có sẵn' }}</td>
                        <td>
                            <a href="{{ route('computer.show', $computer->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this computer?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
