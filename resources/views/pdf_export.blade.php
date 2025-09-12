<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export PDF - SUSL Hostel Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background: #f0f0f0;
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
        }
        
        .container {
            position: relative;
            width: 95%;
            max-width: 1200px;
            margin: 20px auto;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
        }
        
        .background-div {
            background-color: #FFFFFF;
            height: 100%;
            border-radius: 50px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .header {
            min-height: 150px;
            background-color: #E3E3E3;
            border-radius: 50px;
            color: #000000ff;
            padding: 20px;
            display: flex;
            align-items: center;
            position: relative;
            box-shadow: 0 4px 10px rgba(153, 153, 153, 0.5);
            z-index: 2;
            margin-bottom: 40px;
            margin-top: 10px;
            flex-shrink: 0;
        }
        
        .logo {
            height: 130px;
            width: auto;
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }
        
        .text-container {
            margin-left: 180px;
            width: calc(100% - 150px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .university-name {
            font-weight: 700;
            font-size: 32px;
            margin: 0;
            line-height: 1.5;
        }
        
        .system-name {
            font-size: 26px;
            margin: 5px 0 0 0;
            color: #2c3e50;
            font-weight: 500;
        }
        
        .back-btn {
            background-color: #4a6cf7;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .back-btn:hover {
            background-color: #3a5cd8;
            transform: translateY(-2px);
            color: white;
        }
        
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
            position: relative;
            z-index: 3;
        }
        
        .content-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            margin-bottom: 40px;
            flex: 1;
        }
        
        .page-title {
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        
        .export-form {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .btn-action {
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            border: none;
            font-size: 16px;
        }
        
        .btn-success-custom {
            background-color: #28a745;
            color: white;
        }
        
        .btn-success-custom:hover {
            background-color: #218838;
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-success-custom:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
            transform: none;
        }
        
        .preview-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            border-left: 4px solid #007bff;
        }
        
        .bottom-div {
            background-color: #E3E3E3;
            height: 110px;
            position: relative;
            width: 100%;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            padding: 0 40px;
            margin-bottom: 10px;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1200px;
        }
        
        .copyright-section {
            display: flex;
            align-items: center;
        }
        
        .copyright_logo {
            height: 40px;
            width: auto;
            margin-right: 15px;
        }
        
        .copyright {
            font-weight: 300;
            font-size: 18px;
            line-height: 1.2;
            margin: 0;
        }
        
        .contact-link {
            color: #009DFF;
            text-decoration: none;
            font-weight: 500;
            font-size: 18px;
            transition: all 0.3s;
        }
        
        .contact-link:hover {
            text-decoration: underline;
            color: #007acc;
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 80px 20px 20px 20px;
                text-align: center;
            }
            
            .logo {
                position: absolute;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                height: 80px;
            }
            
            .text-container {
                margin-left: 0;
                width: 100%;
                margin-top: 70px;
                flex-direction: column;
                gap: 15px;
            }
            
            .university-name {
                font-size: 22px;
            }
            
            .system-name {
                font-size: 18px;
            }
            
            .content-container {
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <div class="container-wrapper">
        <div class="container">
            <!-- Background div -->
            <div class="background-div"></div>
            
            <!-- Header -->
            <div class="header">
                <img src="{{ asset('images/logo.png') }}" alt="University Logo" class="logo">
                <div class="text-container">
                    <div>
                        <div class="university-name">Sabaragamuwa University of Sri Lanka</div>
                        <div class="system-name">Hostel Management System</div>
                    </div>
                    <a href="{{ route('student.details.index') }}" class="back-btn">Back to Students</a>
                </div>
            </div>
            
            <!-- Content -->
            <div class="content-wrapper">
                <div class="content-container">
                    <h2 class="page-title">
                        <i class="fas fa-file-pdf text-danger"></i> Export Students to PDF
                    </h2>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <!-- Export Form -->
                    <div class="export-form">
                        <form id="exportForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hostelSelect" class="form-label">
                                            <i class="fas fa-building text-primary"></i> Select Hostel
                                        </label>
                                        <select class="form-select form-select-lg" id="hostelSelect" name="hostel" required>
                                            <option value="">Choose hostel...</option>
                                            <option value="all">All Hostels</option>
                                            <!-- Options will be loaded dynamically -->
                                        </select>
                                        <div class="form-text">Select a specific hostel or choose "All Hostels" for complete report</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="yearSelect" class="form-label">
                                            <i class="fas fa-graduation-cap text-primary"></i> Academic Year
                                        </label>
                                        <select class="form-select form-select-lg" id="yearSelect" name="year">
                                            <option value="all">All Years</option>
                                            <option value="first">First Year</option>
                                            <option value="second">Second Year</option>
                                            <option value="third">Third Year</option>
                                            <option value="fourth">Fourth Year</option>
                                        </select>
                                        <div class="form-text">Filter by specific academic year (optional)</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-action btn-success-custom" onclick="generatePDF()" id="generatePDFBtn" disabled>
                                            <i class="fas fa-download"></i> Generate & Download PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Preview Section -->
                        <div class="preview-section" id="previewInfo" style="display: none;">
                            <h5><i class="fas fa-eye"></i> Export Preview</h5>
                            <p class="mb-1"><strong>Selected Hostel:</strong> <span id="selectedHostel">-</span></p>
                            <p class="mb-1"><strong>Academic Year:</strong> <span id="selectedYear">-</span></p>
                            <p class="mb-0"><strong>Estimated Students:</strong> <span id="studentCount">-</span></p>
                        </div>
                    </div>
                    
                    <!-- Information Section -->
                    <div class="alert alert-info">
                        <h5><i class="fas fa-info-circle"></i> PDF Export Information</h5>
                        <ul class="mb-0">
                            <li><strong>Complete Details:</strong> The PDF will include complete student details with contact information</li>
                            <li><strong>Hostel Organization:</strong> Students will be organized by hostel assignment</li>
                            <li><strong>Full History:</strong> All years of hostel history will be shown for each student</li>
                            <li><strong>Professional Format:</strong> Perfect for administrative reports and record keeping</li>
                            <li><strong>SUSL Branding:</strong> Official university letterhead and formatting</li>
                        </ul>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="text-center">
                        <a href="{{ route('student.details.index') }}" class="btn btn-outline-primary me-2">
                            <i class="fas fa-users"></i> Back to Student List
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home"></i> Admin Dashboard
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bottom-div">
                <div class="footer-content">
                    <div class="copyright-section">
                        <img src="{{ asset('images/Copyright.png') }}" alt="Copyright Logo" class="copyright_logo">
                        <div class="copyright">Copyrights SUSL 2025. All Rights Reserved.</div>
                    </div>
                    <div class="contact-section">
                        <a href="{{ route('contact.us') }}" class="contact-link">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Wait for DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('PDF Export page loaded');
            
            // Get elements
            const hostelSelect = document.getElementById('hostelSelect');
            const yearSelect = document.getElementById('yearSelect');
            const generateBtn = document.getElementById('generatePDFBtn');
            const previewInfo = document.getElementById('previewInfo');
            
            // Load hostel options on page load
            loadHostelOptions();
            
            // Load available hostels from API
            function loadHostelOptions() {
                console.log('Loading hostel options...');
                
                // Add default hostels first
                addDefaultHostels();
                
                fetch('{{ route("api.hostel.options") }}')
                    .then(response => {
                        console.log('API Response status:', response.status);
                        if (!response.ok) {
                            throw new Error('Network response was not ok: ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Hostel data received:', data);
                        
                        // Store the current default options
                        const chooseOption = hostelSelect.querySelector('option[value=""]');
                        const allHostelsOption = hostelSelect.querySelector('option[value="all"]');
                        
                        // Clear all options
                        hostelSelect.innerHTML = '';
                        
                        // Re-add default options
                        if (chooseOption) hostelSelect.appendChild(chooseOption);
                        if (allHostelsOption) hostelSelect.appendChild(allHostelsOption);
                        
                        // Add hostel options from API
                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(hostel => {
                                const option = document.createElement('option');
                                option.value = hostel;
                                option.textContent = hostel;
                                hostelSelect.appendChild(option);
                            });
                            console.log('Added', data.length, 'hostels from API');
                        }
                    })
                    .catch(error => {
                        console.error('Error loading hostels:', error);
                    });
            }
            
            // Add default hostels if API fails
            function addDefaultHostels() {
                const defaultHostels = ['Main Hostel', 'New Hostel', 'Hostel A', 'Hostel B', 'Hostel C'];
                
                defaultHostels.forEach(hostel => {
                    const option = document.createElement('option');
                    option.value = hostel;
                    option.textContent = hostel;
                    hostelSelect.appendChild(option);
                });
                console.log('Added default hostels');
            }
            
            // Enable/disable generate button based on selection
            hostelSelect.addEventListener('change', function() {
                console.log('Hostel changed to:', this.value);
                updatePreview();
            });
            
            yearSelect.addEventListener('change', function() {
                console.log('Year changed to:', this.value);
                updatePreview();
            });
            
            function updatePreview() {
                const hostel = hostelSelect.value;
                const year = yearSelect.value;
                
                if (hostel) {
                    generateBtn.disabled = false;
                    generateBtn.classList.remove('btn-secondary');
                    generateBtn.classList.add('btn-success-custom');
                    
                    // Show preview
                    previewInfo.style.display = 'block';
                    document.getElementById('selectedHostel').textContent = hostel === 'all' ? 'All Hostels' : hostel;
                    document.getElementById('selectedYear').textContent = year === 'all' ? 'All Years' : year.charAt(0).toUpperCase() + year.slice(1) + ' Year';
                    document.getElementById('studentCount').textContent = hostel === 'all' ? 'All available students' : 'Students in selected hostel';
                } else {
                    generateBtn.disabled = true;
                    generateBtn.classList.remove('btn-success-custom');
                    generateBtn.classList.add('btn-secondary');
                    previewInfo.style.display = 'none';
                }
            }
        });
        
        // Generate PDF function
        function generatePDF() {
            console.log('Generate PDF function called');
            
            const hostelSelect = document.getElementById('hostelSelect');
            const yearSelect = document.getElementById('yearSelect');
            const generateBtn = document.getElementById('generatePDFBtn');
            
            if (!hostelSelect || !generateBtn) {
                console.error('Required elements not found');
                alert('Error: Required elements not found. Please refresh the page.');
                return;
            }
            
            const hostel = hostelSelect.value;
            const year = yearSelect.value;
            
            console.log('Generating PDF with:', { hostel, year });
            
            if (!hostel) {
                alert('Please select a hostel option.');
                return;
            }
            
            // Show loading state
            const originalText = generateBtn.innerHTML;
            generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';
            generateBtn.disabled = true;
            
            // Create the URL
            const exportUrl = '{{ route("student.details.export.pdf") }}';
            const params = new URLSearchParams();
            params.append('hostel', hostel);
            params.append('year', year);
            
            const fullUrl = exportUrl + '?' + params.toString();
            console.log('Opening PDF URL:', fullUrl);
            
            // Open in new window/tab to trigger download
            const newWindow = window.open(fullUrl, '_blank');
            
            if (!newWindow) {
                alert('Pop-up blocked. Please allow pop-ups for this site and try again.');
            }
            
            // Reset button after a delay
            setTimeout(() => {
                generateBtn.innerHTML = originalText;
                generateBtn.disabled = false;
            }, 3000);
        }
    </script>
</body>
</html>
