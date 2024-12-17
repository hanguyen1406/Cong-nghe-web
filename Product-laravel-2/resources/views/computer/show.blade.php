<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 26px;
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .list-group {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .list-group-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 15px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f9f9f9;
        transition: background-color 0.3s ease;
    }

    .list-group-item:hover {
        background-color: #e9ecef;
    }

    .list-group-item strong {
        color: #555;
    }

    .btn-secondary {
        display: inline-block;
        text-align: center;
        background-color: #6c757d;
        border: none;
        color: #fff;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
        width: 100%;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: scale(1.02);
    }
</style>
<div class="container">
    <h1>Computer Details</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Computer Name:</strong> {{ $computer->computer_name }}</li>
        <li class="list-group-item"><strong>Model:</strong> {{ $computer->model }}</li>
        <li class="list-group-item"><strong>Operating System:</strong> {{ $computer->operating_system }}</li>
        <li class="list-group-item"><strong>Processor:</strong> {{ $computer->processor }}</li>
        <li class="list-group-item"><strong>Memory (GB):</strong> {{ $computer->memory }}</li>
        <li class="list-group-item"><strong>Available:</strong> {{ $computer->available ? 'Yes' : 'No' }}</li>
    </ul>
    <a href="{{ route('computer.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
