<style>
    .step {
        display: none;
    }

    .step.active {
        display: block;
    }
</style>
<div class="container" id="formContainer" style="display: none;">
    <div class="card mb-5 rounded-0 shadow-lg">
        <div class="card-header text-center py-4 bg-dark rounded-0">
            <h5 class="mb-0 text-white">Apply for Freelance Business Development Executive (UK)</h5>
        </div>
        <div class="card-body px-5 pb-5">
            <form action="#" id="job-form" class="quanto-contact__form" autocomplete="off" novalidate>
                <input type="hidden" name="job_title" value="<?= htmlspecialchars($meta['post']) ?>">
                <input type="hidden" name="job" value="<?= htmlspecialchars($meta['post']) ?>">
                <input type="hidden" name="form_type" value="<?= htmlentities($meta['form_type']) ?>">
                <input type="hidden" name="checkToken" value="<?= htmlentities($checkToken) ?>">
                <!-- Step 1: Personal Information -->
                <div class="form-step step-1">
                    <div class="row g-3 g-xl-4 mt-4">
                        <div class="col-12 move-anim">
                            <h4>Step 1: Personal Information</h4>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="source">How Did You Hear About Us?<span class="text-danger">*</span></label>
                            <select id="source" name="source" class="form-control border shadow-sm bg-white" required>
                                <option value="">Select</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Indeed">Indeed</option>
                                <option value="LinkedIn">LinkedIn</option>
                                <option value="Other Job site">Other Job site</option>
                                <option value="Refer by friend">Refer by friend</option>
                            </select>
                            <div class="invalid-feedback">Please select how you heard about us.</div>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="worked_before">Previously Worked at Intellectra Tech?<span class="text-danger">*</span></label>
                            <select id="worked_before" name="worked_before" class="form-control border shadow-sm bg-white" required>
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <div class="invalid-feedback">Please indicate if you've worked here before.</div>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="country">Country<span class="text-danger">*</span></label>
                            <input type="text" id="country" name="country" value="United Kingdom" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter your country.</div>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <select id="title" name="title" class="form-control border shadow-sm bg-white" required>
                                <option value="">Select</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms">Ms</option>
                                <option value="Dr">Dr</option>
                                <option value="Prof">Prof</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select your title.</div>
                        </div>

                        <div class="col-md-4 move-anim">
                            <label for="first_name">First Name<span class="text-danger">*</span></label>
                            <input type="text" id="first_name" name="first_name" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter your first name.</div>
                        </div>

                        <div class="col-md-4 move-anim">
                            <label for="last_name">Last Name<span class="text-danger">*</span></label>
                            <input type="text" id="last_name" name="last_name" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter your last name.</div>
                        </div>

                        <div class="col-md-4 move-anim">
                            <label for="preferred_name">Preferred Name</label>
                            <input type="text" id="preferred_name" name="preferred_name" class="form-control border shadow-sm bg-white">
                        </div>

                        <div class="col-md-3 move-anim">
                            <label for="address1">Address Line 1<span class="text-danger">*</span></label>
                            <input type="text" id="address1" name="address1" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter your address.</div>
                        </div>

                        <div class="col-md-3 move-anim">
                            <label for="city">City or Town<span class="text-danger">*</span></label>
                            <input type="text" id="city" name="city" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter your city or town.</div>
                        </div>

                        <div class="col-md-3 move-anim">
                            <label for="postal_code">Postal Code<span class="text-danger">*</span></label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter your postal code.</div>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="email">Email Address<span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <div class="col-md-3 move-anim">
                            <label for="country_code">Country Code<span class="text-danger">*</span></label>
                            <input type="text" id="country_code" name="country_code" value="+44" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter your country code.</div>
                        </div>

                        <div class="col-md-3 move-anim">
                            <label for="phone_number">Mobile Number<span class="text-danger">*</span></label>
                            <input type="tel" id="phone_number" name="phone_number" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please enter your mobile number.</div>
                        </div>

                        <div class="col-12 move-anim mt-4 text-end">
                            <button type="button" class="quanto-link-btn btn-pill border-theme-red" onclick="nextStep()">
                                Next <span><i class="fa-solid fa-arrow-right arry1"></i><i class="fa-solid fa-arrow-right arry2"></i></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Experience -->
                <div class="form-step step-2 d-none">
                    <div class="row g-3 g-xl-4 mt-4">
                        <div class="col-12 move-anim">
                            <h4>Step 2: Experience & CV</h4>
                        </div>

                        <div class="col-12 move-anim">
                            <label for="experience">Work Experience<span class="text-danger">*</span></label>
                            <textarea id="experience" name="experience" class="form-control border shadow-sm bg-white" required></textarea>
                            <div class="invalid-feedback">Please describe your work experience.</div>
                        </div>

                        <div class="col-12 move-anim">
                            <label for="education">Education<span class="text-danger">*</span></label>
                            <textarea id="education" name="education" class="form-control border shadow-sm bg-white" required></textarea>
                            <div class="invalid-feedback">Please describe your education.</div>
                        </div>

                        <div class="col-12 move-anim">
                            <label for="skills">Skills<span class="text-danger">*</span></label>
                            <input type="text" id="skills" name="skills" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please list your skills.</div>
                        </div>

                        <div class="col-12 move-anim">
                            <label for="cv">Upload Resume/CV<span class="text-danger">*</span></label>
                            <input type="file" id="cv" name="cv" class="form-control border shadow-sm bg-white" required>
                            <div class="invalid-feedback">Please upload your resume or CV.</div>
                        </div>

                        <div class="col-12 move-anim">
                            <label for="cover_letter">Cover Letter</label>
                            <input type="file" id="cover_letter" name="cover_letter" class="form-control border shadow-sm bg-white">
                            <div class="invalid-feedback">Please upload cover letter.</div>
                        </div>

                        <div class="col-12 move-anim">
                            <label for="additional_doc">Additional Documnet</label>
                            <input type="file" id="additional_doc" name="additional_doc" class="form-control border shadow-sm bg-white">
                            <div class="invalid-feedback">Please upload cover letter.</div>
                        </div>

                        <div class="col-12 move-anim mt-4 text-end">
                            <button type="button" class="quanto-link-btn btn-pill border-theme-red" onclick="prevStep()">Back</button>
                            <button type="button" class="quanto-link-btn btn-pill border-theme-red" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Web & Social -->
                <div class="form-step step-3 d-none">
                    <div class="row g-3 g-xl-4 mt-4">
                        <div class="col-12 move-anim">
                            <h4>Step 3: Web & Social Profiles</h4>
                        </div>

                        <div class="col-12 move-anim">
                            <label for="websites">Website</label>
                            <input type="url" id="websites" name="websites" class="form-control border shadow-sm bg-white">
                        </div>

                        <div class="col-12 move-anim">
                            <label for="linkedin">LinkedIn</label>
                            <input type="url" id="linkedin" name="linkedin" class="form-control border shadow-sm bg-white">
                        </div>

                        <div class="col-12 move-anim mt-4 text-end">
                            <button type="button" class="quanto-link-btn btn-pill border-theme-red" onclick="prevStep()">Back</button>
                            <button type="button" class="quanto-link-btn btn-pill border-theme-red" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Voluntary Disclosures -->
                <div class="form-step step-4 d-none">
                    <div class="row g-3 g-xl-4 mt-4">
                        <div class="col-12 move-anim">
                            <h4>Step 4: Voluntary Disclosures</h4>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="eligibility">Do you have proof of eligibility to work in the UK?<span class="text-danger">*</span></label>
                            <select id="eligibility" name="eligibility" class="form-control border shadow-sm bg-white" required>
                                <option value="">Select One</option>
                                <option>Yes - UK Citizen</option>
                                <option>Yes - EU/EEA Citizen</option>
                                <option>Yes - Indefinite Leave to Remain/Permanent Resident</option>
                                <option>Yes - Visa/Work Permit (Over 6 months remaining)</option>
                                <option>Yes - Visa/Work Permit (Less than 6 months remaining)</option>
                                <option>No - Would need sponsorship to be provided by Intellectra Tech</option>
                            </select>
                            <div class="invalid-feedback">Please choose your eligibility.</div>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="ethnicity">Ethnicity<span class="text-danger">*</span></label>
                            <select id="ethnicity" name="ethnicity" class="form-control border shadow-sm bg-white" required>
                                <option value="">Select Ethnicity</option>
                                <option value="White – British">White – British</option>
                                <option value="White – Irish">White – Irish</option>
                                <option value="White – Other">White – Other</option>
                                <option value="Asian or Asian British – Indian">Asian or Asian British – Indian</option>
                                <option value="Asian or Asian British – Pakistani">Asian or Asian British – Pakistani</option>
                                <option value="Asian or Asian British – Bangladeshi">Asian or Asian British – Bangladeshi</option>
                                <option value="Asian or Asian British – Other">Asian or Asian British – Other</option>
                                <option value="Black or Black British – Caribbean">Black or Black British – Caribbean</option>
                                <option value="Black or Black British – African">Black or Black British – African</option>
                                <option value="Mixed – White & Black Caribbean">Mixed – White & Black Caribbean</option>
                                <option value="Mixed – White & Asian">Mixed – White & Asian</option>
                                <option value="Mixed – Other">Mixed – Other</option>
                            </select>
                            <div class="invalid-feedback">Please choose your ethnicity.</div>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="nationality">Nationality<span class="text-danger">*</span></label>
                            <select id="nationality" name="nationality" class="form-control border shadow-sm bg-white" required>
                                <option value="">Select Nationality</option>
                                <option>Afghan</option>
                                <option>Albanian</option>
                                <option>Algerian</option>
                                <option>American</option>
                                <option>Andorran</option>
                                <option>Angolan</option>
                                <option>Anguillan</option>
                                <option>Argentine</option>
                                <option>Armenian</option>
                                <option>Australian</option>
                                <option>Austrian</option>
                                <option>Azerbaijani</option>
                                <option>Bahamian</option>
                                <option>Bahraini</option>
                                <option>Bangladeshi</option>
                                <option>Barbadian</option>
                                <option>Belarusian</option>
                                <option>Belgian</option>
                                <option>Belizean</option>
                                <option>Beninese</option>
                                <option>Bermudian</option>
                                <option>Bhutanese</option>
                                <option>Bolivian</option>
                                <option>Botswanan</option>
                                <option>Brazilian</option>
                                <option>British</option>
                                <option>British Virgin Islander</option>
                                <option>Bruneian</option>
                                <option>Bulgarian</option>
                                <option>Burkinan</option>
                                <option>Burmese</option>
                                <option>Burundian</option>
                                <option>Cambodian</option>
                                <option>Cameroonian</option>
                                <option>Canadian</option>
                                <option>Cape Verdean</option>
                                <option>Cayman Islander</option>
                                <option>Central African</option>
                                <option>Chadian</option>
                                <option>Chilean</option>
                                <option>Chinese</option>
                                <option>Citizen of Antigua and Barbuda</option>
                                <option>Citizen of Bosnia and Herzegovina</option>
                                <option>Citizen of Guinea‑Bissau</option>
                                <option>Citizen of Kiribati</option>
                                <option>Citizen of Seychelles</option>
                                <option>Citizen of the Dominican Republic</option>
                                <option>Citizen of Vanuatu</option>
                                <option>Colombian</option>
                                <option>Comoran</option>
                                <option>Congolese (Congo)</option>
                                <option>Congolese (DRC)</option>
                                <option>Cook Islander</option>
                                <option>Costa Rican</option>
                                <option>Croatian</option>
                                <option>Cuban</option>
                                <option>Cymraes (Welsh female)</option>
                                <option>Cymro (Welsh male)</option>
                                <option>Cypriot</option>
                                <option>Czech</option>
                                <option>Danish</option>
                                <option>Djiboutian</option>
                                <option>Dominican</option>
                                <option>Dutch</option>
                                <option>East Timorese</option>
                                <option>Ecuadorean</option>
                                <option>Egyptian</option>
                                <option>Emirati</option>
                                <option>English</option>
                                <option>Equatorial Guinean</option>
                                <option>Eritrean</option>
                                <option>Estonian</option>
                                <option>Ethiopian</option>
                                <option>Faroese</option>
                                <option>Fijian</option>
                                <option>Filipino</option>
                                <option>Finnish</option>
                                <option>French</option>
                                <option>Gabonese</option>
                                <option>Gambian</option>
                                <option>Georgian</option>
                                <option>German</option>
                                <option>Ghanaian</option>
                                <option>Gibraltarian</option>
                                <option>Greek</option>
                                <option>Greenlandic</option>
                                <option>Grenadian</option>
                                <option>Guamanian</option>
                                <option>Guatemalan</option>
                                <option>Guinean</option>
                                <option>Guyanese</option>
                                <option>Haitian</option>
                                <option>Honduran</option>
                                <option>Hong Konger</option>
                                <option>Hungarian</option>
                                <option>Icelandic</option>
                                <option>Indian</option>
                                <option>Indonesian</option>
                                <option>Iranian</option>
                                <option>Iraqi</option>
                                <option>Irish</option>
                                <option>Israeli</option>
                                <option>Italian</option>
                                <option>Ivorian</option>
                                <option>Jamaican</option>
                                <option>Japanese</option>
                                <option>Jordanian</option>
                                <option>Kazakh</option>
                                <option>Kenyan</option>
                                <option>Kittitian</option>
                                <option>Kosovan</option>
                                <option>Kuwaiti</option>
                                <option>Kyrgyz</option>
                                <option>Lao</option>
                                <option>Latvian</option>
                                <option>Lebanese</option>
                                <option>Liberian</option>
                                <option>Libyan</option>
                                <option>Liechtenstein citizen</option>
                                <option>Lithuanian</option>
                                <option>Luxembourger</option>
                                <option>Macanese</option>
                                <option>Macedonian</option>
                                <option>Malagasy</option>
                                <option>Malawian</option>
                                <option>Malaysian</option>
                                <option>Maldivian</option>
                                <option>Malian</option>
                                <option>Maltese</option>
                                <option>Marshallese</option>
                                <option>Martiniquais</option>
                                <option>Mauritanian</option>
                                <option>Mauritian</option>
                                <option>Mexican</option>
                                <option>Micronesian</option>
                                <option>Moldovan</option>
                                <option>Monegasque</option>
                                <option>Mongolian</option>
                                <option>Montenegrin</option>
                                <option>Montserratian</option>
                                <option>Moroccan</option>
                                <option>Mosotho</option>
                                <option>Mozambican</option>
                                <option>Namibian</option>
                                <option>Nauruan</option>
                                <option>Nepalese</option>
                                <option>New Zealander</option>
                                <option>Nicaraguan</option>
                                <option>Nigerian</option>
                                <option>Nigerien</option>
                                <option>Niuean</option>
                                <option>North Korean</option>
                                <option>Northern Irish</option>
                                <option>Norwegian</option>
                                <option>Omani</option>
                                <option>Pakistani</option>
                                <option>Palauan</option>
                                <option>Palestinian</option>
                                <option>Panamanian</option>
                                <option>Papua New Guinean</option>
                                <option>Paraguayan</option>
                                <option>Peruvian</option>
                                <option>Pitcairn Islander</option>
                                <option>Polish</option>
                                <option>Portuguese</option>
                                <option>Prydeinig (Welsh for 'British')</option>
                                <option>Puerto Rican</option>
                                <option>Qatari</option>
                                <option>Romanian</option>
                                <option>Russian</option>
                                <option>Rwandan</option>
                                <option>Salvadorean</option>
                                <option>Sammarinese</option>
                                <option>Samoan</option>
                                <option>Sao Tomean</option>
                                <option>Saudi Arabian</option>
                                <option>Scottish</option>
                                <option>Senegalese</option>
                                <option>Serbian</option>
                                <option>Sierra Leonean</option>
                                <option>Singaporean</option>
                                <option>Slovak</option>
                                <option>Slovenian</option>
                                <option>Solomon Islander</option>
                                <option>Somali</option>
                                <option>South African</option>
                                <option>South Korean</option>
                                <option>South Sudanese</option>
                                <option>Spanish</option>
                                <option>Sri Lankan</option>
                                <option>St Helenian</option>
                                <option>St Lucian</option>
                                <option>Stateless</option>
                                <option>Sudanese</option>
                                <option>Surinamese</option>
                                <option>Swazi</option>
                                <option>Swedish</option>
                                <option>Swiss</option>
                                <option>Syrian</option>
                                <option>Taiwanese</option>
                                <option>Tajik</option>
                                <option>Tanzanian</option>
                                <option>Thai</option>
                                <option>Togolese</option>
                                <option>Tongan</option>
                                <option>Trinidadian</option>
                                <option>Tristanian</option>
                                <option>Tunisian</option>
                                <option>Turkish</option>
                                <option>Turkmen</option>
                                <option>Turks and Caicos Islander</option>
                                <option>Tuvaluan</option>
                                <option>Ugandan</option>
                                <option>Ukrainian</option>
                                <option>Uruguayan</option>
                                <option>Uzbek</option>
                                <option>Vatican citizen</option>
                                <option>Venezuelan</option>
                                <option>Vietnamese</option>
                                <option>Vincentian</option>
                                <option>Wallisian</option>
                                <option>Welsh</option>
                                <option>Yemeni</option>
                                <option>Zambian</option>
                                <option>Zimbabwean</option>
                            </select>
                            <div class="invalid-feedback">Please choose your nationality.</div>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="sexual_orientation">Sexual Orientation<span class="text-danger">*</span></label>
                            <select id="sexual_orientation" name="sexual_orientation" class="form-control border shadow-sm bg-white" required>
                                <option value="">Select Sexual Orientation</option>
                                <option>Heterosexual/Straight</option>
                                <option>Gay</option>
                                <option>Lesbian</option>
                                <option>Bisexual</option>
                                <option>Prefer not to say</option>

                            </select>
                            <div class="invalid-feedback">Please choose your sexual orientation.</div>
                        </div>

                        <div class="col-md-6 move-anim">
                            <label for="gender">Gender Identity<span class="text-danger">*</span></label>
                            <select id="gender" name="gender" class="form-control border shadow-sm bg-white" required>
                                <option value="">Select One</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Non-binary</option>
                                <option>Prefer not to say</option>
                            </select>
                            <div class="invalid-feedback">Please choose your gender identity.</div>
                        </div>

                        <div class="col-12 move-anim">
                            <label for="disabilities">Do you have any disabilities? Please Specify</label>
                            <input type="text" id="disabilities" name="disabilities" class="form-control border shadow-sm bg-white">
                        </div>

                        <div class="col-12 move-anim mt-4 text-end">
                            <button type="button" class="quanto-link-btn btn-pill border-theme-red" onclick="prevStep()">Back</button>
                            <button type="button" class="quanto-link-btn btn-pill border-theme-red" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Terms -->
                <div class="form-step step-5 d-none">
                    <div class="row g-3 g-xl-4 mt-4">
                        <div class="col-12 move-anim">
                            <h4>Step 5: Terms & Submit</h4>
                        </div>

                        <div class="col-12 move-anim">
                            <p>I agree to Intellectra Tech’s terms. My data may be stored for up to 12 months.</p>
                            <label>
                                <input type="checkbox" name="consent" required>
                                I accept the <a href="/privacy-policy" target="_blank" class="text-danger">Privacy Policy</a> &
                                <a href="/terms-and-conditions" target="_blank" class="text-danger">Terms & Conditions</a>.
                            </label>
                            <div class="invalid-feedback d-block">You must accept the Privacy Policy & Terms.</div>
                        </div>
                        <div class="col-12 mt-2 text-center">
                            <div id="formMessage"></div>
                        </div>
                        <div class="col-12 move-anim mt-4 text-end">
                            <button type="button" class="quanto-link-btn btn-pill border-theme-red" onclick="prevStep()">Back</button>
                            <button type="submit" class="quanto-link-btn btn-pill px-4 border-theme-red" id="submitBtn">
                                Submit
                            </button>
                        </div>
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
        e.preventDefault();

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
                $('#submitBtn').text('Processing').prop('disabled', true);
                var formElement = document.getElementById('job-form');
                var formData = new FormData(formElement); // includes file inputs automatically
                formData.append('token', token); // add reCAPTCHA token manually

                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/send-request',
                    data: formData,
                    processData: false, // required for FormData
                    contentType: false, // required for FormData
                    dataType: 'json',
                    success: function(data) {
                        let result = JSON.parse(JSON.stringify(data));
                        if (result.status == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Your application has been submitted.',
                                confirmButtonText: 'Okay, Thanks!',
                                allowOutsideClick: false,
                                allowEscapeKey: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(); // Reload the page
                                }
                            });
                        } else {
                            $('#formMessage').html(result.message);
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
            $('#formContainer').css('display', 'block'); // show the container
            $('html, body').animate({
                scrollTop: $('#formContainer').offset().top - 150
            }, 200); // smooth scroll to the form
        });
        $('#openCustomPopup2').on('click', function(e) {
            e.preventDefault();
            $('#formContainer').css('display', 'block'); // show the container
            $('html, body').animate({
                scrollTop: $('#formContainer').offset().top - 150
            }, 200); // smooth scroll to the form
        });
    });
</script>