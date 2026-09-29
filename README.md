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

## File Structure
```
simpson-productions-website/
│
├── index.html
├── showphotos.html
├── departments.html
├── meettheteam.html
├── seasonarchive.html
│
├── css/
│   └── main.css
│
├── js/
│   ├── showphotos.js
│   ├── lightbox.js
│   └── backtotop.js
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
