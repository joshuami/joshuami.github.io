describe('Page content type', () => {

  beforeEach(() => {
    cy.setUp('standard').applyRecipe();
  });

  after(() => {
    cy.tearDown();
  });

  it('has the fields shared by all content types', () => {
    cy.drupalLogin('content_editor');
    cy.visit('/node/add/page');
    cy.findByLabelText('Title').should('exist');
    cy.findByLabelText('Description').should('exist').and('have.attr', 'required')
    cy.findByLabelText('Content').should('exist');
    // There should not be a summary field at all.
    cy.findByLabelText('Summary').should('not.exist');
    // Only one format is allowed, so it shouldn't be possible to choose the
    // text format.
    cy.findByLabelText('Text format').should('not.exist');
    cy.findByText('Featured image', { selector: '.fieldset__label' }).should('exist');
    cy.findByLabelText('Tags').should('exist');
  });

});
