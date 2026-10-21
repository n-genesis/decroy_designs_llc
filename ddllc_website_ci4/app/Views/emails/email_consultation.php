<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client Quote Request From <?= service('settings')->get('App.appName') ?></title>
  <style>
    /* Responsive overrides for email clients that accept embedded styles */
    @media screen and (max-width: 600px) {
      .container { width: 100% !important; padding: 10px !important; }
      .card-body { padding: 20px !important; }
    }
  </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f8f9fa; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">

  <!-- Main Background Container -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8f9fa; padding: 40px 0;">
    <tr>
      <td align="center">
        
        <!-- Email Content Wrapper (Max Width constraints) -->
        <table border="0" cellpadding="0" cellspacing="0" class="container" width="600" style="background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 6px; border-collapse: separate; box-shadow: 0 2px 4px rgba(0,0,0,0.04);">
          
          <!-- Email Header / Branding -->
          <tr>
            <td align="left" valign="middle"  style="padding: 24px 32px; background-color: #ffffff; border-bottom: 1px solid #dee2e6; border-top-left-radius: 6px; border-top-right-radius: 6px;">
  <img src="<?= base_url('assets/img/ddllc-logo.webp') ?>" alt="Logo" width="48" height="48" style="display: inline-block; vertical-align: middle; width: 48px; height: 48px; margin-right: 12px; border: 0; outline: none;">
  <span style="display: inline-block; vertical-align: middle; font-size: 1.25rem; font-weight: 600; color: #212529; letter-spacing: -0.5px; line-height: 48px;">
                 <?= service('settings')->get('App.appName') ?></span>
            </td>
          </tr>

          <!-- Email Body / Card Content -->
          <tr>
            <td class="card-body" style="padding: 32px; text-align: left;">
              <h1 style="font-size: 1.5rem; font-weight: 700; color: #212529; margin-top: 0; margin-bottom: 16px;">A Client Request A Quote!</h1>
              
              <p style="font-size: 1rem; line-height: 1.6; color: #495057; margin-bottom: 16px;">
                <?= esc("$first_name $last_name") ?> as requested a quote from the <?= service('settings')->get('App.appName') ?> website. You can responce to the sender by replying to this email. 
              </p>

              <hr style="border: 0; border-top: 1px solid #dee2e6; margin-bottom: 16px;">
              
              <p style="font-size: 1rem; line-height: 1.6; color: #495057; margin-bottom: 2px;">
                <strong>From: </strong> <?= esc("$first_name $last_name") ?><br />
                <strong>Email: </strong> <?= esc($email) ?><br />
                <strong>Phone: </strong> <?= esc($phone) ?><br />
                <strong>Project Location: </strong> <?= esc($project_location) ?><br />
                <strong>Requested Service: </strong> <?= esc($service) ?><br />
                <strong>Estimated Budget: </strong> <?= esc($estimated_budget) ?><br />
                <strong>Start Date: </strong> <?= \CodeIgniter\I18n\Time::parse($start_date)->toLocalizedString('MMM d, yyyy') ?><br />
                <strong>Project Description: </strong> <?= esc($project_description) ?><br />
              </p>

              <p style="font-size: 1rem; font-weight: bold; line-height: 1.6; color: #495057; margin-bottom: 24px;">
                Important: The client may have attached images with their Request. BE VERY CAREFUL WHEN OPENING ATTACHMENTS!
              </p>

            </td>
          </tr>

          <!-- Email Footer / Compliance Links -->
          <tr>
            <td align="center" style="padding: 24px 32px; background-color: #f8f9fa; border-top: 1px solid #dee2e6; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
              <p style="font-size: 0.75rem; line-height: 1.5; color: #6c757d; margin: 0 0 8px 0;">
                <?= service('settings')->get('App.appCopyright') . ' ' . service('settings')->get('App.appName') . ' ' . service('settings')->get('App.appAddress') ?>
              </p>
              <p style="font-size: 0.75rem; line-height: 1.5; color: #6c757d; margin: 0;">
                This message was sent from the <?= service('settings')->get('App.appName') ?> website.
              </p>
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>

</body>
</html>
