<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'worker');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('job')) {
            $query->where('job_name', $request->job);
        }

        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }

        $workers = $query->paginate(12)->withQueryString();

        // Complete list of job categories
        $jobs = collect([
            'Mason', 'Electrician', 'Plumber', 'Carpenter', 'Painter', 
            'Cleaner', 'Driver', 'Mechanic', 'Gardener', 'Security Guard', 
            'Welder', 'AC Technician', 'Other'
        ])->sort();

        // Complete list of Sri Lankan districts
        $districts = collect([
            'Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Colombo', 
            'Galle', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 
            'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 
            'Matale', 'Matara', 'Monaragala', 'Mullaitivu', 'Nuwara Eliya', 
            'Polonnaruwa', 'Puttalam', 'Ratnapura', 'Trincomalee', 'Vavuniya'
        ])->sort();

        return view('workers.index', compact('workers', 'jobs', 'districts'));
    }

    public function show(User $worker)
    {
        if ($worker->role !== 'worker') {
            abort(404);
        }

        return view('workers.show', compact('worker'));
    }
}
