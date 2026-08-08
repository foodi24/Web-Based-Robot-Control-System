# Web-Based-Robot-Control-System
# 🤖 Voice-Controlled Robot Web Interface

## 📌 Project Overview

This project is a web-based robot control system that allows the user to control a robot using **manual buttons or voice commands**.

The voice is converted into text using the browser's **Speech Recognition API**. The recognized text is saved in a **MySQL database** and is also converted into a robot movement command.

The project uses **HTML, CSS, JavaScript, PHP, MySQL, phpMyAdmin, and InfinityFree**.

---

## 🎯 Objectives

- Create a web-based interface for robot control.
- Control the robot using Forward, Backward, Left, Right, and Stop commands.
- Convert voice commands into text.
- Save the speech-to-text output in a MySQL database.
- Store the current robot movement in the database.
- Retrieve the robot's current state using PHP.
- Host the complete system online using InfinityFree.

---

## 🛠️ Technologies Used

- **HTML** – Creates the web interface.
- **CSS** – Styles the control panel.
- **JavaScript** – Handles voice recognition and robot commands.
- **Web Speech API** – Converts voice into text.
- **PHP** – Connects the website to MySQL and processes commands.
- **MySQL** – Stores robot states and speech output.
- **phpMyAdmin** – Used to create and manage the database.
- **InfinityFree** – Used to host the website.

---

## 📁 Project Files

```text
a/
├── index.html
├── db.php
├── update_command.php
├── get_state.php
├── save_text.php
├── setup.sql
└── speech_output_setup.sql
```

### `index.html`

The main control panel. It provides manual movement buttons and voice control.

### `db.php`

Contains the connection information required to connect PHP to the MySQL database.

### `update_command.php`

Receives the robot movement command and updates the `robot_state` table.

### `get_state.php`

Retrieves the current robot movement from the database.

### `save_text.php`

Receives the speech-to-text result and saves it into the `speech_output` table.

### `setup.sql`

Creates the `robot_state` table and initializes the robot state to Stop (`S`).

### `speech_output_setup.sql`

Creates the `speech_output` table used to store recognized speech.

---

## 🗄️ Database Structure

### `robot_state`

This table stores the current robot movement.

| Code | Movement |
|------|----------|
| `F` | Forward |
| `B` | Backward |
| `L` | Left |
| `R` | Right |
| `S` | Stop |

The initial state is `S`, which means the robot is stopped.

### `speech_output`

This table stores the text recognized from the user's voice.

| Column | Description |
|--------|-------------|
| `id` | Unique record ID |
| `text_output` | Recognized speech |
| `created_at` | Date and time when the text was saved |

---

## 🎙️ Voice Control

The voice-control process works as follows:

```text
User speaks
     ↓
Speech-to-Text
     ↓
Recognized text
     ↓
Save text to MySQL
     ↓
Detect movement command
     ↓
Convert command to F/B/L/R/S
     ↓
Update robot state
```

For example, when the user says **"Forward"**, the system:

1. Converts the voice into the text `Forward`.
2. Displays the recognized text on the webpage.
3. Saves `Forward` into the `speech_output` table.
4. Detects it as the Forward command.
5. Converts it to `F`.
6. Sends `F` to `update_command.php`.
7. Updates the `robot_state` table to `F`.

---

## 🖱️ Manual Robot Control

The interface also provides manual controls as an alternative to voice commands.

The available controls are:

- **Forward**
- **Backward**
- **Left**
- **Right**
- **Stop**

Each button sends the corresponding movement code to the PHP system.

---

## 🌐 InfinityFree Hosting

The project files are uploaded to:

```text
htdocs/a/
```

The website is accessed through the project's InfinityFree domain followed by `/a/`.

The MySQL database is created through the InfinityFree control panel and managed using phpMyAdmin.

---

## ⚙️ Database Setup

### 1. Create the Database

From the InfinityFree control panel:

**MySQL Databases → Create Database**

Save the following information:

- MySQL Hostname
- MySQL Username
- MySQL Password
- Database Name

### 2. Configure `db.php`

Enter the database information provided by InfinityFree into `db.php`.

### 3. Create the Robot State Table

Open phpMyAdmin, select the project database, open the **SQL** tab, and run the contents of `setup.sql`.

### 4. Create the Speech Output Table

Open the **SQL** tab again and run the contents of `speech_output_setup.sql`.

The database will contain:

```text
robot_state
speech_output
```

---

## 🧪 Testing

### Test the Robot State

In phpMyAdmin, open the **SQL** tab and run:

```sql
SELECT * FROM robot_state;
```

The result should show the current robot state.

For example:

```text
F
```

means that the current command is **Forward**.

### Test the Speech Output

Run:

```sql
SELECT * FROM speech_output;
```

After saying **Forward**, the database should contain:

```text
Forward
```

along with the ID and date/time.

---

## 🔄 Complete System Architecture

```text
                 USER
                   │
                   ▼
          ┌─────────────────┐
          │   index.html    │
          │  Control Panel  │
          └────────┬────────┘
                   │
             Voice Command
                   │
                   ▼
          ┌─────────────────┐
          │ Speech-to-Text  │
          │   Web Speech    │
          │      API        │
          └────────┬────────┘
                   │
            Recognized Text
             ┌─────┴─────┐
             │           │
             ▼           ▼
      ┌────────────┐ ┌──────────────────┐
      │save_text   │ │update_command    │
      │.php        │ │.php              │
      └─────┬──────┘ └────────┬─────────┘
            │                 │
            ▼                 ▼
      ┌────────────┐    ┌──────────────┐
      │speech_     │    │robot_state   │
      │output      │    │              │
      └────────────┘    └──────────────┘
            │                 │
            └────────┬────────┘
                     ▼
                  MySQL
```

---

## 🔐 Security

The database credentials are stored in `db.php`.

For security reasons, database passwords and other sensitive credentials should **not be uploaded to a public GitHub repository**.

This project is intended for educational and testing purposes.

---

## ⚠️ Browser Requirements

The voice-control feature depends on browser support for the **Web Speech API**.

**Google Chrome** is recommended for testing.

The browser must have permission to access the microphone.

If the microphone does not work:

1. Open the website.
2. Allow microphone access.
3. Reload the page.
4. Click **Start Voice Command**.
5. Speak the desired movement command.

---

## 🛠️ Troubleshooting

### Control Buttons Do Nothing

Check:

- `update_command.php` is uploaded.
- `db.php` contains the correct database information.
- The MySQL database is working.
- The browser console for errors.

### `get_state.php` Shows an Error

Check the following information in `db.php`:

- Hostname
- Username
- Password
- Database name

Make sure they exactly match the information provided by InfinityFree.

### Voice Is Not Recognized

Check:

- Microphone permissions.
- Browser compatibility.
- Internet connection.
- Browser microphone settings.

### Speech Is Recognized but Not Saved

Make sure:

- `save_text.php` is inside the same folder as `index.html`.
- The `speech_output` table exists.
- The database connection in `db.php` is correct.

Run:

```sql
SELECT * FROM speech_output;
```

to check whether the text has been saved.

---

## ✅ Final Result

The completed system allows the user to:

- Control the robot manually.
- Control the robot using voice commands.
- Convert speech into text.
- Display the recognized speech.
- Save the speech-to-text output in MySQL.
- Convert recognized speech into robot movement commands.
- Store the current robot state in MySQL.
- Retrieve the current robot state using PHP.
- Host the complete system online using InfinityFree.

This project demonstrates the integration of **Web Development, Speech Recognition, PHP, MySQL, Database Management, and Robot Control**.

---

## 👨‍💻 Author

**Fahad**

**Cybersecurity Student**
