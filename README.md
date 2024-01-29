# Palworld Banlist

这是一个简单的 banlist，旨在提供官方 banlist 的替代选项。
A simple banlist designed to serve as an alternative to the official banlists.

**您可以通过提交您封禁的玩家名单及其封禁原因来为这个仓库做出贡献。**
**Contribute to this repository by submitting the names of players you've banned along with the reasons for their bans.**

## 使用指南 Usage Guide

### 方法一：直接放入游戏目录（不推荐） Method 1: Direct Directory Placement (Not Recommended)

下载 `banlist.txt` 文件并将其放入 `/Pal/Saved/SaveGames` 目录下。
Download the `banlist.txt` file and place it into the `/Pal/Saved/SaveGames` directory.

### 方法二：通过配置文件加载 Method 2: Load via Configuration File

打开 `PalWorldSettings.ini` 配置文件，并找到以下条目：
Open your `PalWorldSettings.ini` then find the following entry:

```ini
BanListURL="https://api.palworldgame.com/api/banlist.txt"
```

将其修改为：
Change it to:

```ini
BanListURL="https://raw.githubusercontent.com/qinastar/palworld-banList/main/banlist.txt"
```

## JSON

提供了一个简单的 JSON 文件，可能适用于未来的某些功能。
A simple JSON file is provided, potentially useful for future functionalities.

同时，我们还添加了一个 HTML 页面，您可以在任何地方引用和集成它。
An HTML page has also been added, allowing for easy reference and integration anywhere.