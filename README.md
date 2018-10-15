Creating a new project

1. Go to https://github.com/newtabgallery/home
2. Click the "Branch master" dropdown button on the left.
3. Type the shortname of your new project (mexicanfood) and click Create.
4. Click "Create new File"
5. In the entry field, type the shortname of your new project /index.php (mexicanfood/index.php)
6. For the contents of the file, use this template:

```
<?php
$title = 'Name of your new Project';
// After extension is loaded to the Chrome store, place the extension ID here.
$extensionID = '';
$tid = basename(__DIR__);
include('../homepage.php');
?>
```

7. At the bottom of the page, click "Commit New file"
8. Click "Upload Files"
9. Upload all your images here (they must end in jpg or jpeg)
10. Click Commit changes
11. Click "Compare and pull request"
12. For the reviewer, select tom or me.
12. Click "Create pull request"