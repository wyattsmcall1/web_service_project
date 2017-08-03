
<?php  
 // Standard inclusions     
 include("pChart/pData.class");  
 include("pChart/pChart.class");  
  
 // Dataset definition   
 $DataSet = new pData;  
 $DataSet->AddPoint(array(.5,1.2),"Serie1");  
 $DataSet->AddPoint(array(.2,.5),"Serie2");  
 $DataSet->AddPoint(array(.3,.8),"Serie3");  
 $DataSet->AddPoint(array('Obese (BMI ≥ 30)','Not Obese (BMI < 30)'),"XLABEL"); 
 $DataSet->AddSerie("Serie1");  
 $DataSet->AddSerie("Serie2");  
 $DataSet->AddSerie("Serie3");  
 $DataSet->SetAbsciseLabelSerie("XLABEL");  
 $DataSet->SetSerieName("Male","Serie1");  
 $DataSet->SetSerieName("Female","Serie2");  
 $DataSet->SetSerieName("All","Serie3");  
  
 // Initialise the graph  
 $Test = new pChart(900,230);  
 $Test->setFontProperties("Fonts/tahoma.ttf",8);  
 $Test->setGraphArea(50,30,680,200);  
 $Test->drawFilledRoundedRectangle(7,7,693,223,5,240,240,240);  
 $Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);  
 $Test->drawGraphArea(255,255,255,TRUE);  
 $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_START0,150,150,150,TRUE,0,2,TRUE);     
 $Test->drawGrid(4,TRUE,230,230,230,50);  
  
 // Draw the 0 line  
 $Test->setFontProperties("Fonts/tahoma.ttf",6);  
 $Test->drawTreshold(0,143,55,72,TRUE,TRUE);  
  
 // Draw the bar graph  
 $Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE);  
  
 // Finish the graph  
 $Test->setFontProperties("Fonts/tahoma.ttf",8);  
 $Test->drawLegend(700,150,$DataSet->GetDataDescription(),204,204,204);  
 $Test->setFontProperties("Fonts/tahoma.ttf",10);  
 $Test->drawTitle(50,22,"Example 12",50,50,50,585);  
 $Test->Render("Graph3Page8.png");  

print "<img src=\"Graph3Page8.png\" />";
?>  
