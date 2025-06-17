<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
<body>
    <div class="container">
    <h1 class="mb-3"><?= $title?>
        <small>
            <a href="categories/create">Create</a>
        </small>
    </h1>
    
        
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>parent ID</th>
                <th>Created At</th>
                <th>Updated_At</th>
                <th></th>
                <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category):?>
            
            <tr>
                <td> <?= $category->id?></td>
                <td>
                    <a href="categories/<?= $category->id?>">
                    <?= $category->name?> </a>
                </td>
                <td><?= $category->slug?></td>
                <td><?= $category->parent_id?></td>
                <td><?= $category->created_at?></td>
                <td><?=$category->updated_at?></td>
                <td> <a href="categories/<?= $category->id?>/edit" class="btn btn-sm btn-dark">Edit</a> </td>
                <td><form action="categories/<?=$category->id?>" method="post"> 
                    <?=csrf_field()?>
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            
                </td>
                </tr> 
           <?php endforeach?>
            
        </tbody>
    </table>
    </div>
</div>
</body>
</html>