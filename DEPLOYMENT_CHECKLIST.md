# 🚀 Deployment Checklist

Use this checklist when deploying the Dimgent Technologies website to production.

## Pre-Deployment

### 1. Configuration
- [ ] Update `config/app.php`:
  - [ ] Set `'env' => 'production'`
  - [ ] Set `'debug' => false`
  - [ ] Update `'url'` to production domain
  - [ ] Configure SMTP credentials (use production email)
  - [ ] Add reCAPTCHA keys for production domain

### 2. Dependencies
- [ ] Run `composer install --no-dev --optimize-autoloader`
- [ ] Verify PHPMailer is installed

### 3. Security
- [ ] Delete `public/verify.php` file
- [ ] Review `.htaccess` security settings
- [ ] Enable HTTPS redirect in `.htaccess` (uncomment lines 3-5)
- [ ] Change any default passwords
- [ ] Review file permissions (755 for directories, 644 for files)

### 4. Files & Assets
- [ ] Verify all images are in `public/assets/images/`
- [ ] Check PDF files are in `public/assets/pdf/`
- [ ] Ensure favicon.ico exists
- [ ] Remove any test/debug files

## Deployment

### 5. Server Setup
- [ ] PHP 8.0+ installed
- [ ] Required PHP extensions enabled (json, mbstring, curl, openssl)
- [ ] Apache mod_rewrite enabled OR Nginx configured
- [ ] Document root points to `public/` directory
- [ ] SSL certificate installed and configured

### 6. Upload Files
- [ ] Upload all files except:
  - [ ] `old_version_dimgent_com/` (backup only)
  - [ ] `.git/` directory
  - [ ] `composer.lock` (optional)
  - [ ] Development notes

### 7. Permissions
- [ ] Set directory permissions: `chmod 755`
- [ ] Set file permissions: `chmod 644`
- [ ] Ensure web server can read all files

## Post-Deployment

### 8. Testing
- [ ] Visit homepage: `https://yourdomain.com/`
- [ ] Test all navigation links
- [ ] Check each page loads correctly:
  - [ ] Home (/)
  - [ ] Products (/products)
  - [ ] Services (/services)
  - [ ] Projects (/projects)
  - [ ] Contacts (/contacts)
  - [ ] About (/about)
- [ ] Test 404 page (visit non-existent URL)
- [ ] Test mobile responsiveness

### 9. Contact Form Testing
- [ ] Fill out and submit contact form
- [ ] Verify email is received
- [ ] Check email formatting looks correct
- [ ] Test with invalid inputs (validation)
- [ ] Verify reCAPTCHA works
- [ ] Test honeypot field (should block spam)

### 10. SEO & Analytics
- [ ] Verify Google Analytics tracking code
- [ ] Update sitemap.xml with production URL
- [ ] Submit sitemap to Google Search Console
- [ ] Verify robots.txt is accessible
- [ ] Check meta tags on all pages
- [ ] Test page load speeds

### 11. Security Check
- [ ] Force HTTPS (no mixed content warnings)
- [ ] Test XSS protection (try injecting scripts)
- [ ] Verify email spam protection works
- [ ] Check error pages don't reveal sensitive info
- [ ] Review server logs for any errors

### 12. Monitoring
- [ ] Set up error logging
- [ ] Configure server monitoring
- [ ] Set up backup schedule
- [ ] Document recovery procedures

## Final Steps

### 13. Documentation
- [ ] Update README.md with production URLs
- [ ] Document any server-specific configurations
- [ ] Note any customizations made

### 14. Handoff
- [ ] Provide client with admin credentials (if applicable)
- [ ] Share SMTP configuration details
- [ ] Provide reCAPTCHA account access
- [ ] Share hosting/server details

## Quick Commands

### Deploy with Composer
```bash
composer install --no-dev --optimize-autoloader
```

### Set Permissions (Linux)
```bash
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
```

### Clear Cache (if implemented)
```bash
rm -rf cache/*
```

## Rollback Plan

If something goes wrong:

1. **Keep backup** of old site files
2. **Database backup** (if added in future)
3. **Config backup** - keep old `config/app.php`
4. **Quick restore**: Replace files with backup
5. **DNS**: Keep old server available for 24h

## Support Contacts

- **Hosting Provider**: [Add contact info]
- **Domain Registrar**: [Add contact info]
- **Email Provider**: [Add SMTP provider info]
- **Developer**: [Add your contact]

---

## Post-Launch (Week 1)

- [ ] Monitor error logs daily
- [ ] Check contact form submissions
- [ ] Review analytics data
- [ ] Test from different devices/browsers
- [ ] Address any user-reported issues

## Post-Launch (Month 1)

- [ ] Review performance metrics
- [ ] Update content as needed
- [ ] Check for any broken links
- [ ] Review SEO performance
- [ ] Plan any enhancements

---

**Deployment Date**: _______________
**Deployed By**: _______________
**Production URL**: _______________
**Verified By**: _______________

✅ **Deployment Complete!**
