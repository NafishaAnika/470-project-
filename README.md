# Blood Donation Portal

A Laravel-based Blood Donation Management System that connects blood donors with blood receivers (patients) and provides administrative tools for managing the platform.

## Project Overview

This is a web application designed to facilitate blood donation requests and management. It includes three main user roles:
- Donors: Users who can donate blood
- Receivers: Users who need blood
- Admins: Platform administrators who manage the system

## Features

### Donor Features
- User Registration & Authentication: Secure registration and login
- Profile Management: View and edit personal information (name, email, blood group, contact, location)
- Dashboard: Personal dashboard showing profile and last donation date
- Find Blood Requests: Browse all receiver blood requests
- Blood Bank Directory: Search and view available blood at blood banks
- Messaging: Direct communication with blood receivers
- Complaint System: File complaints against receivers if needed

### Receiver Features
- User Registration & Authentication: Register with blood group needed and date required
- Profile Management: Update personal and medical information
- Dashboard: View blood request status and details
- Search Blood Donors: Find available donors
- Messaging: Chat with potential donors
- Blood Bank Access: Check blood availability

### Admin Features
- Donor Management: View, edit, and delete donor records with search functionality
- Complaint Management: View and resolve complaints between donors and receivers
- Blood Bank Management: Manage blood bank inventory
- Admin Authentication: Secure admin login

## Project Structure

Donor Module:
- donor.php - Donor model
- donorController.php - Donor business logic
- donorLoginController.php - Donor authentication logic
- dashboardofdonor.php - Donor dashboard view
- profileofDonor.php - Donor profile view
- regasDonor.php - Donor registration view
- donorasuserlogin.php - Donor login view
- findbloodreq.php - Blood request search view
- dnrBloodbankinfo.php - Blood bank info view
- SearchforDonor.php - Donor search functionality

Receiver Module:
- Receiver.php - Receiver model
- ReceiverController.php - Receiver business logic
- ReceiverLoginController.php - Receiver authentication logic
- ReceiverReg.php - Receiver registration view
- ReceiverLogin.php - Receiver login view
- Dashboardofreceiver.php - Receiver dashboard view
- Edit.php - Receiver profile edit view

Admin Module:
- controller.php - Admin main controller
- models/Admin.php - Admin model
- models/Complaint.php - Complaint model
- controllers/AdminController.php - Admin business logic
- controllers/ComplaintController.php - Complaint handling
- resources/admin/dashboard.blade.php - Admin dashboard
- resources/admin/login.blade.php - Admin login
- resources/admin/bloodbank.blade.php - Blood bank management
- resources/admin/donoredit.blade.php - Donor editing
- resources/admin/complaints/index.blade.php - Complaints list
- resources/admin/complaints/view.blade.php - View complaint details
- resources/complaint_create.blade.php - Create complaint form

Other Files:
- BloodBank.php - BloodBank model
- BloodBankController.php - BloodBank controller
- Chat.php - Chat model
- ChatController.php - Chat controller
- chat.index.blade.php - Chat view
- create.blade.php - Generic create view
- edit.blade.php - Generic edit view
- show.blade.php - Generic show view
- index.blade.php - Generic index view
- login.blade.php - Generic login view
- register.blade.php - Generic register view

## Database Models

Donor - Stores donor information (name, email, blood group, contact, location, last donation date)
Receiver - Stores receiver/patient information (name, blood group needed, date needed)
Admin - Admin user accounts and authentication
Complaint - Tracks complaints filed between donors and receivers
Chat - Stores messages between donors and receivers
BloodBank - Manages blood bank inventory and information

## Main Workflows

Blood Request Flow:
1. Receiver registers and posts a blood request
2. Donor searches for blood requests
3. Donor finds matching request and contacts receiver
4. Donor and receiver communicate via messaging system
5. Donation is completed

Complaint Resolution Flow:
1. Donor files complaint against receiver
2. Admin reviews complaint in dashboard
3. Admin takes appropriate action and resolves complaint

Blood Bank Management:
1. Admin manages blood bank inventory
2. Donors and receivers view available blood supplies
3. Search and filter functionality for finding blood by group and location

## Getting Started

Prerequisites:
- PHP 7.x or higher
- Laravel 8.x or higher
- MySQL or similar database
- Composer

Installation Steps:
1. Clone the repository: git clone https://github.com/NafishaAnika/470-project-.git
2. Navigate to project: cd 470-project-
3. Install dependencies: composer install
4. Copy environment file: cp .env.example .env
5. Generate application key: php artisan key:generate
6. Configure database in .env file
7. Run migrations: php artisan migrate
8. Seed sample data (optional): php artisan db:seed
9. Start development server: php artisan serve

## User Roles & Access

Donor Access:
- Register at /donor/register
- Login at /donor/login
- Dashboard: View personal profile and donation history
- Search blood requests and contact receivers

Receiver Access:
- Register at /receiver/register
- Login at /receiver/login
- Dashboard: Manage blood requests
- Search donors and request blood

Admin Access:
- Login at /admin/login
- Manage all donors and receivers
- Review and resolve complaints
- Manage blood bank inventory

## Security Features
- User authentication for all roles
- Role-based access control
- Secure password hashing
- Protected routes and endpoints

## Technologies Used
- Backend: Laravel PHP Framework
- Frontend: Blade Templating Engine
- Database: MySQL/MariaDB
- Authentication: Laravel Built-in Auth

## Contributing
1. Fork the repository
2. Create a feature branch (git checkout -b feature/AmazingFeature)
3. Commit changes (git commit -m 'Add AmazingFeature')
4. Push to branch (git push origin feature/AmazingFeature)
5. Open a Pull Request

## License
This project is part of a university course (470-project).

## Contact
For questions or support, please contact the project maintainers.
