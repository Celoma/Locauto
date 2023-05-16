<input type='hidden' id='mdp' value=<?php if(isset($_SESSION['pass'])){echo $_SESSION['pass'];}  ?>/>
<input type='hidden' id='nomInscriptionHide' value=<?php if(isset($_SESSION['nomInscription'])){echo $_SESSION['nomInscription'];}  ?>/>
<input type='hidden' id='email' value=<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>/>
<input type='hidden' id='emailInscriptionHide' value=<?php if(isset($_SESSION['emailInscription'])){echo $_SESSION['emailInscription'];} ?>/>
<input type='hidden' id='telephoneInscriptionHide' value=<?php if(isset($_SESSION['telephoneInscription'])){echo $_SESSION['telephoneInscription'];}  ?>/>
<input type='hidden' id='prenomInscriptionHide' value=<?php if(isset($_SESSION['prenomInscription'])){echo $_SESSION['prenomInscription'];} ?>/>
<input type='hidden' id='typeclientInscriptionHide' value=<?php if(isset($_SESSION['typeclientInscription'])){echo $_SESSION['typeclientInscription'];}  ?>/>
<input type='hidden' id='groupInscriptionHide' value=<?php if(isset($_SESSION['groupInscription'])){echo $_SESSION['groupInscription'];} ?>/>
<input type='hidden' id='adressePostaleInscriptionHide' value=<?php if(isset($_SESSION['adressePostaleInscription'])){echo $_SESSION['adressePostaleInscription'];}  ?>/>
<input type='hidden' id='passwordInscriptionHide' value=<?php if(isset($_SESSION['passwordInscription'])){echo $_SESSION['passwordInscription'];} ?>/>
<input type='hidden' id='verifypasswordInscriptionHide' value=<?php if(isset($_SESSION['verifypasswordInscription'])){echo $_SESSION['verifypasswordInscription'];}  ?>/>
<div class='PopUpBg' id='PopUpBg'>
    </div>
    <div class='PopUpInscription'>
        <form name='inscription' action='' method='post'>
            <br>
            <h3>Inscription</h3>
            <div class='sousTitre'></div>
            <div class='formulaireInscription'>
                <div class='formulaireInscriptionGauche'>
                    <input type='text' name='nom' id='nomInscription' placeholder='Nom' required/>
                    <input type='text' name='telephone' id='telInscription' placeholder='Téléphone' minlength='10' required/>
                </div>
                <div class='formulaireInscriptionGauche'>
                    <input type='text' name='prenom' id='prenomInscription' placeholder='Prénom' required/>
                        <select name='type_client' id='typeSelect' onChange='InscriptionClientSpeciaux()' required>
                            <option value='' hidden selected>Choisissez votre profil</option>
                            <?php include 'choix_select.php'?>
                        </select>
                    </div>
                </div>
                <div class='formulaireInscriptionLigneSeul'>
                    <input type='text' name='groupe' id='groupe' placeholder=''/>
                    <input type='email' name='email' placeholder='E-mail' id='emailInscription' required/>
                    <input type='text' name='adressePostale' id='adresseInscription' placeholder='Adresse postale' required/>
                </div>
                <div class='formulaireInscription'>
                    <div class='formulaireInscriptionDroit'>
                        <input type='password' name='password' id='mdp1' onkeyup='checkPass()' placeholder='Mot de passe' minlength='8' required/>
                    </div>
                    <div class='formulaireInscriptionGauche'>
                        <input type='password' name='verifypassword' id='mdp2' placeholder='Confirmer mot de passe' onkeyup='checkPass()'  required/>
                        <div id='divcomp'>Correct</div><div id='divcomp2'>Incorrect</div>
                    </div>
                </div>
                <p id='divcomp4'></p>
                <input type='submit' class='formulaireSubmit' value='Inscription'>
            </form>
            <p id='linkConnexion'>Se connecter</p>
        </div>
        
        
        <div class='PopUpConnexion'>
            <form action='' method='post'>
                <br>
                <h3>Connexion</h3>
                <div class='sousTitre'></div>
                <div class='formulaireConnexion'>
                    <div class='formulaireConnexionCentre'>
                        <input type='text' name='emailConnexion' id='emailEntré' placeholder='E-mail' />
                        <input type='password' name='passwordConnexion' id='mdpEntré' placeholder='Mot de passe' />
                    </div>
                </div>
                <div id='divcomp3'>E-mail ou mot de passe incorrect</div>
                <input type='submit' class='formulaireSubmit' value='Connexion'>
            </form>
            <p id='mdpOublie'>Mot de passe oublié ?</p>
            <p id='linkInscription'>S'incrire maintenant</p>
        </div>
