<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .form-label {
        font-weight: bold;
        color: #555;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 4px;
        color: #fff;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.02);
    }

    .btn-primary:active {
        background-color: #004494;
    }

    .mb-3 {
        margin-bottom: 15px;
    }

    select.form-control {
        padding: 10px;
        font-size: 14px;
        cursor: pointer;
    }
</style>
<div class="container">
    <h1>Create New Computer</h1>
    <form action="{{ route('computer.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="computer_name" class="form-label">Computer Name</label>
            <input type="text" class="form-control" id="computer_name" name="computer_name" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model" maxlength="100" required>
        </div>

        <div class="mb-3">
            <label for="operating_system" class="form-label">Operating System</label>
            <input type="text" class="form-control" id="operating_system" name="operating_system" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="processor" class="form-label">Processor</label>
            <input type="text" class="form-control" id="processor" name="processor" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="memory" class="form-label">Memory (GB)</label>
            <input type="number" class="form-control" id="memory" name="memory" required>
        </div>

        <div class="mb-3">
            <label for="available" class="form-label">Available</label>
            <select class="form-control" id="available" name="available">
                <option value="1" selected>Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Computer</button>
    </form>
</div>

