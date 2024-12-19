<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Issue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 8px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f8f9fa;
            transition: border 0.3s;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-cancel:hover {
            background-color: #c82333;
        }

        .form-control {
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Issue</h1>
        <form action="{{ route('issue.update', ['id' => $issue->id]) }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="computerId">Computer</label>
                <select id="computerId" name="computer_id" class="form-control" required>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}" 
                            {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>{{ $computer->computer_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="reportedBy">Reported By</label>
                <input type="text" id="reportedBy" name="reported_by" value="{{ $issue->reported_by }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="{{ $issue->description }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="reportedDate">Reported Date</label>
                <input type="datetime-local" id="reportedDate" name="reported_date" 
                    value="{{ \Carbon\Carbon::parse($issue->reported_date)->format('Y-m-d\TH:i') }}" 
                    class="form-control" required>
            </div>

            <div class="form-group">
                <label for="urgency">Urgency</label>
                <select id="urgency" name="urgency" class="form-control" required>
                    <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="Closed" {{ $issue->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <input type="submit" value="Save Changes">
            <button type="button" class="btn-cancel" onclick="window.location.href='/'">Cancel</button>
        </form>
    </div>
</body>
</html>
