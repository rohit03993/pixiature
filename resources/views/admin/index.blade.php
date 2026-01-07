<!doctype html>
<html lang="en">
<head>
    <title>Admin - Enrollment Applications | Pixature</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/admin.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <div class="header-content">
                <h1>📋 Enrollment Applications</h1>
                <div class="header-actions">
                    <span class="admin-name">{{ Auth::guard('admin')->user()->name }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="admin-content">
            <!-- Navigation Tabs -->
            <div class="admin-tabs">
                <a href="{{ route('admin.dashboard') }}" class="tab">Dashboard</a>
                <a href="{{ route('admin.applications') }}" class="tab active">Applications</a>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="stats-bar">
                <div class="stat-card">
                    <span class="stat-number">{{ $applications->total() }}</span>
                    <span class="stat-label">Total Applications</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $applications->where('status', 'submitted')->count() }}</span>
                    <span class="stat-label">Pending Review</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $applications->where('status', 'accepted')->count() }}</span>
                    <span class="stat-label">Accepted</span>
                </div>
            </div>

            <div class="table-container">
                <table class="applications-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applications as $application)
                            <tr>
                                <td>#{{ $application->id }}</td>
                                <td><strong>{{ $application->full_name }}</strong></td>
                                <td>{{ $application->email }}</td>
                                <td>{{ $application->phone }}</td>
                                <td>
                                    <span class="status-badge status-{{ $application->status }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td>{{ $application->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.show', $application->id) }}" class="btn-view">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p>No enrollment applications yet.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrapper">
                {{ $applications->links() }}
            </div>
        </div>
    </div>
</body>
</html>

