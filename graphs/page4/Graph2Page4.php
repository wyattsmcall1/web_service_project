 <?php  
 // Standard inclusions     
 include("pChart/pData.class");  
 include("pChart/pChart.class");  
 $sum = 0;
 $data=array(9.8,8.1,7.5,1,1.9,.5,.6,1.5,.8);
 foreach($data as $num){
 $sum += $num;
 }
 
  
  
 // Dataset definition   
 $DataSet = new pData;  
 $DataSet->AddPoint($data,"Serie1");  
 $DataSet->AddPoint(array( 
 "Nonspecific Psychological Disturbances " . round( ($data[0]/$sum) * 100 ) . '%', 
 "Depression " . round( ($data[1]/$sum) * 100 ) . '%', 
 "Anxiety and Nervousness " . round( ($data[2]/$sum) * 100 ) . '%',
 "Nonspecific Behavioral Disturbances " . round( ($data[3]/$sum) * 100 ) . '%', 
 "Restlessness " . round( ($data[4]/$sum) * 100 ) . '%',
 "Anger " . round( ($data[5]/$sum) * 100, 2 ) . '%', 
 "Hostile Behavior " . round( ($data[6]/$sum) * 100, 2 ) . '%',
 "Growth/Developmental Disorder Symptoms " . round( ($data[7]/$sum) * 100, 2 ) . '%', 
 "Insomnia " . round( ($data[8]/$sum) * 100 ) . '%'), "Serie2");  

 $DataSet->AddAllSeries();  
 $DataSet->SetAbsciseLabelSerie("Serie2");  
  
 // Initialise the graph  
 $Test = new pChart(700,200);  
 $Test->loadColorPalette("Sample/softtones.txt");  
 $Test->drawFilledRoundedRectangle(7,7,373,193,5,240,240,240);  
 $Test->drawRoundedRectangle(5,5,375,195,5,230,230,230);  
  
 // Draw the pie chart  
 $Test->setFontProperties("Fonts/tahoma.ttf",8);  
 $Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),150,90,110,PIE_NOLABEL,TRUE,50,20,5);  
 $Test->drawPieLegend(380,15,$DataSet->GetData(),$DataSet->GetDataDescription(),204,204,204);  
  
 $Test->Render("Graph2Page4.png");  

 print("<img src=\"Graph2Page4.png\" />"); 
?>  