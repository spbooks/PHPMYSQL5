<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP/MySQL File Repository</title>
  </head>
  <body>
    <h1>PHP/MySQL File Repository</h1>

    <form action="" method="post" enctype="multipart/form-data">
      <div>
        <label for="upload">Upload File:
        <input type="file" id="upload" name="upload"></label>
      </div>
      <div>
        <label for="desc">File Description:
        <input type="text" id="desc" name="desc"
            maxlength="255"></label>
      </div>
      <div>
        <input type="hidden" name="action" value="upload">
        <input type="submit" value="Upload">
      </div>
    </form>

    <?php if (count($files) > 0): ?>

    <p>The following files are stored in the database:</p>

    <table>
      <thead>
        <tr>
          <th>Filename</th>
          <th>Type</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($files as $f): ?>
        <tr>
          <td>
            <a href="?action=view&amp;id=<?php htmlout($f['id']); ?>"
                ><?php htmlout($f['filename']); ?></a>
          </td>
          <td><?php htmlout($f['mimetype']); ?></td>
          <td><?php htmlout($f['description']); ?></td>
          <td>
            <form action="" method="get">
              <div>
                <input type="hidden" name="action" value="download"/>
                <input type="hidden" name="id" value="<?php htmlout($f['id']); ?>"/>
                <input type="submit" value="Download"/>
              </div>
            </form>
          </td>
          <td>
            <form action="" method="post">
              <div>
                <input type="hidden" name="action" value="delete"/>
                <input type="hidden" name="id" value="<?php htmlout($f['id']); ?>"/>
                <input type="submit" value="Delete"/>
              </div>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php endif; ?>
  </body>
</html>
