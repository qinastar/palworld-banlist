# Palworld Banlist

[中文版](README.md)

A simple banlist designed to serve as an alternative to the official banlists.

**Contribute to this repository by submitting the names of players you've banned along with the reasons for their bans.**

## PalGuard LOG在线查看
I wrote a simple php webpage that allows you to view the LOG files of PalGuard online, making it convenient for you to check ban records.
You need to copy your log file into the [logs] directory of this php file, and then open this webpage to view.

Below is a PalGuard LOG online viewing webpage that I personally deployed for your reference.
[Chinese](https://palguard.staryui.me/)
[Chinese - With Suspicious Info](https://palguard.staryui.me/pro.php)
[English](https://palguard.staryui.me/english.php)

## Usage Guide

### Method 1: Direct Directory Placement (Not Recommended)

Download the `banlist.txt` file and place it into the `/Pal/Saved/SaveGames` directory.

### Method 2: Load via Configuration File

Open your `PalWorldSettings.ini` then find the following entry:

```ini
BanListURL="https://api.palworldgame.com/api/banlist.txt"
```

Change it to:

```ini
BanListURL="https://raw.githubusercontent.com/qinastar/palworld-banList/main/banlist.txt"
```

## JSON

A simple JSON file is provided, potentially useful for future functionalities.

An HTML page has also been added, allowing for easy reference and integration anywhere.
