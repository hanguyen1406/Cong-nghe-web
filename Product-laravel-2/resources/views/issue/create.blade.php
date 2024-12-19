<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Issue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-create {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-create:hover {
            background-color: #0056b3;
        }
        .btn-cancel {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Create New Issue</h2>
            
            <form action="{{ route('issue.store') }}" method="POST">
                @csrf

                <!-- Computer Selection -->
                <div class="mb-3">
                    <label for="computerId" class="form-label">Computer</label>
                    <select id="computerId" name="computer_id" class="form-control" required>
                        @foreach($computers as $computer)
                            <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Reported By -->
                <div class="mb-3">
                    <label for="reportedBy" class="form-label">Reported By</label>
                    <input type="text" id="reportedBy" name="reported_by" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>
                <!-- Reported Date -->
                <div class="mb-3">
                    <label for="reportedDate" class="form-label">Reported Date</label>
                    <input type="datetime-local" id="reportedDate" name="reported_date" class="form-control" required>
                </div>

                <!-- Urgency -->
                <div class="mb-3">
                    <label for="urgency" class="form-label">Urgency</label>
                    <select id="urgency" name="urgency" class="form-control" required>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="Open">Open</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Resolved">Resolved</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>

                <!-- Form Actions -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn-create">Create Issue</button>
                    <a href="{{ route('issue.index') }}" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
