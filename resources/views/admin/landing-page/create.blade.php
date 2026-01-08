<!doctype html>
<html lang="en">
<head>
    <title>Create Section - Pixature Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/admin.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <div class="header-content">
                <h1>➕ Create New Section</h1>
                <div class="header-actions">
                    <a href="{{ route('admin.landing-page.index') }}" class="btn btn-secondary">← Back to Sections</a>
                    <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="admin-content">
            <div class="admin-tabs">
                <a href="{{ route('admin.dashboard') }}" class="tab">Dashboard</a>
                <a href="{{ route('admin.applications') }}" class="tab">Applications</a>
                <a href="{{ route('admin.landing-page.index') }}" class="tab active">Landing Page</a>
            </div>

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.landing-page.store') }}" enctype="multipart/form-data" class="section-form">
                @csrf

                <div class="form-group">
                    <label for="section_key">Section Key *</label>
                    <input type="text" id="section_key" name="section_key" value="{{ old('section_key') }}" required pattern="[a-z0-9_]+" placeholder="e.g., hero, about, features">
                    <small>Unique identifier (lowercase, numbers, underscores only). Example: hero_section, about_us</small>
                </div>

                <div class="form-group">
                    <label for="section_name">Section Name *</label>
                    <input type="text" id="section_name" name="section_name" value="{{ old('section_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Section Image</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <small>Upload an image for this section (Max: 5MB)</small>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="6">{{ old('content') }}</textarea>
                    <small>Main content text for this section</small>
                </div>

                <div class="form-group">
                    <label>Text Fields (JSON format)</label>
                    <textarea id="text_fields" name="text_fields" rows="8" placeholder='{"heading": "Your Heading", "subheading": "Your Subheading", "description": "Your Description"}'>{{ old('text_fields') }}</textarea>
                    <small>Enter text fields as JSON. Example: {"heading": "Title", "subheading": "Subtitle"}</small>
                </div>

                <div class="form-group">
                    <label>Settings (JSON format)</label>
                    <textarea id="settings" name="settings" rows="6" placeholder='{"animation": "fade-in", "color": "#f3704d"}'>{{ old('settings') }}</textarea>
                    <small>Additional settings as JSON (animations, colors, etc.)</small>
                </div>

                <div class="form-group">
                    <label for="display_order">Display Order</label>
                    <input type="number" id="display_order" name="display_order" value="{{ old('display_order', 0) }}" min="0">
                    <small>Lower numbers appear first</small>
                </div>

                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <span>Active (Show on landing page)</span>
                    </label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Create Section</button>
                    <a href="{{ route('admin.landing-page.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

