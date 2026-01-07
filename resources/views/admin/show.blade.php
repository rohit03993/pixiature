<!doctype html>
<html lang="en">
<head>
    <title>Application #{{ $application->id }} | Pixature Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/admin.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <div class="header-content">
                <h1>Application #{{ $application->id }}</h1>
                <div class="header-actions">
                    <span class="admin-name">{{ Auth::guard('admin')->user()->name }}</span>
                    <a href="{{ route('admin.applications') }}" class="btn-back">← Back to List</a>
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

            <div class="application-header">
                <div class="status-section">
                    <h3>Status</h3>
                    <form method="POST" action="{{ route('admin.updateStatus', $application->id) }}" class="status-form">
                        @csrf
                        <select name="status" class="status-select" onchange="this.form.submit()">
                            <option value="draft" {{ $application->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="submitted" {{ $application->status == 'submitted' ? 'selected' : '' }}>Submitted</option>
                            <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </form>
                </div>
                <div class="meta-info">
                    <p><strong>Submitted:</strong> {{ $application->created_at->format('F d, Y \a\t g:i A') }}</p>
                    <p><strong>Last Updated:</strong> {{ $application->updated_at->format('F d, Y \a\t g:i A') }}</p>
                </div>
            </div>

            <div class="application-details">
                <!-- Basic Details -->
                <div class="detail-section">
                    <h2>Basic Details</h2>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <label>Full Name</label>
                            <p>{{ $application->full_name }}</p>
                        </div>
                        <div class="detail-item">
                            <label>Email</label>
                            <p><a href="mailto:{{ $application->email }}">{{ $application->email }}</a></p>
                        </div>
                        <div class="detail-item">
                            <label>Phone</label>
                            <p><a href="tel:{{ $application->phone }}">{{ $application->phone }}</a></p>
                        </div>
                        <div class="detail-item">
                            <label>Age</label>
                            <p>{{ $application->age ?? 'Not provided' }}</p>
                        </div>
                        <div class="detail-item">
                            <label>City / Country</label>
                            <p>{{ $application->city_country ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>

                <!-- About the Student -->
                <div class="detail-section">
                    <h2>About the Student</h2>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <label>Current Status</label>
                            <p>{{ $application->current_status ? ucfirst(str_replace('_', ' ', $application->current_status)) : 'Not provided' }}</p>
                        </div>
                        <div class="detail-item">
                            <label>Field of Study/Work</label>
                            <p>{{ $application->field_of_study_work ?? 'Not provided' }}</p>
                        </div>
                        <div class="detail-item">
                            <label>Design Experience</label>
                            <p>{{ $application->design_experience ? ucfirst(str_replace('_', ' ', $application->design_experience)) : 'Not provided' }}</p>
                        </div>
                        <div class="detail-item full-width">
                            <label>Design Tools</label>
                            <p>
                                @if($application->design_tools)
                                    @php
                                        $tools = is_string($application->design_tools) ? json_decode($application->design_tools, true) : $application->design_tools;
                                    @endphp
                                    @if(is_array($tools))
                                        {{ implode(', ', array_map(function($tool) { return ucfirst(str_replace('_', ' ', $tool)); }, $tools)) }}
                                    @else
                                        {{ $tools }}
                                    @endif
                                @else
                                    Not provided
                                @endif
                            </p>
                            @if($application->design_tools_others)
                                <p><strong>Others:</strong> {{ $application->design_tools_others }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Interest & Motivation -->
                <div class="detail-section">
                    <h2>Interest & Motivation</h2>
                    <div class="detail-grid">
                        <div class="detail-item full-width">
                            <label>Why Learn Design?</label>
                            <p>
                                @if($application->why_learn_design)
                                    @php
                                        $reasons = is_string($application->why_learn_design) ? json_decode($application->why_learn_design, true) : $application->why_learn_design;
                                    @endphp
                                    @if(is_array($reasons))
                                        {{ implode(', ', array_map(function($reason) { return ucfirst(str_replace('_', ' ', $reason)); }, $reasons)) }}
                                    @else
                                        {{ $reasons }}
                                    @endif
                                @else
                                    Not provided
                                @endif
                            </p>
                        </div>
                        <div class="detail-item full-width">
                            <label>What Excites About Design?</label>
                            <p>{{ $application->what_excites_about_design ?? 'Not provided' }}</p>
                        </div>
                        <div class="detail-item full-width">
                            <label>Want to Learn</label>
                            <p>
                                @if($application->want_to_learn)
                                    @php
                                        $learn = is_string($application->want_to_learn) ? json_decode($application->want_to_learn, true) : $application->want_to_learn;
                                    @endphp
                                    @if(is_array($learn))
                                        {{ implode(', ', array_map(function($item) { return ucfirst(str_replace('_', ' ', $item)); }, $learn)) }}
                                    @else
                                        {{ $learn }}
                                    @endif
                                @else
                                    Not provided
                                @endif
                            </p>
                        </div>
                        <div class="detail-item full-width">
                            <label>Want to Achieve</label>
                            <p>{{ $application->want_to_achieve ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Expectations & Practical Info -->
                <div class="detail-section">
                    <h2>Expectations & Practical Info</h2>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <label>Weekly Time Commitment</label>
                            <p>{{ $application->weekly_time_commitment ? ucfirst(str_replace('_', ' ', $application->weekly_time_commitment)) : 'Not provided' }}</p>
                        </div>
                        <div class="detail-item">
                            <label>Has Laptop/Desktop</label>
                            <p>{{ $application->has_laptop_desktop ? ucfirst(str_replace('_', ' ', $application->has_laptop_desktop)) : 'Not provided' }}</p>
                        </div>
                        <div class="detail-item">
                            <label>Preferred Batch Timing</label>
                            <p>{{ $application->preferred_batch_timing ? ucfirst($application->preferred_batch_timing) : 'Not provided' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Financial & Commitment -->
                <div class="detail-section">
                    <h2>Financial & Commitment</h2>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <label>Investment Readiness</label>
                            <p>{{ $application->investment_readiness ? ucfirst(str_replace('_', ' ', $application->investment_readiness)) : 'Not provided' }}</p>
                        </div>
                        <div class="detail-item">
                            <label>How Heard About Course</label>
                            <p>{{ $application->how_heard_about_course ? ucfirst($application->how_heard_about_course) : 'Not provided' }}</p>
                            @if($application->how_heard_other)
                                <p><strong>Other:</strong> {{ $application->how_heard_other }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Final -->
                @if($application->questions_or_share)
                <div class="detail-section">
                    <h2>Additional Questions/Notes</h2>
                    <div class="detail-item full-width">
                        <p>{{ $application->questions_or_share }}</p>
                    </div>
                </div>
                @endif
            </div>

            <div class="action-buttons">
                <form method="POST" action="{{ route('admin.delete', $application->id) }}" onsubmit="return confirm('Are you sure you want to delete this application?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Delete Application</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

