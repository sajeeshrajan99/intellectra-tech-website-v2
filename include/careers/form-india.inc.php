<div class="container" id="formContainer" style="display: none;">
    <div class="card mb-5 rounded-0 shadow-lg">
        <div class="card-header text-center py-4 bg-dark rounded-0">
            <h4 class="mb-0 text-white">Apply Now</h4>
        </div>
        <div class="card-body px-5 pb-5">
            <form action="#" id="job-form" class="quanto-contact__form" autocomplete="off" novalidate>
                <input type="hidden" name="job_title" value="<?= htmlspecialchars($meta['post']) ?>">
                <input type="hidden" name="job" value="<?= htmlspecialchars($meta['post']) ?>">
                <input type="hidden" name="form_type" value="<?= htmlentities($meta['form_type']) ?>">
                <input type="hidden" name="checkToken" value="<?= htmlentities($checkToken) ?>">
                <div class="row g-3 g-xl-4 mt-4">
                    <div class="col-lg-6">
                        <label for="firstName">First Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control border shadow-sm bg-white" id="firstName" name="first_name" required>
                        <div class="invalid-feedback">Please enter your first name.</div>
                    </div>
                    <div class="col-lg-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control border shadow-sm bg-white" id="lastName" name="last_name">
                    </div>
                    <div class="col-lg-6">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control border shadow-sm bg-white" id="email" name="email" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="col-lg-6">
                        <label for="phone">Phone Number<span class="text-danger">*</span></label>
                        <input type="tel" class="form-control border shadow-sm bg-white" id="phone" name="phone" required>
                        <div class="invalid-feedback">Please enter your phone number.</div>
                    </div>
                    <div class="col-lg-6">
                        <label for="country">Country</label>
                        <input type="text" class="form-control border shadow-sm bg-white" id="country" name="country">
                    </div>
                    <div class="col-lg-6">
                        <label for="state">State</label>
                        <input type="text" class="form-control border shadow-sm bg-white" id="state" name="state">
                    </div>
                    <div class="col-lg-6">
                        <label for="place">Place</label>
                        <input type="text" class="form-control border shadow-sm bg-white" id="place" name="place">
                    </div>
                    <div class="col-lg-6">
                        <label for="experience">Years of Experience</label>
                        <input type="text" class="form-control border shadow-sm bg-white" id="experience" name="experience">
                    </div>
                    <div class="col-12">
                        <label for="additionalInformation" style="line-height: 1rem;">
                            Additional Information
                        <span class="d-block mt-1" style="font-size: .8rem;">Feel free to include links to your portfolio (Google Drive, Notion, Behance, Instagram, etc.) or share anything specific you'd like us to know about you.</span>
                        </label>
                        <textarea class="form-control border shadow-sm bg-white" id="additionalInformation" name="additionalInformation" maxlength="1000"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="attachment">Upload Resume/CV<span class="text-danger">*</span></label>
                        <input type="file" id="attachment" name="attachment" class="form-control border shadow-sm bg-white" required>
                        <div class="invalid-feedback">Max. 10 MB. (Type: pdf, doc, png, jpeg, docx)</div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="privacyPolicy" name="privacyPolicy" required>
                            <label class="form-check-label" for="privacyPolicy">
                                I have read the <a href="/privacy-policy" target="_blank" class="text-danger">privacy policy</a> and consent to the processing of my data.
                            </label>
                            <div class="invalid-feedback d-block">You must accept the Privacy Policy.</div>
                        </div>
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <div id="formMessage"></div>
                    </div>
                    <div class="col-12 mt-4 text-end">
                        <button type="submit" class="quanto-link-btn btn-pill px-4 border-theme-red" id="submitBtn">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('#job-form .form-step');
    const form = document.getElementById('job-form');

    function showStep(index) {
        steps.forEach((step, i) => {
            step.classList.toggle('d-none', i !== index);
            if (i === index) {
                step.classList.remove('was-validated');
                $(step).hide().fadeIn(300);
            }
        });

        $('html, body').animate({
            scrollTop: $('#formContainer').offset().top - 150
        }, 200);
    }

    function nextStep() {
        const currentFormStep = steps[currentStep];
        const currentFields = currentFormStep.querySelectorAll('input, select, textarea');
        let isValid = true;
        let firstInvalid = null;

        currentFormStep.classList.remove('was-validated');

        currentFields.forEach(field => {
            if (!field.checkValidity()) {
                isValid = false;
                if (!firstInvalid) {
                    firstInvalid = field;
                }
            }
        });

        if (isValid) {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            } else {
                // Trigger form submit manually when on last step
                $('#job-form').submit();
            }
        } else {
            currentFormStep.classList.add('was-validated');
            if (firstInvalid) {
                firstInvalid.focus();
            }
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    }

    // Initial call
    showStep(currentStep);

    // Final form submission (with reCAPTCHA and AJAX)
    $('#job-form').on('submit', function(e) {
        e.preventDefault(); // ⛔ Prevent default immediately

        const form = this;

        // Disable the button immediately to prevent double submission
        $('#submitBtn').text('Processing').prop('disabled', true);

        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            const firstInvalid = form.querySelector(':invalid');
            if (firstInvalid) firstInvalid.focus();

            // Re-enable if validation fails
            $('#submitBtn').text('Submit').prop('disabled', false);
            return;
        }

        grecaptcha.ready(function() {
            grecaptcha.execute('6LcNVoIrAAAAAMJsxQH-TAyQjB-J3xXEg5MvOt8Y', {
                action: 'submit'
            }).then(function(token) {
                var formElement = document.getElementById('job-form');
                var formData = new FormData(formElement);
                formData.append('token', token);

                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/send-request',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Your application has been submitted.',
                                confirmButtonText: 'Okay, Thanks!',
                                allowOutsideClick: false,
                                allowEscapeKey: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            $('#formMessage').html(data.message);
                            $('#submitBtn').text('Submit').prop('disabled', false);
                        }
                    },
                    error: function() {
                        $('#formMessage').html('Something went wrong. Please try again.');
                        $('#submitBtn').text('Submit').prop('disabled', false);
                    }
                });
            }).catch(function(error) {
                $('#formMessage').html('reCAPTCHA error: ' + error);
                $('#submitBtn').text('Submit').prop('disabled', false);
            });
        });
    });



    $(document).ready(function() {
        $('#openCustomPopup').on('click', function(e) {
            e.preventDefault();
            $('#formContainer').css('display', 'block');
            $('html, body').animate({
                scrollTop: $('#formContainer').offset().top - 150
            }, 200);
        });
        $('#openCustomPopup2').on('click', function(e) {
            e.preventDefault();
            $('#formContainer').css('display', 'block');
            $('html, body').animate({
                scrollTop: $('#formContainer').offset().top - 150
            }, 200);
        });
    });
</script>