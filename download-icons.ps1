# Script to download service icons
# Author: AI Assistant
# Date: 2025

Write-Host "Starting icon download..." -ForegroundColor Green

# Create icons directory if it doesn't exist
$iconsDir = "assets/images/icons"
if (!(Test-Path $iconsDir)) {
    New-Item -ItemType Directory -Path $iconsDir -Force | Out-Null
    Write-Host "Created directory: $iconsDir" -ForegroundColor Yellow
}

# List of icon URLs with their filenames
$icons = @{
    "HTML5" = "https://www.w3.org/html/logo/downloads/HTML5_Badge_512.png"
    "CSS3" = "https://upload.wikimedia.org/wikipedia/commons/6/62/CSS3_logo.svg"
    "JavaScript" = "https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png"
    "WordPress" = "https://s.w.org/style/images/about/WordPress-logotype-wmark.png"
    "WooCommerce" = "https://woocommerce.com/wp-content/themes/woo/images/favicon.ico"
    "1C-Bitrix" = "https://www.1c-bitrix.ru/favicon.ico"
    "Ahrefs" = "https://ahrefs.com/favicon.ico"
    "SEMrush" = "https://www.semrush.com/favicon.ico"
    "Serpstat" = "https://serpstat.com/favicon.ico"
    "SimilarWeb" = "https://www.similarweb.com/favicon.ico"
    "Hotjar" = "https://static.hotjar.com/favicon.ico"
    "Yandex-AppMetrica" = "https://appmetrica.yandex.com/favicon.ico"
    "Screaming-Frog" = "https://www.screamingfrog.co.uk/wp-content/uploads/2021/02/sf_favicon.png"
    "Key-Collector" = "https://www.key-collector.ru/favicon.ico"
    "OpenAI" = "https://openai.com/favicon.ico"
    "PageSpeed-Insights" = "https://pagespeed.web.dev/favicon.ico"
    "GTmetrix" = "https://gtmetrix.com/favicon.ico"
    "WebPageTest" = "https://www.webpagetest.org/favicon.ico"
    "Cloudflare" = "https://www.cloudflare.com/favicon.ico"
    "Google-Search-Console" = "https://upload.wikimedia.org/wikipedia/commons/0/09/Google-Search-Console-logo.png"
    "Wix" = "https://www.wix.com/favicon.ico"
    "Squarespace" = "https://www.squarespace.com/favicon.ico"
    "Webflow" = "https://webflow.com/favicon.ico"
    "Shopify" = "https://www.shopify.com/favicon.ico"
}

# Function to determine file extension from URL
function Get-FileExtension {
    param($url)
    
    if ($url -match '\.(png|jpg|jpeg|gif|svg|ico)$') {
        $extension = $matches[1].ToLower()
        if ($extension -eq 'jpeg') { $extension = 'jpg' }
        return ".$extension"
    }
    
    try {
        $response = Invoke-WebRequest -Uri $url -Method Head -TimeoutSec 10
        $contentType = $response.Headers['Content-Type']
        
        switch -Wildcard ($contentType) {
            "*png*" { return ".png" }
            "*jpeg*" { return ".jpg" }
            "*gif*" { return ".gif" }
            "*svg*" { return ".svg" }
            "*ico*" { return ".ico" }
            default { return ".png" }
        }
    }
    catch {
        return ".png"
    }
}

# Download each icon
$successCount = 0
$errorCount = 0

foreach ($service in $icons.Keys) {
    $url = $icons[$service]
    $extension = Get-FileExtension $url
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
    Write-Host "`nIcons are ready to use!" -ForegroundColor Green
}

Write-Host "`nPress any key to exit..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")