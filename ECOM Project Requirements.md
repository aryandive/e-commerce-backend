# **Product Requirements Document (PRD): ECOM E-Commerce Store**

## **1\. Project Overview**

The objective is to build a minimal, highly focused e-commerce storefront for "ECOM" using the Bagisto (PHP/Laravel) framework. The primary goal is to deliver a fully functional "Shop" and "Customer Account" experience, alongside a robust "Admin Panel" for product management. Other standard pages (Home, Contact, etc.) will exist in the routing and layout but remain completely empty for this phase of development.

## **2\. Technology Stack**

* **Core Framework:** PHP 8.x \+ Laravel (Bagisto 2.x)  
* **Database:** MySQL or MariaDB  
* **Frontend Templating:** Laravel Blade (Bagisto Theme overriding) \+ Custom CSS/Tailwind  
* **Payment Gateway:** Razorpay  
* **Hosting Infrastructure:** Hostinger VPS (Minimum 2GB RAM for Laravel/Bagisto performance, Redis for caching)

## **3\. Frontend Scope & App Shell**

The frontend will be a custom Bagisto theme built to mimic the minimal aesthetic of the ECOM reference image.

### **3.1 Global Layout**

* **Header/Navbar:** Must contain the logo (center) and the following links: HOME, SHOP, CONTACT US, GALLERY, REVIEWS, along with User Account and Cart icons.  
* **Footer:** Standard minimal footer.  
* **Theme:** White/monochrome, minimalist design. Overriding Bagisto's default UI components via Blade template injection.

### **3.2 Page Routing Requirements**

* **/shop:** **FULLY ACTIVE.** The primary functional view for the store.  
* **/home (or /):** Active route, but rendered as an EMPTY view with just the Header/Footer.  
* **/contact:** Active route, EMPTY view.  
* **/gallery:** Active route, EMPTY view.  
* **/reviews:** Active route, EMPTY view.

## **4\. Core Functional Requirements (Customer Facing)**

### **4.1 The Shop Page**

* **Product Grid:** Display active products fetched from the Bagisto database.  
* **Sorting & Filtering:** Standard Bagisto layered navigation (Sort by price, category, etc.).  
* **Product Detail Page (PDP):**  
  * High-quality image gallery.  
  * Detailed text descriptions.  
  * Variant selection (if applicable, e.g., size, color).  
  * "Add to Cart" and "Buy Now" functionality.

### **4.2 Cart & Checkout**

* **Cart Slide-out / Page:** View added items, adjust quantities, view subtotal.  
* **Checkout Flow:** Bagisto's standard multi-step checkout (Address \-\> Shipping \-\> Payment \-\> Confirmation).  
* **Payments:** Integration of Razorpay to handle INR transactions seamlessly.

### **4.3 Customer Account Portal**

* **Authentication:** Registration, Login, and Password reset.  
* **Dashboard:** User profile management.  
* **Order History:** List of all past and current orders.  
* **Order Tracking:** Visual status timeline provided by Bagisto (Placed \-\> Processed \-\> Shipped \-\> Completed).  
* **Invoices:** Users must be able to view and download PDF invoices (using Bagisto's native invoice generation) from their order details page.

## **5\. Admin Panel Requirements (Backend)**

The standard Bagisto Admin panel will be utilized without massive core modifications.

### **5.1 Catalog Management**

* **Product Uploads:** Admin must be able to create Simple and Configurable products.  
* **Media Management:** Ability to upload multiple product images per item directly to the server.  
* **Descriptions:** WYSIWYG editor for detailed product descriptions.  
* **Inventory:** Basic stock tracking (In Stock / Out of Stock / Quantity).

### **5.2 Sales & Order Management**

* **Order Processing:** Admin must be able to view incoming orders and generate internal Shipments and Invoices to trigger status changes for the customer.  
* **Customer Management:** View registered users and their purchase history.

## **6\. Required Integrations & Extensions**

* **Razorpay Payment Gateway:** Requires installation of a Bagisto-compatible Razorpay extension (e.g., Webkul's official plugin) and configuration of API keys (Key ID and Key Secret).  
* **Email (SMTP):** Configuration of store emails for Order Confirmations, Invoices, and Shipment notifications.

## **7\. Deployment Strategy (Hostinger)**

* **Server:** Deploy to a Hostinger VPS environment or mostly free hosting. Do not use shared hosting.  
* **Web Server:** Nginx or Apache configured to serve the Laravel public directory.  
* **Storage:** Symlink the Bagisto storage/app/public directory to ensure Admin image uploads persist and display correctly on the storefront.
