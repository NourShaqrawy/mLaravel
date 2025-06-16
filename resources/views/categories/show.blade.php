<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title?></title>
    <link rel="stylesheet" href="<?= asset('/css/bootstrap.min.css')?> ">
 </head>
<body>
    <div class="container">
    <h1 class="mb-3"><?= $title?></h1>
<div class="table-responsive"> 
    

    <table class="table">
        <thead>
            <tr>
                <th>IDs</th>
                <th>Name</th>
                <th>Slug</th>
                <th>parent ID</th>
                <th>Created At</th>
        
        </tr>
        </thead>
        <tbody>
        <?php foreach($categories as $category):?>
            
            <tr>
                <td> <?= $category->id?></td>

                <td> <?= $category->name?></td>
                <td><?= $category->slug?></td>
                <td><?= $category->parent_id?></td> 
                <td><?= $category->created_at?></td>
            </tr>
           <?php endforeach?>
            
        </tbody>
    </table>
    </div>
</div>
</body>
</html>