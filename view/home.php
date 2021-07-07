<div class="container" style="display:flex; flex-direction:column; justify-content:center;align-items: center; text-align:center;">
<h2>Home Page</h2>
<h3>Créer un article</h3>

<?php 

if(isset($_GET['status'])){
    $status = $_GET['status'];

    if($status === "success") {
        $output = <<<'OUTPUT'
        <div class="alert alert-dismissible alert-success">
        <p style="text-align:center;">Votre post a été sauvegarder</p>
        </div>
OUTPUT;
        echo $output;
    } else {
        $output = <<<'OUTPUT'
        <div class="alert alert-dismissible alert-danger">
        <p style="text-align:center;">Erreur de sauvegarde</p>
        </div>
OUTPUT;
        echo $output;
    }
}
  ?>

    <form action="process.php" method="post" style="display: flex; flex-direction:column; align-items:center; gap: 1rem;">
    <input type="text" class="form-control" id="exampleTextarea" name="title" placeholder="Entrez le titre" required>
    <textarea class="form-control" id="exampleTextarea"  name="description" rows="5" placeholder="Entrez la description" required></textarea>
    <input type="submit" name="submit" value="Sauvegarder" class="btn btn-primary">
    </form>

    <div>
    <?php
        $fileContent = file_get_contents('./db.json');

        $posts = array_reverse(json_decode($fileContent, true));

        if(count($posts) > 0){
                foreach($posts as $array) {
            $content = <<<POST
            <div class="card mb-3" style="margin-top: 1rem;">
            <h3 class="card-header">{$array['postTitle']}</h3>
                    <img src="//unsplash.it/300"/>

              <rect width="100%" height="100%" fill="#868e96"></rect>
              <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>
            <div class="card-body">
              <p class="card-text">{$array['postDescription']}</p>
            </div>
            </div>
POST;
echo $content;    
        }} else {
            $content = <<<POST
            <div>
                <p>Aucun Arcticle publié pour l'instant. Ecrivez le premier...</p>
            </div>
POST;
echo $content;   
        }

    ?>
    </div>


</div>
 