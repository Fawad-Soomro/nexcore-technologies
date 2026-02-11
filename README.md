# NexCore Technologies Website

A professional, multi-page business website built with modern HTML5, CSS3, and JavaScript. Features responsive design, smooth animations, and a complete contact form system.

## 🚀 Features

- **Multi-Page Architecture**: Separate pages for Home, About, Services, Team, and Contact
- **Responsive Design**: Fully mobile-friendly and works on all devices
- **Modern UI/UX**: Beautiful gradient design with smooth animations
- **Interactive Elements**: Hover effects, scroll animations, and dynamic content
- **Contact Form**: Working contact form with validation (PHP backend included)
- **SEO Optimized**: Proper meta tags and semantic HTML
- **Fast Loading**: Optimized CSS and JavaScript
- **Cross-Browser Compatible**: Works on all modern browsers

## 📁 Project Structure

```
nexcore-website/
│
├── index.html          # Home page
├── about.html          # About page
├── services.html       # Services page
├── team.html          # Team page
├── contact.html       # Contact page
├── contact.php        # Contact form backend (optional)
│
├── css/
│   └── style.css      # Main stylesheet
│
├── js/
│   └── script.js      # JavaScript functionality
│
└── images/            # Image placeholders
    └── (placeholder images)
```

## 🎨 Design Features

### Color Scheme
- **Primary Blue**: #0066FF
- **Cyan**: #00D9FF
- **Dark Background**: #0a0e1a
- **White**: #ffffff

### Typography
- **Display Font**: Outfit (headings)
- **Body Font**: DM Sans (paragraphs)

### Animations
- Fade-in animations on scroll
- Smooth hover effects on buttons and cards
- Floating geometric shapes in hero section
- Counter animations for statistics

## 🛠️ Installation & Setup

### 1. Basic Setup (Static HTML)

Simply open `index.html` in any modern web browser. No server required for basic functionality.

### 2. Local Development Server

For testing the contact form and full functionality:

**Using Python:**
```bash
cd nexcore-website
python -m http.server 8000
```

**Using PHP:**
```bash
cd nexcore-website
php -S localhost:8000
```

**Using Node.js (Live Server):**
```bash
npm install -g live-server
live-server
```

Then visit: `http://localhost:8000`

### 3. Contact Form Setup (Optional)

To enable the contact form:

1. **Edit `contact.php`:**
   - Change `$to_email` to your actual email address
   - Update other settings as needed

2. **Configure Server Mail:**
   - Ensure your server has mail functionality enabled
   - For production, use SMTP configuration
   - Consider services like SendGrid, Mailgun, or AWS SES

3. **Test the Form:**
   - Fill out the contact form
   - Check your email for submissions

## 🖼️ Adding Images

All image placeholders need to be replaced with actual images:

### Required Images:

1. **Home Page:**
   - `images/home-banner.jpg` - Hero section background
   - `images/about-preview.jpg` - About section preview

2. **About Page:**
   - `images/company-story.jpg` - Company story illustration
   - `images/why-choose-us.jpg` - Why choose us section

3. **Services Page:**
   - `images/web-development.jpg` - Web development service
   - `images/ecommerce.jpg` - E-commerce service
   - `images/ai-chatbot.jpg` - AI chatbot service
   - `images/maintenance.jpg` - Maintenance service

4. **Team Page:**
   - `images/team-fawad.jpg` - Fawad Soomro (Team Lead)
   - `images/team-member2.jpg` - Ali Rahman
   - `images/team-member3.jpg` - Sara Ahmed
   - `images/team-member4.jpg` - Hamza Khan
   - `images/team-member5.jpg` - Ayesha Malik
   - `images/join-team.jpg` - Join team section

5. **General:**
   - `images/favicon.png` - Browser favicon (16x16 or 32x32)

### Image Specifications:
- **Format**: JPG or PNG
- **Hero Images**: 1920x1080px (minimum)
- **Team Photos**: 500x500px (square, minimum)
- **Service Images**: 800x600px (minimum)
- **Favicon**: 32x32px PNG

## 🌐 Deployment

### GitHub Pages

1. Create a GitHub repository
2. Upload all files
3. Go to Settings > Pages
4. Select main branch
5. Your site will be live at: `https://yourusername.github.io/repository-name`

### Netlify

1. Create account at netlify.com
2. Drag and drop the `nexcore-website` folder
3. Your site goes live instantly
4. Get a free subdomain or connect custom domain

### Traditional Web Hosting

1. Upload files via FTP to your hosting provider
2. Ensure PHP is enabled if using contact form
3. Point your domain to the hosting
4. Test all functionality

## 📱 Responsive Breakpoints

- **Desktop**: 1024px and above
- **Tablet**: 768px - 1023px
- **Mobile**: Below 768px

## ✨ Key Features Breakdown

### Navigation
- Fixed navigation bar with scroll effect
- Mobile-responsive hamburger menu
- Active page highlighting
- Smooth scroll to sections

### Home Page
- Dynamic hero section with animated background
- Service cards with hover effects
- Testimonials section
- Call-to-action sections

### About Page
- Company story and mission/vision
- Core values showcase
- Statistics with counter animations
- Why choose us section

### Services Page
- Detailed service descriptions
- Pricing information
- Process workflow
- Additional services grid

### Team Page
- Team member cards with social links
- Team culture highlights
- Career opportunities section
- Team testimonials

### Contact Page
- Contact information cards
- Working contact form
- FAQ section
- Business hours
- Map placeholder

## 🔧 Customization

### Changing Colors

Edit the CSS variables in `css/style.css`:

```css
:root {
    --primary-blue: #0066FF;
    --cyan: #00D9FF;
    /* Change these to your brand colors */
}
```

### Changing Content

All content is in the HTML files. Simply edit the text within the tags.

### Adding More Pages

1. Copy an existing HTML file
2. Update the content
3. Add navigation link in all pages
4. Update footer links

## 📧 Contact Form Validation

The form includes:
- Client-side validation (JavaScript)
- Server-side validation (PHP)
- Email format checking
- Required field validation
- Spam protection
- Rate limiting

## 🔒 Security Features

- XSS protection
- SQL injection prevention (if using database)
- CSRF protection recommended for production
- Input sanitization
- Rate limiting on form submissions

## 📊 Analytics Setup

To add Google Analytics:

1. Get your tracking ID from Google Analytics
2. Add this code before `</head>` in all HTML files:

```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=YOUR-ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'YOUR-ID');
</script>
```

## 🎯 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## 📝 License

This is a custom website built for NexCore Technologies. Modify and use as needed for your business.

## 🤝 Support

For questions or support:
- Email: info@nexcore.tech
- Phone: +92 123 456 7890

## 🚀 Future Enhancements

Potential additions:
- Blog section
- Portfolio/case studies
- Client login area
- Live chat integration
- Newsletter signup
- Multi-language support

## 📅 Version History

**Version 1.0** (February 2026)
- Initial release
- 5 complete pages
- Responsive design
- Contact form
- Animated elements

---

**Built with ❤️ by NexCore Technologies**

For the best experience, use modern browsers and ensure JavaScript is enabled.
