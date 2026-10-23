# Online-Service-Management-System

**🔗 Live Demo:** [https://electroservice.infinityfreeapp.com/](https://electroservice.infinityfreeapp.com/)

A web portal through which users can request a service and the company can assign engineers to the requested service..

- Developed a web-based service management system for repair requests, enabling online submissions and admin management of technicians and job status.
- Designed a responsive UI using HTML, CSS, and JavaScript, and built the back-end with PHP while integrating MySQL for efficient data management.
- Automated the request and invoicing process, reducing manual work and improving processing efficiency by 30%.
- **Tech Stack:** HTML, CSS, JavaScript, PHP, MySQL, Bootstrap 5, Font Awesome.

![Home Page](screenshots/home.png)

## Highlights
- Fully **responsive** design that works on mobile, tablet and desktop, with a slide-in sidebar menu on phones.
- **Secure passwords:** new accounts are stored with `password_hash()` and checked with `password_verify()`.
- **Form validation** in two layers: JavaScript in the browser for instant feedback, and PHP on the server for security.
- Show / hide password (eye) button and a password strength meter on the Sign Up form.
- Printable service receipts, customer bills and reports.

There are 2 types of accounts.
1. Requester account
2. Admin account

## Requester Account
The user creates a requester account to raise a ticket.
1. Register and log in
2. Submit a service request
3. Check the service status using the Request ID
4. Update profile and change password

## Admin Account
This account is created by the company to take action on the services. It also tracks the components that are available, the sales of the components, and the action taken on each request.
1. Assign Engineer
2. Maintain the stock of components available
3. See the work report
4. See the report for components (sell report)
5. Look up the status of all the requests raised by requesters

# Screenshots

## Home Page
### Sign Up
![Sign Up](screenshots/registration.png)

## Requester Account
### Login Page
![Requester Login](screenshots/requester-login.png)

### User Profile
![User Profile](screenshots/requester-profile.png)

### Submit Request
![Submit Request](screenshots/submit-request.png)

### Request Submitted
![Request Submitted](screenshots/request-success.png)

### Service Status
![Service Status](screenshots/service-status.png)

## Admin Account
### Login Page
![Admin Login](screenshots/admin-login.png)

### Dashboard
![Admin Dashboard](screenshots/admin-dashboard.png)

### Requests (Assign Work)
![Requests](screenshots/admin-requests.png)

### Work Order
![Work Order](screenshots/work-order.png)

### Work Status
![Work Status](screenshots/work-status.png)

### Assets
![Assets](screenshots/assets.png)

### Sell Product
![Sell Product](screenshots/sell-product.png)

### Customer Bill
![Customer Bill](screenshots/customer-bill.png)

### Technician
![Technician](screenshots/technician.png)

### Requesters
![Requesters](screenshots/requesters.png)

### Sell Report
![Sell Report](screenshots/sell-report.png)

### Work Report
![Work Report](screenshots/work-report.png)

## Mobile View
![Mobile View](screenshots/mobile-view.png)

# How to Run Locally
1. Install [XAMPP](https://www.apachefriends.org/) (or WAMP) and start **Apache** and **MySQL**.
2. Copy the project folder into `htdocs` (for example `C:\xampp\htdocs\osms`).
3. Create a database named `newosms` and import the project's SQL file.
4. Update the database username and password in `dbConnection.php` if yours are different.
5. Open `http://localhost/osms/` in your browser.
