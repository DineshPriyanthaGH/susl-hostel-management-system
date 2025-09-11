<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Details - SUSL Hostel Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
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
            min-height: 0; /* Important for flex children */
        }
        
        .container {
            position: relative;
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0; /* Important for flex children */
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
            border-color: #000000ff;
            border-width: 5px;
            color: #000000ff;
            padding: 20px;
            display: flex;
            align-items: center;
            position: relative;
            box-shadow: 0 4px 10px rgba(153, 153, 153, 0.5);
            border: 2px #3a3a3aff;  
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
        
        .form-content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
            position: relative;
            z-index: 3;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            margin-bottom: 40px;
            flex: 1;
            overflow-y: auto;
        }
        
        .form-title {
            text-align: left;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        
        .form-label {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #ddd;
            transition: all 0.3s;
            margin-bottom: 20px;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #4a6cf7;
            box-shadow: 0 0 0 0.2rem rgba(74, 108, 247, 0.25);
        }
        
        .btn-submit {
            background-color: #4a6cf7;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
            color: white;
            display: block;
            margin: 30px 0 0 0;
            width: 200px;
        }
        
        .btn-submit:hover {
            background-color: #3a5cd8;
            transform: translateY(-2px);
        }
        
        .year-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .year-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
            border-bottom: 2px solid #4a6cf7;
            padding-bottom: 5px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .edit-btn {
            background-color: #4a6cf7;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
            color: white;
            display: block;
            margin: 30px 0 0 0;
            width: 200px;
        }
        
        .edit-btn:hover {
            background-color: #3a5cd8;
            transform: translateY(-2px);
        }
        
        .print-btn {
            background: #dc3545;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
            color: white;
            display: block;
            margin: 30px 0 0 0;
            width: 200px;
        }
        
        .print-btn:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        .bottom-div {
            background-color: #E3E3E3;
            height: 110px;
            position: relative;
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
            
            .form-container {
                padding: 25px;
            }

            .bottom-div {
                height: auto;
                padding: 20px;
            }
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


    </style>
</head>
<body>
    <div class="container-wrapper">
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
            
            <!-- Form Content -->
            <div class="form-content-wrapper">
                <div class="form-container">
                    <h2 class="form-title">Search Student Details</h2>
                    
                    
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
                    
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('student.details.find') }}">
                        @csrf
                    
                     <div class="mb-4">
                            <label class="form-label">Student ID</label>
                            <input type="text" class="form-control" name="student_id"  value="{{ old('student_id') }}" required>
                        </div>
                        <button type="submit" class="btn-submit">Search</button>
                    </form>
                

                @if(isset($student))
                <div class="details-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="text-primary">Student Details Found</h3>
                        <div>
                            <a href="{{ route('student.details.edit', $student->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            <form method="POST" action="{{ route('student.details.destroy', $student->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this student record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                    
                <div class="detail-row">
                    <div class="detail-label">Mr./Mrs./Miss/Rev.</div>
                    <div class="detail-value">{{ $student->title }}</div>
                </div>
                 <div class="detail-row">
                    <div class="detail-label">Full Name</div>
                    <div class="detail-value">{{ $student->full_name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Student ID</div>
                    <div class="detail-value">{{ $student->student_id }}</div>
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
                    <div class="detail-label">First Year Hostel Name</div>
                    <div class="detail-value">{{ $student->first_year_hostel ?? 'Not specified' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Payment Date for Hostels</div>
                    <div class="detail-value">{{ $student->first_year_payment_date ? $student->first_year_payment_date->format('Y-m-d') : 'Not specified' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Second Year Hostel Name</div>
                    <div class="detail-value">{{ $student->second_year_hostel ?? 'Not specified' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Payment Date for Hostels</div>
                    <div class="detail-value">{{ $student->second_year_payment_date ? $student->second_year_payment_date->format('Y-m-d') : 'Not specified' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Third Year Hostel Name</div>
                    <div class="detail-value">{{ $student->third_year_hostel ?? 'Not specified' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Payment Date for Hostels</div>
                    <div class="detail-value">{{ $student->third_year_payment_date ? $student->third_year_payment_date->format('Y-m-d') : 'Not specified' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Fourth Year Hostel Name</div>
                    <div class="detail-value">{{ $student->fourth_year_hostel ?? 'Not specified' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Payment Date for Hostels</div>
                    <div class="detail-value">{{ $student->fourth_year_payment_date ? $student->fourth_year_payment_date->format('Y-m-d') : 'Not specified' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Guardian's Name</div>
                    <div class="detail-value">{{ $student->guardian_name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Guardian's Telephone Number</div>
                    <div class="detail-value">{{ $student->guardian_telephone }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Residential Address</div>
                    <div class="detail-value">{{ $student->residential_address }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Record Created</div>
                    <div class="detail-value">{{ $student->created_at->format('Y-m-d H:i:s') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Last Updated</div>
                    <div class="detail-value">{{ $student->updated_at->format('Y-m-d H:i:s') }}</div>
                </div>
            </div>

            <div class="action-buttons">
                <button class="edit-btn" onclick="editStudent()">Edit</button>
                <button class="print-btn" onclick="printDetails()">Print</button>
            </div>

            @else
                <div class="alert alert-info mt-4">
                    <h5>Search for a Student</h5>
                    <p>Enter a Student ID above to search for student details.</p>
                </div>
            @endif
            
        </div>
       
    </div>
           
    
            <!-- Footer with copyright and contact link-->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitButton = document.querySelector('.btn-submit');
            
            // Add form submission debugging
            form.addEventListener('submit', function(e) {
                console.log('Form submission triggered');
                console.log('Form action:', form.action);
                console.log('Form method:', form.method);
                
                // Show loading state
                submitButton.disabled = true;
                submitButton.textContent = 'Submitting...';
                
                // Re-enable after 3 seconds if still on page
                setTimeout(() => {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Submit';
                }, 3000);
            });
            
            // Add click debugging for submit button
            submitButton.addEventListener('click', function(e) {
                console.log('Submit button clicked');
                
                // Check if form is valid
                if (!form.checkValidity()) {
                    console.log('Form validation failed');
                    e.preventDefault();
                    form.reportValidity();
                    return false;
                }
                
                console.log('Form is valid, proceeding with submission');
            });
            
            // Add debugging for required fields
            const requiredFields = form.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                field.addEventListener('invalid', function() {
                    console.log('Invalid field:', field.name, field.value);
                });
            });
        });
    </script>
</body>
</html>