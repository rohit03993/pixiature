<!doctype html>
<html lang="en">
<head>
    <title>Landing Page Management - Pixature Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/admin.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <div class="header-content">
                <h1>🎨 Landing Page Management</h1>
                <div class="header-actions">
                    <span class="admin-name">Welcome, {{ Auth::guard('admin')->user()->name }}</span>
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
                <a href="{{ route('admin.applications') }}" class="tab">Applications</a>
                <a href="{{ route('admin.landing-page.index') }}" class="tab active">Landing Page</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="section-header">
                <h2>Manage Landing Page Sections</h2>
            </div>

            <div class="sections-grid">
                @forelse($sections as $section)
                    <div class="section-card">
                        <div class="section-card-header">
                            <h3>{{ $section->section_name }}</h3>
                            <span class="section-key">Key: {{ $section->section_key }}</span>
                        </div>
                        
                        @if($section->image_path)
                            <div class="section-image-preview">
                                <img src="{{ Storage::url($section->image_path) }}" alt="{{ $section->section_name }}">
                            </div>
                        @endif

                        <div class="section-content-preview">
                            @php
                                $textFields = $section->text_fields;
                                // Handle if text_fields is a JSON string
                                if (is_string($textFields) && !empty($textFields)) {
                                    $textFields = json_decode($textFields, true);
                                }
                                // Ensure it's an array
                                if (!is_array($textFields)) {
                                    $textFields = [];
                                }
                            @endphp
                            @if(!empty($textFields))
                                @foreach($textFields as $key => $value)
                                    <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> 
                                    {{ is_array($value) ? implode(', ', $value) : (is_string($value) && strlen($value) > 50 ? substr($value, 0, 50) . '...' : $value) }}</p>
                                @endforeach
                            @endif
                            @if($section->content)
                                <p>{{ strlen($section->content) > 100 ? substr($section->content, 0, 100) . '...' : $section->content }}</p>
                            @endif
                        </div>

                        <div class="section-card-footer">
                            <span class="status-badge {{ $section->is_active ? 'active' : 'inactive' }}">
                                {{ $section->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            <a href="{{ route('admin.landing-page.edit', $section->id) }}" class="btn btn-edit">Edit</a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <p>No sections found. <a href="{{ route('admin.landing-page.create') }}">Create your first section</a></p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>

