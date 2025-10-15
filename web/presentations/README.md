# Presentations

This directory contains reveal.js presentations for the website.

## Getting Started

### Using the Template

1. Copy `template.html` to create a new presentation:
   ```bash
   cp template.html your-presentation-name/index.html
   ```

2. Edit the new file to customize:
   - Update the `<title>` tag
   - Change the presentation title and content
   - Set a custom background image for the title slide (see below)
   - Modify the theme if desired
   - Add your own custom CSS

### Custom Title Slide Background Images

Each presentation can have its own background image on the title slide. Add the image URL as an inline style on the `title-slide` section:

```html
<section class="title-slide" style="background-image: url('../../public/your-image.webp') !important;">
  <div class="title-content">
    <h1>Your Presentation Title</h1>
    <p>Subtitle or description</p>
  </div>
</section>
```

The background image will be positioned at the left top with 120% size, creating a two-column grid layout with the title content on the right side.

### Available Themes

The template uses a custom theme (`theme-joshuami.css`) that matches your site's design. This theme includes:

- **Typography**: System fonts matching your site (-apple-system, BlinkMacSystemFont, "Segoe UI", etc.)
- **Colors**: 
  - Primary text: `#202020` (dark gray)
  - Headings: `#313131` (slightly darker gray)
  - Links: `#0000ff` (blue) with `#0d6efd` hover
  - Background: `#ffffff` (white)
  - Code background: `#f9f9f9` (light gray)
  - Code text: `#bf616a` (reddish)
- **Bootstrap-inspired**: Uses similar color variables and styling as your Drupal theme

If you want to use a different theme, you can replace these lines:

```html
<link rel="stylesheet" href="https://unpkg.com/reveal.js/dist/reveal.css">
<link rel="stylesheet" href="theme-joshuami.css">
```

With any of the standard reveal.js themes:
- `https://unpkg.com/reveal.js/dist/theme/white.css`
- `https://unpkg.com/reveal.js/dist/theme/black.css`
- `https://unpkg.com/reveal.js/dist/theme/league.css`
- `https://unpkg.com/reveal.js/dist/theme/beige.css`
- `https://unpkg.com/reveal.js/dist/theme/sky.css`
- `https://unpkg.com/reveal.js/dist/theme/night.css`
- `https://unpkg.com/reveal.js/dist/theme/serif.css`
- `https://unpkg.com/reveal.js/dist/theme/simple.css`
- `https://unpkg.com/reveal.js/dist/theme/solarized.css`
- `https://unpkg.com/reveal.js/dist/theme/blood.css`
- `https://unpkg.com/reveal.js/dist/theme/moon.css`

### Features Included

The template includes these reveal.js plugins:
- **Markdown**: Write slides in Markdown
- **Highlight**: Syntax highlighting for code blocks
- **Notes**: Speaker notes (press 'S' to open)
- **Zoom**: Zoom into slides (Alt+click)

### Navigation

- **Arrow keys**: Navigate between slides
- **Space**: Next slide
- **Shift+Space**: Previous slide
- **Home**: First slide
- **End**: Last slide
- **F**: Fullscreen mode
- **S**: Speaker notes
- **B**: Pause presentation (black screen)
- **Esc**: Overview mode

### Writing Slides

#### Basic Structure
```html
<section>
  <h2>Slide Title</h2>
  <p>Your content here</p>
</section>
```

#### Vertical Slides (Sub-slides)
```html
<section>
  <h2>Main Topic</h2>
  <p>Introduction</p>
  
  <section>
    <h3>Sub-topic 1</h3>
    <p>Details for sub-topic 1</p>
  </section>
  
  <section>
    <h3>Sub-topic 2</h3>
    <p>Details for sub-topic 2</p>
  </section>
</section>
```

#### Code Blocks
```html
<pre><code data-trim data-noescape>
// Your code here
function example() {
  return "Hello, World!";
}
</code></pre>
```

#### Fragments (Progressive Disclosure)
```html
<ul>
  <li class="fragment">Appears first</li>
  <li class="fragment">Appears second</li>
  <li class="fragment">Appears third</li>
</ul>
```

### Custom Theme Features

The `theme-joshuami.css` includes several custom utility classes:

#### Text Utilities
```html
<p class="text-center">Centered text</p>
<p class="text-left">Left-aligned text</p>
<p class="text-right">Right-aligned text</p>
<p class="small">Small text</p>
<p class="large">Large text</p>
<p class="primary">Primary color text</p>
<p class="accent">Accent color text</p>
<p class="muted">Muted color text</p>
```

#### Layout Utilities
```html
<div class="slide-layout-two-column">
  <div>Left column content</div>
  <div>Right column content</div>
</div>

<div class="slide-layout-three-column">
  <div>Column 1</div>
  <div>Column 2</div>
  <div>Column 3</div>
</div>
```

### Customization

#### Custom CSS
Add your own styles in the `<style>` section:

```html
<style>
  /* Additional custom styles for your presentation */
  .reveal .custom-class {
    color: #ff0000;
  }
</style>
```

#### Theme Variables
The custom theme uses CSS custom properties that you can override:

```css
:root {
  --joshuami-primary: #0000ff;
  --joshuami-text: #202020;
  --joshuami-heading: #313131;
  --joshuami-background: #ffffff;
  /* ... other variables */
}
```

#### Configuration Options
Modify the `Reveal.initialize()` call to customize behavior:

```javascript
Reveal.initialize({
  hash: true,           // Enable hash navigation
  slideNumber: true,    // Show slide numbers
  transition: 'slide',  // Transition style
  // ... other options
});
```

### Deployment

Presentations are served as static HTML files. Simply:
1. Create your presentation in a subdirectory
2. Name the main file `index.html`
3. The presentation will be accessible at `/presentations/your-presentation-name/`

### Tips

- Use `data-trim` on code blocks to remove extra whitespace
- Use `data-noescape` to prevent HTML escaping in code blocks
- Press `?` during presentation for help
- Use fragments for progressive disclosure
- Consider using vertical slides for related topics
- Test your presentation in different browsers
