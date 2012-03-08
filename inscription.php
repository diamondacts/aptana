<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include('fonctions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/ajaxsbmt.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='shortcut icon' href='images/favicon.ico' />
<!--<link rel=\"icon\" href=\"images/animated_favicon.gif\" type=\"image/gif\" >  sekAdd-->
<title>LUMIERE_SOLEIL</title>

<link href="css.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="./js/jquery171.js"></script>

<!--> un autre script<-->
<script type="text/javascript">
$("input").blur(function(){
var name=($(this).attr("name"));
var value=($(this).attr("value"));
var info_form=$(this).next(".info");
if(value==undefined)
{
info_form.append("Obligatoire");
}
else if(name=="nom_parent")
{

    $.ajax({
    type: "GET",
    url: "./verif_pseudo.php?pseudo="+value,
    success:function(data){
    if(data==1)
    {
    info_form.append("Un compte avec le même nom parent existe déja");
    }
    else
    {
    info_form.append("Valide");
    }
    }
    });

}
else if(name=="mail")
{
//à vous de jouer pour verifier le mail de la même manière
}
});
</script>

</head>
<body>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="58%" align="left" valign="top"><table width="60%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><img src="images/index_01.gif" alt="" width="455" height="186" border="0" usemap="#Map2" /></td>
          </tr>
          <tr>
            <td align="left" valign="top"><img src="images/index_04.gif" width="455" height="166" alt="" /></td>
          </tr>
        </table></td>
        <td width="42%" align="left" valign="top" bgcolor="#DAE032"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><img src="images/index_02.gif" width="325" height="76" alt="" /></td>
          </tr>
          <tr>
            <td align="left" valign="top"><img src="images/index_03.gif" alt="" width="325" height="242" border="0" usemap="#Map" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#DAE032" style="padding-bottom:15px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="67%" align="left" valign="top" style="padding-left:21px;"><table width="498" border="0" cellspacing="0" cellpadding="0" style="background-image:url(images/index_11.gif); background-repeat:repeat-x; background-color:#FFFFFF;">
          <tr>
            <td align="left" valign="top" style="border-left:#F5C14C 1px solid; border-top:#F5C14C 1px solid;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top" style="border-right:#F5C14C 1px solid; padding:8px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" align="left" valign="top" class="heading">Non inscrit?</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="top" class="body" style="padding-top:8px; padding-bottom:12px;">


                       <!-- petit formulaire pour l inscription -->

                       <p>
                        <img src="images/tax.jpg"
                                width="100" height="100" alt="Smile" align="right"/>
                        Taxes: </p> 
				<?php $nom_de_ce_fichier  = $_SERVER['PHP_SELF'];?>	
                        <form name='taxes' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"
                            onsubmit="xmlhttpPost('ajax_taxes.php', 'taxes', 'div_taxes', '<img src=\'pleasewait.gif\'>'); return false;">
                            <table>
                                 <tr><td><center><h3></h3></center></td></tr>
				<tr><td>Montant :</td>
				<td><input type="text" name="montant" size='20'  /></td></tr>
                                 <tr><td>Choix de la taxe :</td>
                                <!--<td><select name="tax"  onChange="document.taxes.submit()">-->
				<td><select name="tax" >
                                <option value="Canada_Quebec"> Canada Quebec</option>
                                <option value="Canada">Canada</option>
                                <option value="Quebec">Quebec</option>
								</select></td></tr>
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>

                            <tr>
								<td><center><input type="submit" value="Calculer" name="Calculer" /></center></td>
                            </tr>
                	</table>
                    </form>
                   <div id="div_taxes"></div>
                           
			<form action="ajout_parent.php" method="post" enctype="multipart/form-data">

		<table>

                                 <tr><td><center><h3>Vos informations :</h3></center></td></tr>
				<tr><td>Nom : <span class="info"></span></td>
				<td><input type="text" name="nom_parent"  /></td></tr>
                                <tr><td>Prénom : <span class="info"></span>  </td>
				<td><input type="text" name="prenom_parent"  /></td></tr>
                                <tr><td>Tél Domicile :</td>
				<td><input type="text" name="tel_dom_parent"  /></td></tr>
                                <tr><td>Cell :</td>
				<td><input type="text" name="tel_cell_parent"  /></td></tr>
                                <tr><td>Date Naissance :</td>
				<td><input type="text" name="date_naissance_parent"  /><b> Format : aaaa-mm-jj </b></td></tr>
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td>Photo :</td>
                                <td><input type="file" name="url_photo_parent" /></td></tr>

                                 <tr><td><center><h3></h3></center></td></tr>
				<tr><td>Login :</td>
				<td><input type="text" name="log_parent"  /></td></tr>
                                <tr><td>Mot de passe :</td>
				<td><input type="password" name="mdp_parent"  /></td></tr>
                                <tr><td>Email :</td>
				<td><input type="text" name="mail_parent"  /></td></tr>
				
                                <!-- zone text area ahmed sek
                                <tr><td>Résumé :</td>
				<td><textarea name="resume" rows="10" cols="50" ></textarea></td></tr>
                                        -->
                                <!--- liste deroulante qui vont chercher les donnees dans les tables
				<tr><td>Membre :</td>
				<td><select name="choix"><?php// selecttable1('membre','log_membre') ?></select></td></tr>

				<tr><td>Parent :</td>
				<td><select name="choix1"><?php //selecttable('parent','nom_parent', 'prenom_parent') ?></select></td></tr>
                                    -->
				
                                <!-- liste deroulante qui affichent beaucoup de pays
				<tr><td>Origine film :</td>
				<td><select name="origine"  >
				<option value="Amerique">Amerique</option>
				<option value="Belgique">Belgique</option>
				<option value="Canada">Canada</option>
				<option value="Chine">Chine</option>
				<option value="Allemagne">Allemagne</option>
				<option value="AlgÃ©rie">Algérie</option>
				<option value="Egypte">Egypte</option>
				<option value="Espagne">Espagne</option>
				<option value="France">France</option>
				<option value="Grande Bretagne">Grande Bretagne</option>
				<option value="GrÃ¨ce">Grèce</option>
				<option value="Italie">Italie</option>
				<option value="Japon">Japon</option>
				<option value="RÃ©publique de CorÃ©e">République de Corée</option>
				<option value="Maroc">Maroc</option>
				<option value="Mexique">Mexique</option>
				</select></td></tr>
                                -->
                            <tr><td><center><h3></h3></center></td></tr>
                            <tr><td><center><h3>Votre adresse : </h3></center></td></tr>
                                <tr><td>Numéro :</td>
				<td><input type="text" name="num_adresse"  /></td></tr>
                                <tr><td>Rue :</td>
				<td><input type="text" name="rue_adresse"  /></td></tr>
                                <tr><td>Ville :</td>
				<td><input type="text" name="municip_adresse"  /></td></tr>
                                <tr><td>Code postale :</td>
				<td><input type="text" name="code_postale_adresse"  /><b> </b></td></tr>
                                 <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td>Province :</td>
				<td><select name="province_adresse"  >
                                <option value="Quebec">Quebec</option>
                                <option value="Ontario">Ontario</option>
				<option value="Nova Scotia">Nova Scotia</option>
				<option value="New Brunswick">New Brunswick</option>
				<option value="Manitoba">Manitoba</option>
				<option value="British Columbia">British Columbia</option>
				<option value="Prince Edward Island">Prince Edward Island</option>
                                <option value="Saskatchewan">Saskatchewan</option>
				<option value="Alberta">Alberta</option>
				<option value="Newfoundland & Labrador">Newfoundland and Labrador</option>
				<option value="Northwest Territories">Northwest Territories</option>
				<option value="Yukon">Yukon</option>
				<option value="Nunavut">Nunavut</option>
				<option value="-----">-----</option>
				<option value="Autre">Autre</option>
				</select></td></tr>
                                 <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td>Pays :</td>
				<td><select name="pays_adresse"  >
                                <option value="Canada">Canada</option> 
				<option value="Maroc">Maroc</option>
                                <option value="USA">USA</option>
				<option value="Belgique">Belgique</option>
				<option value="Chine">Chine</option>
				<option value="Allemagne">Allemagne</option>
				<option value="Algérie">Algérie</option>
                                <option value="Tunisia">Tunisia</option>
				<option value="Egypte">Egypte</option>
				<option value="Espagne">Espagne</option>
				<option value="France">France</option>
				<option value="England">England</option>
				<option value="Grèce">Grèce</option>
				<option value="Italie">Italie</option>
				<option value="Japon">Japon</option>
				<option value="République de Corée du sud">République de Corée sud</option>
				<option value="Mexique">Mexique</option>
                                <option value="Pérou">Pérou</option>
				
				</select></td></tr>
                                
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>

                                <tr><td> <h3>Autres informations :</h3> </td>
				<td><textarea name="informations" rows="10" cols="50" ></textarea></td></tr>

                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                <tr><td> <!-- un petit vide ça fait rien --></td></tr>
                                
                            <tr>
				<td><center><input type="submit" value="Enregistrer" name="enregistrer" /></center></td>
                            </tr>
                          <!--  un lien 
                                    <tr>
                                     <center><td><a href= "content.php"><u><b><h2>Ajouter Enfant</h2> </b></u></a></td></center>
                                    </tr>
                                -->
                </table>
                    </form>
             
                   <!-- <td width="85%" align="left" valign="middle"><img src="images/index_29.gif" width="11" height="9" alt="" /></td> commented by ahmed sek-->
                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="87%" style="border-bottom:#F5C14C 1px solid;">&nbsp;</td>
                    <td width="13%" align="right" valign="bottom"><img src="images/index_53.gif" width="64" height="73" alt="" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            </tr>


        </table></td>
        <td width="33%" align="left" valign="top"><table width="95%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top" style =" font-style: italic; font-family: serif;">
               <!-- <img src="images/index_07.gif" width="167" height="48" alt="" /> sekM -->
                <h1><font color="red">  Des Nouvelles  </font></h1>
            </td>
          </tr>
          <tr>
            <td align="left" valign="top" style="padding-top:10px; padding-bottom:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%" align="left" valign="top" class="body" style="padding-top:10px; padding-right:16px;"><span style="font-weight:bold; color:#309703;">21.07.07</span><br />
                    <br />
La page d'authentification<br />
<br />
<a href="content.php"><!-- read more sekM --> En savoir plus</a></td>
                <td align="center" valign="bottom"><img src="images/index_25.gif" width="99" height="99" alt="" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%" align="left" valign="top" class="body" style="padding-top:10px; padding-right:16px;"><span style="font-weight:bold; color:#309703;">21.07.07</span><br />
                    <br />
                La page d'authentification<br />
                  <br />
                  <a href="content.php"><!-- read more sekM --> En savoir plus</a></td>
                <td align="center" valign="bottom"><img src="images/index_44.gif" width="81" height="116" alt="" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFF2D7" style="background-image:url(images/index_63.gif); background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><pre class="footer"><a href="index.php"><!-- Home sekM --> Acceuil</a>       ::       <a href="content.php"><!-- Baby Cloths sekM --> Moins d'un an</a>       ::       <a href="comments.php"><!-- Nursery sekM --> Garderie</a>       ::       <a href="content.php"><!-- Toys sekM --> Jouets</a>       ::       <a href="contact.php">Contacts</a></pre></td>
      </tr>
      <tr>
        <td align="center" valign="top" class="copyright">Services de garde LUMIERE  SOLEIL</td>
      </tr>
    </table></td>
  </tr>
</table>
<map name="Map" id="Map"><area shape="rect" coords="122,23,177,49" href="index.php" alt="" />
<area shape="rect" coords="120,67,177,49" href="inscription.php" alt="" />
<area shape="rect" coords="124,105,203,133" href="comments.php" alt="" />
<area shape="rect" coords="122,148,172,168" href="Authentification.php" alt="" />
<area shape="rect" coords="123,185,209,211" href="contact.php" alt="" />
</map>
<map name="Map2" id="Map2"><area shape="rect" coords="18,27,284,122" href="index.php" alt="" />
</map></body>
</html>