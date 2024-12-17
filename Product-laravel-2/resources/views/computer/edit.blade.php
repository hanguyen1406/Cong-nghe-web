<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 28px;
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    .form-label {
        font-size: 16px;
        color: #555;
    }

    .form-control {
        font-size: 14px;
        padding: 12px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
    }

    select.form-control {
        font-size: 14px;
        padding: 12px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
        box-sizing: border-box;
        background-color: #fff;
    }

    button[type="submit"] {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    button[type="submit"]:active {
        background-color: #004085;
    }
</style>
<div class="container">
    <h1>Edit Computer</h1>
    <form action="{{ route('computer.update', $computer->id) }}" method="POST">
        @csrf        
        <!-- Computer Name -->
        <div class="mb-3">
            <label for="computer_name" class="form-label">Computer Name</label>
            <input type="text" class="form-control" id="computer_name" name="computer_name" value="{{ $computer->computer_name }}" maxlength="50" required>
        </div>

        <!-- Model -->
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $computer->model }}" maxlength="100" required>
        </div>

        <!-- Operating System -->
        <div class="mb-3">
            <label for="operating_system" class="form-label">Operating System</label>
            <input type="text" class="form-control" id="operating_system" name="operating_system" value="{{ old('operating_system', $computer->operating_system) }}" maxlength="50" required>
        </div>

        <!-- Processor -->
        <div class="mb-3">
            <label for="processor" class="form-label">Processor</label>
            <input type="text" class="form-control" id="processor" name="processor" value="{{ old('processor', $computer->processor) }}" maxlength="50" required>
        </div>

        <!-- Memory -->
        <div class="mb-3">
            <label for="memory" class="form-label">Memory (GB)</label>
            <input type="number" class="form-control" id="memory" name="memory" value="{{ old('memory', $computer->memory) }}" required>
        </div>

        <!-- Available -->
        <div class="mb-3">
            <label for="available" class="form-label">Available</label>
            <select class="form-control" id="available" name="available">
                <option value="1" {{ $computer->available == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $computer->available == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Computer</button>
    </form>
</div>
