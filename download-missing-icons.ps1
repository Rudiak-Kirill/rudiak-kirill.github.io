# Script to download missing service icons from reliable sources
# Author: AI Assistant
# Date: 2025

Write-Host "Downloading missing icons from reliable sources..." -ForegroundColor Green

# Create icons directory if it doesn't exist
$iconsDir = "assets/images/icons"
if (!(Test-Path $iconsDir)) {
    New-Item -ItemType Directory -Path $iconsDir -Force | Out-Null
    Write-Host "Created directory: $iconsDir" -ForegroundColor Yellow
}

# List of missing icon URLs with their filenames
$missingIcons = @{
    "WooCommerce" = "https://cdn.simpleicons.org/woocommerce"
    "PageSpeed-Insights" = "https://cdn.simpleicons.org/pagespeedinsights"
    "Google-Search-Console" = "https://cdn.simpleicons.org/googlesearchconsole"
    "OpenAI" = "https://cdn.simpleicons.org/openai"
    "Hotjar" = "https://cdn.simpleicons.org/hotjar"
    "Yandex-AppMetrica" = "https://cdn.simpleicons.org/yandex"
    "Screaming-Frog" = "https://upload.wikimedia.org/wikipedia/en/thumb/6/6e/Screaming_Frog_logo.png/240px-Screaming_Frog_logo.png"
}

# Download each missing icon
$successCount = 0
$errorCount = 0

foreach ($service in $missingIcons.Keys) {
    $url = $missingIcons[$service]
    
    # Determine file extension
    if ($url -like "*.png*") {
        $extension = ".png"
    } else {
        $extension = ".svg"
    }
    
    $fileName = "$service$extension"
    $filePath = Join-Path $iconsDir $fileName
    
    try {
        Write-Host "Downloading $service..." -ForegroundColor Cyan -NoNewline
        
        Invoke-WebRequest -Uri $url -OutFile $filePath -TimeoutSec 30
        
        $fileSize = (Get-Item $filePath).Length
        if ($fileSize -gt 0) {
            $sizeKB = [math]::Round($fileSize/1KB, 1)
            Write-Host " OK ($sizeKB KB)" -ForegroundColor Green
            $successCount++
        } else {
            Write-Host " FAILED (empty file)" -ForegroundColor Red
            $errorCount++
            Remove-Item $filePath -Force
        }
    }
    catch {
        Write-Host " FAILED ($($_.Exception.Message))" -ForegroundColor Red
        $errorCount++
    }
}

# Final statistics
Write-Host "`nDownload Statistics:" -ForegroundColor Magenta
Write-Host "  Success: $successCount icons" -ForegroundColor Green
Write-Host "  Errors: $errorCount icons" -ForegroundColor Red
Write-Host "  Directory: $iconsDir" -ForegroundColor Yellow

if ($successCount -gt 0) {
    Write-Host "`nMissing icons downloaded successfully!" -ForegroundColor Green
}

Write-Host "`nPress any key to exit..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")




