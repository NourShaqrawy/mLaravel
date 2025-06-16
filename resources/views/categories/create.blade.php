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
    <h1>Create Category</h1> 
    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors->all() as $message):?>
                    <li><?=$message?></li>
                    <?php endforeach?>
            </ul>
        </div>
        <?php endif?>
        
    <form action="/categories" method="post">

        
        <!-- متشابهين هو والسطر الذي تحته -->
       <?php echo csrf_field()?>
       <input type="hidden" name="_token" value="<?= csrf_token()?>">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea  id="description " name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="parent_id">Parent</label>
            <select  id="parent_id" name="parent_id" class="form-control">
                <option value="">No Parent</option>    
                <?php foreach($parents as $parent):?>
                <option value=" <?=$parent->id?>"><?=$parent->name?></option>
                <?php endforeach?>
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