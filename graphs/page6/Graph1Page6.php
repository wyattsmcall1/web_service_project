<?php  
 // Standard inclusions     
 include("pChart/pData.class");  
 include("pChart/pChart.class");  
 $sum = 0;
 $data=array(71,6.9,8.2,2.7,5.7,4.1,4.1,4.4,3.5,4.4,2.5,2.9,2.1,1.3,3.1);
 foreach($data as $num){
 $sum += $num;
 }
 
  
  
 // Dataset definition   
 $DataSet = new pData;  
 $DataSet->AddPoint($data,"Serie1");  
 $DataSet->AddPoint(array( 
 "CNS Stimulant " . round( ($data[0]/$sum) * 100 ) . '%', 
 "SSRI Antidepressants " . round( ($data[1]/$sum) * 100 ) . '%', 
 "Atypical Antipsychotics " . round( ($data[2]/$sum) * 100 ) . '%',
 "Benzodiazepines " . round( ($data[3]/$sum) * 100 ) . '%', 
 "Viral Vaccine " . round( ($data[4]/$sum) * 100 ) . '%',
 "Smoking Cessation Agents " . round( ($data[5]/$sum) * 100 ) . '%', 
 "Miscellaneous Antidepressants " . round( ($data[6]/$sum) * 100 ) . '%',
 "Antihistamine " . round( ($data[7]/$sum) * 100 ) . '%', 
 "Miscellaneous Anxiolytics, Sedatives and Hypnotics " . round( ($data[8]/$sum) * 100 ) . '%',
 "Antiadrenergic Agents, Centrally Acting " . round( ($data[9]/$sum) * 100 ) . '%', 
 "Benzodiazepine Anticonvulsants " . round( ($data[10]/$sum) * 100 ) . '%',
 "Miscellaneous Uncategorized Agents " . round( ($data[11]/$sum) * 100 ) . '%', 
 "Adrenergic Bronchodilators " . round( ($data[12]/$sum) * 100 ) . '%',
 "Phenylpiperazine Antidepressants " . round( ($data[13]/$sum) * 100 ) . '%',
 "Toxoids " . round( ($data[14]/$sum) * 100 ) . '%'
 ), "Serie2");  

 $DataSet->AddAllSeries();  
 $DataSet->SetAbsciseLabelSerie("Serie2");  
  
 // Initialise the graph  
 $Test = new pChart(700,250);  
 $Test->loadColorPalette("Sample/softtones.txt");  
 $Test->drawFilledRoundedRectangle(7,7,373,193,5,240,240,240);  
 $Test->drawRoundedRectangle(5,5,375,195,5,230,230,230);  
  
 // Draw the pie chart  
 $Test->setFontProperties("Fonts/tahoma.ttf",8);  
 $Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),150,90,110,PIE_NOLABEL,TRUE,50,20,5);  
 $Test->drawPieLegend(380,15,$DataSet->GetData(),$DataSet->GetDataDescription(),204,204,204);  
  
 $Test->Render("Graph1Page6.png");  

 print("<img src=\"Graph1Page6.png\" />"); 
?>  