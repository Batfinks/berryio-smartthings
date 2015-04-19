
<?                                                                                                  

/*------------------------------------------------------------------------------                    
  BerryIO CPU Status Command                                                                        
------------------------------------------------------------------------------*/                    

$title = 'CPU Status';                                                                              

// Load the cpu functions                                                                           
require_once(FUNCTIONS.'cpu.php');                                                                  

// Load the system settings                                                                         
settings('system', 1);                                                                              

// Get the cpu details                                                                              
$page['temperature'] = cpu_get_temp();                                                              
$page['speed'] = cpu_get_speed();                                                                   
$page['voltage'] = cpu_get_volts();                                                                 
$page['load_average'] = sys_getloadavg();                                                           
$page['perc'] = cpu_get_percentage();                                                               

// Display status page                                                                              
$GLOBALS['JAVASCRIPT']['common'] = 'common';                                                        
$GLOBALS['JAVASCRIPT']['updateCPU'] = 'updateCPU';                                                  
require_once(FUNCTIONS.'graph.php');                                                                
$content .= view('pages/smartthings', $page);                                                        

// Check for missing information                                                                    
if($page['temperature'] === FALSE || $page['speed'] === FALSE || $page['voltage'] === FALSE)        
{                                                                                                   
  $content .= message('WARNING: Unable retrieve all the CPU information');                          
  return FALSE;                                                                                     
}               
