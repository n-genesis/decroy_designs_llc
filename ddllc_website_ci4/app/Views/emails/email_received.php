<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message Received</title>
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
              <h1 style="font-size: 1.5rem; font-weight: 700; color: #212529; margin-top: 0; margin-bottom: 16px;">We've received your message</h1>
              
              <p style="font-size: 1rem; line-height: 1.6; color: #495057; margin-bottom: 16px;">
                Thank you for reaching out to us! This is an automated confirmation to let you know that your message successfully landed in our inbox.
              </p>
              
              <p style="font-size: 1rem; line-height: 1.6; color: #495057; margin-bottom: 24px;">
                We do our absolute best to read all our emails and follow up with a helpful replay within <strong>24 business hours</strong>.
              </p>

              <hr style="border: 0; border-top: 1px solid #dee2e6; margin-bottom: 24px;">

              <p style="font-size: 0.875rem; line-height: 1.5; color: #6c757d; margin-bottom: 0;">
                Best regards,<br>
                <strong><?= service('settings')->get('App.appOwner')?></strong>
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
                If you have any questions you can reply directly to this email.
              </p>
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>

</body>
</html>
