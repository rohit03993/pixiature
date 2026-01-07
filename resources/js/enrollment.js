// Enrollment Form Multi-Step Navigation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('enrollmentForm');
    const steps = document.querySelectorAll('.form-step');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressFill = document.getElementById('progressFill');
    const stepIndicators = document.querySelectorAll('.step-indicator');
    
    let currentStep = 1;
    const totalSteps = steps.length;

    // Show/hide "Others" input fields
    const designToolsCheckboxes = document.querySelectorAll('input[name="design_tools[]"]');
    const designToolsOthersInput = document.getElementById('design_tools_others');
    
    designToolsCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const othersChecked = Array.from(designToolsCheckboxes).find(cb => cb.value === 'others' && cb.checked);
            designToolsOthersInput.style.display = othersChecked ? 'block' : 'none';
        });
    });

    const howHeardRadios = document.querySelectorAll('input[name="how_heard_about_course"]');
    const howHeardOtherInput = document.getElementById('how_heard_other');
    
    howHeardRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            howHeardOtherInput.style.display = this.value === 'other' ? 'block' : 'none';
        });
    });

    // Update progress bar
    function updateProgress() {
        const progress = (currentStep / totalSteps) * 100;
        progressFill.style.width = progress + '%';
        
        stepIndicators.forEach((indicator, index) => {
            if (index + 1 <= currentStep) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    }

    // Show current step
    function showStep(step) {
        steps.forEach((s, index) => {
            s.classList.toggle('active', index + 1 === step);
        });

        // Update buttons
        prevBtn.style.display = step === 1 ? 'none' : 'inline-block';
        nextBtn.style.display = step === totalSteps ? 'none' : 'inline-block';
        submitBtn.style.display = step === totalSteps ? 'inline-block' : 'none';

        updateProgress();
    }

    // Validate current step
    function validateStep(step) {
        const currentStepElement = steps[step - 1];
        const requiredFields = currentStepElement.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('error');
            } else {
                field.classList.remove('error');
            }
        });

        // Validate email format
        const emailField = currentStepElement.querySelector('input[type="email"]');
        if (emailField && emailField.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailField.value)) {
                isValid = false;
                emailField.classList.add('error');
            }
        }

        return isValid;
    }

    // Next button click
    nextBtn.addEventListener('click', function() {
        if (validateStep(currentStep)) {
            // Save step data
            saveStepData(currentStep);
            
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        } else {
            alert('Please fill in all required fields.');
        }
    });

    // Previous button click
    prevBtn.addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // Save step data to session
    function saveStepData(step) {
        const currentStepElement = steps[step - 1];
        const formData = new FormData();
        const inputs = currentStepElement.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            if (input.type === 'checkbox' || input.type === 'radio') {
                if (input.checked) {
                    if (input.type === 'checkbox') {
                        const name = input.name;
                        if (!formData.has(name)) {
                            formData.append(name + '[]', input.value);
                        } else {
                            formData.append(name + '[]', input.value);
                        }
                    } else {
                        formData.append(input.name, input.value);
                    }
                }
            } else {
                formData.append(input.name, input.value);
            }
        });

        // Send to server (optional - for saving progress)
        fetch(`/enroll/step/${step}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        }).catch(err => console.log('Step save error:', err));
    }

    // Collect all form data from all steps
    function collectAllFormData() {
        const formData = new FormData();
        const allInputs = form.querySelectorAll('input, textarea, select');
        
        allInputs.forEach(input => {
            if (input.type === 'checkbox') {
                if (input.checked) {
                    const name = input.name;
                    if (name.endsWith('[]')) {
                        formData.append(name, input.value);
                    } else {
                        // For checkboxes without [], append multiple values
                        if (!formData.has(name)) {
                            formData.append(name + '[]', input.value);
                        } else {
                            formData.append(name + '[]', input.value);
                        }
                    }
                }
            } else if (input.type === 'radio') {
                if (input.checked) {
                    formData.append(input.name, input.value);
                }
            } else {
                if (input.value) {
                    formData.append(input.name, input.value);
                }
            }
        });
        
        return formData;
    }

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!validateStep(currentStep)) {
            alert('Please fill in all required fields.');
            return;
        }

        // Save current step data first
        saveStepData(currentStep);
        
        // Collect all form data from all steps
        const formData = collectAllFormData();
        
        // Submit final form
        fetch('/enroll/step/6', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            // Check if response is ok
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.message || 'Server error');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                form.style.display = 'none';
                document.getElementById('successMessage').style.display = 'block';
            } else {
                if (data.errors) {
                    let errorMsg = 'Please fix the following errors:\n';
                    Object.keys(data.errors).forEach(key => {
                        errorMsg += data.errors[key][0] + '\n';
                    });
                    alert(errorMsg);
                } else {
                    alert(data.message || 'There was an error submitting your application. Please try again.');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error: ' + error.message + '\n\nPlease check the browser console for more details.');
        });
    });

    // Initialize
    showStep(1);
});

