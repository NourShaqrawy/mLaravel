<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create</title>
    <link rel="stylesheet" href="<?= asset('/css/bootstrap.min.css')?> ">
 </head>
<body>
    <div class="container">
    <h1>Edit Category</h1> 

    <form action="/categories/<?=$category->id?>
    " method="post">
    <input type="hidden" name="_method" value="put">
        
        <!-- متشابهين هو والسطر الذي تحته -->
        <input type="hidden" name="_token" value="<?= csrf_token()?>">  
        <?php echo csrf_field()?>


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?=$category->name?> " class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea  id="description " name="description" class="form-control">
                <?=$category->description?>
            </textarea>
        </div>

        <div class="form-group">
            <label for="parent_id">Parent</label>
            <select  id="parent_id" name="parent_id" class="form-control">
                <option value="">No Parent</option>    
            </select>
        </div>

        <div class="form-group">
            <label for="art_file">Art File</label>
            <input type="file" id="art_file" name="art_file" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
</body>
</html>