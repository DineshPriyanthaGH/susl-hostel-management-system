<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Verified - SUSL Hostel Management</title>
    <link rel="icon" type="image/png" href="images/logo.png">
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
        }
        
        .container {
            position: relative;
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            min-height: 800px;
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
            border: 2px #3a3a3aff;  
            z-index: 2;
            margin-bottom: 40px;
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
        
        .verification-content {
            background: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            position: relative;
            z-index: 3;
            margin-bottom: 40px;
            text-align: center;
        }
        
        .success-icon {
            font-size: 100px;
            color: #28a745;
            margin-bottom: 30px;
            animation: checkmark 0.6s ease-in-out;
        }
        
        .verification-title {
            font-size: 36px;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 20px;
        }
        
        .verification-message {
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .student-info-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            text-align: left;
            border-left: 5px solid #28a745;
        }
        
        .student-info-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: #495057;
            width: 40%;
        }
        
        .info-value {
            color: #2c3e50;
            width: 55%;
        }
        
        .action-buttons {
            margin-top: 40px;
        }
        
        .btn-primary-custom {
            background-color: #4a6cf7;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 18px;
            margin: 0 10px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary-custom:hover {
            background-color: #3a5cd8;
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-secondary-custom {
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 18px;
            margin: 0 10px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-secondary-custom:hover {
            background-color: #545b62;
            transform: translateY(-2px);
            color: white;
        }
        
        .bottom-div {
            background-color: #E3E3E3;
            height: 110px;
            position: absolute;
            bottom: 0px;
            left: 0;
            width: 100%;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: flex;               
            align-items: center;
            justify-content: center;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
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
        
        @keyframes checkmark {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
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
            
            .verification-content {
                padding: 30px 20px;
            }
            
            .verification-title {
                font-size: 28px;
            }
            
            .verification-message {
                font-size: 18px;
            }
            
            .info-row {
                flex-direction: column;
                gap: 5px;
            }
            
            .info-label, .info-value {
                width: 100%;
            }
            
            .btn-primary-custom, .btn-secondary-custom {
                display: block;
                margin: 10px auto;
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Background div -->
        <div class="background-div"></div>
        
        <!-- Header with logo and university name -->
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
        
        <!-- Verification Content -->
        <div class="verification-content">
            <!-- Success Icon -->
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            
            <!-- Verification Title and Message -->
            <h1 class="verification-title">Details Successfully Verified!</h1>
            <p class="verification-message">
                Student details have been successfully submitted and saved to the hostel management system. 
                The information is now available in our database for future reference.
            </p>
            
            <!-- Student Information Card -->
            @if(session('student_data'))
                <div class="student-info-card">
                    <h3 class="student-info-title">Submitted Student Information</h3>
                    
                    <div class="info-row">
                        <span class="info-label">Title:</span>
                        <span class="info-value">{{ session('student_data.title') }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Full Name:</span>
                        <span class="info-value">{{ session('student_data.full_name') }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Student ID:</span>
                        <span class="info-value">{{ session('student_data.student_id') }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Faculty:</span>
                        <span class="info-value">{{ session('student_data.faculty') }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Telephone:</span>
                        <span class="info-value">{{ session('student_data.telephone_number') }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Guardian Name:</span>
                        <span class="info-value">{{ session('student_data.guardian_name') }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Guardian Telephone:</span>
                        <span class="info-value">{{ session('student_data.guardian_telephone') }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Residential Address:</span>
                        <span class="info-value">{{ session('student_data.residential_address') }}</span>
                    </div>
                    
                    @if(session('student_data.first_year_hostel') && session('student_data.first_year_hostel') !== 'Not specified')
                    <div class="info-row">
                        <span class="info-label">First Year Hostel:</span>
                        <span class="info-value">{{ session('student_data.first_year_hostel') }}</span>
                    </div>
                    @endif
                    
                    @if(session('student_data.second_year_hostel') && session('student_data.second_year_hostel') !== 'Not specified')
                    <div class="info-row">
                        <span class="info-label">Second Year Hostel:</span>
                        <span class="info-value">{{ session('student_data.second_year_hostel') }}</span>
                    </div>
                    @endif
                    
                    @if(session('student_data.third_year_hostel') && session('student_data.third_year_hostel') !== 'Not specified')
                    <div class="info-row">
                        <span class="info-label">Third Year Hostel:</span>
                        <span class="info-value">{{ session('student_data.third_year_hostel') }}</span>
                    </div>
                    @endif
                    
                    @if(session('student_data.fourth_year_hostel') && session('student_data.fourth_year_hostel') !== 'Not specified')
                    <div class="info-row">
                        <span class="info-label">Fourth Year Hostel:</span>
                        <span class="info-value">{{ session('student_data.fourth_year_hostel') }}</span>
                    </div>
                    @endif
                    
                    <div class="info-row">
                        <span class="info-label">Record ID:</span>
                        <span class="info-value">#{{ session('student_data.id') }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Submission Time:</span>
                        <span class="info-value">{{ session('student_data.submission_time') }}</span>
                    </div>
                </div>
            @else
                <div class="student-info-card">
                    <h3 class="student-info-title">Student Details Confirmed</h3>
                    <p class="text-center">Your student details have been successfully submitted and verified.</p>
                </div>
            @endif
            
            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('student.details.create') }}" class="btn-primary-custom">
                    <i class="fas fa-plus me-2"></i>Add Another Student
                </a>
                <a href="{{ route('admin.dashboard') }}" class="btn-secondary-custom">
                    <i class="fas fa-home me-2"></i>Return to Dashboard
                </a>
            </div>
        </div>
        
        <!-- Footer with copyright -->
        <div class="bottom-div">
            <img src="{{ asset('images/Copyright.png') }}" alt="Copyright Logo" class="copyright_logo">
            <div class="copyright">Copyrights SUSL 2025. All Rights Reserved.</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-redirect after 15 seconds
        setTimeout(function() {
            const redirectNotice = document.createElement('div');
            redirectNotice.className = 'alert alert-info text-center';
            redirectNotice.style.cssText = 'position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; width: 300px;';
            redirectNotice.innerHTML = '<strong>Auto-redirecting to dashboard in 5 seconds...</strong>';
            document.body.appendChild(redirectNotice);
            
            setTimeout(function() {
                // Clear session data before redirect
                fetch('{{ route("student.details.clear-session") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    }
                }).finally(() => {
                    window.location.href = "{{ route('admin.dashboard') }}";
                });
            }, 5000);
        }, 15000);
        
        // Add success animation
        document.addEventListener('DOMContentLoaded', function() {
            const successIcon = document.querySelector('.success-icon');
            successIcon.style.transform = 'scale(0)';
            
            setTimeout(() => {
                successIcon.style.transition = 'transform 0.6s ease-in-out';
                successIcon.style.transform = 'scale(1)';
            }, 300);
        });

        // Clear session when navigating away manually
        document.querySelectorAll('a[href]').forEach(link => {
            link.addEventListener('click', function(e) {
                // Don't prevent default, just clear session
                fetch('{{ route("student.details.clear-session") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    }
                });
            });
        });
    </script>
</body>
</html>