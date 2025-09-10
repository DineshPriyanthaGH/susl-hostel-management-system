<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $student->full_name }} - SUSL Hostel Management</title>
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
            text-align: center;
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
            background-color: #28a745;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
            color: white;
            margin-right: 15px;
        }
        
        .btn-cancel {
            background-color: #6c757d;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
            color: white;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-submit:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        
        .btn-cancel:hover {
            background-color: #545b62;
            transform: translateY(-2px);
            color: white;
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
            
            .form-container {
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
                    <a href="{{ route('student.details.show', $student->id) }}" class="back-btn">Back to Details</a>
                </div>
            </div>
            
            <!-- Form Content -->
            <div class="form-content-wrapper">
                <div class="form-container">
                    <h2 class="form-title">Edit Student Details - {{ $student->student_id }}</h2>
                    
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
                    
                    <form method="POST" action="{{ route('student.details.update', $student->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="form-label">Mr./Mrs./Rev.</label>
                            <select class="form-select" name="title" required>
                                <option value="">Select the relevant one</option>
                                <option value="Mr." {{ (old('title', $student->title) == 'Mr.') ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ (old('title', $student->title) == 'Mrs.') ? 'selected' : '' }}>Mrs.</option>
                                <option value="Rev." {{ (old('title', $student->title) == 'Rev.') ? 'selected' : '' }}>Rev.</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="full_name" placeholder="Enter student's full name" value="{{ old('full_name', $student->full_name) }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Student ID</label>
                            <input type="text" class="form-control" name="student_id" placeholder="Enter student ID" value="{{ old('student_id', $student->student_id) }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Faculty</label>
                            <select class="form-select" name="faculty" required>
                                <option value="">Select Faculty</option>
                                <option value="Faculty Of Computing" {{ (old('faculty', $student->faculty) == 'Faculty Of Computing') ? 'selected' : '' }}>Faculty Of Computing</option>
                                <option value="Faculty Of Geomatics" {{ (old('faculty', $student->faculty) == 'Faculty Of Geomatics') ? 'selected' : '' }}>Faculty Of Geomatics</option>
                                <option value="Faculty Of Management" {{ (old('faculty', $student->faculty) == 'Faculty Of Management') ? 'selected' : '' }}>Faculty Of Management</option>
                                <option value="Faculty Of Technology" {{ (old('faculty', $student->faculty) == 'Faculty Of Technology') ? 'selected' : '' }}>Faculty Of Technology</option>
                                <option value="Faculty Of Agriculture" {{ (old('faculty', $student->faculty) == 'Faculty Of Agriculture') ? 'selected' : '' }}>Faculty Of Agriculture</option>
                                <option value="Faculty Of Social Sciences" {{ (old('faculty', $student->faculty) == 'Faculty Of Social Sciences') ? 'selected' : '' }}>Faculty Of Social Sciences</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Telephone Number</label>
                            <input type="text" class="form-control" name="telephone_number" placeholder="07XXXXXXXXX" pattern="[0-9]{10}" value="{{ old('telephone_number', $student->telephone_number) }}" required>
                        </div>
                        
                        <!-- First Year Section -->
                        <div class="year-section">
                            <div class="year-title">First Year</div>
                            <div class="mb-4">
                                <label class="form-label">First Year Hostel Name</label>
                                <input type="text" class="form-control" name="first_year_hostel" placeholder="Enter the name" value="{{ old('first_year_hostel', $student->first_year_hostel) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Payment Date for Hostel</label>
                                <input type="date" class="form-control" name="first_year_payment_date" value="{{ old('first_year_payment_date', $student->first_year_payment_date ? $student->first_year_payment_date->format('Y-m-d') : '') }}">
                            </div>
                        </div>
                        
                        <!-- Second Year Section -->
                        <div class="year-section">
                            <div class="year-title">Second Year</div>
                            <div class="mb-4">
                                <label class="form-label">Second Year Hostel Name</label>
                                <input type="text" class="form-control" name="second_year_hostel" placeholder="Enter the name" value="{{ old('second_year_hostel', $student->second_year_hostel) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Payment Date for Hostel</label>
                                <input type="date" class="form-control" name="second_year_payment_date" value="{{ old('second_year_payment_date', $student->second_year_payment_date ? $student->second_year_payment_date->format('Y-m-d') : '') }}">
                            </div>
                        </div>
                        
                        <!-- Third Year Section -->
                        <div class="year-section">
                            <div class="year-title">Third Year</div>
                            <div class="mb-4">
                                <label class="form-label">Third Year Hostel Name</label>
                                <input type="text" class="form-control" name="third_year_hostel" placeholder="Enter the name" value="{{ old('third_year_hostel', $student->third_year_hostel) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Payment Date for Hostel</label>
                                <input type="date" class="form-control" name="third_year_payment_date" value="{{ old('third_year_payment_date', $student->third_year_payment_date ? $student->third_year_payment_date->format('Y-m-d') : '') }}">
                            </div>
                        </div>
                        
                        <!-- Fourth Year Section -->
                        <div class="year-section">
                            <div class="year-title">Fourth Year</div>
                            <div class="mb-4">
                                <label class="form-label">Fourth Year Hostel Name</label>
                                <input type="text" class="form-control" name="fourth_year_hostel" placeholder="Enter the name" value="{{ old('fourth_year_hostel', $student->fourth_year_hostel) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Payment Date for Hostel</label>
                                <input type="date" class="form-control" name="fourth_year_payment_date" value="{{ old('fourth_year_payment_date', $student->fourth_year_payment_date ? $student->fourth_year_payment_date->format('Y-m-d') : '') }}">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Guardian's Name</label>
                            <input type="text" class="form-control" name="guardian_name" placeholder="Enter the guardian's name" value="{{ old('guardian_name', $student->guardian_name) }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Guardian's Telephone Number</label>
                            <input type="text" class="form-control" name="guardian_telephone" placeholder="07XXXXXXXXX" pattern="[0-9]{10}" value="{{ old('guardian_telephone', $student->guardian_telephone) }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Residential Address</label>
                            <textarea class="form-control" name="residential_address" rows="3" placeholder="Enter the address" required>{{ old('residential_address', $student->residential_address) }}</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn-submit">Update Details</button>
                            <a href="{{ route('student.details.show', $student->id) }}" class="btn-cancel">Cancel</a>
                        </div>
                    </form>
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
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitButton = document.querySelector('.btn-submit');
            
            form.addEventListener('submit', function(e) {
                submitButton.disabled = true;
                submitButton.textContent = 'Updating...';
                
                setTimeout(() => {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Update Details';
                }, 3000);
            });
        });
    </script>
</body>
</html>
