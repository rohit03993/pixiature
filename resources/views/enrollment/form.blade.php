<!doctype html>
<html lang="en">
<head>
    <title>Enroll Now - Pixature</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/enrollment.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">
</head>
<body>
    <div class="enrollment-container">
        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <div class="progress-steps">
                <div class="step-indicator active" data-step="1">
                    <span class="step-number">1</span>
                    <span class="step-label">Basic</span>
                </div>
                <div class="step-indicator" data-step="2">
                    <span class="step-number">2</span>
                    <span class="step-label">About</span>
                </div>
                <div class="step-indicator" data-step="3">
                    <span class="step-number">3</span>
                    <span class="step-label">Interest</span>
                </div>
                <div class="step-indicator" data-step="4">
                    <span class="step-number">4</span>
                    <span class="step-label">Expectations</span>
                </div>
                <div class="step-indicator" data-step="5">
                    <span class="step-number">5</span>
                    <span class="step-label">Financial</span>
                </div>
                <div class="step-indicator" data-step="6">
                    <span class="step-number">6</span>
                    <span class="step-label">Final</span>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <form id="enrollmentForm" method="POST">
                @csrf

                <!-- Step 1: Basic Details -->
                <div class="form-step active" data-step="1">
                    <h2>Basic Details</h2>
                    <div class="form-group">
                        <label for="full_name">Full Name <span class="required">*</span></label>
                        <input type="text" id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" min="1" max="120">
                        </div>
                        <div class="form-group">
                            <label for="city_country">City / Country</label>
                            <input type="text" id="city_country" name="city_country">
                        </div>
                    </div>
                </div>

                <!-- Step 2: About the Student -->
                <div class="form-step" data-step="2">
                    <h2>About the Student</h2>
                    <div class="form-group">
                        <label>Are you currently a: <span class="required">*</span></label>
                        <div class="radio-group">
                            <label><input type="radio" name="current_status" value="school_student" required> School Student</label>
                            <label><input type="radio" name="current_status" value="college_student"> College Student</label>
                            <label><input type="radio" name="current_status" value="working_professional"> Working Professional</label>
                            <label><input type="radio" name="current_status" value="freelancer"> Freelancer</label>
                            <label><input type="radio" name="current_status" value="other"> Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_of_study_work">What is your current field of study/work?</label>
                        <input type="text" id="field_of_study_work" name="field_of_study_work">
                    </div>
                    <div class="form-group">
                        <label>Do you have any prior experience in design?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="design_experience" value="no_experience"> No Experience</label>
                            <label><input type="radio" name="design_experience" value="basic_understanding"> Basic Understanding</label>
                            <label><input type="radio" name="design_experience" value="intermediate"> Intermediate</label>
                            <label><input type="radio" name="design_experience" value="advanced"> Advanced</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Which design tools do you know (if any)?</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="design_tools[]" value="photoshop"> Photoshop</label>
                            <label><input type="checkbox" name="design_tools[]" value="illustrator"> Illustrator</label>
                            <label><input type="checkbox" name="design_tools[]" value="premiere_pro"> Premiere Pro / After Effects</label>
                            <label><input type="checkbox" name="design_tools[]" value="figma"> Figma</label>
                            <label><input type="checkbox" name="design_tools[]" value="canva"> Canva</label>
                            <label><input type="checkbox" name="design_tools[]" value="none"> None</label>
                            <label><input type="checkbox" name="design_tools[]" value="others"> Others (Please Mention)</label>
                        </div>
                        <input type="text" id="design_tools_others" name="design_tools_others" placeholder="Mention other tools..." style="margin-top: 10px; display: none;">
                    </div>
                </div>

                <!-- Step 3: Interest & Motivation -->
                <div class="form-step" data-step="3">
                    <h2>Interest & Motivation</h2>
                    <div class="form-group">
                        <label>Why do you want to learn graphic/designing?</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="why_learn_design[]" value="career_purpose"> Career Purpose</label>
                            <label><input type="checkbox" name="why_learn_design[]" value="freelancing"> Freelancing</label>
                            <label><input type="checkbox" name="why_learn_design[]" value="personal_interest"> Personal Interest</label>
                            <label><input type="checkbox" name="why_learn_design[]" value="side_hustle"> Side Hustle</label>
                            <label><input type="checkbox" name="why_learn_design[]" value="skill_upgrade"> Skill Upgrade</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="what_excites_about_design">What excites you most about design? (Short answer)</label>
                        <textarea id="what_excites_about_design" name="what_excites_about_design" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Which of these do you want to learn most?</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="want_to_learn[]" value="graphic_designing"> Graphic Designing</label>
                            <label><input type="checkbox" name="want_to_learn[]" value="ui_ux_designing"> UI/UX Designing</label>
                            <label><input type="checkbox" name="want_to_learn[]" value="motion_graphics"> Motion Graphics</label>
                            <label><input type="checkbox" name="want_to_learn[]" value="video_editing"> Video Editing</label>
                            <label><input type="checkbox" name="want_to_learn[]" value="social_media_creatives"> Social Media Creatives</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="want_to_achieve">What do you want to achieve after completing this course? (Short answer)</label>
                        <textarea id="want_to_achieve" name="want_to_achieve" rows="3"></textarea>
                    </div>
                </div>

                <!-- Step 4: Expectations & Practical Info -->
                <div class="form-step" data-step="4">
                    <h2>Expectations & Practical Info</h2>
                    <div class="form-group">
                        <label>How much time can you commit weekly?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="weekly_time_commitment" value="less_than_5_hrs"> Less than 5 hrs</label>
                            <label><input type="radio" name="weekly_time_commitment" value="5_10_hrs"> 5–10 hrs</label>
                            <label><input type="radio" name="weekly_time_commitment" value="10_plus_hrs"> 10+ hrs</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Do you have a laptop or desktop to practice?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="has_laptop_desktop" value="yes"> Yes</label>
                            <label><input type="radio" name="has_laptop_desktop" value="no_planning_to_arrange"> No (Planning to arrange)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Which batch timing suits you best?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="preferred_batch_timing" value="morning"> Morning</label>
                            <label><input type="radio" name="preferred_batch_timing" value="afternoon"> Afternoon</label>
                            <label><input type="radio" name="preferred_batch_timing" value="evening"> Evening</label>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Financial & Commitment -->
                <div class="form-step" data-step="5">
                    <h2>Financial & Commitment</h2>
                    <div class="form-group">
                        <label>Are you ready to invest in learning?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="investment_readiness" value="yes"> Yes</label>
                            <label><input type="radio" name="investment_readiness" value="need_emi"> Need EMI</label>
                            <label><input type="radio" name="investment_readiness" value="need_to_discuss"> Need to discuss</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>How did you hear about this course?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="how_heard_about_course" value="instagram"> Instagram</label>
                            <label><input type="radio" name="how_heard_about_course" value="youtube"> YouTube</label>
                            <label><input type="radio" name="how_heard_about_course" value="friend"> Friend</label>
                            <label><input type="radio" name="how_heard_about_course" value="whatsapp"> WhatsApp</label>
                            <label><input type="radio" name="how_heard_about_course" value="other"> Other</label>
                        </div>
                        <input type="text" id="how_heard_other" name="how_heard_other" placeholder="Please specify..." style="margin-top: 10px; display: none;">
                    </div>
                </div>

                <!-- Step 6: Final -->
                <div class="form-step" data-step="6">
                    <h2>Final</h2>
                    <div class="form-group">
                        <label for="questions_or_share">Any questions or something you'd like to share?</label>
                        <textarea id="questions_or_share" name="questions_or_share" rows="5"></textarea>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="form-navigation">
                    <button type="button" class="btn btn-secondary" id="prevBtn" style="display: none;">Previous</button>
                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn" style="display: none;">Submit</button>
                </div>
            </form>
        </div>

        <!-- Success Message -->
        <div id="successMessage" class="success-message" style="display: none;">
            <h2>Thank You!</h2>
            <p>Your enrollment application has been submitted successfully.</p>
            <a href="/" class="btn btn-primary">Back to Home</a>
        </div>
    </div>

    @vite('resources/js/enrollment.js')
</body>
</html>

