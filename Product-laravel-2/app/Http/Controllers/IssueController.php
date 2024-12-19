<?php
namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::with('computer')
                    ->orderBy('id', 'desc') // Order by 'id' in descending order
                    ->paginate(10);

        return view('issue.index', compact('issues'));
    }


    public function create()
    {
        $computers = Computer::all(); // Get all available computers
        return view('issue.create', compact('computers'));   
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'computer_id' => 'required|exists:computers,id',
                'reported_by' => 'nullable|string|max:50',
                'reported_date' => 'required|date',
                'description' => 'required|string',  // Ensuring description is required
                'urgency' => 'required|in:Low,Medium,High',
                'status' => 'required|in:Open,In Progress,Resolved',
            ]);

            // Create a new issue using the validated data
            Issue::create([
                'computer_id' => $validated['computer_id'],
                'reported_by' => $validated['reported_by'] ?? null,  // Handle nullable 'reported_by'
                'reported_date' => $validated['reported_date'],
                'description' => $validated['description'],
                'urgency' => $validated['urgency'],
                'status' => $validated['status'],
            ]);
            
            // Redirect back with a success message
            return redirect()->route('issue.index')->with('success', 'Issue created successfully!'.$validated['reported_by']);
            
        } catch (\Exception $e) {
            // Catch any exceptions and return failure message
            return redirect()->route('issue.index')->with('fail', 'Failed to create issue: ' . $e->getMessage());
        }
    }


    public function show($id)
    {
        $issue = Issue::findOrFail($id);
        return view('issue.show', compact('issue'));
    }

    public function edit($id)
    {
        $issue = Issue::findOrFail($id); // Get the issue by ID
        $computers = Computer::all(); // Get all available computers

        // Pass issue and computers to the view
        return view('issue.edit', compact('issue', 'computers'));
    }

    // Handle the form submission for updating the issue
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'computer_id' => 'required|exists:computers,id',  // Validate computer ID
            'reported_by' => 'required|string|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|string|max:1000',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved,Closed',
        ]);

        // Find the issue by ID
        $issue = Issue::findOrFail($id);

        // Update the issue with the validated data
        $issue->update([
            'computer_id' => $request->computer_id,
            'reported_by' => $request->reported_by,
            'reported_date' => $request->reported_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);

        // Redirect back to the issue list with a success message
        return redirect()->route('issue.index')->with('success', 'Issue updated successfully!');
    }

    /**
     * Xóa một Issue.
     */
    public function destroy($id)
    {
        $issue = Issue::find($id);
    
        if ($issue) {
            $issue->delete();
            return redirect()->route('issue.index')->with('success', 'Issue deleted successfully!');
        }
        
        return redirect()->route('issue.index')->with('error', 'Issue not found!');
    }
}

?>