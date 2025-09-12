<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students - SUSL Hostel Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-right: 20px;
        }
        
        .back-btn:hover {
            background-color: #3451f1;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .back-btn i {
            margin-right: 8px;
        }
        
        .content-wrapper {
            flex: 1;
            position: relative;
            z-index: 2;
            padding: 0 60px 60px 60px;
            display: flex;
            flex-direction: column;
            min-height: 0;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .controls {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .left-controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .right-controls {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .btn-group .btn {
            margin: 0 2px;
        }
        
        .action-btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }
        
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        
        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }
        
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        
        .btn-info:hover {
            background-color: #138496;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
        }
        
        .table-container {
            flex: 1;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            min-height: 0;
        }
        
        .table-responsive {
            height: 100%;
            overflow-y: auto;
        }
        
        .table {
            margin: 0;
            font-size: 14px;
        }
        
        .table thead th {
            position: sticky;
            top: 0;
            z-index: 3;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .badge {
            font-size: 11px;
            padding: 4px 8px;
        }
        
        .btn-group-sm .btn {
            padding: 4px 8px;
            font-size: 12px;
        }
        
        .copyright-footer {
            background-color: #2c3e50;
            color: #ffffff;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
            flex-shrink: 0;
        }
        
        .copyright-footer p {
            margin: 0;
            font-size: 14px;
        }
        
        .copyright-footer img {
            height: 20px;
            margin-left: 10px;
            vertical-align: middle;
        }
        
        @media (max-width: 768px) {
            .container {
                width: 98%;
                margin: 10px auto;
            }
            
            .header {
                min-height: 120px;
                border-radius: 30px;
            }
            
            .logo {
                height: 100px;
                left: 15px;
            }
            
            .text-container {
                margin-left: 140px;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .university-name {
                font-size: 24px;
            }
            
            .system-name {
                font-size: 18px;
            }
            
            .content-wrapper {
                padding: 0 20px 40px 20px;
            }
            
            .controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .left-controls, .right-controls {
                justify-content: center;
            }
            
            .table-responsive {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container-wrapper">
        <div class="container">
            <div class="background-div"></div>
            
            <!-- Header -->
            <div class="header">
                <img src="{{ asset('images/logo.png') }}" alt="SUSL Logo" class="logo">
                <div class="text-container">
                    <div>
                        <h1 class="university-name">Sabaragamuwa University of Sri Lanka</h1>
                        <h2 class="system-name">Hostel Management System</h2>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i> Dashboard
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="content-wrapper">
                <h3 class="page-title">All Student Details</h3>
                
                <!-- Controls -->
                <div class="controls">
                    <div class="left-controls">
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search students..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button" id="searchBtn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="right-controls">
                        <a href="{{ route('student.details.create') }}" class="action-btn btn-primary">
                            <i class="fas fa-plus"></i> Add Student
                        </a>
                        <a href="{{ route('student.details.pdf.export.page') }}" class="action-btn btn-success" target="_blank">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </a>
                        <button class="action-btn btn-info" onclick="loadStudents()">
                            <i class="fas fa-refresh"></i> Refresh
                        </button>
                    </div>
                </div>
                
                <!-- Students Table -->
                <div class="table-container">
                    <div class="students-table">
                        <!-- Students will be loaded here via JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Footer -->
    <div class="copyright-footer">
        <p>
            © 2024 Sabaragamuwa University of Sri Lanka. All rights reserved.
            <img src="{{ asset('images/copyright.png') }}" alt="Copyright">
        </p>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function() {
            console.log('Document ready - initializing...');
            loadStudents();
        });

        function loadStudents() {
            console.log('Loading students...');
            
            $.get('/admin/student-details/data')
            .done(function(data) {
                console.log('Students loaded successfully:', data.length);
                displayStudents(data);
            })
            .fail(function(xhr, status, error) {
                console.error('Error loading students:', error);
                $('.students-table').html('<div class="alert alert-danger">Error loading students: ' + error + '</div>');
            });
        }

        function displayStudents(students) {
            let html = `
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Faculty</th>
                                <th>Year</th>
                                <th>Current Hostel</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
            `;

            if (students.length === 0) {
                html += '<tr><td colspan="8" class="text-center">No students found</td></tr>';
            } else {
                students.forEach(student => {
                    html += `
                        <tr>
                            <td><strong>${student.student_id}</strong></td>
                            <td>${student.first_name} ${student.last_name}</td>
                            <td><small>${student.email}</small></td>
                            <td><small>${student.phone}</small></td>
                            <td><span class="badge bg-secondary">${student.faculty}</span></td>
                            <td><span class="badge bg-info">${student.year}</span></td>
                            <td>${student.current_hostel || '<span class="text-muted">Not assigned</span>'}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewStudent('${student.id}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="editStudent('${student.id}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteStudent('${student.id}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                });
            }

            html += `
                        </tbody>
                    </table>
                </div>
            `;

            $('.students-table').html(html);
        }

        function viewStudent(id) {
            window.location.href = `/admin/student-details/${id}`;
        }

        function editStudent(id) {
            window.location.href = `/admin/student-details/${id}/edit`;
        }

        function deleteStudent(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                $.ajax({
                    url: `/admin/student-details/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        loadStudents();
                        showAlert('Student deleted successfully', 'success');
                    },
                    error: function() {
                        showAlert('Error deleting student', 'danger');
                    }
                });
            }
        }

        function showAlert(message, type) {
            const alert = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>`;
            $('.container-fluid').prepend(alert);
        }
    </script>
</body>
</html>
