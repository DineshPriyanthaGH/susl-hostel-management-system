<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students - SUSL Hostel Management</title>
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
            max-width: 1400px;
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
            overflow-y: auto;
        }
        
        .page-title {
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .btn-action {
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            border: none;
        }
        
        .btn-primary-custom {
            background-color: #4a6cf7;
            color: white;
        }
        
        .btn-success-custom {
            background-color: #28a745;
            color: white;
        }
        
        .btn-info-custom {
            background-color: #17a2b8;
            color: white;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            color: white;
        }
        
        .students-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .table {
            margin: 0;
        }
        
        .table th {
            background-color: #f8f9fa;
            border: none;
            color: #2c3e50;
            font-weight: 600;
            padding: 15px;
        }
        
        .table td {
            border: none;
            padding: 12px 15px;
            vertical-align: middle;
        }
        
        .table tbody tr {
            border-bottom: 1px solid #e9ecef;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .btn-sm-custom {
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 5px;
            margin: 2px;
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
            
            .table-responsive {
                font-size: 14px;
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
                    <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Dashboard</a>
                </div>
            </div>
            
            <!-- Content -->
            <div class="content-wrapper">
                <div class="content-container">
                    <h2 class="page-title">All Student Records</h2>
                    
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
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('student.details.create') }}" class="btn-action btn-primary-custom">
                            <i class="fas fa-plus"></i> Add New Student
                        </a>
                        <a href="{{ route('student.details.search') }}" class="btn-action btn-info-custom">
                            <i class="fas fa-search"></i> Search Student
                        </a>
                        <a href="{{ route('student.details.pdf.page') }}" class="btn-action btn-success-custom" target="_blank">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </a>
                    </div>
                    
                    <!-- Students Table -->
                    <div class="students-table">
                    <div class="students-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Faculty</th>
                                        <th>Phone</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}</td>
                                            <td><strong>{{ $student->student_id }}</strong></td>
                                            <td>{{ $student->title }} {{ $student->full_name }}</td>
                                            <td>{{ $student->faculty }}</td>
                                            <td>{{ $student->telephone_number }}</td>
                                            <td>{{ $student->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('student.details.show', $student->id) }}" class="btn btn-info btn-sm-custom" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('student.details.edit', $student->id) }}" class="btn btn-warning btn-sm-custom" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('student.details.destroy', $student->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this student record?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm-custom" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <div class="py-4">
                                                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                                    <h5 class="text-muted">No Students Found</h5>
                                                    <p class="text-muted">No student records have been added yet.</p>
                                                    <a href="{{ route('student.details.create') }}" class="btn btn-primary">Add First Student</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        @if($students->hasPages())
                            <div class="d-flex justify-content-center p-3">
                                {{ $students->links() }}
                            </div>
                        @endif
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
            console.log('DOM loaded, setting up PDF export functionality...');
            
            // Get modal element
            const exportModal = document.getElementById('exportModal');
            const hostelSelect = document.getElementById('hostelSelect');
            const yearSelect = document.getElementById('yearSelect');
            const generateBtn = document.getElementById('generatePDFBtn');
            const previewInfo = document.getElementById('previewInfo');
            const studentCount = document.getElementById('studentCount');
            
            // Check if elements exist
            if (!exportModal || !hostelSelect || !generateBtn) {
                console.error('Required elements not found');
                return;
            }
            
            console.log('All elements found successfully');
            
            // Load hostel options when modal opens
            exportModal.addEventListener('show.bs.modal', function (event) {
                console.log('Modal opening, loading hostel options...');
                loadHostelOptions();
            });
            
            // Load available hostels from API
            function loadHostelOptions() {
                console.log('Loading hostel options...');
                
                // Add some default hostels first
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
                        } else {
                            console.log('No hostels returned from API, using defaults');
                        }
                    })
                    .catch(error => {
                        console.error('Error loading hostels:', error);
                        addDefaultHostels();
                    });
            }
            
            // Add default hostels if API fails
            function addDefaultHostels() {
                const defaultHostels = ['Main Hostel', 'New Hostel', 'Hostel A', 'Hostel B', 'Hostel C'];
                
                // Check if we already have these options
                const existingOptions = Array.from(hostelSelect.options).map(opt => opt.value);
                
                defaultHostels.forEach(hostel => {
                    if (!existingOptions.includes(hostel)) {
                        const option = document.createElement('option');
                        option.value = hostel;
                        option.textContent = hostel;
                        hostelSelect.appendChild(option);
                    }
                });
                console.log('Added default hostels');
            }
            
            // Enable/disable generate button based on selection
            hostelSelect.addEventListener('change', function() {
                console.log('Hostel changed to:', this.value);
                
                if (this.value) {
                    generateBtn.disabled = false;
                    generateBtn.classList.remove('btn-secondary');
                    generateBtn.classList.add('btn-success');
                    
                    // Show preview info
                    if (previewInfo) {
                        previewInfo.style.display = 'block';
                        updateStudentCount();
                    }
                } else {
                    generateBtn.disabled = true;
                    generateBtn.classList.remove('btn-success');
                    generateBtn.classList.add('btn-secondary');
                    
                    if (previewInfo) {
                        previewInfo.style.display = 'none';
                    }
                }
            });
            
            // Update student count preview
            function updateStudentCount() {
                const hostel = hostelSelect.value;
                const year = yearSelect ? yearSelect.value : 'all';
                
                if (studentCount) {
                    if (hostel === 'all') {
                        studentCount.textContent = 'All available';
                    } else {
                        studentCount.textContent = 'Selected';
                    }
                }
            }
            
            // Also listen for year changes to update preview
            if (yearSelect) {
                yearSelect.addEventListener('change', function() {
                    console.log('Year changed to:', this.value);
                    if (hostelSelect.value) {
                        updateStudentCount();
                    }
                });
            }
        });
        
        // Generate PDF function (global scope for onclick)
        function generatePDF() {
            console.log('Generate PDF function called');
            
            const hostelSelect = document.getElementById('hostelSelect');
            const yearSelect = document.getElementById('yearSelect');
            const generateBtn = document.getElementById('generatePDFBtn');
            
            if (!hostelSelect || !generateBtn) {
                console.error('Required elements not found for PDF generation');
                alert('Error: PDF generation elements not found. Please refresh the page.');
                return;
            }
            
            const hostel = hostelSelect.value;
            const year = yearSelect ? yearSelect.value : 'all';
            
            console.log('Generating PDF with:', { hostel, year });
            
            if (!hostel) {
                alert('Please select a hostel option.');
                return;
            }
            
            // Show loading state
            const originalText = generateBtn.innerHTML;
            generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';
            generateBtn.disabled = true;
            
            // Create the URL manually to ensure it works
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
            
            // Reset button after a short delay
            setTimeout(() => {
                generateBtn.innerHTML = originalText;
                generateBtn.disabled = false;
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('exportModal'));
                if (modal) {
                    modal.hide();
                }
            }, 2000);
        }
        
        // Test function for debugging
        function testPDFExport() {
            console.log('Testing PDF export...');
            const testUrl = '{{ route("student.details.export.pdf") }}?hostel=all&year=all';
            console.log('Test URL:', testUrl);
            window.open(testUrl, '_blank');
        }
        
        // Add test button to console
        console.log('PDF Export Debug Functions Available:');
        console.log('- testPDFExport() - Test PDF generation');
        console.log('- generatePDF() - Generate PDF from modal');
    </script>
</body>
</html>
