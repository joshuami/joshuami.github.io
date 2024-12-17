describe('Contact form', () => {

  beforeEach(() => {
    cy.setUp('standard').applyRecipe().visit('/contact');
  });

  after(() => {
    cy.tearDown();
  });

  it('appears in the main menu', () => {
    // Ensure the viewport is wide enough to see the main menu links.
    cy.viewport('macbook-13');
    cy.findByText('Main navigation').parent().find('a:contains("Contact")');
  });

  it('has spam protection', () => {
    // Confirm the Antibot and Honeypot fields exist within the form.
    cy.get('#webform-submission-contact-form-add-form').within(() => {
      cy.get('input[type="hidden"][name="antibot_key"]').should('exist');
      cy.get('input[name="url"]').should('not.be.visible');
    });
  });

  it('requires all fields', () => {
    const confirmationMessage = '.webform-confirmation__message';

    // Submit an empty form.
    cy.findByDisplayValue('Submit').click();
    cy.get(confirmationMessage).should('not.exist');

    // Submit just the name field.
    cy.findByLabelText('Name').type('Cypress Test User');
    cy.findByDisplayValue('Submit').click();
    cy.get(confirmationMessage).should('not.exist');

    // Submit the name and email fields.
    cy.findByLabelText('Email').type('test@example.com');
    cy.findByDisplayValue('Submit').click();
    cy.get(confirmationMessage).should('not.exist');

    // Submit the whole form.
    cy.findByLabelText('Message').type('The quick brown fox jumps over the lazy dog.');
    cy.findByDisplayValue('Submit').click();
    cy.get(confirmationMessage).should('contain.text', 'Thank you for contacting us. We have received your message and will get back with you soon.');
  });

  it('has an optional CAPTCHA', () => {
    const captcha = () => cy.findByText('CAPTCHA', { selector: 'fieldset > legend' });

    captcha().should('not.exist');
    cy.applyRecipe(null, { captcha: 1 });
    cy.reload();
    captcha().should('exist');
  });
});
