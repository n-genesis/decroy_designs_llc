# DeCroy Designs LLC - Business Website

[![Website Status](https://img.shields.io/badge/status-active-brightgreen)](https://decroydesigns.com)
[![License](https://img.shields.io/badge/license-Proprietary-red.svg)](LICENSE)

The official corporate web application for **DeCroy Designs LLC**, a premier construction and architectural design company. This repository houses the front-facing business website, service showcase, project portfolio, and client consultation intake pipeline.

## 🚀 Live Production
View the live public website and portfolio at: [https://decroydesigns.com](https://decroydesigns.com)

## 📌 Table of Contents
- [Core Features](#-core-features)
- [Tech Stack](#-tech-stack)
- [Getting Started](#-getting-started)
  - [Prerequisites](#prerequisites)
  - [Local Installation](#local-installation)
  - [Environment Configuration](#environment-configuration)
- [Available Scripts](#-available-scripts)
- [Project Architecture](#-project-architecture)
- [Content Management (CMS)](#-content-management-cms)
- [Deployment Pipeline](#-deployment-pipeline)
- [License & Ownership](#-license--ownership)

## ✨ Core Features
- **Project Portfolio Showcase:** Interactive high-resolution galleries filtering completed commercial and residential construction projects.
- **Lead Generation Pipeline:** Dynamic multi-step consultation request forms hooked up to email notifications and CRM.
- **Testimonials & Reviews:** Dynamic content section displaying verified client feedback.
- **SEO & Performance Optimized:** Server-side rendered pages with fully optimized semantic HTML, schema definitions, and fast loading asset pipelines for local SEO ranking.

## 💻 Tech Stack
- **Frontend / Framework:** Bootstrap 5 & CodeIgniter 4
- **Media Optimization:** Cloudinary or AWS S3 (for heavy construction project images)
- **CMS (Optional):** N-GenCMS (CodeIgniter)
- **Forms & CRM Integration:** Resend (Email trigger)
- **Hosting & Infrastructure:** ???

## 🛠️ Getting Started

Follow these instructions to spin up the local development server on your machine.

### Prerequisites
Ensure you have the following installed locally:
- **PHP** (v8.1+ recommended)
- **composer** package manager

### Local Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/n-genesis/decroy_designs_llc.git
   cd ddllc_website_ci4
   ```
2. Install dependencies:
   ```bash
   composer install
   ```

## 🗂️ Project Architecture
```text
├── admin/              # backend HTML Template
├── ddllc_website_ci4/  # CI4 Project
├── logo/               # Static assets (logos, icons)
├── template/           # backend HTML Template
```

## ✍️ Content Management (CMS)
Portfolio text changes, adding new construction project images, and editing company testimonials do not require direct code pushes. Team members can use the configured CMS platform to publish fresh content, which triggers a webhook to rebuild the frontend dynamically.

## 🌐 Deployment Pipeline
TO BE ADDED


## 📄 License & Ownership
Copyright © 2026 DeCroy Designs LLC. All rights reserved. 

This repository and its entire codebase are **proprietary property**. Unauthorized copying, distribution, or modifications of these files via any medium is strictly prohibited.
