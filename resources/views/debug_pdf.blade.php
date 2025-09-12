<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Export Debug - SUSL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4><i class="fas fa-bug"></i> PDF Export Debug Panel</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Session Status -->
                        <div class="alert alert-info">
                            <h5><i class="fas fa-user-shield"></i> Session Status</h5>
                            <p><strong>Admin Logged In:</strong> {{ Session::get('admin_logged_in') ? 'Yes' : 'No' }}</p>
                            <p><strong>Admin User ID:</strong> {{ Session::get('admin_user_id', 'Not Set') }}</p>
                            <p><strong>Current Time:</strong> {{ now() }}</p>
                            
                            @if(!Session::get('admin_logged_in'))
                                <div class="mt-3">
                                    <a href="{{ route('admin.login') }}" class="btn btn-primary">
                                        <i class="fas fa-sign-in-alt"></i> Login as Admin
                                    </a>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Test Buttons -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5><i class="fas fa-vial"></i> API Tests</h5>
                                        
                                        <button onclick="testHostelAPI()" class="btn btn-info mb-2 w-100">
                                            <i class="fas fa-building"></i> Test Hostel Options API
                                        </button>
                                        
                                        <button onclick="testSessionAPI()" class="btn btn-warning mb-2 w-100">
                                            <i class="fas fa-user-check"></i> Test Session Status
                                        </button>
                                        
                                        <div id="apiResults" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5><i class="fas fa-file-pdf"></i> PDF Tests</h5>
                                        
                                        <button onclick="testPDFAllHostels()" class="btn btn-success mb-2 w-100">
                                            <i class="fas fa-download"></i> Test PDF - All Hostels
                                        </button>
                                        
                                        <button onclick="testPDFSpecific()" class="btn btn-primary mb-2 w-100">
                                            <i class="fas fa-download"></i> Test PDF - Specific Hostel
                                        </button>
                                        
                                        <div id="pdfResults" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Manual PDF Form -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5><i class="fas fa-edit"></i> Manual PDF Generation</h5>
                            </div>
                            <div class="card-body">
                                <form id="manualPDFForm" action="{{ route('student.details.export.pdf') }}" method="GET" target="_blank">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="hostel">Select Hostel:</label>
                                            <select name="hostel" id="hostel" class="form-select" required>
                                                <option value="">Choose...</option>
                                                <option value="all">All Hostels</option>
                                                <option value="Main Hostel">Main Hostel</option>
                                                <option value="New Hostel">New Hostel</option>
                                                <option value="Hostel A">Hostel A</option>
                                                <option value="Hostel B">Hostel B</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="year">Academic Year:</label>
                                            <select name="year" id="year" class="form-select">
                                                <option value="all">All Years</option>
                                                <option value="first">First Year</option>
                                                <option value="second">Second Year</option>
                                                <option value="third">Third Year</option>
                                                <option value="fourth">Fourth Year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-file-pdf"></i> Generate PDF (Form Submit)
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Debug Information -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5><i class="fas fa-info-circle"></i> Debug Information</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
                                <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
                                <p><strong>Current URL:</strong> {{ url()->current() }}</p>
                                <p><strong>Base URL:</strong> {{ url('/') }}</p>
                                <p><strong>Export Route:</strong> {{ route('student.details.export.pdf') }}</p>
                                <p><strong>Hostel API Route:</strong> {{ route('api.hostel.options') }}</p>
                            </div>
                        </div>
                        
                        <!-- Navigation -->
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary me-2">
                                <i class="fas fa-home"></i> Admin Dashboard
                            </a>
                            <a href="{{ route('student.details.index') }}" class="btn btn-info">
                                <i class="fas fa-users"></i> Student List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function testHostelAPI() {
            const resultDiv = document.getElementById('apiResults');
            resultDiv.innerHTML = '<div class="alert alert-info">Loading...</div>';
            
            fetch('{{ route("api.hostel.options") }}')
                .then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        throw new Error('HTTP ' + response.status + ': ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('API Response:', data);
                    resultDiv.innerHTML = '<div class="alert alert-success"><strong>Success:</strong><br><pre>' + JSON.stringify(data, null, 2) + '</pre></div>';
                })
                .catch(error => {
                    console.error('API Error:', error);
                    resultDiv.innerHTML = '<div class="alert alert-danger"><strong>Error:</strong> ' + error.message + '</div>';
                });
        }
        
        function testSessionAPI() {
            const resultDiv = document.getElementById('apiResults');
            resultDiv.innerHTML = '<div class="alert alert-info">Checking session...</div>';
            
            fetch('/admin/student-details', {
                method: 'HEAD'
            })
                .then(response => {
                    console.log('Session check status:', response.status);
                    if (response.status === 200) {
                        resultDiv.innerHTML = '<div class="alert alert-success"><strong>Session OK:</strong> Admin access working</div>';
                    } else {
                        resultDiv.innerHTML = '<div class="alert alert-warning"><strong>Session Issue:</strong> HTTP ' + response.status + '</div>';
                    }
                })
                .catch(error => {
                    console.error('Session Error:', error);
                    resultDiv.innerHTML = '<div class="alert alert-danger"><strong>Session Error:</strong> ' + error.message + '</div>';
                });
        }
        
        function testPDFAllHostels() {
            const resultDiv = document.getElementById('pdfResults');
            resultDiv.innerHTML = '<div class="alert alert-info">Generating PDF...</div>';
            
            const url = '{{ route("student.details.export.pdf") }}?hostel=all&year=all';
            console.log('Testing PDF URL:', url);
            
            const newWindow = window.open(url, '_blank');
            
            if (newWindow) {
                resultDiv.innerHTML = '<div class="alert alert-success"><strong>PDF Opened:</strong> Check new tab/window</div>';
            } else {
                resultDiv.innerHTML = '<div class="alert alert-warning"><strong>Pop-up Blocked:</strong> Please allow pop-ups and try again</div>';
            }
        }
        
        function testPDFSpecific() {
            const resultDiv = document.getElementById('pdfResults');
            resultDiv.innerHTML = '<div class="alert alert-info">Generating PDF...</div>';
            
            const url = '{{ route("student.details.export.pdf") }}?hostel=Main Hostel&year=first';
            console.log('Testing PDF URL:', url);
            
            const newWindow = window.open(url, '_blank');
            
            if (newWindow) {
                resultDiv.innerHTML = '<div class="alert alert-success"><strong>PDF Opened:</strong> Check new tab/window</div>';
            } else {
                resultDiv.innerHTML = '<div class="alert alert-warning"><strong>Pop-up Blocked:</strong> Please allow pop-ups and try again</div>';
            }
        }
        
        // Auto-test on page load
        document.addEventListener('DOMContentLoaded', function() {
            console.log('PDF Debug page loaded');
            console.log('Available test functions:');
            console.log('- testHostelAPI()');
            console.log('- testSessionAPI()');
            console.log('- testPDFAllHostels()');
            console.log('- testPDFSpecific()');
        });
    </script>
</body>
</html>
