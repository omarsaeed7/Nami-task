# Nami S & M Task

## Laravel Project Implementation Guide

This document outlines the steps to set up, configure the project

### 1. Prerequisites

Ensure you have the following installed:

- PHP >= 8
- Composer
- MySQL

### 2. Installation & Setup

1. **Clone the repository:**

```bash
   git clone git@github.com:omarsaeed7/Nami-task.git
   cd task
```

2. Install Dependencies

```bash
composer install

```

3. Environment Config

```bash
cp .env.example .env
php artisan key:generate
php artisan storage:link

```

4. Database migration and seeding

```bash
php artisan migrate --seed
```
