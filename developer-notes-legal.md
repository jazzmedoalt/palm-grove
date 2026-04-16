# Palm Grove Legal Pages Developer Notes

## New URLs To Publish
- https://www.palmgroveschool.com/privacy-policy/
- https://www.palmgroveschool.com/terms-and-conditions/

These pages are already created in the package folders:
- `deploy-ready/privacy-policy/index.html`
- `deploy-ready/terms-and-conditions/index.html`
- `deploy-ready-root-upload-v2/privacy-policy/index.html`
- `deploy-ready-root-upload-v2/terms-and-conditions/index.html`

## Footer Links Added In This Workspace
The following pages now include these footer links:
- `Privacy Policy`
- `Terms & Conditions`

Updated files:
- `homepage/index.html`
- `homepage/index-v2.html`
- `deploy-ready/index.html`
- `deploy-ready/index-v2.html`
- `deploy-ready-root-upload-v2/index.html`
- `deploy-ready-root-upload-v2/index-v2.html`

## Important: Untouched Form Pages Are Not In This Workspace
The actual website pages for:
- `https://www.palmgroveschool.com/Contact-Us/`
- `https://www.palmgroveschool.com/Schedule-Tour/`

were not present in this local package, so the form markup on those pages could not be patched directly here.

Please add the consent block below directly under the submit button on both form pages.

## Required Form Consent Copy
Use this directly under the `Schedule a Tour` and `Contact Us` submit buttons:

By submitting this form, I agree to receive phone calls, emails, and text messages from Palm Grove Montessori Academy about my inquiry, tour, enrollment interest, availability, reminders, and related school updates. Message frequency varies. Message and data rates may apply. Reply STOP to opt out and HELP for help. Consent is not a condition of enrollment. View our Privacy Policy and Terms & Conditions.

## Suggested HTML Snippet
```html
<p class="form-consent-note">
  By submitting this form, I agree to receive phone calls, emails, and text messages from Palm Grove Montessori Academy about my inquiry, tour, enrollment interest, availability, reminders, and related school updates. Message frequency varies. Message and data rates may apply. Reply STOP to opt out and HELP for help. Consent is not a condition of enrollment. View our
  <a href="https://www.palmgroveschool.com/privacy-policy/">Privacy Policy</a>
  and
  <a href="https://www.palmgroveschool.com/terms-and-conditions/">Terms &amp; Conditions</a>.
</p>
```

## Optional Separate Marketing Checkbox
If Palm Grove wants separate promotional consent, use this optional checkbox:

I agree to receive occasional marketing and promotional emails and text messages from Palm Grove Montessori Academy about programs, events, and enrollment opportunities. Message frequency varies. Message and data rates may apply. Reply STOP to opt out and HELP for help. Consent is not a condition of enrollment. View our Privacy Policy and Terms & Conditions.

## Phone Numbers Used In Legal Pages
- (409) 403-5040

## Email Used In Legal Pages
- admin@palmgroveschool.com

## Business Address Used In Legal Pages
Palm Grove Montessori Academy  
5900 Windhaven Parkway  
Plano, Texas 75093

## Recommended Final Checks Before Publish
- Confirm Palm Grove's exact legal business name and EIN match Playground records.
- Replace any old phone numbers still present elsewhere on the live website if they are no longer active.
- Add the required consent note on the live `Contact Us` and `Schedule a Tour` pages.
- Have counsel review both legal pages before final publication.
