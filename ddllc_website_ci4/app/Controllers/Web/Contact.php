<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Contact extends BaseController
{
    public function contact()
    {
        return $this->renderView("web/templates/contact", [
                'pageTitle' => str_replace(array('<span>', '</span>'), '', service('settings')->get('App.appName'))." | Contact Us",
                'description' => $page->page_description ?? service('settings')->get('App.appDesc'),
                'keywords' => service('settings')->get('App.appKeywords') ?? '',
                'title'   => 'Contact',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('')],
                    ['label' => 'Contact', 'url' => ''],
                ],
                'errors' => session()->getFlashdata('errors') ?? [],
                'success' => session()->getFlashdata('success') ?? [],
            ]
        );
    }
    /**
     * Create a Confirmation Email
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function sendNotification()
    {
        $email = \Config\Services::email();

        // Build the email headers and body
        // $email->setFrom(service('settings')->get('App.appEmail'),  str_replace(array('<span>', '</span>'), '', service('settings')->get('App.appName')));
        $email->setTo($this->request->getPost('email'));
        $email->setSubject("We've received your message, " .$this->request->getPost('fullName') . "!");
        
        // You can pass raw HTML since 'mailType' is set to 'html'
        $htmlBody = view('emails/email_received', $this->request->getPost());
        $email->setMessage($htmlBody);

        // Dispatch the email and handle success/failure
        if ($email->send()) {
            return redirect()->to('/contact')->with('success', 'Notification email sent successfully!');
        } else {
            // Log or debug errors if things go wrong
            $data = $email->printDebugger(['headers', 'subject', 'body']);
            log_message('error', 'Email failed to send. Debug log: ' . json_encode($data));
            
            return redirect()->to('/contact')->with('error', 'Failed to send confirmation email.');
        }
    }

    public function sendMessage(){
        // Contact Message Rules
        $rules = [
            'fullName' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[2]|max_length[70]|regex_match[/^[\p{L}\'\-\.]+(?:\s+[\p{L}\'\-\.]+)+$/u]',
                'errors' => [
                    'required'    => 'Please enter your full name.',
                    'regex_match' => 'Please enter both your first and last name (letters, spaces, hyphens, apostrophes, and periods only).',
                ],
            ],
            'email' => [
                'label' => 'Email Address',
                'rules' => 'required|valid_email|max_length[255]',
                'errors' => [
                    'valid_email' => 'Please check the formatting of your email address.',
                ],
            ],
            'phone' => [
                'label' => 'Phone Number',
                // Optional field, but strictly verifies standard US formats if filled
                'rules' => 'permit_empty|regex_match[/^(?:\+?1[-. ]?)?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/]',
                'errors' => [
                    'regex_match' => 'Please enter a valid 10-digit phone number (e.g., 555-555-1234).',
                ],
            ],
            'service' => [
                'label' => 'Service Type',
                // In-list blocks arbitrary value spoofing via browser inspect tools
                'rules' => 'required|in_list[residential,commercial,renovation,other]',
                'errors' => [
                    'in_list' => 'Please choose a valid option from the dropdown menu.',
                ],
            ],
            'subject' => [
                'label' => 'Subject',
                'rules' => 'required|min_length[3]|max_length[150]',
            ],
            'message' => [
                'label' => 'Message',
                'rules' => 'required|min_length[10]|max_length[3000]',
                'errors' => [
                    'min_length' => 'Your message must be at least 10 characters long to help us understand your request.',
                    'max_length' => 'Messages are capped at 3,000 characters.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 1. Get the shared Email service instance
        $email = \Config\Services::email();

        // 2. Build the email headers and body
        // $email->setFrom($this->request->getPost('email'), $this->request->getPost('fullName'));
        $email->setTo(service('settings')->get('App.appEmail'));
        $email->setSubject($this->request->getPost('fullName') . " sent you a message!");
        
        // You can pass raw HTML since 'mailType' is set to 'html'
        $htmlBody = view('emails/email_from_site', $this->request->getPost());
        $email->setMessage($htmlBody);

        // 3. Dispatch the email and handle success/failure
        if ($email->send()) {
            $this->sendNotification();
            return redirect()->to('/contact')->with('success', 'Your message has been sent! Be sure to lookout for an email from '. service('settings')->get('App.appEmail'). '.');
        } else {
            // Log or debug errors if things go wrong
            $data = $email->printDebugger(['headers', 'subject', 'body']);
            log_message('error', 'Email failed to send. Debug log: ' . json_encode($data));
            
            return redirect()->to('/contact')->with('error', 'Failed to send email. Please try again.');
        }
    }

    public function consultation()
    {
        return $this->renderView("web/templates/consultation", [
                'pageTitle' => str_replace(array('<span>', '</span>'), '', service('settings')->get('App.appName'))." | Contact Us",
                'description' => $page->page_description ?? service('settings')->get('App.appDesc'),
                'keywords' => service('settings')->get('App.appKeywords') ?? '',
                'title'   => 'Request A Quote',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('')],
                    ['label' => 'Contact', 'url' => site_url('contact')],
                    ['label' => 'Request A Quote', 'url' => ''],
                ],
                'error' => session()->getFlashdata('error') ?? [],
                'errors' => session()->getFlashdata('errors') ?? [],
                'success' => session()->getFlashdata('success') ?? [],
            ]
        );
    }

    public function consultationRequest(){
        // Validate the form input
        if (!$this->validate('contectMessageRules')) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get the shared Email service instance
        $email = \Config\Services::email();

        // Build the email headers and body
        // $email->setFrom($this->request->getPost('email'), $this->request->getPost('first_name').' '.$this->request->getPost('last_name'));
        $email->setTo(service('settings')->get('App.appEmail'));
        $email->setSubject("A Client Has Request A Quote");
        
        // You can pass raw HTML since 'mailType' is set to 'html'
        $htmlBody = view('emails/email_consultation', $this->request->getPost());
        $email->setMessage($htmlBody);

        //  Attach files and dispatch the email and handle success/failure
        if ($this->attachFiles($email)) {
            $this->sendConsultationNotice();
            return redirect()->to('/consultation')->with('success', 'Your message has been sent! Be sure to lookout for an email from '. service('settings')->get('App.appEmail'). '.');
        } else {
            // Log or debug errors if things go wrong
            $data = $email->printDebugger(['headers', 'subject', 'body']);
            log_message('error', 'Email failed to send. Debug log: ' . json_encode($data));
            
            return redirect()->back()->withInput()->with('error', 'Failed to transmit attachments via email.');
        }
    }

    public function sendConsultationNotice(){
        $email = \Config\Services::email();

        // Build the email headers and body
        // $email->setFrom(service('settings')->get('App.appEmail'),  str_replace(array('<span>', '</span>'), '', service('settings')->get('App.appName')));
        $email->setTo($this->request->getPost('email'));
        $email->setSubject("We’ve received your project inquiry " . $this->request->getPost('first_name') . "!");
        
        // You can pass raw HTML since 'mailType' is set to 'html'
        $htmlBody = view('emails/email_request_received', $this->request->getPost());
        $email->setMessage($htmlBody);

        // Dispatch the email and handle success/failure
        if ($email->send()) {
            return redirect()->to('/consultation')->with('success', "Thank you for taking the time to fill out our Quote form, you request has been submitted successfully!");
        } else {
            // Log or debug errors if things go wrong
            $data = $email->printDebugger(['headers', 'subject', 'body']);
            log_message('error', 'Email failed to send. Debug log: ' . json_encode($data));
            
            return redirect()->to('/consultation')->with('error', 'Failed to submit Quote Request.');
        }
    }

    public function attachFiles($email)
    {
        // Fetch the raw array of uploaded files
        $files = $this->request->getFileMultiple('project_files');
        
        // Define your hard upper limit
        $maxFileLimit = 5;

        // Enforce the array count rule manually
        if (is_array($files) && count($files) > $maxFileLimit) {
            return redirect()->back()->withInput()->with('error', "You can only upload a maximum of {$maxFileLimit} files.");
        }

        // Proceed with structural validation rules per file
        $rules = [
            'project_files' => [
                'label' => 'Project Files',
                'rules' => 'uploaded[project_files]'
                          . '|mime_in[project_files,image/jpg,image/jpeg,image/png,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]'
                          . '|max_size[project_files,4096]', // 4MB individual limit
            ],
        ];

        if (! $this->validate($rules)) {
            return false;
        }

        $uploadedPaths = [];

        // Process and attach files
        foreach ($files as $file) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);
                
                $fullPath = WRITEPATH . 'uploads/' . $newName;
                $uploadedPaths[] = $fullPath;
                // Use parameter Service\Email
                $email->attach($fullPath);
            }
        }

        // Send and clean up server files
        $success = $email->send();

        foreach ($uploadedPaths as $path) {
            if (file_exists($path)) {
                unlink($path);
            }
        }

        if ($success) {
            return true;
        } else {
            return false;
        }
    }
}
