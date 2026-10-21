<!-- app/Views/web/templates/consultation.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>

<main class="main">

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0"><?= esc($title) ?></h1>
        <!-- Breadcrumbs -->
        <?php if (!empty($breadcrumbHtml)): ?>
            <?= $breadcrumbHtml ?>
        <?php endif; ?>
    </div>
</div><!-- End Page Title -->

<!-- Consultation Section -->
<section id="consultation" class="consultation section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Get A Free Esitmate On Your Project</h2>
        <p>Tell us about your project, and we'll get back to you with a detailed estimate.</p>
    </div><!-- End Section Title -->
    
    <!--Main Section -->
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <!-- Request Quote Form -->
            <div class="col-lg-8">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger" role="status"><?= esc($error) ?></div>
                <?php endif ?>
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>
                <?php if(empty($success)): ?>          
                <div class="border rounded-3 p-3 bg-light">

                    <form id="consultation-form"  action="<?= site_url('consultation') ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <?= csrf_field() ?>
                        <!-- Section 1: Contact Information -->
                        <h4 class="mb-3 text-secondary border-bottom pb-2">1. Contact Information</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" value="<?= esc(old('first_name')) ?>" required>
                                <div class="invalid-feedback">Please enter your first name.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" value="<?= esc(old('last_name')) ?>" required>
                                <div class="invalid-feedback">Please enter your last name.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= esc(old('email')) ?>" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="(555) 555-5555" value="<?= esc(old('phone')) ?>" required>
                                <div class="invalid-feedback">Please enter your phone number.</div>
                            </div>
                        </div>
                        <!-- Section 2: Project Details -->
                        <h4 class="mb-3 text-secondary border-bottom pb-2">2. Project Details</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="service" class="form-label">Project Type *</label>
                                <select class="form-select" id="service" name="service" required>
                                    <option value="" disabled>Choose a service...</option>
                                    <option value="new-construction" <?= old('service') == 'new-construction' ? 'selected' : '' ?>>New Home Construction</option>
                                    <option value="remodel" <?= old('service') == 'remodel' ? 'selected' : '' ?>>Commercial Construction</option>
                                    <option value="renovation" <?= old('service') == 'renovation' ? 'selected' : '' ?>>Home Renovation / Remodeling</option>
                                    <option value="roofing" <?= old('service') == 'roofing' ? 'selected' : '' ?>>Roofing & Siding</option>
                                    <option value="other" <?= old('service') == 'other' ? 'selected' : '' ?>>Other / Custom Project</option>
                                </select>
                                <div class="invalid-feedback">Please select a project type.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="projectLocation" class="form-label">Project Address / Location *</label>
                                <input type="text" class="form-control" id="projectLocation" name="project_location" placeholder="City, State or Full Address" value="<?= esc(old('project_location')) ?>" required>
                                <div class="invalid-feedback">Please enter the project location.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="estimatedBudget" class="form-label">Estimated Budget Range</label>
                                <select class="form-select" id="estimatedBudget" name="estimated_budget">
                                    <option value="under-10k" <?= old('service') == 'under-10k' ? 'selected' : '' ?>>Under $10,000</option>
                                    <option value="10k-50k" <?= old('service') == '10k-50k' ? 'selected' : '' ?>>$10,000 - $50,000</option>
                                    <option value="50k-150k" <?= old('service') == '50k-150k' ? 'selected' : '' ?>>$50,000 - $150,000</option>
                                    <option value="150k-500k" <?= old('service') == '150k-500k' ? 'selected' : '' ?>>$150,000 - $500,000</option>
                                    <option value="500k-plus" <?= old('service') == '500k-plus' ? 'selected' : '' ?>>$500,000+</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="startDate" class="form-label">Desired Start Date</label>
                                <input type="date" class="form-control" id="startDate" name="start_date" value="<?= esc(old('start_date')) ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="projectDescription" class="form-label">Project Scope & Description *</label>
                                <textarea class="form-control" id="projectDescription" name="project_description" rows="4" placeholder="Please describe the work you need done, structural changes, specific materials, dimensions, etc." required><?= esc(old('project_description')) ?></textarea>
                                <div class="invalid-feedback">Please provide some details about your project.</div>
                            </div>
                        </div>
                        <!-- Section 3: File Upload & Submit -->
                        <h4 class="mb-3 text-secondary border-bottom pb-2">3. Attachments</h4>
                        <div class="mb-4">
                            <label for="projectFiles" class="form-label">Upload Blueprints, Sketches, or Site Photos</label>
                            <input class="form-control" type="file" id="projectFiles" name="project_files[]" multiple>
                            <div class="form-text">You can select multiple files max. 5 (PDF, JPG, PNG). Max size 4MB per file.</div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="agreeTerms" required>
                            <label class="form-check-input-label" for="agreeTerms">
                                I agree to be contacted by phone or email regarding this quote request. *
                            </label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-outline-secondary rounded-2 btn-lg px-4 me-md-2 fw-bold" type="reset" style="font-size: 16px;">Clear Form</button>
                            <button class="btn btn-submit text-white px-5" type="submit">Submit Request</button>
                        </div>
                    </form>
                </div> 
                <?php elseif(!empty($success)): ?>
                    <div class="alert alert-success" role="status"><?= esc($success) ?></div>
                <?php endif ?>
            </div>

            <!-- Aside Section -->
            <aside class="col-lg-4">
                <div class="services row g-4">
                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="bi bi-house-door"></i>
                            </div>
                            <div class="service-body">
                                <h4>Residential Building</h4>
                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur
                                    adipisci velit.</p>
                            </div>
                        </div>
                    </div><!-- End Service -->

                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <div class="service-body">
                                <h4>Commercial Projects</h4>
                                <p>Ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit
                                    laboriosam.</p>
                            </div>
                        </div>
                    </div><!-- End Service -->

                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="bi bi-hammer"></i>
                            </div>
                            <div class="service-body">
                                <h4>Renovation &amp; Remodeling</h4>
                                <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil
                                    molestiae.</p>
                            </div>
                        </div>
                    </div><!-- End Service -->

                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                            <div class="service-body">
                                <h4>Project Management</h4>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed
                                    quia.</p>
                            </div>
                        </div>
                    </div><!-- End Service -->

                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="bi bi-rulers"></i>
                            </div>
                            <div class="service-body">
                                <h4>Architecture &amp; Design</h4>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                    praesentium.</p>
                            </div>
                        </div>
                    </div><!-- End Service -->

                </div>
            </aside>
        </div>
    </div>

    <!-- Bootstrap 5 Validation Script -->
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</section>


</main>

<?= $this->endSection(); ?>