# PowerShell script to copy images from resources/static-import/images to public/images
# Run this script once to set up images for production builds

$sourceDir = "resources\static-import\images"
$destDir = "public\images"

if (-not (Test-Path $destDir)) {
    New-Item -ItemType Directory -Path $destDir | Out-Null
    Write-Host "Created directory: $destDir" -ForegroundColor Green
}

Copy-Item -Path "$sourceDir\*" -Destination $destDir -Recurse -Force
Write-Host "Images copied successfully from $sourceDir to $destDir" -ForegroundColor Green
Write-Host "You can now run 'npm run build' and the images will work correctly!" -ForegroundColor Cyan

