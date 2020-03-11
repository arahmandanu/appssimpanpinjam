<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Session_app
	{				
		public function sessionAppStart()
		{			

      		session_start();
      		session_name('Pinjaman');
      		
      		//check system (apakah sedang melakukan cut off)
           /* if ( GetSettingValue('cut_off_status') == 'on' ) {
                echo "<h3 id='alertMessage'><center><font style='color:red'><b>Mohon Maaf Sistem Sedang Melakukan Cut Off</b></font></center></h3>";
                exit;
            }*/

      		if (!isset($_SERVER['HTTPS']) || (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'on') )
			{
				//header('Location:https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);	
			} 		
		} 			

	}	
