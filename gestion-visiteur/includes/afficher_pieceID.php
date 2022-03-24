<!-- Afficher piece identité visiteur -->
    <div class="sign-box">

        <div class="upd_choice" style="background-color: #287bff;">
            <h2>Piece d'identité</h2>
        </div>

        <div class="edit-user" style="background-color:#b2cefa;">
                    <div>
                      <?php echo "<img src='data:image;base64,".base64_encode($afficher_visiteurs[$i]->getPiece_identite())."' alt='Capture Piece identité' class='picbig'>"; ?>
                    </div>
                    
        </div>



    </div>
