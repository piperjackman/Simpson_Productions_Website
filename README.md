# Simpson Productions Website

A multi‑page web experience built for Simpson Productions, featuring dynamic galleries, JSON‑driven content, responsive layouts, and custom UI/UX design. Developed as part of my CIS capstone project.

---

## Overview

This website showcases Simpson College’s theatre program with pages for:

- Show Photos (dynamic gallery powered by JSON)
- Season Archive
- Meet the Team
- Departments
- Virtual Tour
- Home Page with branded UI/UX

The project emphasizes accessibility, responsive design, and maintainability.

---

## Tech Stack

**Front-End:** HTML, CSS, JavaScript  
**Back-End:** PHP  
**Data:** JSON  
**Tools:** VS Code, Live Server, Git, GitHub

---

## Features

- Dynamic photo gallery powered by `photos.json`
- Automated past‑show detection
- Custom lightbox viewer
- Mobile‑friendly responsive layout
- Consistent branding and accessible color contrast
- Modular JavaScript structure
- Organized file system for scalability

---

## Admin Panel & Photo Management System

In addition to the public-facing gallery, this project includes a custom admin interface that allows authorized users to manage photo content without editing files manually. The admin panel provides full CRUD functionality:

- **Upload Photos** — Add new images to the gallery with show titles, performer names, and dates  
- **Edit Photo Metadata** — Update titles, descriptions, or associated show information  
- **Delete Photos** — Remove outdated or incorrect images from both the gallery and the file system  
- **Automatic JSON Updates** — All changes write directly to `photos.json`, ensuring the gallery updates instantly  
- **Secure Access** — Admin tools are protected behind a login page to prevent unauthorized changes  

This system functions as a lightweight CMS, enabling Simpson Productions staff to maintain and update the gallery easily over time.

---

## File Structure
```
simpson-productions-website/
│
├── admin_login.php
├── admin_panel.php
├── upload_photo.php
├── edit_photo.php
├── update_photo.php
├── delete_photo.php
│
├── simpson_theatre.html
├── show_photos.html
├── shows.html
├── departments.html
├── meet_the_team.html
├── virtual_tour.html
├── footer.html
│
├── css/
│   └── main.css
│
├── js/
│   ├── backtotop.js
│   ├── footer.js
│   └── lightbox.js
│
├── data/
│   └── photos.json
│
├── images/
│
├── photos/
│
└── README.md
```

---

## Running the Project

Because the site uses `fetch()` to load JSON, it must be run on a local server.

Use VS Code’s **Live Server** extension:

Right‑click `index.html` → **Open with Live Server**

---

## Author

**Piper Jackman**  
Computer Information Systems major at Simpson College  
