# 🚗 **Car Trading Website**

A modern web application for **buying and selling cars**, featuring:
- A clean and user-friendly interface
- Role-based access for **Admin** and **Users**
- Smart search, listing, and management tools

---

## 📌 **Project Overview**

This platform allows users to register, browse, and post car listings.  
Admins have complete control over the content, users, and listings via a powerful dashboard.

---

## 👨‍💼 **Admin Features**

When logged in as an **Administrator**, you can:

### 🖥️ **Dashboard**
- View key statistics:
  - Total users
  - Active / Inactive users
  - Number of ads
  - Number of cars listed

### 👥 **Users Management**
- See all registered users
- Manage pending registrations
  - ✅ Accept users
  - ❌ Reject users

### 📢 **Ads Management**
- View all active car ads
- Manage user-submitted ads
- Edit or delete existing ads

### 🚗 **Car Listings**
- View all cars on the platform
- Filter by status:
  - 🟢 Available
  - 🔴 Sold
  - ⏳ Submitted by users
- Edit car details or visibility

### 🚪 **Logout**
- Click **Logout** to safely exit the admin panel

---

## 👤 **User Features**

When a **User** logs in, they can:

### 🏠 **Home Page**
- Browse car listings
- View cars with **20+ views** (popular cars)

### ➕ **Add New Car**
- Use the **"Add Car"** button (`insertcar.php`) to create a listing

### 📄 **My Listings**
- Access via username button (`file.php`)
  - 🗑️ Delete your car listing
  - 🏷️ Mark as **Sold** to hide it

### 🚗 **Car Gallery** (`carspage.php`)
- Search cars using multiple filters:
  - Car Name (Brand/Model)
  - Color
  - Price
  - Year

### 🔍 **View Car Details** (`view.php`)
- See detailed car information
- Owner contact info for communication

### 📬 **Contact Page** (`connectpage.php`)
- Send an ad/message using the **"Send Ad"** button
- View information about the site admin

### 🚪 **Logout**
- Click **Logout** to securely end your session

---

## 🧾 Notes
- Users **must register** to access the website.
- Duplicate name, email, or phone during registration will result in **rejection**.
- Admin credentials:
  - **Username:** `admin`
  - **Password:** `admin`
## To Run a website in local you need:
  1) xampp program (https://www.apachefriends.org/download.html)
  2) https://www.phpmyadmin.net/
  3) https://drive.google.com/file/d/1rrT1CBaepwmHlbadFuNcz4KpQXy-Ku3S/view
