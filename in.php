<?php   
         
 function fetch_data()  
 {  
      $output1 = '';  
      $connect = mysqli_connect("localhost", "root", "", "cv");  
      $requete1 = "SELECT name,image,image,etatcivil,nom,prenom,tele,email,adresse from civilite,upload where civilite.idc= (select max(civilite.idc) from civilite) and upload.idc=civilite.idc";  
      $result = mysqli_query($connect, $requete1);  
      if($data = mysqli_fetch_array($result))  
      {       
      $output1 .= '  
                      <h4><span> Etat civil :</span> '.$data['etatcivil'].'<span><br/>Nom : </span>'.$data['nom']. '<span><br/> Prenom :</span> '.$data['prenom'].'<span><br/>Telephone :</span> '.$data['tele'].'<span><br/>Email : </span>'.$data['email'].'<span><br/>Adresse : </span>'.$data['adresse'].'</h4>''<img style="width:50px;height:50px" src="'.$row['name'].'"/>
                ';  
      }    

      $output2 = '';    
      $requete2 = "SELECT date,formation from formation where formation.idc= (select max(formation.idc) from formation)";  
      $result = mysqli_query($connect, $requete2);  
      $t2='<h2> Formation </h2>';
      while($data = mysqli_fetch_array($result))  
      {       
      $output2 .= '  
                 <p > '.$data['date'].':'.$data['formation'].'</p>
                ';  
      }


      $output3 = '';    
      $requete3 = "SELECT date,experience from experience where experience.idc= (select max(experience.idc) from experience)";  
      $result = mysqli_query($connect, $requete3);  
      $t3='<h2> Experience Professionnelle </h2>';
      while($data = mysqli_fetch_array($result))  
      {       
      $output3 .= '  
                 <p> '.$data['date'].':'.$data['experience'].'</p>
                ';  
      }
            $output4 = '';    
      $requete4 = "SELECT langue,niveau from langue where langue.idc= (select max(langue.idc) from langue)";  
      $result = mysqli_query($connect, $requete4);  
      $t4='<h2> Langues </h2>';
      while($data = mysqli_fetch_array($result))  
      {       
      $output4 .= '  
                 <p> '.$data['langue'].':'.$data['niveau'].'</p>
                ';  
      }
            $output5 = '';    
      $requete5 = "SELECT projet from projet where projet.idc= (select max(projet.idc) from projet)";  
      $result = mysqli_query($connect, $requete5);  
      $t5='<h2> Projet Professionnelle </h2>';
      while($data = mysqli_fetch_array($result))  
      {       
      $output5 .= '  
                 <p> '.$data['projet'].'</p>
                ';  
      }
            $output6 = '';    
      $requete6 = "SELECT competence from competence where competence.idc= (select max(competence.idc) from competence)";  
      $result = mysqli_query($connect, $requete6);  
      $t6='<h2> Compétence Informatique </h2>';
      while($data = mysqli_fetch_array($result))  
      {       
      $output6 .= '  
                 <p> '.$data['competence'].'</p>
                ';  
      }
            $output7 = '';    
      $requete7 = "SELECT centre from centre where centre.idc= (select max(centre.idc) from centre)";  
      $result = mysqli_query($connect, $requete7);  
      $t7="<h2> Centre d'intérêt </h2>";
      while($data = mysqli_fetch_array($result))  
      {       
      $output7 .= '  
                 <p> '.$data['centre'].'</p>
                ';  
      }
      $t0="<br/> <br/> <br/><br/> <br/>";
      $t8= " Date de Mise a Jour : ";
      $t9= date('d-m-Y') ;
      $t10= "<h2>NAMIQ &copy; AMARIR</h2>";
  
return $output1.$t2.$output2.$t4.$output4.$t3.$output3.$t5.$output5.$t6.$output6.$t7.$output7.$t0.$t8.$t9.$t10;  

 } 
 


 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h1 align="center">Corruculum Vitae</h1><br /><br />  
     
            
               
           
      ';  
       $content .= fetch_data();  
      $content .= '</p>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?> 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <meta charset="utf-8">
           <style >
  h4{
  border: 2px solid #BA1BC0;
  color: black;
  display: block;
  max-width: 600px;
padding-left: 20px; 
}
  h2{

  border: 2px solid #BA1BC0;
  color: black;
  display: block;
  max-width: 600px;
padding-left: 200px; 

  
}
span{
  font-size: 20px;
  font-family: monotype corsiva,bold;
}
</style>            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center"></h3><br />  
                <div class="table-responsive">  
                    
                           
                               <!-- <p >ID</p>   -->
                               <!-- <p>Name</p>   -->
                               <!-- <p >Gender</p>   -->
                               <!-- <p>Designation</p>   -->
                               <!-- <p >Age</p>   -->
                           
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  