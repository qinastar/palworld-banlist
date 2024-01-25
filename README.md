A list of bans, useful for replacing official lists
一个简单的 banlist，用于替换官方的 banlist

**你可以向本仓库推送你封禁的玩家，并且记录封禁原因。**

## 用法

### 1. 直接放入目录（不推荐）

下载`banlist.txt`，放入`/Pal/Saved/SaveGames`目录下即可。

### 2. 配置文件载入

打开你的`PalWorldSettings.ini`文件，找到以下内容：

```ini
BanListURL="https://api.palworldgame.com/api/banlist.txt"
```

修改为：

```ini
BanListURL="https://raw.githubusercontent.com/qinastar/palworld-banList/main/banlist.txt"
```

## json

写了一个简单的 json 文件，也许会用于后续的一些功能。
