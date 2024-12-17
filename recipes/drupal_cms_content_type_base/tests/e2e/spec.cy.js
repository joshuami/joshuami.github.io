import chaiString from 'chai-string';

chai.use(chaiString);

describe('Content type base', () => {

  beforeEach(() => {
    cy.setUp('standard').applyRecipe();
  });

  after(() => {
    cy.tearDown();
  });

  it('can duplicate content', () => {
    cy.drupalLogin('content_editor');

    const originalTitle = 'Fun Times';
    const interstitialMessage = `You are duplicating "${originalTitle}"`;

    // Create first node.
    cy.visit('/node/add/page');
    cy.findByLabelText('Title').type(originalTitle);
    cy.findByDisplayValue('Save').click();
    cy.get('.page-title').should('contain.text', originalTitle);

    // Duplicate that node from its canonical route.
    cy.get('[data-drupal-nav-primary-tabs]')
      .findByText('Duplicate', { selector: 'a' })
      .click();
    cy.get('[data-drupal-messages]').should('contain.text', interstitialMessage);
    cy.findByLabelText('Title')
      .should('have.value', originalTitle)
      .clear()
      .type(`${originalTitle}, cloned by tab`);
    cy.findByDisplayValue('Save').click();
    cy.get('.page-title').should('contain.text', `${originalTitle}, cloned by tab`);

    // Duplicate it again from the operation dropdown in the administrative
    // content list.
    cy.visit('/admin/content');
    cy.findByText(originalTitle).closest('tr').dropButtonAction('Duplicate').click();
    cy.get('[data-drupal-messages]').should('contain.text', interstitialMessage);
    cy.findByLabelText('Title')
      .should('have.value', originalTitle)
      .clear()
      .type(`${originalTitle}, cloned by admin operation`);
    cy.findByDisplayValue('Save').click();
    // We should be back on the administrative content list, and the duplicated
    // node should exist.
    cy.get('.page-title').should('contain.text', 'Content');
    cy.findByText(`${originalTitle}, cloned by admin operation`, { selector: 'tr a' }).should('exist');
  });

})
