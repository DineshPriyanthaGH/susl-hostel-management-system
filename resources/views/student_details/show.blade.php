<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $student->full_name }} - SUSL Hostel Management</title>
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
            width: 90%;
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
            justify-content: center;
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
        
        .btn-warning-custom {
            background-color: #ffc107;
            color: #000;
        }
        
        .btn-danger-custom {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-secondary-custom {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
        }
        
        .details-container {
            margin-top: 20px;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 12px;
            gap: 0;
        }
        
        .detail-label {
            background-color: #f1f3f4;
            padding: 12px 15px;
            font-size: 14px;
            font-weight: 500;
            color: #495057;
            width: 250px;
            border: 1px solid #ced4da;
            border-radius: 15px 0 0 15px;
            border-right: none;
        }
        
        .detail-value {
            background-color: white;
            padding: 12px 15px;
            font-size: 14px;
            color: #333;
            flex: 1;
            border: 1px solid #ced4da;
            border-radius: 0 15px 15px 0;
            border-left: none;
        }
        
        .section-title {
            background-color: #4a6cf7;
            color: white;
            padding: 10px 15px;
            margin: 20px 0 10px 0;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
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
            
            .detail-row {
                flex-direction: column;
            }
            
            .detail-label {
                border-radius: 15px 15px 0 0;
                border-right: 1px solid #ced4da;
                border-bottom: none;
                width: 100%;
            }
            
            .detail-value {
                border-radius: 0 0 15px 15px;
                border-left: 1px solid #ced4da;
                border-top: none;
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
                    <h2 class="page-title">Student Details - {{ $student->student_id }}</h2>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('student.details.edit', $student->id) }}" class="btn-action btn-warning-custom">
                            <i class="fas fa-edit"></i> Edit Details
                        </a>
                        <a href="{{ route('student.details.index') }}" class="btn-action btn-secondary-custom">
                            <i class="fas fa-list"></i> All Students
                        </a>
                        <form method="POST" action="{{ route('student.details.destroy', $student->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this student record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-danger-custom">
                                <i class="fas fa-trash"></i> Delete Record
                            </button>
                        </form>
                    </div>
                    
                    <!-- Student Details -->
                    <div class="details-container">
                        <!-- Personal Information -->
                        <div class="section-title">Personal Information</div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Title</div>
                            <div class="detail-value">{{ $student->title }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Full Name</div>
                            <div class="detail-value">{{ $student->full_name }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Student ID</div>
                            <div class="detail-value"><strong>{{ $student->student_id }}</strong></div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Faculty</div>
                            <div class="detail-value">{{ $student->faculty }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Telephone Number</div>
                            <div class="detail-value">{{ $student->telephone_number }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Residential Address</div>
                            <div class="detail-value">{{ $student->residential_address }}</div>
                        </div>
                        
                        <!-- Guardian Information -->
                        <div class="section-title">Guardian Information</div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Guardian's Name</div>
                            <div class="detail-value">{{ $student->guardian_name }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Guardian's Telephone</div>
                            <div class="detail-value">{{ $student->guardian_telephone }}</div>
                        </div>
                        
                        <!-- Hostel Information -->
                        <div class="section-title">Hostel Information</div>
                        
                        <div class="detail-row">
                            <div class="detail-label">First Year Hostel</div>
                            <div class="detail-value">{{ $student->first_year_hostel ?? 'Not specified' }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">First Year Payment Date</div>
                            <div class="detail-value">{{ $student->first_year_payment_date ? $student->first_year_payment_date->format('Y-m-d') : 'Not specified' }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Second Year Hostel</div>
                            <div class="detail-value">{{ $student->second_year_hostel ?? 'Not specified' }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Second Year Payment Date</div>
                            <div class="detail-value">{{ $student->second_year_payment_date ? $student->second_year_payment_date->format('Y-m-d') : 'Not specified' }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Third Year Hostel</div>
                            <div class="detail-value">{{ $student->third_year_hostel ?? 'Not specified' }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Third Year Payment Date</div>
                            <div class="detail-value">{{ $student->third_year_payment_date ? $student->third_year_payment_date->format('Y-m-d') : 'Not specified' }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Fourth Year Hostel</div>
                            <div class="detail-value">{{ $student->fourth_year_hostel ?? 'Not specified' }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Fourth Year Payment Date</div>
                            <div class="detail-value">{{ $student->fourth_year_payment_date ? $student->fourth_year_payment_date->format('Y-m-d') : 'Not specified' }}</div>
                        </div>
                        
                        <!-- Record Information -->
                        <div class="section-title">Record Information</div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Record Created</div>
                            <div class="detail-value">{{ $student->created_at->format('Y-m-d H:i:s') }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Last Updated</div>
                            <div class="detail-value">{{ $student->updated_at->format('Y-m-d H:i:s') }}</div>
                        </div>
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
</body>
</html>
