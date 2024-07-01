# User Manual for Loot Ledger

## Table of Contents
1. Introduction
2. User Credentials
3. Installation Instructions
4. Getting Started
5. Features and Functionalities

---

## 1. Introduction

Welcome to Loot Ledger! This is a fun and interactive web application designed to let you create characters, manage their inventory, and have an enjoyable experience with item stacking and organization. This user manual will guide you through the steps to get started and make the most out of Loot Ledger.

---

## 2. User Credentials

To access Loot Ledger, you will need to register an account. Below are the default credentials for the admin and user accounts:

### Default User Credentials

#### Admin Account:

- **Username:** admin
- **Password:** admin

#### User Account:

- **Username:** user
- **Password:** user

---

## 3. Installation Instructions

Loot Ledger is currently an offline web application, so you will need to host it locally using a web server such as XAMPP. Follow the steps below to set up and run Loot Ledger on your local machine.

### System Requirements

- **Operating System:** Windows, macOS, or Linux
- **Web Server:** XAMPP or any other suitable local web server

### Installation Steps

#### Step 1: Install XAMPP

1. **Download XAMPP**
2. **Run the Installer**
3. **Launch XAMPP:**
   - Open the XAMPP Control Panel.
   - Start the Apache web server by clicking the "Start" button next to Apache.

#### Step 2: Download Loot Ledger

1. **Download the Application Files:**
   - Obtain the Loot Ledger application files from the official source or [repository](https://github.com/SilverPheonix/Loot-Ledger) provided.
2. **Extract the Files:**
   - Extract the downloaded zip file to a convenient location on your computer.

#### Step 3: Set Up the Application

1. **Move Files to XAMPP Directory:**

   - Locate the 

     ```
     htdocs
     ```

      directory within your XAMPP installation folder.

     - Windows: `C:\xampp\htdocs\`
     - macOS: `/Applications/XAMPP/xamppfiles/htdocs/`
     - Linux: `/opt/lampp/htdocs/`

   - Copy the extracted Loot Ledger application files into the `htdocs` directory.

2. **Configure Database (if applicable):**

   - Open the XAMPP Control Panel and start MySQL.
   - Access phpMyAdmin by navigating to `http://localhost/phpmyadmin` in your web browser.
   - Create a new database for Loot Ledger and import the provided `src/db/lootledger.sql ` file to set up the necessary database structure.

---

## 4. Getting Started

### Creating an Account
1. Open the Loot Ledger website.
2. Click on the "Register" button.
3. Fill in your details: username, email, and password.
4. Click "Submit" to create your account.

### Logging In
1. Open the Loot Ledger website.
2. Enter your username and password.
3. Click on the "Login" button.

### Dashboard Overview
Upon successful login, you will be directed to the main dashboard, which includes:
- **Left Sidebar:** 
  - **Create Character:** Button to create a new character.
  - **Character List:** Displays all the characters you have created.
- **Main Section:**
  - Initially empty, but displays the selected character's backpack when a character is clicked.
- **Right Sidebar:** 
  - **Item List:** A list of all possible items that your characters can have.
- **Top Right Corner:**
  - **Profile:** Button to access your profile settings.
  - **Logout:** Button to log out from the application.

---

## 5. Features and Functionalities

### Creating and Managing Characters
- **Create Character:**
  1. Click on the "Create Character" button.
  2. Fill in the character's details (e.g., name, strength).
  3. Click "Ok" to create the character.

- **Viewing Characters:**
  - Your created characters will be listed on the left sidebar. Click on a character to view and manage their backpack.
  - Click the Edit Icon to edit your Characters name and strength score.
  - Click the X to delete your Character.

### Backpack Management
- **Viewing Backpack:**
  - The middle section of the screen will display the selected character's backpack, which gets bigger as the character's strength increases.
  
- **Adding Items to Backpack:**
  1. Drag items from the right sidebar into the character's backpack in the middle section.
  2. If the item casts a shadow, you can drop it. If there is no shadow, the item might be too large.
  3. Efficiently add items to maximize the space usage based on item sizes and backpack capacity.

- **Saving Backpack Configuration:**
  - Once items are placed in the backpack, click the "Save" button to save the item positions.

### Profile Management
- **Access Profile:**
  1. Click on the "Profile" button in the top right corner.
  2. Update your username, email, or password.
  3. (WIP) Add a profile picture.

### Logout
- Click the "Logout" button in the top right corner to log out of the application.

---

## We hope you will have a lot of fun using our App!

### ~Loot Ledger Team
